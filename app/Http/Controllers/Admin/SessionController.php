<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function __construct(Session $session)
    {
        $this->session = $session;
        $this->middleware(['auth']);
    }

    public function index()
    {

        return view('admin.addSession');
    }

    public function store(Request $request) 
    {
        try {
            $request->validate([
                'session_start' => ['required', 'date'],
                'session_end' => ['required', 'date'],
            ]);

            Session::create($request->all());

            return redirect()->route('dashboard');

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
}
