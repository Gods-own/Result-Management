<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AddClassController extends Controller
{
    public function __construct(User $user, Teacher $teacher, Classroom $class_room)
    {
        $this->user = $user;
        $this->teacher = $teacher;
        $this->class_room = $class_room;
    }

    public function index()
    {
        $teachers = Teacher::all();

        return view('addClass')->with('teachers', $teachers);
    }

    public function store(Request $request) 
    {
        $teachers = Teacher::all();

        $names_of_teachers = array();

        foreach($teachers as $name_of_teacher) 
        {
            array_push($names_of_teachers, $name_of_teacher->title.' '.$name_of_teacher->user->name);
        }

        $validatedData = $request->validate([
            'teacher' => ['required', Rule::in($names_of_teachers)],
            'classroom' => ['required', 'max:255'],
        ]);

        $teacher_name = explode(' ', $request->teacher, 2);

        $user = User::where('name', $teacher_name[1])->get();

        // dd($user);

        $class_room = new Classroom();

        $class_room->class_room = $request->classroom;

        $user[0]->class_room()->save($class_room);

        return redirect()->route('dashboard');
    }
}
