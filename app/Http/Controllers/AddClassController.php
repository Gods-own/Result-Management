<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;

class AddClassController extends Controller
{
    public function __construct(User $user, Teacher $teacher, Classroom $class_room)
    {
        $this->user = $user;
        $this->teacher = $teacher;
        $this->class_room = $class_room;
        $this->middleware(['auth']);
    }

    public function index()
    {
        $teachers = Teacher::all();

        return view('addClass')->with('teachers', $teachers);
    }

    public function store(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'teacher' => ['required', 'unique:class_rooms,user_id', 'exists:users,id'],
                'classroom' => ['required', 'max:255', 'unique:class_rooms,class_room'],
            ]);


            Classroom::create([
                'user_id' => $request->teacher,
                'class_room' => $request->classroom,
            ]);

            return redirect()->route('dashboard');
        } catch (Exception $ex) {
            return back()->with('status', 'Could not add class, Something went wrong');
        }

    }
}
