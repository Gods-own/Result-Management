@extends('layouts.app')

@section('content')
<ul>
    <li>
        Record test1
        <ul>
            @foreach($subjects as $subject)
            <li>
                <a href="{{ route('record_test1', [$subject->id]) }}">{{ $subject->subject }}</a>
                <ul>
                    @foreach($subject->subject_types->class_rooms as $class_room)
                    <li>{{ $class_room->class_room }}</li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </li>
    <li>
        Record test2
        <ul>
            @foreach($subjects as $subject)
            <li>{{ $subject->subject }}</li>
            @endforeach
        </ul>
    </li>
    <li>
        Record Exam
        <ul>
            @foreach($subjects as $subject)
            <li>{{ $subject->subject }}</li>
            @endforeach
        </ul>
    </li>
    <li><a href="{{ route('view_teachers') }}">View Teachers</a></li>
    <li><a href="{{ route('view_students') }}">View Students</a></li>
</ul>
@endsection
