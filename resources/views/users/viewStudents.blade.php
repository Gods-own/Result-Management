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
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td><img src="{{ asset('storage/profile_picture/'.$student->profile_pic) }}"></td>
                    <td>{{ $student->phoneNumber }}</td>
                    @can('update', $student)
                    <td>
                        <form action="{{ Route('edit_studentInfo', [$student->id]) }}">
                            <button type="submit">Edit</button>
                        </form>
                    </td>
                    @endcan
                    @can('delete', $student)
                    <td>
                        <form action="{{ Route('delete_studentInfo', [$student->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button>Delete</button>
                        </form>
                    </td>
                    @endcan
                    @can('principal_remark', $student)
                    <td>
                        <form action="{{ route('principal_remark', [$student->id]) }}" method="post">
                            @csrf
                            <button>Remark</button>
                        </form>
                    </td>
                    @endcan
                    @can('teacher_remark', $student)
                    <td>
                        <form action="{{ route('teacher_remark', [$student->id]) }}" method="post">
                            @csrf
                            <button>Remark</button>
                        </form>
                    </td>
                    @endcan
                    <td>
                        <form action="{{ route('view_student_profile', [$student->id]) }}" method="post">
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
