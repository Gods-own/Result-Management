@extends('layouts.app');

@section('content')
<div>
    <form>
        <div>
            <label for="name">Name</label>
            <input disabled type="text" name="name" id="name" value="{{ $user->name }}">
        </div>
        <div>
            <label for="term">Term</label>
            <select name="term" id="term">
                @foreach($terms as $term)
                <option value="{{ $term->id }}">{{ $term->term }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="session">Session</label>
            <input disabled type="text" name="session" id="sesssion" value="{{ Carbon::createFromFormat('Y-m-d', $session->session_start)->format('Y') }}/{{ Carbon::createFromFormat('Y-m-d', $session->session_end)->format('Y') }}">
        </div>
        <div>
            <label for="classroom">Classroom</label>
            <input disabled type="text" name="classroom" id="classroom" value="Jss1 A">
        </div>
        <div>
            <label for="subject">Subject</label>
            <input disabled type="text" name="subject" id="subject" value="{{ $subject->subject }}">
        </div>
        <div>
            <label for="test1">Test1</label>
            <input type="text" name="test1" id="test1" value="">
        </div>
    </form>
</div>
@endsection
