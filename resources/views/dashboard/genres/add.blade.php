@extends('layouts.dashboard')

@section('title', 'Dodaj Gatuneczek')

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
        Nazwa:<input type="text" name='nazwa'><br>
        <input type="submit" value='Dodaj Gatuneczek'>
    </form>

    <a href="{{ action('Dashboard\Genres\GenreController@index') }}">Nie chcesz dodać? nie ma problemu!</a>
@endsection