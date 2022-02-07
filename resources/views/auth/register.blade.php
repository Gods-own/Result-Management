@extends('layouts.app')

@section('content')
   <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <form action="{{ route('register') }}" method="post">
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
                </div>
            </form>
        </div>
    </div>
@endsection