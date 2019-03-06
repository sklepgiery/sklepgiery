@extends('layouts.dashboard')

@section('title', 'Dodano pomyślnie')

@section('content')
    <p>Pomyślnie dodano gatunek do bazy!</p>
    <a href="{{ action('Dashboard\Genres\GenreController@index') }}">Powrót do gatunków</a>
@endsection