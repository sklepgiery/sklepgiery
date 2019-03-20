@extends('layouts.dashboard')

@section('title', 'Dodano pomyślnie')

@section('content')
    <p>Pomyślnie dodano gre do bazy!</p>
    <a href="{{ action('Dashboard\Sales\SaleController@index') }}">Powrót do promocji</a>
@endsection