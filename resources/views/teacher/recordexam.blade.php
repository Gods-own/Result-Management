@extends('layouts.app');

@section('content')
<div>
    @foreach($students as $student)
    <div>
        <div>
            <img>
            <p>{{ $student->user->name }}</p>
        </div>
        <form action="{{route('exam', [$student->user->id, $subject->id, $class_room->id])}}">
            <button>Record</button>
        </form>
        <form action="">
            <button>Edit</button>
        </form>
    </div>
    @endforeach

</div>
@endsection
