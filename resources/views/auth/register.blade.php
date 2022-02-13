@extends('layouts.app')

@section('content')
   <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <form action="{{ route('register') }}" enctype="multipart/form-data" method="post">
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
                <input type="hidden" name="user_type" id="user_type" value="principal">
                <div class="mb-4">
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="male" value="Male">
                    <label for="female">Female</label>
                    <input type="radio" name="gender" id="female" value="Female">
                    @error('gender')
                    <div>
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