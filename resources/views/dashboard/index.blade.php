@extends('layouts.dashboard')

@section('title', 'Wszystko')

@section('content')
    <a href="{{ action('Dashboard\Games\GameController@index') }}">Giery!</a>
@endsection