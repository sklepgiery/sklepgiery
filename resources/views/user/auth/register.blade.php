@extends('layouts.user')

@section('title', 'Zarejestruj się')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST">
        @csrf
        Nick:<input type="text" name='nick'><br>
        Hasło:<input type="password" name='password'><br>
        Imię:<input type="text" name='imie'><br>
        Nazwisko:<input type="text" name='nazwisko'><br>
        E-Mail:<input type="email" name='email'><br>
        Płeć:<select name="plec">
            <option value="samica">samica</option>
            <option value="samiec">samiec</option>
        </select><br>
        Data urodzenia:<input type="date" name='data-ur'><br>
        Czy jesteś adminem? (proszę nie kłam):<input type="checkbox" name='admin'><br>
        <input type="submit" value='Zarejestruj'>
    </form>
    <a href="{{ action('User\Auth\LoginController@showForm') }}">Masz konto? Zaloguj się!</a>
@endsection