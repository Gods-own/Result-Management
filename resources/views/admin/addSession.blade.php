@extends('layouts.app')

@section('content')
   <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            @if (session('status'))
                {{ session('status') }}
            @endif
            <form action="{{ route('add_session') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="session_start">Session Start</label>
                    <input type="date" name="session_start" id="session_start" value="{{ old('session_start') }}">
                    @error('session_start')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="session_end">Session End</label>
                    <input type="date" name="session_end" id="session_end" value="{{ old('session_end') }}">
                    @error('session_end')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <button type="submit">Add Session</button>
                </div>
            </form>
        </div>
    </div>

    <button>Manage Sessions</button>

    <div>
        <h3>Change Current Session</h3>
        <div>
            <form action="{{ route('change_session') }}" method="post">
                @csrf
                @foreach ($sessions as $session)
                    <input name="session" id="session" type="radio" {{ ($session->is_current == 1) ? "checked" : "" }} value="{{ $session->id }}">
                    <label for="session">{{ $session->session_start }}</label>
                @endforeach
                @error('session')
                <div>
                    {{ $message }}
                </div>
                @enderror
                <input type="hidden" name="currentSession" value="{{ $current_session->id }}">
                @error('currentSession')
                <div>
                    {{ $message }}
                </div>
                @enderror
                <button>Change</button>
            </form>
        </div>
    </div>
@endsection
