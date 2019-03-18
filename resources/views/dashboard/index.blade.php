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
    <div class="row">
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
                    <h5 class="card-title">Giery</h5>
                    <p class="card-text">ilość gier: #</p>
                    <a href="#" class="btn btn-primary">Przejdź do gier</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gatunki</h5>
                    <p class="card-text">ilość gatunkow: #</p>
                    <a href="#" class="btn btn-primary">Przejdź do gatunkow</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection