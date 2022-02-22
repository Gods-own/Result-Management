<?php

namespace App\Http\Controllers\Teacher;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Session;
use App\Models\Student;
use App\Models\Term;
use App\Models\Classroom;
use App\Models\Test2;
use App\Models\User;

class RecordTest2Controller extends Controller
{
    public function index(Subject $subject, Classroom $classroom)
    {

        // $user = Auth::user();

        // $subjecttaught = SubjectTaught::where('teacher_id', $user_id)->get();

        // foreach($subjecttaughts as $subjecttaught) {

        // }

        // dd($subjects);

        // $subjects = $user->subjects;

        // dd($subjects);

        // foreach($subjects as $subject) {

        //     dd($subject->subject);
        // }


        $session = Session::firstorNew([
            'is_current' => true
        ]);

        // $users = User::where('user_type', 'student')->student();

        $students = Student::where([
            ['session_id', $session->id],
            ['class_room_id', $classroom->id],
        ])->get();

        return view('teacher.recordtest2')->with('subject', $subject)
            ->with('students', $students)->with('class_room', $classroom);
    }

    public function show(User $user, Subject $subject, Classroom $classroom)
    {

        $session = Session::firstorNew([
            'is_current' => true
        ]);

        $term = Term::firstorNew([
            'is_current' => true
        ]);

        return view('teacher.test2form')->with('subject', $subject)->with('user', $user)
            ->with('session', $session)->with('term', $term)->with('class_room', $classroom);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:35', 'exists:users,id'],
            'term' => ['required', 'exists:terms,id'],
            'subject' => ['required', 'exists:subjects,id'],
            'test2' => ['required', 'integer', 'max:20'],
        ]);

        try {
            $test2 = new Test2();
            $test2->fill($request->all());

            $test2->student_id = $request->name;
            $test2->term_id = $request->term;
            $test2->subject_id = $request->subject;

            $test2->save();

            return redirect()->route('teacher_dashboard');
        } catch(Exception $ex) {
            return back()->with('status', 'Something went wrong');
        }
    }
}
