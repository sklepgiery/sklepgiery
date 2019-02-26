<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config("app.name")}} - rejestracja</title>
    </head>
    <body>
        @if(session('loginError'))
            Błędny nick lub hasło
        @endif
        <form method="POST">
            @csrf
            nick:<input type="text" name='nick'><br>
            haslo:<input type="password" name='password'><br>
            imie:<input type="text" name='imie'><br>
            nazwisko:<input type="text" name='nazwisko'><br>
            email:<input type="email" name='email'><br>
            plec:<select name="plec">
                <option value="samica">samica</option>
                <option value="samiec">samiec</option>
            </select><br>
            data urodzenia:<input type="date" name='data-ur'><br>
            czy jestes adminem? (prosze nie klam):<input type="checkbox" name='admin'><br>
            <input type="submit" value='zaloguj'>
        </form>
    </body>
</html>
