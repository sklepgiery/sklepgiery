<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config("app.name")}} - logowanie</title>
    </head>
    <body>
        @if(session('loginError'))
            Błędny nick lub hasło
        @endif
        <form method="POST">
            @csrf
            nick:<input type="text" name='nick'><br>
            haslo:<input type="password" name='password'><br>
            <input type="submit" value='zaloguj'>
        </form>
        <a href="{{ action('User\RegisterController@showForm') }}">nie masz konta? zarejestruj sie!</a>
    </body>
</html>
