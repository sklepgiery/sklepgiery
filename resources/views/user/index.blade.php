@extends('layouts.user') 
@section('title', 'Witaj') 
@section('content')
<div class="col-md-10 m-auto p-3 card">
  <h1>Cześć {{Auth::user()->nick}}!</h1>
  @if (Auth::user()->admin)
    <h5 class="my-3">Witamy szanownego Admina, prezentuję link do panelu: <a href="{{action("Dashboard\DashboardController@index")}}">Link</a></h5>
  @endif
  <h4><a href="{{action("User\LibraryController@index")}}">Zobacz swoją bibliotekę gier</a></h4>
</div>
@endsection