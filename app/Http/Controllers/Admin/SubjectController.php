<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Subject;
use App\Models\SubjectType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function __construct(Subject $subject)
    {
        $this->subject = $subject;
        $this->middleware(['auth']);
    }

    public function index()
    {
        $subject_types = SubjectType::all();

        return view('admin.addSubject')->with('subjecttypes', $subject_types);
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

    public function edit(Subject $subject) {

        return view('admin.editSubject')->with('subject', $subject);
    }

    public function update(Request $request, Subject $subject) {
        try {

            $validatedData = $request->validate([
                'subject' => ['required', 'unique:subjects,subject'],
            ]);


            $subject->update([
                'subject' => $request->subject,
            ]);

            return redirect()->route('admin_dashboard');
        } catch (Exception $ex) {
            return back()->with('status', 'Could not Update, Something went wrong');
        }
    }

    public function destroy(Subject $subject) {
        $subject->delete();
        return redirect()->route('admin_dashboard');
    }
}
