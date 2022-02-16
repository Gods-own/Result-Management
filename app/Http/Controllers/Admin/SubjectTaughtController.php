<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\SubjectTaught;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectTaughtController extends Controller
{
    public function index() {
        $teachers = Teacher::all();

        $subjects = Subject::all();

        return view('admin.subjecttaught')->with('teachers', $teachers)->with('subjects', $subjects);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'teacher' => ['required', 'max:35', 'exists:users,id'],
                'subject' => ['required', 'exists:subjects,id'],
            ]);

            $subjecttaught = new SubjectTaught();

            $subjecttaught->teacher_id = $request->teacher;
            $subjecttaught->subject_id = $request->subject;

            $subjecttaught->save();

            return redirect()->route('admin_dashboard');

        } catch(Exception $ex) {
            return back()->with('status', 'Something went wrong');
        }

    }
}
