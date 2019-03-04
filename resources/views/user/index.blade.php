@extends('layouts.user')

@section('title', 'Witaj')

@section('content')
    <h1>DOMEK</h1>
    <a href="{{action('User\Auth\LogoutController@logout')}}">Wyloguj się mordeczko</a>
@endsection