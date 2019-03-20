@extends('layouts.dashboard')

@section('title', 'zamowienia')

@section('content')
    <table class="table table-striped">
        <thead class="thead-light">
          <tr>
            <th scope="col">Nr zamówienia</th>
            <th scope="col">Uzytkownik</th>
            <th scope="col">faktura</th>
            <th scope="col">Status</th>
            <th scope="col">Wartość</th>
            <th scope="col">Kod rabatowy</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($zamowienia as $zamowienie)
            <tr>
                <td>{{ $zamowienie->id }}</td>
                <td>{{ $zamowienie->uzytkownik_id }}</td>
                <td>{{ $zamowienie->faktura_id }}</td>
                <td>{{ $zamowienie->status->nazwa }}</td>
                <td>{{ $zamowienie->wartosc }}</td>
                <td>{{ $zamowienie->kod_rabatowy_id }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
