@extends('layouts.user')

@section('title', 'Zarejestrowano pomyślnie')

@section('content')
    <p>Zarejestrowano pomyślnie, proszę nie potwierdzać maila bo nas nie stać.</p>
    <p>Dziękujemy i pozdrawiamy serdecznie.</p>
    <a href="{{action('User\Auth\LoginController@login')}}">Zaloguj się</a>
@endsection