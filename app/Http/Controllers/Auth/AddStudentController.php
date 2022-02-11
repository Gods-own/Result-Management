<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use App\Models\Student;
use App\Models\Session;
use App\Models\Classroom;
use App\Models\StudentType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AddStudentController extends Controller
{
    public function __construct(User $user, Student $student)
    {
        $this->user = $user;
        $this->student = $student;
        $this->middleware(['auth']);
    }

    public function index()
    {

        $sessions = Session::all();
        $class_rooms = Classroom::all();
        $student_types = StudentType::all();

        return view('auth.addStudent')->with('schoolSessions', $sessions)->with('classrooms', $class_rooms)->with('studenttypes', $student_types);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'max:35', 'unique:users,name'],
            'email' => ['required', 'email', 'max:255'],
            'user_type' => ['required', Rule::in(['student'])],
            'gender' => ['required'],
            'phoneNumber' => ['required', 'starts_with:0', 'numeric'],
            'profile_pic' => ['required', 'image', 'mimes:jpeg,bmp,png'],
            'studenttype' => ['required', 'exists:student_types,id'],
            'classroom' => ['required', 'exists:class_rooms,id'],
            'schoolSession' => ['required', 'exists:sessions,id'],
            'password' => ['required', 'confirmed'],

        ]);

        try {
            DB::transaction(function () use ($request) {
                $student = new Student();

                $user = User::create($request->all());

                $user->password = Hash::make($request->password);
                $user->user_type = $request->user_type;
                $user->save();

                $request->profile_pic->store('profile_picture', 'public');

                $student->student_id = $user->id;
                $student->profile_pic = $request->profile_pic->hashName();
                $student->class_room_id = $request->classroom;
                $student->session_id = $request->schoolSession;
                $student->student_type_id = $request->studenttype;
                $student->save();
            });

            return redirect()->route('dashboard');
        } catch (Exception $ex) {
            return back()->with('status', 'Could not register, something went wrong');
        }
    }
}
