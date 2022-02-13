<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav>
        <div>
            <ul class="inline bg-blue-500">
                @guest
                <li class="inline bg-blue-500"><a href="{{ route('login') }}">Login</a></li>
                <li class="inline bg-blue-500"><a href="{{ route('register') }}">Register</a></li>
                @endguest
                @auth
                <li class="inline bg-blue-500"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
    @yield('content')
</body>
</html>
