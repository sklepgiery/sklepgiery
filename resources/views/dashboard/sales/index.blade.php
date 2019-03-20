@extends('layouts.dashboard')

@section('title', 'Promocje')

@section('content')
    <table class="table table-striped">
        <thead class="thead-light">
          <tr>
            <th scope="col">Nazwa Gry</th>
            <th scope="col">Zniżka procentowo</th>
            <th scope="col">data rozpoczęcia</th>
            <th scope="col">data zakończenia</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($promocje as $promocja)
                <tr>
                    <td>{{ $promocja->gra->nazwa }}</td>
                    <td>{{ $promocja->znizka_procentowo}}</td>
                    <td>{{ $promocja->data_rozpoczecia}}</td>
                    <td>{{ $promocja->data_zakonczenia}}</td>
                    <td><a class="btn btn-success" href="{{ action("Dashboard\Sales\SaleEditController@showForm", $promocja->id) }}">Edytuj</a></td>
                    <td><a class="btn btn-danger" href="{{ action("Dashboard\Sales\SaleRemoveController@remove", $promocja->id) }}">Usun</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" role="button" href="{{ action('Dashboard\Sales\SaleAddController@showForm') }}">Dodaj Promocje!</a>
@endsection