@extends('layouts.user') 
@section('title', 'Koszyk') 
@section('content')
<div class="col-md-10 m-auto p-3">
  @if (!$koszyk || $koszyk->gry->count())
    
  @else
    <h1>Nie masz gier w koszyku :(</h1>
  @endif
</div>
@endsection