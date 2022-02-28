<?php

namespace App\Http\Controllers\Users;

use App\Models\Student;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewStudentController extends Controller
{
    public function index()
    {
        // $students = Student::all();

        $students = User::where('user_type', 'student')->get();

        // dd($students->modelKeys());

        return view('users.viewStudents')->with('students', $students);
    }
}
