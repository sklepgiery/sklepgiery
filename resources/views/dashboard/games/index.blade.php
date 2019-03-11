@extends('layouts.dashboard')

@section('title', 'Giery')

@section('content')
    @foreach ($gry as $gra)
        <div class="gra">
            <p>
                {{ $gra->nazwa }} - {{ $gra->producent->nazwa}}
                <a href="{{ action("Dashboard\Games\GameEditController@showForm", $gra->id) }}">Edytuj</a>
                @if($gra->gatunki->count() == 0)
                <a href="{{ action("Dashboard\Games\GameRemoveController@remove", $gra->id) }}">Usun</a>
                @endif
            </p>
        </div>
    @endforeach
    <a href="{{ action('Dashboard\Games\GameAddController@showForm') }}">Dodaj Giery!</a>
@endsection