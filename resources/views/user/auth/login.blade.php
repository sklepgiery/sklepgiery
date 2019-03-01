@extends('layouts.user')

@section('title', 'Zaloguj się')

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
        <input type="submit" value='Zaloguj'>
    </form>
    <a href="{{ action('User\Auth\RegisterController@showForm') }}">Nie masz konta? Zarejestruj się!</a>
@endsection