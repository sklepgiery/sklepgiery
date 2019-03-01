@extends('layouts.user')

@section('title', 'Zarejestruj się')

@section('content')
    <h1>DOMEK</h1>
    <a href="{{action('User\Auth\LogoutController@logout')}}">Wyloguj się mordeczko</a>
@endsection