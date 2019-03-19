@extends('layouts.user') 
@section('title', 'Strona główna') 
@section('content')
<div class="card p-3">
  <h1 class="text-center">Najlepsze giery na rynku!</h1>
  <h2 class="text-left">Wybierz coś z spośród {{$gry->count()}} gier:</h2>
  <div class="row">
  @foreach ($gry as $gra)
    <div class="col-4 mx-2 p-2 text-center card">
      <div class="p-3 border-bottom">Obrazek</div>
      <div class="p-1 border-bottom"><h3>{{$gra->nazwa}}</h3></div>
      <div class="p-1 border-bottom">{{$gra->opis}}</div>
      <div class="p-1">Niesamowita cena: {{$gra->cena}}zł</div>
      @if (! Auth::user())
      <div><a href="{{ action('User\Orders\CartController@addGame', $gra->id) }}" class="btn btn-success">Dodaj do koszyka</a></div>
      @elseif (! Auth::user()->gry->contains($gra) && (Auth::user()->koszyk && ! Auth::user()->koszyk->gry->contains($gra)))
      <div><a href="{{ action('User\Orders\CartController@addGame', $gra->id) }}" class="btn btn-success">Dodaj do koszyka</a></div>
      @endif
    </div>
  @endforeach
  </div>
</div>
@endsection