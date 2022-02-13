@extends('layouts.app')

@section('content')
   <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            @if (session('status'))
                {{ session('status') }}
            @endif
            <form action="{{ Route('update_class', ['class_room' => $class_room->id]) }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label for="classroom">Class</label>
                    <input type="text" name="classroom" id="classroom" value="{{ $class_room->class_room }}">
                    @error('classroom')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="teacher">Teacher</label>
                    <select id="teacher" name="teacher">
                        <option value="{{ $class_room->user_id }}">{{ $class_room->user->teacher->title }} {{ $class_room->user->name }}</option>
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