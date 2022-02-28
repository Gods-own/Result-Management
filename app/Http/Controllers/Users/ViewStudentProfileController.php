<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\Term;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewStudentProfileController extends Controller
{
    public function show(User $student) {
        // dd(collect([$student->student->sessions]));
        $sessions = $student->student->sessions;
        if ($sessions instanceof Illuminate\Database\Eloquent\Collection) {
            $class_rooms = $student->student->class_rooms;
            $sessions = $student->student->sessions;
        }
        else {
            $class_rooms = collect([$student->student->class_rooms]);
            $sessions = collect([$student->student->sessions]);
        }

        $terms = Term::all();
        return view('users.viewStudentProfile')->with('class_rooms', $class_rooms)->with('student', $student)
            ->with('sessions', $sessions)->with('terms', $terms);
    }
}
