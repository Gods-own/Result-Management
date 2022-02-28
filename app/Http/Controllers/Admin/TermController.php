<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Term;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class TermController extends Controller
{
    public function index()
    {
        $terms = Term::all();

        $current_term = Term::firstorNew([
            'is_current' => true
        ]);

        return view('admin.manageTerm')->with('terms', $terms)->with('current_term', $current_term);
    }

    public function changeTerm(Request $request) {
        $current_term = Term::firstorNew([
            'is_current' => true
        ]);

        $request->validate([
            'term' => ['required', 'exists:terms,id'],
            'currentTerm' => ['required', 'exists:terms,id', Rule::in([$current_term->id])],
        ]);

        try {
            DB::transaction(function () use ($request) {
                Term::where('id', $request->currentTerm)->update(["is_current" => false]);
                Term::where('id', $request->term)->update(["is_current" => true]);
            });

            return redirect()->route('admin_dashboard');
        } catch(Exception $ex) {
            return back()->with('status', 'Could not add session, something went wrong');
        }
    }
}
