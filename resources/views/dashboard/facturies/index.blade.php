@extends('layouts.dashboard')

@section('title', 'Faktury')

@section('content')
    <table class="table table-striped">
        <thead class="thead-light">
          <tr>
            <th scope="col">Nr faktury</th>
            <th scope="col">Uzytkownik</th>
            <th scope="col">na kogo</th>
            <th scope="col">Adres</th>
            <th scope="col">Miasto</th>
            <th scope="col">Kod pocztowy</th>
            <th scope="col">Nazwa firmy</th>
            <th scope="col">NIP</th>
            <th scope="col">wartosc</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($faktury as $faktura)
            <tr>
                <td>{{ $faktura->id }}</td>
                <td>{{ $faktura->uzytkownik_id }}</td>
                <td>{{ $faktura->imie_nazwisko }}</td>
                <td>{{ $faktura->adres }}</td>
                <td>{{ $faktura->miasto }}</td>                
                <td>{{ $faktura->kod_pocztowy }}</td>
                <td>{{ $faktura->nazwa_firmy }}</td>
                <td>{{ $faktura->NIP }}</td>
                <td>{{ $faktura->wartosc }}</td>
                <td><a class="btn btn-success" href="{{ action("Dashboard\Facturies\FactureEditController@showForm", $faktura->id) }}">Edytuj</a></td>
                <td><a class="btn btn-danger" href="{{ action("Dashboard\Facturies\FactureRemoveController@remove", $faktura->id) }}">Usun</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
