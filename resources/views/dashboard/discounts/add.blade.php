@extends('layouts.dashboard')

@section('title', 'Dodaj Grę')

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
        Zniżka Procentowo :<input type="number" name="znizka_procentowo"><br>
        <input type="submit" value="dodaj"><br>
    </form>

    <a href="{{ action('Dashboard\Games\GameController@index') }}">Nie chcesz dodać? nie ma problemu!</a>
@endsection