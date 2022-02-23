<?php

namespace App\Http\Controllers\Users;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewStudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('users.viewStudents')->with('students', $students);
    }
}
