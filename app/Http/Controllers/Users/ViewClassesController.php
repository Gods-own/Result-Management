<?php

namespace App\Http\Controllers\Users;

use App\Models\Classroom;
use App\Models\Session;
use App\Models\Student;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewClassesController extends Controller
{
    public function index() {
        $classrooms = Classroom::all();

        return view('users.viewClasses')->with('classrooms', $classrooms);
    }

    public function show(Classroom $classroom) {

        $session = Session::firstorNew([
            'is_current' => true
        ]);

        $users = User::all();

        $students_con = Student::where([
            'class_room_id' => $classroom->id,
            'session_id' => $session->id
        ])->get();

        $collections = collect($students_con)->pluck('student_id');


        $student_ids = $collections->all();

        $students = User::whereIn('id', $student_ids)->get();

        return view('users.viewStudents')->with('students', $students);
    }
}
