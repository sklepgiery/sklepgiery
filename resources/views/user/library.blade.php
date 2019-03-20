@extends('layouts.user') 
@section('title', 'Biblioteka gier') 
@section('content')
<div class="col-md-10 m-auto p-3 card">
  <h1>Biblioteka gier</h1>

  @if(!empty($gry))
  @else
  <h2>Nie masz żadnych gier w koszyku</h2>
  <a href="{{ action('Shop\ShopController@index') }}">Zobacz nasze gry</a>
  @endif
</div>
@endsection