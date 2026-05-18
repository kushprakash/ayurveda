<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OtpLog;
use App\Models\Vacancy;
use App\Models\Application;
use App\Models\District;
use App\Models\Block;
use App\Models\Panchayat;
use App\Models\Village;
use App\Models\Document;
use App\Models\KycVerification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApplicationProcessController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|size:10',
            'email' => 'required|email|max:255',
        ]);

        $user = User::updateOrCreate(
            ['phone' => $request->phone],
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('password123'),
            ]
        );

        $otp = '1234';
        OtpLog::create([
            'identifier' => $request->phone,
            'otp' => $otp,
            'expires_at' => now()->addMinutes(10),
        ]);

        return response()->json(['success' => true, 'message' => 'OTP sent successfully']);
    }

    public function verifyOtp(Request $request)
    {
        $otpLog = OtpLog::where('otp', $request->otp)
            ->where('is_verified', false)
            ->where('expires_at', '>', now())
            ->first();

        if ($otpLog) {
            $otpLog->update(['is_verified' => true]);
            $user = User::where('phone', $otpLog->identifier)->first();
            Auth::login($user);

            $application = Application::where('user_id', $user->id)
                ->where('vacancy_id', $request->vacancy_id)
                ->first();

            return response()->json([
                'success' => true,
                'redirect' => route('apply.form', $request->vacancy_id)
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Invalid OTP']);
    }

    public function showForm($vacancy_id)
    {
        $vacancy = Vacancy::with(['post', 'state'])->findOrFail($vacancy_id);
        
        $application = Application::with(['kyc', 'documents'])->where('user_id', auth()->id())
            ->where('vacancy_id', $vacancy_id)
            ->first();

        if ($application && $application->payment_status == 'paid') {
            return redirect()->route('dashboard')->with('info', 'Application already completed and paid.');
        }

        if (!$application) {
            $application = Application::create([
                'user_id' => auth()->id(),
                'vacancy_id' => $vacancy_id,
                'status' => 'draft',
                'application_no' => 'AHRC-' . strtoupper(Str::random(8)),
                'state_id' => $vacancy->state_id,
                'total_amount' => $vacancy->post->total_fee,
                'current_step' => 1
            ]);
        }

        $districts = District::where('state_id', $vacancy->state_id)->get();
        
        return view('application_form', compact('vacancy', 'districts', 'application'));
    }

    public function autoSave(Request $request)
    {
        $application = Application::findOrFail($request->application_id);
        
        // Update form_data JSON field with current inputs
        $currentData = $application->form_data ?? [];
        $newData = array_merge($currentData, $request->except(['_token', 'application_id', 'step']));
        
        $application->update([
            'form_data' => $newData,
            'last_active_at' => now()
        ]);

        return response()->json(['success' => true, 'timestamp' => now()->format('H:i:s')]);
    }

    public function submitStep(Request $request)
    {
        $application = Application::findOrFail($request->application_id);
        
        if ($request->step == 'basic') {
            $application->update(array_merge($request->only([
                'district_id', 'block', 'panchayat', 'village',
                'gender', 'dob', 'address', 'education', 'experience'
            ]), [
                'current_step' => 2,
                'completion_percentage' => 25,
                'last_active_at' => now()
            ]));
        }

        if ($request->step == 'kyc') {
            KycVerification::updateOrCreate(
                ['user_id' => auth()->id(), 'application_id' => $application->id],
                [
                    'aadhaar_no' => $request->aadhaar_no,
                    'is_aadhaar_verified' => true,
                    'pan_no' => $request->pan_no,
                    'is_pan_verified' => true,
                    'bank_name' => $request->bank_name,
                    'account_no' => $request->account_no,
                    'ifsc_code' => $request->ifsc_code,
                    'account_holder' => $request->account_holder,
                    'is_bank_verified' => true,
                    'status' => 'verified'
                ]
            );
            
            $application->update([
                'current_step' => 3,
                'completion_percentage' => 50,
                'kyc_status' => 'verified',
                'last_active_at' => now()
            ]);
        }

        if ($request->step == 'docs') {
            // Handle file uploads separately if needed, but here we just update step
            $application->update([
                'current_step' => 4,
                'completion_percentage' => 75,
                'last_active_at' => now()
            ]);
        }

        if ($request->step == 'final') {
            $application->update([
                'status' => 'submitted',
                'completion_percentage' => 100,
                'last_active_at' => now()
            ]);
            return response()->json(['success' => true]);
        }


        return response()->json(['success' => true]);
    }

    public function uploadDocument(Request $request)
    {
        $application = Application::findOrFail($request->application_id);

        $request->validate([
            'file' => 'required|file',
            'doc_name' => 'required'
        ]);

        $file = $request->file('file');
        $docName = $request->doc_name;

        if ($file) {

            // create folder if not exists
            $destinationPath = public_path('applications/docs');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // unique file name
            $fileName = $fileName = preg_replace('/[^A-Za-z0-9]/', '', $docName) . '.' . $application->application_no . '.jpg';

            // move file to public folder
            $file->move($destinationPath, $fileName);

            // save public url/path
            $path = url('applications/docs/' . $fileName);

            Document::updateOrCreate(
                [
                    'application_id' => $application->id,
                    'document_name' => $docName
                ],
                [
                    'file_path' => $path
                ]
            );

            return response()->json([
                'success' => true,
                'path' => $path
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }

    public function getBlocks($district_id)
    {
        return response()->json(Block::where('district_id', $district_id)->get());
    }

    public function getPanchayats($block_id)
    {
        return response()->json(Panchayat::where('block_id', $block_id)->get());
    }

    public function getVillages($panchayat_id)
    {
        return response()->json(Village::where('panchayat_id', $panchayat_id)->get());
    }
}
