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
    <nav class="px-5 shadow">
        <div class="flex flex-wrap justify-between items-center">
            <img class="w-20 h-auto" src="{{ asset('logo-2.png') }}">
            <ul>
                @guest
                <li class="inline-block ml-3"><a href="{{ route('login') }}">Login</a></li>
                <li class="inline-block ml-3"><a href="{{ route('register') }}">Register</a></li>
                @endguest
                @auth
                <li class="inline ml-3"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="ml-3">
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
