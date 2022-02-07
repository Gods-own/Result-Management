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
<<<<<<< HEAD
=======
    <nav>
        <div>
            <ul>
                @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                @endguest
                @auth
                <li><a href="{{ route('logout') }}">Logout</a></li>
                @endauth
            </ul>
        </div>
    </nav>
>>>>>>> 13db7e93951a379f299d231100d5e65598c1fca7
    @yield('content')
</body>
</html>