@extends('layouts.dashboard')

@section('title', 'Dodaj Kod rapatowy')

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
        Zniżka Procentowo :<input type="number" step="0.01" name="znizka_procentowo"><br>
        Data rozpoczęcia :<input type="datetime-local" name="data_rozpoczecia"><br>
        Data zakonczenia :<input type="datetime-local" name="data_zakonczenia"><br>
        <input type="submit" value="dodaj"><br>
    </form>

    <a href="{{ action('Dashboard\Games\GameController@index') }}">Nie chcesz dodać? nie ma problemu!</a>
@endsection