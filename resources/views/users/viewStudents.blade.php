@extends('layouts.app');

@section('content')
    <div>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Picture</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->student->title }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td><img src="{{ asset('storage/profile_picture/'.$student->profile_pic) }}"></td>
                    <td>{{ $student->phoneNumber }}</td>
                    <td>
                        <form action="{{ Route('edit_studentInfo', [ $student->id]) }}">
                            <button type="submit">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ Route('delete_studentInfo', [ $student->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection