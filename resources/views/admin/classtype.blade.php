@extends('layouts.app')

@section('content')
   <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            @if (session('status'))
                {{ session('status') }}
            @endif
            <form action="{{ route('class_type') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="class_room">Class</label>
                    <select id="class_room" name="class_room">
                        @foreach($class_rooms as $class_room)
                            <option value="{{ $class_room->id }}">{{ $class_room->class_room }}</option>
                        @endforeach
                    </select>
                    @error('class_room')
                    <div>
                        {{ $message }}
                </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="subject_type">Subject Types</label>
                    <select id="subject_type" name="subject_type">
                        @foreach($subject_types as $subject_type)
                            <option value="{{ $subject_type->id }}">{{ $subject_type->subject_type }}</option>
                        @endforeach
                    </select>
                    @error('subject_type')
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
