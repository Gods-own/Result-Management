@extends('layouts.app')

@section('content')
   <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <form action="{{ route('register') }}" method="post">
<<<<<<< HEAD
                <div class="mb-4">
                    <label for="title">Title</label>
                    <select name="title" id="title">
                        <option>Mr.</option>
                        <option>Mrs.</option>
                        <option>Miss</option>
                    </select>
                <div class="mb-4">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="">
                </div>
                <div class="mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="name" value="">
                </div>
                <div class="mb-4">
                    <label for="PhoneNumber">Phone Number</label>
                    <input type="tel" name="PhoneNumber" id="PhoneNumber" value="">
                </div>
                <div class="mb-4">
                    <label for="classTeacher">Class Teacher</label>
                    <select name="classTeacher" id="classTeacher">
                        <option>JSS 1</option>
                        <option>JSS 2</option>
                        <option>JSS 3</option>
                        <option>SSS 1</option>
                        <option>SSS 2</option>
                        <option>SSS 3</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="">
=======
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
                    <input type="tel" name="phoneNumber" id="phoneNumber" value="{{ old('phonNumber') }}">
                    @error('phoneNumber')
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
>>>>>>> 13db7e93951a379f299d231100d5e65598c1fca7
                </div>
            </form>
        </div>
    </div>
@endsection