<?php

namespace App\Http\Controllers\Dashboards;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->user_type == 'principal') {
            return redirect()->route('admin_dashboard');
        }
        elseif (Auth::user()->user_type == 'staff') {
            return redirect()->route('teacher_dashboard');
        }
        elseif (Auth::user()->user_type == 'student') {
            return view('dashboards.studentDashboard');
        }
    }
}
