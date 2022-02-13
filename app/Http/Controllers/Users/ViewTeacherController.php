<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewTeacherController extends Controller
{
    public function index() 
    {
        $teachers = User::where('user_type', 'staff')->get();

        return view('users.viewTeachers')->with('teachers', $teachers);
    }
}
