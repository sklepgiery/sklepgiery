@extends('layouts.dashboard')

@section('title', 'Wszystko')

@section('content')
    <a href="{{ action('Dashboard\Producers\ProducerController@index') }}">Producenci!</a>
    <br />
    <a href="{{ action('Dashboard\Genres\GenreController@index') }}">Gatunki!</a>
    <br />
    <a href="{{ action('Dashboard\Games\GameController@index') }}">Giery!</a>
@endsection