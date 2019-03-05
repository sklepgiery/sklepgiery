@extends('layouts.dashboard')

@section('title', 'Giery')

@section('content')
    @foreach ($gry as $gra)
        <div class="gra">
            <p>{{ $gra->nazwa }}</p>
        </div>
    @endforeach
    <a href="{{ action('Dashboard\Games\GameAddController@showForm') }}">Dodaj Giery!</a>
@endsection