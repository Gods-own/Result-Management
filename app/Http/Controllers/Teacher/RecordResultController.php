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
use App\Models\Test1;
use App\Models\Test2;
use App\Models\Result;
use App\Models\Exam;
use App\Models\User;

class RecordResultController extends Controller
{
    public function index(Classroom $classroom, Subject $subject)
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

        return view('teacher.recordresult')->with('subject', $subject)
            ->with('students', $students)->with('class_room', $classroom);
    }

    public function show(User $user, Classroom $classroom, Subject $subject)
    {
        $grades = ['A1', 'B2', 'B3', 'C4', 'C5', 'C6', 'D7', 'E8', 'F9'];

        $session = Session::firstorNew([
            'is_current' => true
        ]);

        $term = Term::firstorNew([
            'is_current' => true
        ]);

        $test1 = Test1::firstorNew([
            'student_id' => $user->id,
            'subject_id' => $subject->id,
            'term_id' => $term->id
        ]);

        $test2 = Test2::firstorNew([
            'student_id' => $user->id,
            'subject_id' => $subject->id,
            'term_id' => $term->id
        ]);

        $exam = Exam::firstorNew([
            'student_id' => $user->id,
            'subject_id' => $subject->id,
            'term_id' => $term->id
        ]);

        $totalScore = $test1->test1 + $test2->test2 + $exam->exam;

        return view('teacher.resultform')->with('subject', $subject)->with('user', $user)
            ->with('session', $session)->with('term', $term)->with('class_room', $classroom)
            ->with('test1', $test1)->with('test2', $test2)->with('exam', $exam)
            ->with('total', $totalScore)->with('grades', $grades);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:35', 'exists:users,id'],
            'term' => ['required', 'exists:terms,id'],
            'subject' => ['required', 'exists:subjects,id'],
            'test1' => ['required', 'exists:tests1,id'],
            'test2' => ['required', 'exists:tests2,id'],
            'exam' => ['required', 'exists:exams,id'],
            'total' => ['required', 'integer', 'max:100'],
            'grade' => ['required'],
        ]);

        try {
            $result = new Result();
            $result->fill($request->all());

            $result->student_id = $request->name;
            $result->term_id = $request->term;
            $result->subject_id = $request->subject;
            $result->test1_id = $request->test1;
            $result->test2_id = $request->test2;
            $result->exam_id = $request->exam;

            $result->save();

            return redirect()->route('teacher_dashboard');
        } catch(Exception $ex) {
            return back()->with('status', 'Could not add subjects, something went wrong');
        }
    }
}
