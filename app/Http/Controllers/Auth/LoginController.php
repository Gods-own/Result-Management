<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function index()
    {
        $active1 = true;
        return view('auth.login')->with('active1', $active1);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);

        if (!auth()->attempt($request->only('email', 'password')))
        {
            return back()->with('status', 'Invalid login details');
        }

        if (Auth::user()->user_type == 'principal') {
            return redirect()->route('admin_dashboard');
        }
        elseif (Auth::user()->user_type == 'staff') {
            return redirect()->route('teacher_dashboard');
        }
        else {
            return view('dashboards.studentDashboard');
        }


    }
}
