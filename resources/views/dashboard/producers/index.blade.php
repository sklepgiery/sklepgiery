@extends('layouts.dashboard')

@section('title', 'Producenci')

@section('content')
    @foreach ($producers as $producer)
        <div class="producent">
            <p>
                {{ $producer->nazwa }} - gier: {{$producer->gry->count()}} gier
                <a href="{{ action("Dashboard\Producers\ProducerEditController@showForm", $producer->id) }}">Edytuj</a> 
                @if($producer->gry->isEmpty())
                    <a href="{{ action("Dashboard\Producers\ProducerRemoveController@remove", $producer->id) }}">Usun</a>
                @endif
            </p>
        </div>
    @endforeach
    <a href="{{ action('Dashboard\Producers\ProducerAddController@showForm') }}">Dodaj Producentów!</a>
@endsection