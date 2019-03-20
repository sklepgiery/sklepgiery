@extends('layouts.dashboard')

@section('title', 'Gatunki')

@section('content')
    <table class="table table-striped">
        <thead class="thead-light">
        <tr>
            <th scope="col">Nazwa</th>
            <th scope="col">Zniżka</th>
            <th scope="col">Data Rozpoczęcia</th>
            <th scope="col">Data Zakończenia</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($kody as $kod)
                <tr>
                    <td>{{ $kod->nazwa }}</td>
                    <td>{{ $kod->znizka_procentowo}}%</td>
                    <td>{{ $kod->data_rozpoczecia}}</td>
                    <td>{{ $kod->data_zakonczenia}}</td>
                    <td><a class="btn btn-success" href="{{ action("Dashboard\Discounts\DiscountEditController@showForm", $kod->id) }}">Edytuj</a></td>
                    <td><a class="btn btn-danger" href="{{ action("Dashboard\Discounts\DiscountRemoveController@remove", $kod->id) }}">Usun</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" role="button" href="{{ action('Dashboard\Discounts\DiscountAddController@showForm') }}">Dodaj Kod!</a>
@endsection