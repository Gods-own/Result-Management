<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\SubjectType;
use App\Models\Classroom;
use App\Models\ClassType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassTypeController extends Controller
{
    public function index() {
        $class_rooms = Classroom::all();

        $subject_types = SubjectType::all();

        return view('admin.classtype')->with('class_rooms', $class_rooms)->with('subject_types', $subject_types);
    }

    public function store(Request $request)
    {
        // try {
            $request->validate([
                'class_room' => ['required', 'exists:class_rooms,id'],
                'subject_type' => ['required', 'exists:subject_types,id'],
            ]);

            $classtype = new ClassType();

            $classtype->class_id = $request->class_room;
            $classtype->subject_type_id = $request->subject_type;

            $classtype->save();

            return redirect()->route('admin_dashboard');

        // } catch(Exception $ex) {
        //     return back()->with('status', 'Something went wrong');
        // }

    }
}
