@extends('layouts.app');

@section('content')
<div>
    @foreach($users as $user)
    <div>
        <div>
            <img>
            <p>{{ $user->name }}</p>
        </div>
        <form action="">
            <button>Record</button>
        </form>
        <form action="">
            <button>Edit</button>
        </form>
    </div>
    @endforeach

</div>
@endsection
