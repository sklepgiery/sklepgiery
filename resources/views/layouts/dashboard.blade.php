<!doctype html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config("app.name")}} - Panel - @yield('title')</title>
        <link rel="stylesheet" href="/sklepgiery/public/css/app.css" type="text/css" />

    </head>
    <body>
        <nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <a class="navbar-brand" href="{{action('Dashboard\DashboardController@index')}}">Panel Admina</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="">Strona główna</a>
                </li>
                </ul>
                @auth
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{action('User\UserController@index')}}">
                    {{Auth::user()->nick}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{action('User\Auth\LogoutController@logout')}}">Wyloguj się</a>
                </li>
                </ul>
                @endauth
            </div>
        </nav>
        <div class="content dashboard">
            @yield('content')
        </div>
        <script src="/sklepgiery/public/js/app.js"></script>
    </body>
</html>
