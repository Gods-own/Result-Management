<?php

namespace App\Http\Controllers\Users;

use App\Models\Classroom;
use App\Models\Session;
use App\Models\Student;
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

        $students = Student::where([
            ['class_room_id', $classroom->id],
            ['session_id', $session->id]
        ])->get();

        return view('users.viewStudents')->with('students', $students);
    }
}
