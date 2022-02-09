<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AddTeacherController extends Controller
{
    public function __construct(User $user, Teacher $teacher)
    {
        $this->user = $user;
        $this->teacher = $teacher;
    }

    public function index()
    {
        // $teacher = Teacher::find(1)->user->name;
        // $title = Teacher::find(1)->title;
        // $teachers = array($title.$teacher);

        // dd($teachers);

        $titles = array('Mr.', 'Mrs.', 'Ms.');

        return view('auth.addTeacher')->with('titles', $titles);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', Rule::in(['Mr.', 'Mrs.', 'Ms.'])],
            'name' => ['required', 'max:35'],
            'email' => ['required', 'email', 'max:255'],
            'user_type' => ['required', 'starts_with:s', 'ends_with:f'],
            'gender' => ['required'],
            'phoneNumber' => ['required', 'starts_with:0', 'numeric'],
            'password' => ['required', 'confirmed'],

        ]);

        $user = new User();

        try {

            $user->name = $request->name;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->phoneNumber = $request->phoneNumber;
            $user->password = Hash::make($request->password);
            $user->user_type = $request->user_type;
            $user->save();

            $teacher = new Teacher();

            $teacher->title = $request->title;
            $user->teacher()->save($teacher);

            return redirect()->route('dashboard');
        } catch(Exception $ex) {
            return back()->with('status', 'Name already exists');
        }
    }
}
