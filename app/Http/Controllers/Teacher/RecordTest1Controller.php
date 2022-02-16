<?php

namespace App\Http\Controllers\Teacher;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;
use App\Models\Session;
use App\Models\Term;
use App\Models\Classroom;
use App\Models\Test1;
use App\Models\User;

class RecordTest1Controller extends Controller
{
    public function index(Subject $subject)
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


        $session = Session::latest()->first();

        $terms = Term::all();

        $users = User::where('user_type', 'student')->get();

        return view('teacher.recordtest1')->with('subject', $subject)->with('session', $session)->with('terms', $terms)
            ->with('users', $users);
    }

    public function show(User $user, Subject $subject)
    {

        $session = Session::latest()->first();

        $terms = Term::all();

        $class_room =  Classroom::where('user_id', $user->id)->latest()->first();

        return view('teacher.test1form')->with('subject', $subject)->with('user', $user)
            ->with('session', $session)->with('terms', $terms)->with('class_room', $class_room);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:35', 'unique:users,name'],
            'term' => ['required', 'exists:terms,id'],
            'session' => ['required', 'exists:session,id'],
            'classroom' => ['required', 'exists:class_rooms,id'],
            'subject' => ['required', 'exists:subjects,id'],
            'test1' => ['required', 'integer'],
        ]);

        try {
            $test1 = new Test1();
            $test1->fill($request->all());

            $test1->subject_type_id = $request->subjecttype;

            $test1->save();

            return redirect()->route('admin_dashboard');
        } catch(Exception $ex) {
            return back()->with('status', 'Could not add subjects, something went wrong');
        }
    }
}
