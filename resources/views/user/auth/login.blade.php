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
        nick:<input type="text" name='nick'><br>
        haslo:<input type="password" name='password'><br>
        <input type="submit" value='zaloguj'>
    </form>
    <a href="{{ action('User\Auth\RegisterController@showForm') }}">nie masz konta? zarejestruj sie!</a>
@endsection