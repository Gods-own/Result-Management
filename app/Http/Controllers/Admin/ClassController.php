<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{
    public function __construct(User $user, Teacher $teacher, Classroom $class_room)
    {
        $this->user = $user;
        $this->teacher = $teacher;
        $this->class_room = $class_room;
        $this->middleware(['auth']);
    }

    public function index()
    {
        $teachers = Teacher::all();

        return view('admin.addClass')->with('teachers', $teachers);
    }

    public function store(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'teacher' => ['required', 'unique:class_rooms,user_id', 'exists:users,id'],
                'classroom' => ['required', 'max:255', 'unique:class_rooms,class_room'],
            ]);


            Classroom::create([
                'user_id' => $request->teacher,
                'class_room' => $request->classroom,
            ]);

            return redirect()->route('admin_dashboard');
        } catch (Exception $ex) {
            return back()->with('status', 'Could not add class, Something went wrong');
        }

    }

    public function edit(Classroom $class_room) {
        $teachers = Teacher::where("teacher_id", "!=", $class_room->user_id)->get();

        // $teachers = Teacher::all();


        return view('admin.editClass')->with('teachers', $teachers)->with('class_room', $class_room);
    }

    public function update(Request $request, Classroom $class_room) {
        try {

            $validatedData = $request->validate([
                'teacher' => ['required', 'unique:class_rooms,user_id', 'exists:users,id'],
                'classroom' => ['required', 'max:255'],
            ]);


            $class_room->update([
                'user_id' => $request->teacher,
                'class_room' => $request->classroom,
            ]);

            return redirect()->route('admin_dashboard');
        } catch (Exception $ex) {
            return back()->with('status', 'Could not Update, Something went wrong');
        }
    }

    public function destroy(Classroom $class_room) {
        $class_room->delete();
        return redirect()->route('admin_dashboard');
    }
}
