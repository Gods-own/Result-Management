<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class StudentDashboardController extends Controller
{
    public function index() {
        $student = Auth::user();

        return view('dashboards.studentDashboard')->with('student', $student);
    }
}
