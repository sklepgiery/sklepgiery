@extends('layouts.user') 
@section('title', 'Witaj') 
@section('content')
<div class="col-md-10 m-auto p-3">
  <h1>Cześć {{Auth::user()->nick}}!</h1>
  @if (Auth::user()->admin)
    <h5>Witamy szanownego Admina, prezentuję link do panelu: <a href="{{action("Dashboard\DashboardController@index")}}">Link</a></h5>
  @endif
</div>
@endsection