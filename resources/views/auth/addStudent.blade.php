@extends('layouts.app')

@section('content')
   <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <form action="{{ route('add_student') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}">
                    @error('email')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <input type="hidden" name="user_type" id="user_type" value="student">
                <div class="mb-4">
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="male" value="Male">
                    <label for="female">Female</label>
                    <input type="radio" name="gender" id="female" value="Female">
                    @error('gender')
                    <div>P
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="tel" name="phoneNumber" id="phoneNumber" value="{{ old('phoneNumber') }}">
                    @error('phoneNumber')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="profile_pic">Profile Picture</label>
                    <input type="file" name="profile_pic" id="profile_pic" value="{{ old('profile_pic') }}">
                    @error('profile_pic')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="classroom">Classroom</label>
                    <select id="classroom" name="classroom">
                        @foreach($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->class_room }}</option>
                        @endforeach
                    </select>
                    @error('classroom')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="studenttype">Student Type</label>
                    <select id="studenttype" name="studenttype">
                        @foreach($studenttypes as $studenttype)
                            <option value="{{ $studenttype->id }}">{{ $studenttype->student_type }}</option>
                        @endforeach
                    </select>
                    @error('studenttype')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="schoolSession">Session</label>
                    <select id="schoolSession" name="schoolSession">
                        @foreach($schoolSessions as $schoolSession)
                            <option value="{{ $schoolSession->id }}">{{ $schoolSession->session_start }} to {{ $schoolSession->session_end }}</option>
                        @endforeach
                    </select>
                    @error('schoolSession')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="">
                    @error('password')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation">Re-type Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" value="">
                    @error('password_confirmation')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <button type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
