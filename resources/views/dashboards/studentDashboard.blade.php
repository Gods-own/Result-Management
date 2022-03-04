@extends('layouts.app')

@section('content')
<ul>
    <li>
        <form action="{{ route('view_student_profile', [$student->id]) }}" method="post">
            @csrf
            <button>View Result</button>
        </form>
    </li>
</ul>
@endsection
