<?php

namespace App\Http\Controllers\Users;

use PDF;
use Excel;
use App\Models\User;
use App\Models\Session;
use App\Exports\ResultExport;
use App\Models\Result;
use App\Models\Term;
use App\Models\Student;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewResultController extends Controller
{
    public function show(User $student, Session $session, Term $term) {
        // $session = Session::firstorNew([
        //     'is_current' => true
        // ]);

        // $term = Term::firstorNew([
        //     'is_current' => true
        // ]);
        // dd($term->term);
        $student_p = Student::firstorNew([
            'student_id' => $student->id,
            'session_id' => $session->id,
        ]);
        $subjecttypes_keys = $student_p->class_rooms->subject_types->modelKeys();

        $subject_instance = Subject::all();
        $subjects = $subject_instance->whereIn('subject_type_id', $subjecttypes_keys)->all();

        $results= Result::where(
            ['student_id' => $student->id,
            'session_id' => $session->id,
            'term_id' => $term->id],
        )->get();

        if ($results->count() == collect($subjects)->count()) {
            return view('users.viewResult')->with('results', $results);
        }

        abort(404);

    }

    public function pdfConvert(User $student, Session $session, Term $term) {
        // $session = Session::firstorNew([
        //     'is_current' => true
        // ]);

        // $term = Term::firstorNew([
        //     'is_current' => true
        // ]);

        $results= Result::where(
            ['student_id' => $student->id,
            'session_id' => $session->id,
            'term_id' => $term->id],
        )->get();

        // $results = $class_room->subjecttypes;
        // foreach($subjectypes as $subjecttype) {
        //     $subjects = $subjecttype->subjects;

        // }

        // $subject = Subject::find(1);
        // $result = Result::find(1);

        // dd($result->subject->subject);

        $pdf_view = PDF::loadView('users.convertResult', compact('results'));
        return $pdf_view->download('myResult.pdf');

    }

    public function excelConvert(User $student, Session $session, Term $term) {
        // $session = Session::firstorNew([
        //     'is_current' => true
        // ]);

        // $term = Term::firstorNew([
        //     'is_current' => true
        // ]);

        $results= Result::where(
            ['student_id' => $student->id,
            'session_id' => $session->id,
            'term_id' => $term->id],
        )->get();

        $name = $student->name;
        $term_term = $term->term;
        $session_session = $session->session_start;

        return Excel::download(new ResultExport('exports.convertResult', $results, $name, $term_term, $session_session), 'myResult.xlsx');

    }
}
