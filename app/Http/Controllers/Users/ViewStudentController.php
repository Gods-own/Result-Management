<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewStudentController extends Controller
{
    public function index() 
    {
        $students = User::where('user_type', 'student')->get();

        return view('users.viewStudents')->with('students', $students);
    }
}
