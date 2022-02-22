@extends('layouts.app');

@section('content')
<div>
    <form action="{{ route('exam', [$user->id, $subject->id, $class_room->id]) }}" method="post">
        @csrf
        <div>
            <label for="name">Name</label>
            <input disabled type="text" id="name" value="{{ $user->name }}">
            <input type="hidden" name="name" value="{{ $user->id }}">
            @error('name')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <label for="term">Term</label>
            <input disabled type="text" id="term" value="{{ $term->term }}">
            <input type="hidden" name="term" value="{{ $term->id }}">
            @error('term')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <label for="session">Session</label>
            <input disabled type="text" id="session" value="{{ Carbon::createFromFormat('Y-m-d', $session->session_start)->format('Y') }}/{{ Carbon::createFromFormat('Y-m-d', $session->session_end)->format('Y') }}">
        </div>
        <div>
            <label for="classroom">Classroom</label>
            <input disabled type="text" name="classroom" id="classroom" value="{{ $class_room->class_room }}">
        </div>
        <div>
            <label for="subject">Subject</label>
            <input disabled type="text" id="subject" value="{{ $subject->subject }}">
            <input type="hidden" name="subject" value="{{ $subject->id }}">
            @error('subject')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <label for="exam">Exam</label>
            <input type="text" name="exam" id="exam" value="">
            @error('exam')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit">Record</button>
    </form>
</div>
@endsection
