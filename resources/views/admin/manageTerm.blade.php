@extends('layouts.app')

@section('content')

    <div>
        <h3>Change Current Term</h3>
        <div>
            <form action="{{ route('change_term') }}" method="post">
                @csrf
                @foreach ($terms as $term)
                    <input name="term" id="term" type="radio" {{ ($term->is_current == 1) ? "checked" : "" }} value="{{ $term->id }}">
                    <label for="term">{{ $term->term }}</label>
                @endforeach
                @error('term')
                <div>
                    {{ $message }}
                </div>
                @enderror
                <input type="hidden" name="currentTerm" value="{{ $current_term->id }}">
                @error('currentTerm')
                <div>
                    {{ $message }}
                </div>
                @enderror
                <button>Change</button>
            </form>
        </div>
    </div>
@endsection
