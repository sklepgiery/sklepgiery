@extends('layouts.dashboard')

@section('title', 'Gatunki')

@section('content')
    @foreach ($kody as $kod)
        <div class="kod">
            <p>{{ $kod->nazwa }} - {{ $kod->znizka_procentowo }}</p>
        </div>
    @endforeach
    <a href="{{ action('Dashboard\Discounts\DiscountAddController@showForm') }}">Dodaj Kody Rabatowe!</a>
@endsection