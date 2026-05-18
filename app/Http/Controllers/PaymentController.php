<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Payment;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function initiate(Request $request)
    {
        $application = Application::findOrFail($request->application_id);
        
        // In real scenario, call Razorpay/PhonePe API here
        // For now, we generate a mock payment URL
        $postData = [
            'amount' => $application->total_amount
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://enexaerp.com/api/add-money/request',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>json_encode($postData),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'mid: ENX0000001',
            'mkey: cNGHE78SD3Qo1qBO91w28vtddB1JAuXo'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response,true);
  
        $paymentUrl = $data['data']['payment_url'];
        $decodedUrl = urldecode($paymentUrl);

        return response()->json([
            'success' => true,
            'payment_url' => $decodedUrl,
            'orderId' => $data['data']['orderId']
        ]);
    }

    public function gateway(Request $request)
    {
        $application = Application::with('vacancy.post')->findOrFail($request->app_id);
        
        if ($application->payment_status == 'paid') {
            return redirect()->route('apply.receipt', $application->id);
        }

        return view('payment.gateway', compact('application'));
    }

    public function processMock(Request $request)
    {
        $application = Application::findOrFail($request->application_id);
        
        $transaction_id = 'TXN-' . strtoupper(Str::random(12));
        
        // Create Payment Record
        Payment::create([
            'application_id' => $application->id,
            'transaction_id' => $transaction_id,
            'amount' => $application->total_amount,
            'payment_method' => $request->payment_method ?? 'UPI',
            'status' => 'completed',
            'response_data' => ['mock' => true, 'timestamp' => now()]
        ]);

        // Update Application Status
        $application->update([
            'payment_status' => 'paid',
            'status' => 'submitted'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Payment Successful',
            'redirect' => route('apply.receipt', $application->id)
        ]);
    }

    public function checkStatus(Request $request)
    {
        $orderId = $request->orderId;
        $application_id = $request->application_id;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://enexaerp.com/api/add-money/verify',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode(['orderId' => $orderId]),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'mid: ENX0000001',
                'mkey: cNGHE78SD3Qo1qBO91w28vtddB1JAuXo'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response, true);

        if (isset($data['status']) && $data['status'] == 'COMPLETED') {
            $application = Application::findOrFail($application_id);
            
            if ($application->payment_status != 'paid') {
                // Create Payment Record
                Payment::create([
                    'application_id' => $application->id,
                    'transaction_id' => $orderId,
                    'amount' => $application->total_amount,
                    'payment_method' => 'Gateway',
                    'status' => 'completed',
                    'response_data' => $data
                ]);

                // Update Application Status
                $application->update([
                    'payment_status' => 'paid',
                    'status' => 'submitted'
                ]);
            }

            return response()->json([
                'success' => true,
                'status' => 'paid',
                'redirect' => route('apply.receipt', $application->id)
            ]);
        }

        return response()->json([
            'success' => false,
            'status' => $data['status'] ?? 'pending'
        ]);
    }

    public function receipt($application_id)
    {
        $application = Application::with(['user', 'vacancy.post', 'state', 'district', 'village', 'payment'])
            ->findOrFail($application_id);

        if ($application->payment_status != 'paid') {
            return redirect()->route('payment.gateway', ['app_id' => $application->id]);
        }

        return view('apply.receipt', compact('application'));
    }
}
