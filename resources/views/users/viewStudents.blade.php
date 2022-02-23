@extends('layouts.app');

@section('content')
    <div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Picture</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->user->name }}</td>
                    <td>{{ $student->user->email }}</td>
                    <td><img src="{{ asset('storage/profile_picture/'.$student->user->profile_pic) }}"></td>
                    <td>{{ $student->user->phoneNumber }}</td>
                    @can('delete', $student)
                    <td>
                        <form action="{{ Route('edit_studentInfo', [ $student->user->id]) }}">
                            <button type="submit">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ Route('delete_studentInfo', [ $student->user->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button>Delete</button>
                        </form>
                    </td>
                    @endcan
                    <td>
                        <form action="{{ route('principal_remark', [$student->user->id]) }}" method="post">
                            @csrf
                            <button>Remark</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('teacher_remark', [$student->user->id]) }}" method="post">
                            @csrf
                            <button>Remark</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('view_result', [$student->user->id]) }}" method="post">
                            @csrf
                            <button>View Result</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
