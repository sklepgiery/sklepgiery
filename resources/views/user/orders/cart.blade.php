@extends('layouts.user') 
@section('title', 'Koszyk') 
@section('content')
<div class="col-md-md-10 m-auto p-3 card">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

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
    
    <div class="row border-bottom p-3">
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
    </div>

    <div class="row mt-2 pb-2 border-bottom">
      <div class="float-md-right col-md-12">
        @if (! $koszyk->kodRabatowy)
        <h2>Masz kod rabatowy?</h2>
        <h5>Użyj go!</h5>
        <form method="POST" action="{{ action('User\Orders\CartController@addDiscountCode') }}">
          @csrf
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Kod rabatowy</span>
            </div>
            <input type="text" class="form-control" placeholder="Kod rabatowy" name="code">
            <div class="input-group-append">
              <input type="submit" class="btn btn-primary" value="Użyj">
            </div>
          </div>
        </form>
        @else
        <div class="row">
          <h2 class="col-md-6">Użyto kodu rabatowego: {{$koszyk->kodRabatowy->nazwa}}</h2>
          <div class="col-md-6">
            <a href="{{ action('User\Orders\CartController@removeDiscountCode') }}" class="btn btn-danger col-md-6">Usuń kod rabatowy</a>
          </div>
        </div>
        @endif
      </div>
    </div>

    <div class="row mt-2 pb-2 border-bottom">
      @if(! $koszyk->faktura)
        <h2 class="col-md-12">Faktura?</h2>
        <div class="col-md-12">
          <a href="{{ action('User\Orders\CartController@addInvoice') }}" class="btn btn-primary">Dodaj fakturę</a>
        </div>
      @else
        <h2 class="col-md-12">Faktura</h2>

        <form method="POST" action="{{ action('User\Orders\CartController@editInvoice')}}" class="col-md-12 row">
        @csrf
        <div class="col-md-6">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Imię i nazwisko</span>
            </div>
            <input type="text" name="imie_nazwisko" class="form-control" value="{{$koszyk->faktura->imie_nazwisko}}">
          </div>
        </div>

        <div class="col-md-6">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Nazwa firmy</span>
            </div>
            <input type="text" name="nazwa_firmy" class="form-control" value="{{$koszyk->faktura->nazwa_firmy}}">
          </div>
        </div>

        <div class="col-md-4 mt-2">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Miasto</span>
            </div>
            <input type="text" name="miasto" class="form-control" value="{{$koszyk->faktura->miasto}}">
          </div>
        </div>
        
        <div class="col-md-4 mt-2">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Adres</span>
            </div>
            <input type="text" name="adres" class="form-control" value="{{$koszyk->faktura->adres}}">
          </div>
        </div>

        <div class="col-md-4 mt-2">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Kod pocztowy</span>
            </div>
            <input type="text" name="kod_pocztowy" class="form-control" value="{{$koszyk->faktura->kod_pocztowy}}">
          </div>
        </div>

        <div class="col-md-12 mt-2">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">NIP</span>
            </div>
            <input type="text" name="nip" class="form-control" value="{{$koszyk->faktura->NIP}}">
          </div>
        </div>

        <div class="col-md-12 mt-3">
          <input type="submit" class="btn btn-success mr-4" value="Zapisz fakturę">
          <a href="{{ action('User\Orders\CartController@removeInvoice') }}" class="btn btn-danger">Usuń fakturę</a>
        </div>

        </form>
      @endif
    </div>

    <div class="row mt-2 pb-2">
      <div class="col-md-12">
        <h2 class="mb-0">Łącznie do zapłaty: 
          @if($koszyk->kodRabatowy)
          {{round($koszyk->gry->sum("cena") * $koszyk->kodRabatowy->znizka_procentowo, 2)}}
          @else
          {{$koszyk->gry->sum("cena")}}
          @endif zł</h2>
      </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
      <a href="{{ action('User\Orders\CartController@end') }}" class="btn btn-success col-md-6">Zapłać</a>
    </div>
  @else
    <h5>Nie masz gier w koszyku :(</h5>
    <a href="{{action("Shop\ShopController@index")}}">Zobacz nasze gry!</a>
  @endif
</div>
@endsection