@extends('layouts.user') 
@section('title', 'Strona główna') 
@section('content')
<div class="card p-3">
  <h1 class="text-center">Najlepsze giery na rynku!</h1>
  <h2 class="text-left">Wybierz coś z spośród {{$gry->count()}} gier:</h2>
  <div class="row justify-content-center">
  @foreach ($gry as $gra)
    <div class="col-3 mx-4  p-2 text-center card">
      <div class="p-3 border-bottom"><img class="main-page-image" src="{{Storage::url($gra->zdjecie)}}"></div>
      <div class="p-1 border-bottom"><h3>{{$gra->nazwa}}</h3></div>
      <div class="p-1 border-bottom">{{$gra->opis}}</div>
      <div class="p-1">Niesamowita cena: {{$gra->currentPrice}}zł</div>
      @if (! Auth::user())
      <div><a href="{{ action('User\Orders\CartController@addGame', $gra->id) }}" class="btn btn-success">Dodaj do koszyka</a></div>
      @else
      @can('buy', $gra)
      <div><a href="{{ action('User\Orders\CartController@addGame', $gra->id) }}" class="btn btn-success">Dodaj do koszyka</a></div>
      @endcan
      @endif
      @if($gra->currentSale)
      <div class="p-1"><h3 class="text-success">Promocja {{(int)$gra->currentSale->znizka_procentowo}}%!</h3></div>
      @endif
    </div>
  @endforeach
  </div>
</div>
@endsection