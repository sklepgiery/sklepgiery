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

    <table class="table table-hover">
      <thead>
        <tr>
          <th>Nazwa</th>
          <th>Cena</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($koszyk->gry as $gra)
          <tr>
            <th class="pt-3">{{$gra->nazwa}}</th>
            <td class="pt-3">{{$gra->cena}} zł</td>
            <td><a class="btn btn-sm btn-danger" href="{{ action('User\Orders\CartController@removeGame', $gra->id) }}">Usuń</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <h5>Łączna cena: {{$koszyk->gry->sum("cena")}} zł</h5>
  @else
    <h1>Nie masz gier w koszyku :(</h1>
    <a href="{{action("Shop\ShopController@index")}}">Zobacz nasze gry!</a>
  @endif
</div>
@endsection