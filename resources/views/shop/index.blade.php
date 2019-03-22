@extends('layouts.user') 
@section('title', 'Strona główna') 
@section('content')
<div class="card p-3">

  <h1 class="text-center">Najlepsze giery na rynku!</h1>
  <form method="GET">
    <div class="my-3 justify-content-center d-flex">
      <div class="input-group col-md-8">
        <div class="input-group-prepend">
          <span class="input-group-text">Wpisz nazwę gry</span>
        </div>
        <input type="text" class="form-control" placeholder="Nazwa gry" value="{{$wyszukano}}" name="wyszukano">
        <div class="input-group-append">
          <input type="submit" class="btn btn-primary" value="Wyszukaj">
        </div>
      </div>
    </div>
  </form>

  <h2 class="text-left">Wybierz coś z spośród {{$gry->count()}} gier:</h2>
  <div class="row justify-content-center">
  @foreach ($gry as $gra)
    <div class="col-xl-3 m-4 p-2 text-center card justify-content-center">
      <div class="p-3 main-page-image-container justify-content-center align-items-center d-flex"><img class="main-page-image" src="{{Storage::url($gra->zdjecie)}}"></div>
      <div class="p-1"><h3>{{$gra->nazwa}}</h3></div>
      <hr>
      <div class="p-1">{{$gra->opis}}</div>
      <hr>
      <div class="p-1">Niesamowita cena: 
        @if($gra->currentSale)
        <s>{{$gra->cena}}</s> <b>{{$gra->currentPrice}}zł</b>
        @else
        <b>{{$gra->currentPrice}}zł</b>
        @endif
      </div>
      @if($gra->currentSale)
      <div class="p-1"><h3 class="text-success">Promocja {{(int)$gra->currentSale->znizka_procentowo}}%!</h3></div>
      @endif
      @if (! Auth::user())
      <div><a href="{{ action('User\Orders\CartController@addGame', $gra->id) }}" class="btn btn-success">Dodaj do koszyka</a></div>
      @else
      @can('buy', $gra)
      <div><a href="{{ action('User\Orders\CartController@addGame', $gra->id) }}" class="btn btn-success">Dodaj do koszyka</a></div>
      @endcan
      @endif
      <div class="p-1 pt-3 mt-auto">
        @foreach ($gra->gatunki as $gatunek)
         <span class="mx-2"> {{$gatunek->nazwa}} </span>
        @endforeach
    </div>
    </div>
  @endforeach
  </div>
</div>
@endsection