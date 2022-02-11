<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use App\Models\Principal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

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

        $validatedData = $request->validate([
            'name' => ['required', 'max:35', 'unique:users,name'],
            'email' => ['required', 'email', 'max:255'],
            'user_type' => ['required', Rule::in(['principal'])],
            'gender' => ['required'],
            'phoneNumber' => ['required', 'starts_with:0', 'numeric'],
            'password' => ['required', 'confirmed'],

        ]);

        try {
            DB::transaction(function () use ($request) {

                $user = User::create($request->all());

                $user->password = Hash::make($request->password);
                $user->user_type = $request->user_type;
                $user->save();

                $principal = new Principal();

                $user->principal()->save($principal);

            });

            auth()->attempt($request->only('email', 'password'));

            return redirect()->route('dashboard');

        } catch (Exception $ex) {
            return back()->with('status', 'Could not register, something went wrong');
        }
    }
}
