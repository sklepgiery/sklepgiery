@extends('layouts.dashboard')

@section('title', 'Dodaj Promocje')

@section('content')
    
<div class="col-md-4 m-auto card p-3">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST">
        @csrf
        <div class="form-group">
            <label for="gra">Gra:</label>
            <select class="form-control" id="gra" name="gra_id">
            @foreach ($gry as $gra)
                <option value="{{$gra->id}}">{{ $gra->nazwa }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="znizka_procentowo">Zniżka Procentowo:</label>
        <input type="number" step="1" class="form-control" id="znizka_procentowo" name="znizka_procentowo" placeholder="25" required>
        </div>
        <div class="form-group">
            <label for="data_rozpoczecia">Data rozpoczęcia:</label>
            <input type="datetime-local" class="form-control" id="data_rozpoczecia" name="data_rozpoczecia" required>
        </div>
        <div class="form-group">
            <label for="data_zakonczenia">Data zakończenia:</label>
            <input type="datetime-local" class="form-control" id="data_zakonczenia" name="data_zakonczenia" required>
        </div>
        <input type="submit" class="btn btn-block btn-primary" value='Dodaj!'>
    </form>
    <a href="{{ action('Dashboard\Sales\SaleController@index') }}">Nie chcesz dodać? nie ma problemu!</a>
@endsection