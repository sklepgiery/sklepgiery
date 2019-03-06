@extends('layouts.dashboard')

@section('title', 'Producenci')

@section('content')
    @foreach ($producers as $producer)
        <div class="producent">
            <p>{{ $producer->nazwa }} - Gry: {{$producer->gry->count()}}</p>
        </div>
    @endforeach
    <a href="{{ action('Dashboard\Producers\ProducerAddController@showForm') }}">Dodaj Producentów!</a>
@endsection