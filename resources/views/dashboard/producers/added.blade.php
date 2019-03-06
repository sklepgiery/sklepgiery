@extends('layouts.dashboard')

@section('title', 'Dodano pomyślnie')

@section('content')
    <p>Pomyślnie dodano producenta do bazy!</p>
    <a href="{{ action('Dashboard\Producers\ProducerController@index') }}">Powrót do producentów</a>
@endsection