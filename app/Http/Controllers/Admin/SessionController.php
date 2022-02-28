<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function __construct(Session $session)
    {
        $this->session = $session;
        $this->middleware(['auth']);
    }

    public function index()
    {
        $sessions = Session::all();

        $current_session = Session::firstorNew([
            'is_current' => true
        ]);

        return view('admin.addSession')->with('sessions', $sessions)->with('current_session', $current_session);
    }

    public function store(Request $request)
    {

            $request->validate([
                'session_start' => ['required', 'date'],
                'session_end' => ['required', 'date'],
            ]);

        try {
            Session::create($request->all());

            return redirect()->route('admin_dashboard');

        } catch(Exception $ex) {
            return back()->with('status', 'Could not add session, something went wrong');
        }

    }


    public function edit(Session $session)
    {
        return view('admin.editSession')->with('session', $session);

    }

    public function update(Request $request, Session $session)
    {
        try{
            $validatedData = $request->validate([
                'session_start' => ['required', 'date'],
                'session_end' => ['required', 'date'],
            ]);

            $session->update($request->all());
            return redirect()->route('admin_dashboard');
        } catch (Exception $ex) {
            return back()->with('status', 'Could not update, something went wrong');
        }

    }

    public function destroy(Session $session) {
        $session->delete();
        return redirect()->route('admin_dashboard');
    }

    public function changeSession(Request $request) {
        $current_session = Session::firstorNew([
            'is_current' => true
        ]);

        $request->validate([
            'session' => ['required', 'exists:sessions,id'],
            'currentSession' => ['required', 'exists:sessions,id', Rule::in([$current_session->id])],
        ]);

        try {
            DB::transaction(function () use ($request) {
                Session::where('id', $request->currentSession)->update(["is_current" => false]);
                Session::where('id', $request->session)->update(["is_current" => true]);
                return redirect()->route('admin_dashboard');
            });
        } catch(Exception $ex) {
            return back()->with('status', 'Could not add session, something went wrong');
        }
    }
}
