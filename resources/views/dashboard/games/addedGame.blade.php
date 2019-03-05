@extends('layouts.dashboard')

@section('title', 'Dodano pomyślnie')

@section('content')
    <p>Pomyślnie dodano gre do bazy!</p>
    <a href="{{ action('Dashboard\Games\GameController@index') }}">Powrót do gier</a>
@endsection