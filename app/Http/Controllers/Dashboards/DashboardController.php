<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['auth']);
    }

    public function index() 
    {
        if (Auth::user()->user_type == 'principal') {
            return view('adminDashboard');
        }
        elseif (Auth::user()->user_type == 'teacher') {
            return view('teacherDashboard');
        }
        else {
            return view('studentDashboard');
        }
    }
}
