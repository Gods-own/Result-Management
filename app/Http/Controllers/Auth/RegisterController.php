<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Principal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{

    public function __construct(User $user, Principal $principal)
    {
        $this->user = $user;
        $this->principal = $principal;
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function index () {
        return view('auth.register');
    }

    public function store(Request $request) {

        $check_names = User::all();

        $names = array();

        foreach($check_names as $name) 
        {

            array_push($names, $name->name);
        }

        $validatedData = $request->validate([
            'name' => ['required', 'max:35', Rule::notIn($names)],
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

        $principal = new Principal();

        $user->principal()->save($principal);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('dashboard');
    }
}
