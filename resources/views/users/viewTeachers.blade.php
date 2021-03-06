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
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->teacher->title }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td><img src="{{ url('storage/profile_picture/'.$teacher->profile_pic) }}"></td>
                    <td>{{ $teacher->phoneNumber }}</td>
                    @can('update', $teacher)
                    <td>
                        <form action="{{ Route('edit_teacherInfo', [$teacher->id]) }}">
                            <button type="submit">Edit</button>
                        </form>
                    </td>
                    @endcan
                    @can('delete', $teacher)
                    <td>
                        <form action="{{ Route('delete_teacherInfo', [$teacher->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button>Delete</button>
                        </form>
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
