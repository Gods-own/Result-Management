<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Subject;
use App\Models\SubjectType;

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

        $subject = Subject::find(1);

        // dd($subject->subject_types->class_rooms);

        $subject_type = SubjectType::find(4);

        dd($subject_type->subjects);

        $subjects = $user->subjects;

        // foreach($subjecttypes as $subjecttype) {
        //     dd($subjecttype->id);
        // }

        return view('dashboards.teacherDashboard')->with('subjects', $subjects);
    }
}
