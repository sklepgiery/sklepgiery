@extends('layouts.user') 
@section('title', 'Zarejestrowano pomyślnie') 
@section('content')
<div class="col-md-6 m-auto card p-3">
    <h1>Gratulację!</h1>
    <p>Zarejestrowano pomyślnie, proszę nie potwierdzać maila bo nas nie stać.</p>
    <p>Dziękujemy i pozdrawiamy serdecznie.</p>
    <a class="btn btn-success" href="{{action('Shop\ShopController@index')}}">Przejdź do strony głównej i zakup jakąś gierę!</a>
</div>
@endsection