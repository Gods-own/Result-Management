@extends('layouts.app')

@section('content')
   <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            @if (session('status'))
                <p>{{ session('status') }}</p>
            @endif
            <form action="{{ Route('update_teacherInfo', ['user' => $user->id]) }}" enctype="multipart/form-data"  method="post">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}">
                    @error('name')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}">
                    @error('email')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="profile_pic">Profile Picture</label>
                    <input type="file" name="profile_pic" id="profile_pic" value="">
                    @error('profile_pic')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="tel" name="phoneNumber" id="phoneNumber" value="{{ $user->phoneNumber }}">
                    @error('phoneNumber')
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