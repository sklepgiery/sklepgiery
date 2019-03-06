@extends('layouts.dashboard')

@section('title', 'Gatunki')

@section('content')
    @foreach ($gatuneczeks as $gatuneczek)
        <div class="gatunek">
            <p>{{ $gatuneczek->nazwa }}</p>
        </div>
    @endforeach
    <a href="{{ action('Dashboard\Genres\GenreAddController@showForm') }}">Dodaj Gatunki!</a>
@endsection