@extends('layouts.app');

@section('content')
<div>
    <form action="{{ route('result', [$user->id, $class_room->id, $subject->id]) }}" method="post">
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
            <label for="test1">Test1</label>
            <input disabled type="text" id="test1" value="{{ $test1->test1 }}">
            <input type="hidden" name="test1" value="{{ $test1->id }}">
            @error('test1')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <label for="test2">Test2</label>
            <input disabled type="text" id="test2" value="{{ $test2->test2 }}">
            <input type="hidden" name="test2" value="{{ $test2->id }}">
            @error('test2')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <label for="exam">Exam</label>
            <input disabled type="text" id="exam" value="{{ $exam->exam }}">
            <input type="hidden" name="exam" value="{{ $exam->id }}">
            @error('exam')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <label for="total">Total Score</label>
            <input disabled type="number" id="total" value="{{ $total }}">
            <input type="hidden" name="total" value="{{ $total }}">
            @error('total')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <label for="grade">Grade</label>
            <select name="grade">
                @foreach ($grades as $grade)
                    <option value="{{ $grade }}">{{ $grade }}</option>
                @endforeach
            </select>   
            @error('grade')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit">Record</button>
    </form>
</div>
@endsection