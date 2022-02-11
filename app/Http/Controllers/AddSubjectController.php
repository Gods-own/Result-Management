<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Subject;
use App\Models\SubjectType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AddSubjectController extends Controller
{
    public function __construct(Subject $subject)
    {
        $this->subject = $subject;
        $this->middleware(['auth']);
    }

    public function index()
    {
        $subject_types = SubjectType::all();

        return view('addSubject')->with('subjecttypes', $subject_types);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => ['required', 'unique:subjects,subject'],
            'subjecttype' => ['required', 'exists:subject_types,id'],
        ]);

        try {
            $subject = new Subject();
            $subject->fill($request->all());

            $subject->subject_type_id = $request->subjecttype;

            $subject->save();

            return redirect()->route('dashboard');
        } catch(Exception $ex) {
            return back()->with('status', 'Could not add subjects, something went wrong');
        }
    }
}
