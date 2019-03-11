@extends('layouts.dashboard')

@section('title', 'Gatunki')

@section('content')
    @foreach ($gatuneczeks as $gatuneczek)
        <div class="gatunek">
            <p>
            {{ $gatuneczek->nazwa }} - gier: {{ $gatuneczek->gry->count() }}  
            <a href="{{ action("Dashboard\Genres\GenreEditController@showForm", $gatuneczek->id) }}">Edytuj</a> 
            @if($gatuneczek->gry->isEmpty())
            <a href="{{ action("Dashboard\Genres\GenreRemoveController@remove", $gatuneczek->id) }}">Usun</a>
            @endif
            </p>
        </div>
    @endforeach
    <a href="{{ action('Dashboard\Genres\GenreAddController@showForm') }}">Dodaj Gatunki!</a>
@endsection