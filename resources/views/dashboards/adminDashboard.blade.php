@extends('layouts.app')

@section('content')
<ul>
    <li><a href="{{ route('add_teacher') }}">Add Teacher</a></li>
    <li><a href="{{ route('add_student') }}">Add Student</a></li>
    <li><a href="{{ route('add_class') }}">Add class</a></li>
    <li><a href="{{ route('add_subject') }}">Add Subject</a></li>
</ul>
@endsection
