<?php

namespace App\Http\Controllers\Auth;

use Image;
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
use Illuminate\Support\Facades\Storage;

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
            'profile_pic' => ['required', 'image', 'mimes:jpeg,bmp,png'],
            'user_type' => ['required', Rule::in(['student'])],
            'gender' => ['required'],
            'phoneNumber' => ['required', 'unique:users,phoneNumber', 'starts_with:0', 'numeric'],
            'studenttype' => ['required', 'exists:student_types,id'],
            'classroom' => ['required', 'exists:class_rooms,id'],
            'schoolSession' => ['required', 'exists:sessions,id'],
            'password' => ['required', 'confirmed'],

        ]);

        try {
            DB::transaction(function () use ($request) {
                $student = new Student();
                $user = new User();

                $user->fill($request->all());

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

                $student->student_id = $user->id;
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
