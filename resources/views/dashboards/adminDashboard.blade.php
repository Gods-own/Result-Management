@extends('layouts.app')

@section('content')
<ul>
    <li><a href="{{ route('add_teacher') }}">Add Teacher</a></li>
    <li><a href="{{ route('add_student') }}">Add Student</a></li>
    <li><a href="{{ route('add_class') }}">Add class</a></li>
    <li><a href="{{ route('add_subject') }}">Add Subject</a></li>
    <li><a href="{{ route('add_session') }}">Add Session</a></li>
    <li><a href="{{ route('teacher_subject') }}">Subject Taught</a></li>
    <li><a href="{{ route('class_type') }}">Class Type</a></li>
    <li><a href="{{ route('view_teachers') }}">View Teachers</a></li>
    <li><a href="{{ route('view_students') }}">View Students</a></li>
</ul>
@endsection
