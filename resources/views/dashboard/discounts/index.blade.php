@extends('layouts.dashboard')

@section('title', 'Gatunki')

@section('content')
    @foreach ($kody as $kod)
        <div class="kod">
            <p>
                {{ $kod->nazwa }} - {{ $kod->znizka_procentowo }} od: {{ $kod->data_rozpoczecia }} do: {{ $kod->data_zakonczenia }}
                <a href="{{ action("Dashboard\Discounts\DiscountEditController@showForm", $kod->id) }}">Edytuj</a>
                <a href="{{ action("Dashboard\Discounts\DiscountRemoveController@remove", $kod->id) }}">Usun</a>
            </p>
        </div>
    @endforeach
    <a href="{{ action('Dashboard\Discounts\DiscountAddController@showForm') }}">Dodaj Kody Rabatowe!</a>
@endsection