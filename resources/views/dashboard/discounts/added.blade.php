@extends('layouts.dashboard')

@section('title', 'Dodano pomyślnie')

@section('content')
    <p>Pomyślnie dodano kod rabatowy do bazy!</p>
    <a href="{{ action('Dashboard\Discounts\DiscountController@index') }}">Powrót do kodów</a>
@endsection