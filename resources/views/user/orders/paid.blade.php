@extends('layouts.user') 
@section('title', 'Zarejestrowano pomyślnie') 
@section('content')
<div class="col-md-6 m-auto card p-3">
    <h1>Dziękujemy!</h1>
    <p>Wierzymy na słowo, że doszo do zapłaty, zakupione gry zostały dodane do konta.</p>
    <p>Dziękujemy i pozdrawiamy serdecznie.</p>
    <a class="btn btn-success" href="{{action('User\LibraryController@index')}}">Przejdź do Twojej biblioteki gier!</a>
</div>
@endsection