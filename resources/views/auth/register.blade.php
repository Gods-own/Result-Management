@extends('layouts.app')

@section('content')
   <div class="py-10 sm:px-0 px-3 bg-jar-pattern">
        <div class="bg-white py-6 lg:w-2/4 md:w-3/4 sm:w-11/12 mx-auto border-solid border border-gray-600 rounded-xl">
            <form class="w-11/12 mx-auto" action="{{ route('register') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="text-center text-2xl font-bold text-blue-600">
                    <h1>REGISTER HERE</h1>
                </div>
                <div class="mb-4">
                    <label class="block mb-2" for="name">Name</label>
                    <input class="w-full h-9 bg-slate-100 outline-none rounded px-3" type="text" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2" for="email">Email</label>
                    <input class="w-full h-9 bg-slate-100 outline-none rounded px-3"  type="email" name="email" id="email" value="{{ old('email') }}">
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
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
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2" for="phoneNumber">Phone Number</label>
                    <input class="w-full h-9 bg-slate-100 outline-none rounded px-3"  type="tel" name="phoneNumber" id="phoneNumber" value="{{ old('phoneNumber') }}">
                    @error('phoneNumber')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2" for="profile_pic">Profile Picture</label>
                    <input class="w-full h-9 bg-slate-100 outline-none rounded file:rounded file:border-none file:text-white file:h-9 file:bg-blue-500"  type="file" name="profile_pic" id="profile_pic" value="{{ old('profile_pic') }}">
                    @error('profile_pic')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2" for="password">Password</label>
                    <input class="w-full h-9 bg-slate-100 outline-none rounded px-3"  type="password" name="password" id="password" value="">
                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2" for="password_confirmation">Re-type Password</label>
                    <input class="w-full h-9 bg-slate-100 outline-none rounded px-3"  type="password" name="password_confirmation" id="password_confirmation" value="">
                    @error('password_confirmation')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4 text-center">
                    <button class="w-52 bg-blue-500 py-1.5 rounded-xl text-white" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
