<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\SubjectTaught;
use Auth;

class IsSubjectTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $subject = $request->route('subject');
        $teacher = Auth::user();

        $subjects_taught = SubjectTaught::where('teacher_id',  $teacher->id)->get();

        if($subjects_taught->contains('subject_id', $subject)) {
            return $next($request);
        }

        abort(401);
    }
}
