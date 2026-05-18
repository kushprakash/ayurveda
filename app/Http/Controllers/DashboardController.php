<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Notification;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $applications = Application::with(['vacancy.post', 'state', 'district', 'block', 'panchayat', 'village'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();
        
        $notifications = Notification::where('user_id', $user->id)->latest()->take(5)->get();
        
        return view('dashboard', compact('applications', 'notifications'));
    }
}
