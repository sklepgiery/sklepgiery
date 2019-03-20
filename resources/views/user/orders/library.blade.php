@extends('layouts.user') 
@section('title', 'Biblioteka gier') 
@section('content')
<div class="col-md-12 m-auto p-3 card">
  <h1>Biblioteka gier</h1>

  @if(!empty($gry))
  <h2>Twoje gry:</h2>
  @foreach ($gry as $gra)
  <div class="col-4 mx-2 p-2 text-center card">
    <div>Obrazek</div>
    <div class="p-1 border-bottom"><h3>{{$gra->nazwa}}</h3></div>
    <div class="p-1"><a href="" class="btn btn-primary">Pobierz</a></div>
    </div>
  @endforeach
  @else
  <h2>Nie masz żadnych gier w koszyku</h2>
  <a href="{{ action('Shop\ShopController@index') }}">Zobacz nasze gry</a>
  @endif
</div>
@endsection