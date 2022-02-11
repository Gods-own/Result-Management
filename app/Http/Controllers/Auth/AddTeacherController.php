<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AddTeacherController extends Controller
{
    public function __construct(User $user, Teacher $teacher)
    {
        $this->user = $user;
        $this->teacher = $teacher;
        $this->middleware(['auth']);
    }

    public function index()
    {

        $titles = array('Mr.', 'Mrs.', 'Ms.');

        return view('auth.addTeacher')->with('titles', $titles);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => ['required', Rule::in(['Mr.', 'Mrs.', 'Ms.'])],
            'name' => ['required', 'max:35', 'unique:users,name'],
            'email' => ['required', 'email', 'max:255'],
            'user_type' => ['required', Rule::in(['staff'])],
            'gender' => ['required'],
            'phoneNumber' => ['required', 'starts_with:0', 'numeric'],
            'password' => ['required', 'confirmed'],

        ]);
        try {
            DB::transaction(function () use ($request) {
                $user = User::create($request->all());

                $user->password = Hash::make($request->password);
                $user->user_type = $request->user_type;
                $user->save();

                $teacher = new Teacher();

                $teacher->title = $request->title;
                $user->teacher()->save($teacher);

            });
            return redirect()->route('dashboard');
        } catch (Exception $ex) {
            return back()->with('status', 'Could not register, something went wrong');
        }
    }


}
