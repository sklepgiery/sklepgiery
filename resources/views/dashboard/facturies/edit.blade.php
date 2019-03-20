@extends('layouts.dashboard')

@section('title', 'Edytuj Fakture')

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
            <h2>Edytujesz Fakture nr: {{$faktura->id}}</h2>
            <div class="form-group">
                <label for="imie_nazwisko" >Imie i nazwisko:</label>
            <input type="text" value="{{$faktura->imie_nazwisko}}" class="form-control" id="imie_nazwisko" name="imie_nazwisko" required>
            </div>
            <div class="form-group">
                <label for="adres">Adres:</label>
                <input type="text" value="{{$faktura->adres}}" class="form-control" id="adres" name="adres" required>
            </div>
            <div class="form-group">
                <label for="miasto">Miasto:</label>
                <input type="text" class="form-control" value="{{$faktura->miasto}}" id="miasto" name="miasto" required>
            </div>
            <div class="form-group">
                <label for="kod_pocztowy">Kod Pocztowy:</label>
                <input type="text" value={{$faktura->kod_pocztowy}} pattern="^[0-9]{2}-[0-9]{3}$" title="Format xx-xxx" name='kod_pocztowy' class="form-control" id="kod_pocztowy" required>
            </div>
            <div class="form-group">
                <label for="nazwa_firmy">Nazwa Firmy:</label>
                <input type="text" class="form-control" value="{{$faktura->nazwa_firmy}}" id="nazwa_firmy" name="nazwa_firmy" required>
            </div>
            <div class="form-group">
                <label for="NIP">NIP:</label>
                <input type="number" step="1" max="9999999999" class="form-control" value="{{$faktura->NIP}}" id="NIP" name="NIP" required>
            </div>
            <h2>Wartość faktury: {{$faktura->wartosc}}</h2>
            <input type="submit" class="btn btn-block btn-primary" value='Edytuj'>
        </form>
    
        <a href="{{ action('Dashboard\Facturies\FactureController@index') }}">Nie chcesz dodać? nie ma problemu!</a>
    
@endsection