@extends('layouts.user') 
@section('title', 'Koszyk') 
@section('content')
<div class="col-md-10 m-auto p-3">
  <h1>Koszyk</h1>
  @if ($koszyk && $koszyk->gry->count())
    <h5>Masz {{$koszyk->gry->count()}}
      @if($koszyk->gry->count() == 1)
      grę
      @elseif($koszyk->gry->count() < 5)
      gry
      @else
      gier
      @endif
      w koszyku:</h5>
    @foreach ($koszyk->gry as $gra)
      <div>{{$gra->nazwa}}</div>
    @endforeach
  @else
    <h1>Nie masz gier w koszyku :(</h1>
    <a href="{{action("Shop\ShopController@index")}}">Zobacz nasze gry!</a>
  @endif
</div>
@endsection