@extends('layouts.app')

@section('content')
   <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            @if (session('status'))
                {{ session('status') }}
            @endif
            <form action="{{ route('teacher_subject') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="teacher">Teacher</label>
                    <select id="teacher" name="teacher">
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->user->id }}">{{ $teacher->title }} {{ $teacher->user->name }}</option>
                        @endforeach
                    </select>
                    @error('teacher')
                    <div>
                        {{ $message }}
                </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="subject">Subject</label>
                    <select id="subject" name="subject">
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                        @endforeach
                    </select>
                    @error('subject')
                    <div>
                        {{ $message }}
                </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <button type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection
