<?php

namespace App\Http\Controllers\Auth;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index () {
        return view('auth.register');
    }
=======
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct() 
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    
    public function index () {
        return view('auth.register');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => ['required', 'alpha', 'max:35'],
            'email' => ['required', 'email', 'max:255'],
            'user_type' => ['required', 'starts_with:p', 'ends_with:l'],
            'gender' => ['required'],
            'phoneNumber' => ['required', 'starts_with:0', 'numeric'],
            'password' => ['required', 'confirmed'],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phoneNumber' => $request->phoneNumber,
            'password' => Hash::make($request->password),
        ]);

        $user->user_type = $request->user_type;
        $user->save();

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('dashboard');
    }
>>>>>>> 13db7e93951a379f299d231100d5e65598c1fca7
}
