<?php

namespace App\Http\Controllers\Teacher;

use Exception;
use App\Models\Term;
use App\Models\User;
use App\Models\Session;
use App\Models\Remark;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddRemarkController extends Controller
{
    public function show(User $student) {

        $this->authorize('teacher_remark', $student);

        $term = Term::firstorNew([
            'is_current' => true
        ]);

        $session = Session::firstorNew([
            'is_current' => true
        ]);

        return view('teacher.remarkform')->with('student', $student)->with('term', $term)->with('session', $session);

    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'exists:users,id'],
            'term' => ['required', 'exists:terms,id'],
            'session' => ['required', 'exists:sessions,id'],
            'remark' => ['required'],
        ]);

        try {
            $user = Auth::user();
            $remark = new Remark();
            $remark->fill($request->all());

            $remark->student_id = $request->name;
            $remark->term_id = $request->term;
            $remark->session_id = $request->session;
            $remark->user_id = $user->id;

            $remark->save();

            return redirect()->route('teacher_dashboard');
        } catch(Exception $ex) {
            return back()->with('status', 'Could not add subjects, something went wrong');
        }

    }
}
