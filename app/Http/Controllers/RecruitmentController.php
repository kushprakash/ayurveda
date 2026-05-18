<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Vacancy;
use App\Models\District;

class RecruitmentController extends Controller
{
    public function career()
    {
        $states = State::where('is_active', true)->where('name', 'Bihar')->get();
        return view('career', compact('states'));
    }

    public function getVacancies(Request $request)
    {
        $state_id = $request->state_id;
        $vacancies = Vacancy::with('post')
            ->whereHas('post', function($query) {
                $query->whereIn('name', ['Regional Manager', 'Area Manager', 'Notec Arogya', 'Ayurved Mitra']);
            })
            ->where('state_id', $state_id)
            ->where('is_active', true)
            ->get();

        return response()->json([
            'html' => view('partials.vacancy_list', compact('vacancies'))->render()
        ]);
    }

    public function vacancyDetails($id)
    {
        $vacancy = Vacancy::with(['post', 'state'])->findOrFail($id);
        return view('vacancy_details', compact('vacancy'));
    }

    public function getDistricts($state_id)
    {
        $districts = District::where('state_id', $state_id)->get();
        return response()->json($districts);
    }
}
