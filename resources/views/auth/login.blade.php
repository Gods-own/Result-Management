@extends('layouts.app')

@section('content')
<div class="py-10 sm:px-0 px-3 bg-jar-pattern min-h-screen">
        <div class="bg-white py-6 lg:w-2/4 md:w-3/4 sm:w-11/12 mx-auto border-solid border border-gray-600 rounded-xl">
            <form class="w-11/12 mx-auto" action="{{ route('login') }}" method="post">
                @csrf
                <div class="text-center text-2xl font-bold text-blue-600">
                    <h1>LOGIN HERE</h1>
                </div>
                @if (session('status'))
                <div class="border md:w-11/12 px-3 py-3 bg-red-500 mx-auto text-center text-white my-4">
                    {{ session('status') }}
                </div>
                @endif
                <div class="mb-4">
                    <label class="block mb-2" for="email">Email</label>
                    <input class="w-full h-9 bg-slate-100 outline-none rounded px-3"  type="email" name="email" id="email" value="{{ old('email') }}">
                    @error('email')
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
                <div class="mb-4 text-center">
                    <button class="w-52 bg-blue-500 py-1.5 rounded-xl text-white" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
