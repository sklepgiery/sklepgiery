@extends('layouts.user') 
@section('title', 'Strona główna') 
@section('content')
<div>
  <h1 class="text-center">Najlepsze giery na rynku!</h1>
  <h2 class="text-left">Wybierz coś z spośród {{$gry->count()}} gier:</h2>
  <div class="row">
  @foreach ($gry as $gra)
    <div class="col-4 mx-2 p-2 text-center card">
      <div class="p-3 border-bottom">Obrazek</div>
      <div class="p-1 border-bottom">{{$gra->nazwa}}</div>
      <div class="p-1">Niesamowita cena: {{$gra->cena}}zł</div>
      <div><a href="{{ action('User\Orders\CartController@addGame', $gra->id) }}" class="btn btn-success">Dodaj do koszyka</a></div>
    </div>
  @endforeach
  </div>
</div>
@endsection