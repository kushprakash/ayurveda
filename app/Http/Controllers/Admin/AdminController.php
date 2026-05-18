<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\District;
use App\Models\Block;
use App\Models\Panchayat;
use App\Models\Village;
use App\Models\Vacancy;
use App\Models\Application;
use App\Models\Post;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_states' => State::count(),
            'total_districts' => District::count(),
            'total_villages' => Village::count(),
            'total_vacancies' => Vacancy::count(),
            'total_applications' => Application::count(),
            'draft_applications' => Application::where('status', 'draft')->count(),
            'payment_pending' => Application::where('payment_status', 'pending')->where('status', 'submitted')->count(),
            'total_revenue' => Application::where('payment_status', 'paid')->sum('total_amount'),
            'pending_reviews' => Application::where('status', 'submitted')->count(),

        ];

        $recent_applications = Application::with(['user', 'vacancy.post', 'village'])->latest()->take(10)->get();

        return view('admin.dashboard', compact('stats', 'recent_applications'));
    }

    public function vacancies()
    {
        $vacancies = Vacancy::with(['post', 'state'])->latest()->get();
        return view('admin.vacancies.index', compact('vacancies'));
    }

    public function applications()
    {
        $applications = Application::with(['user', 'vacancy.post', 'state', 'village'])->latest()->get();
        return view('admin.applications.index', compact('applications'));
    }

    public function locations()
    {
        $states = State::withCount(['districts'])->get();
        return view('admin.locations.index', compact('states'));
    }
}
