@extends('layouts.app');

@section('content')
    <div>
        <img src="{{ asset('storage/profile_picture/'.$student->profile_pic) }}">
        <p>{{ $student->name }}</p>
    </div>
    <div>
        @foreach ($class_rooms as $index => $class_room)
            <p>{{ $class_room->class_room }}</p>
            @foreach ($terms as $term)
                <p>{{ $term->term }}</p>
                <form action="{{ route('view_result', [$student->id, $sessions[$index]->id, $term->id]) }}" method="post">
                    @csrf
                    <button>View Result</button>
                </form>
            @endforeach
        @endforeach
    </div>
@endsection
