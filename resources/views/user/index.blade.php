@extends('layouts.user') 
@section('title', 'Witaj') 
@section('content')
<div class="col-md-10 m-auto p-3">
  <h1>Cześć {{Auth::user()->nick}}!</h1>
</div>
@endsection