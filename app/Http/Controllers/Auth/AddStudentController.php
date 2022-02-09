<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddStudentController extends Controller
{
    public function __construct(User $user, Student $student)
    {
        $this->user = $user;
        $this->student = $student;
    }

    public function index() 
    {
        $titles = array('Mr.', 'Mrs.', 'Ms.');

        return view('auth.addStudent')->with('titles', $titles);
    }

    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'title' => ['required'],
            'name' => ['required', 'max:35'],
            'email' => ['required', 'email', 'max:255'],
            'user_type' => ['required', 'starts_with:s', 'ends_with:f'],
            'gender' => ['required'],
            'phoneNumber' => ['required', 'starts_with:0', 'numeric'],
            'password' => ['required', 'confirmed'],

        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->phoneNumber = $request->phoneNumber;
        $user->password = Hash::make($request->password);
        $user->user_type = $request->user_type;
        $user->save();

        $student = new student();

        $student->title = $request->title;
        $user->student()->save($student);


        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'gender' => $request->gender,
        //     'phoneNumber' => $request->phoneNumber,
        //     'password' => Hash::make($request->password),
        // ]);

        // $user->user_type = $request->user_type;
        // $user->save();

        return redirect()->route('dashboard');
    }
}
