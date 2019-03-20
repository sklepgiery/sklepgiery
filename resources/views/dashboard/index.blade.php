@extends('layouts.dashboard')

@section('title', 'Wszystko')

@section('content')
<div class="categories m-2">
    <div class="row mb-2">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Producenci</h5>
                    <p class="card-text">ilość Producentów: {{$producent}}</p>
                    <a href="{{ action('Dashboard\Producers\ProducerController@index') }}" class="btn btn-primary">Przejdź do producentów</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Giery</h5>
                <p class="card-text">ilość gier: {{$gra}}</p>
                    <a href="{{ action('Dashboard\Games\GameController@index') }}" class="btn btn-primary">Przejdź do gier</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gatunki</h5>
                <p class="card-text">ilość gatunkow: {{$gatunek}}</p>
                    <a href="{{ action('Dashboard\Genres\GenreController@index') }}" class="btn btn-primary">Przejdź do gatunkow</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Kody Rabatowe</h5>
                <p class="card-text">ilość Kodów: {{$kodRabatowy}}</p>
                    <a href="{{ action('Dashboard\Discounts\DiscountController@index') }}" class="btn btn-primary">Przejdź do kodów rabatowych</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Zamówienia</h5>
                    <p class="card-text">ilość Zamowień: {{$zamowienie}}</p>
                    <a href="{{ action('Dashboard\Orders\OrderController@index') }}" class="btn btn-primary">Przejdź do Zamówień</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Użytkownicy</h5>
                <p class="card-text">Liczba Użytkowników: {{ $uzytkownik }}</p>
                <a href="{{ action('Dashboard\Users\UserController@index') }}" class="btn btn-primary">Przejdź do Użytkowników</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Faktury</h5>
                <p class="card-text">Liczba Faktur: {{ $faktura }}</p>
                <a href="{{ action('Dashboard\Facturies\FactureController@index') }}" class="btn btn-primary">Przejdź do Faktur</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Promocje</h5>
                <p class="card-text">Liczba Promocji: {{ $promocja }}</p>
                <a href="{{ action('Dashboard\Sales\SaleController@index') }}" class="btn btn-primary">Przejdź do Promocji</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection