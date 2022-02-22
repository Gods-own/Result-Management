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
use App\Models\Exam;
use App\Models\User;

class RecordExamController extends Controller
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

        return view('teacher.recordexam')->with('subject', $subject)
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

        return view('teacher.examform')->with('subject', $subject)->with('user', $user)
            ->with('session', $session)->with('term', $term)->with('class_room', $classroom);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:35', 'exists:users,id'],
            'term' => ['required', 'exists:terms,id'],
            'subject' => ['required', 'exists:subjects,id'],
            'exam' => ['required', 'integer', 'max:60'],
        ]);

        try {
            $exam = new Exam();
            $exam->fill($request->all());

            $exam->student_id = $request->name;
            $exam->term_id = $request->term;
            $exam->subject_id = $request->subject;

            $exam->save();

            return redirect()->route('teacher_dashboard');
        } catch(Exception $ex) {
            return back()->with('status', 'Could not add subjects, something went wrong');
        }
    }
}
