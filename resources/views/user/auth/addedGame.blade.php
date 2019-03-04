@extends('layouts.user')

@section('title', 'Dodano pomyślnie')

@section('content')
    <p>Pomyślnie dodano gre do bazy!</p>
    <a href="{{ action('Dashboard\GameController@index') }}">Powrót do panelu</a>
@endsection