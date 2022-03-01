<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Image;
use App\Models\User;
use App\Models\Principal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class RegisterController extends Controller
{

    public function __construct(User $user, Principal $principal)
    {
        $this->user = $user;
        $this->principal = $principal;
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function index () {
        $active2 = true;
        return view('auth.register')->with('active2', $active2);
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'name' => ['required', 'max:35', 'unique:users,name'],
            'email' => ['required', 'email', 'max:255'],
            'profile_pic' => ['required', 'image', 'mimes:jpeg,bmp,png'],
            'user_type' => ['required', Rule::in(['principal'])],
            'gender' => ['required'],
            'phoneNumber' => ['required', 'unique:users,phoneNumber', 'starts_with:0', 'numeric'],
            'password' => ['required', 'confirmed'],

        ]);

        try {
            DB::transaction(function () use ($request) {

                $user = new User();
                $user->fill($request->all());

                // $img = Image::make($request->profile_pic);

                // $img->fit(150)->store('profile_picture', 'public');

                $file = $request->profile_pic;

                $path = $file->hashName('public/profile_picture');
                // avatars/bf5db5c75904dac712aea27d45320403.jpeg

                $image = Image::make($file);

                $image->fit(150);

                // $request->profile_pic->store('profile_picture', 'public');

                Storage::put($path, (string) $image->encode());

                $user->password = Hash::make($request->password);
                $user->profile_pic = $file->hashName();
                $user->user_type = $request->user_type;
                $user->save();


                $principal = new Principal();

                $user->principal()->save($principal);

            });

            auth()->attempt($request->only('email', 'password'));

            if (Auth::user()->user_type == 'principal') {
                return redirect()->route('admin_dashboard');
            }
            elseif (Auth::user()->user_type == 'staff') {
                return view('dashboards.teacherDashboard');
            }
            else {
                return view('dashboards.studentDashboard');
            }

        } catch (Exception $ex) {
            return back()->with('status', 'Could not register, something went wrong');
        }
    }
}
