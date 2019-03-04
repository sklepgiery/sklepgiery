@extends('layouts.user')

@section('title', 'Panel Admina')

@section('content')
    @foreach ($gry as $gra)
        <div class="gra">
            <p>{{ $gra->nazwa }}</p>
        </div>
    @endforeach
    <a href="{{ action('Dashboard\GameAddController@showForm') }}">Dodaj Giery!</a>
@endsection