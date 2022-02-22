<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Session;
use App\Models\Classroom;

class TeacherDashboardController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $user = Auth::user();

        // $subjecttype = SubjectType::find(4);

        // dd($subjecttype);

        // $subjecttypes = $subjecttype->class_rooms;

        // dd($subjecttypes);

        // $subject = Subject::find(1);

        // $classroom = Classroom::find(1);

        // dd($subject->subject_types->class_rooms);

        // $subject_type = SubjectType::find(4);

        // dd($classroom->subject_types);

        $session = Session::latest()->first();

        $subjects = $user->subjects;
        $classrooms = Classroom::where('user_id', $user->id)->get();
        $isClassTeacher = $classrooms->isEmpty();

        // dd($class_room->class_room);

        // foreach($subjecttypes as $subjecttype) {
        //     dd($subjecttype->id);
        // }

        return view('dashboards.teacherDashboard')->with('subjects', $subjects)
            ->with('isClassTeacher', $isClassTeacher)->with('classrooms', $classrooms);
    }
}
