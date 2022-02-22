@extends('layouts.app')

@section('content')
<ul>
    <li>
        Record test1
        <ul>
            @foreach($subjects as $subject)
            <li>
                {{ $subject->subject }}
                <ul>
                    @foreach($subject->subject_types->class_rooms as $class_room)
                    <li>
                        <a href="{{ route('record_test1', [$subject->id, $class_room->id]) }}">{{ $class_room->class_room }}</a>
                    </li>
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
            <li>
                {{ $subject->subject }}
                <ul>
                    @foreach($subject->subject_types->class_rooms as $class_room)
                    <li>
                        <a href="{{ route('record_test2', [$subject->id, $class_room->id]) }}">{{ $class_room->class_room }}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </li>
    <li>
        Record Exam
        <ul>
            @foreach($subjects as $subject)
            <li>
                {{ $subject->subject }}
                <ul>
                    @foreach($subject->subject_types->class_rooms as $class_room)
                    <li>
                        <a href="{{ route('record_exam', [$subject->id, $class_room->id]) }}">{{ $class_room->class_room }}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </li>
    @if(!$isClassTeacher)
    <li>
        Record Result
        <ul>
            @foreach($classrooms as $classroom)
            <li>
                {{ $classroom->class_room }}
                <ul>
                    @foreach($classroom->subject_types as $subject_type)
                    @foreach ($subject_type->subjects as $sub)
                    <li>
                        <a href="{{ route('record_result', [$classroom->id, $sub->id]) }}">{{ $sub->subject }}</a>
                    </li>
                    @endforeach
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </li>
    @endif
    <li><a href="{{ route('view_teachers') }}">View Teachers</a></li>
    <li><a href="{{ route('view_students') }}">View Students</a></li>
</ul>
@endsection
