<!doctype html>
<html lang="pl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{config("app.name")}} - @yield('title')</title>
  <link rel="stylesheet" href="/sklepgiery/public/css/app.css" type="text/css" />
</head>

<body>
  <nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
      <a class="navbar-brand" href="{{action('Shop\ShopController@index')}}">Sklep Giery</a> @auth
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        @if(Auth::user()->admin)
        <li class="nav-item">
          <a class="nav-link" href="{{action('Dashboard\DashboardController@index')}}">Panel admina</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{ action('User\Orders\LibraryController@index') }}">Twoje gry</a>
        </li>
      </ul>
      @endauth @auth
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{action("User\Orders\CartController@index")}}">Koszyk 
            @if (Auth::user()->koszyk)
            ({{Auth::user()->koszyk->gry()->count()}})
            @else
            (0)
            @endif
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{action('User\UserController@index')}}">
            {{Auth::user()->nick}}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{action('User\Auth\LogoutController@logout')}}">Wyloguj się</a>
        </li>
      </ul>
      @endauth @guest
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{action('User\Auth\LoginController@showForm')}}">Zaloguj się</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{action('User\Auth\RegisterController@showForm')}}">Zarejestruj się</a>
        </li>
      </ul>
      @endguest
    </div>
  </nav>
  <div class="container p-2 mt-2">
    @yield('content')
  </div>
  <script src="/sklepgiery/public/js/app.js"></script>
</body>
</html>