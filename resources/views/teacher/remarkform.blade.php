@extends('layouts.app');

@section('content')
<div>
    <form action="{{ route('store_teacher_remark') }}" method="post">
        @csrf
        <div>
            <label for="name">Name</label>
            <input disabled type="text" id="name" value="{{ $student->name }}">
            <input type="hidden" name="name" value="{{ $student->id }}">
            @error('name')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <label for="session">Session</label>
            <input disabled type="text" id="session" value="{{ Carbon::createFromFormat('Y-m-d', $session->session_start)->format('Y') }}/{{ Carbon::createFromFormat('Y-m-d', $session->session_end)->format('Y') }}">
            <input type="hidden" name="session" value="{{ $session->id }}">
            @error('session')
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
            <label for="remark">Remark</label>
            <input type="text" name="remark" id="remark" value="">
            @error('remark')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit">Record</button>
    </form>
</div>
@endsection