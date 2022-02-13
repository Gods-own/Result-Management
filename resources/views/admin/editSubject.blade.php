@extends('layouts.app')

@section('content')
   <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            @if (session('status'))
                {{ session('status') }}
            @endif
            <form action="{{ route('update_subject', ['subject' => $subject->id]) }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" value="{{ $subject->subject }}">
                    @error('subject')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <button type="submit">Add Subject</button>
                </div>
            </form>
        </div>
    </div>
@endsection
