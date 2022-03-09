<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
{{--        <meta name="viewport" content="width=device-width, initial-scale=1">--}}

        <title>Weather</title>
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>
    <body class="bg-gray-300">
        <header class="site-header">
            <div class="wrapper site-header__wrapper">
                <nav class="nav">

                    <ul class="nav__wrapper">

                        @auth
                            <li class="nav__item"><a href="{{ route('weather') }}">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</a></li>
                            @if(auth()->user()->permissions === 1)
                                <li class="nav__item--end"><a href="{{ route('useractivity') }}">Admin</a></li>
                            @endif
                            <li class="nav__item--end"><a href="{{ route('logout') }}">Logout</a></li>
                        @endauth

                        @guest
                            <li class="nav__item"><a href="/">Home</a></li>
                            <li class="nav__item--end"><a href="{{ route('login') }}">Login</a></li>
                        @endguest
{{--                        <li class="nav__item"><a href="#">Home</a></li>--}}
{{--                        <li class="nav__item"><a href="#">John Doe</a></li>--}}
{{--                        <li class="nav__item--end"><a href="#">Login</a></li>--}}
                    </ul>
                </nav>
            </div>
        </header>
    </body>
</html>
