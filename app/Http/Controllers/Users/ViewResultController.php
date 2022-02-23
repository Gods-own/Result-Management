<?php

namespace App\Http\Controllers\Users;

use PDF;
use Excel;
use App\Models\User;
use App\Models\Session;
use App\Exports\ResultExport;
use App\Models\Result;
use App\Models\Term;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewResultController extends Controller
{
    public function show(User $student) {
        $session = Session::firstorNew([
            'is_current' => true
        ]);

        $term = Term::firstorNew([
            'is_current' => true
        ]);

        $results= Result::where(
            ['student_id' => $student->id],
            ['session_id' => $session->id],
            ['term_id' => $term->id],
        )->get();

        // $results = $class_room->subjecttypes;
        // foreach($subjectypes as $subjecttype) {
        //     $subjects = $subjecttype->subjects;

        // }

        // $subject = Subject::find(1);
        // $result = Result::find(1);

        // dd($result->subject->subject);

        return view('users.viewResult')->with('results', $results);

    }

    public function pdfConvert(User $student) {
        $session = Session::firstorNew([
            'is_current' => true
        ]);

        $term = Term::firstorNew([
            'is_current' => true
        ]);

        $results= Result::where(
            ['student_id' => $student->id],
            ['session_id' => $session->id],
            ['term_id' => $term->id],
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

    public function excelConvert(User $student) {
        $session = Session::firstorNew([
            'is_current' => true
        ]);

        $term = Term::firstorNew([
            'is_current' => true
        ]);

        $results= Result::where(
            ['student_id' => $student->id],
            ['session_id' => $session->id],
            ['term_id' => $term->id],
        )->get();

        $name = $student->name;
        $term_term = $term->term;
        $session_session = $session->session_start;

        return Excel::download(new ResultExport('exports.convertResult', $results, $name, $term_term, $session_session), 'myResult.xlsx');

    }
}
