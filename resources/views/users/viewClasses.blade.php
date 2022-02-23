@extends('layouts.app');

@section('content')
    <div>
        <table>
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Class Teacher</th>
                </tr>
            </thead>
            <tbody>
            @foreach($classrooms as $classroom)
                <tr>
                    <td>{{ $classroom->class_room }}</td>
                    <td>{{ $classroom->user->name }}</td>
                    <td>
                        <form action="{{ route('view_classStudents', [$classroom->id]) }}" method="post">
                            @csrf
                            <button type="submit">View {{ $classroom->class_room }} students</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
