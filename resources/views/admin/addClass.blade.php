@extends('layouts.app')

@section('content')
   <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            @if (session('status'))
                {{ session('status') }}
            @endif
            <form action="{{ route('add_class') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="classroom">Class</label>
                    <input type="text" name="classroom" id="classroom" value="{{ old('classroom') }}">
                    @error('classroom')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
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
                    <button type="submit">Add Class</button>
                </div>
            </form>
        </div>
    </div>
@endsection
