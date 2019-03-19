@extends('layouts.dashboard')

@section('title', 'Giery')

@section('content')
    <table class="table table-striped">
        <thead class="thead-light">
          <tr>
            <th scope="col">Nazwa</th>
            <th scope="col">Producent</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($gry as $gra)
                <tr>
                    <td>{{ $gra->nazwa }}</td>
                    <td>{{ $gra->producent->nazwa}}</td>
                    <td><a class="btn btn-success" href="{{ action("Dashboard\Games\GameEditController@showForm", $gra->id) }}">Edytuj</a></td>
                    <td>@if($gra->zamowienia->count() == 0)
                    <a class="btn btn-danger" href="{{ action("Dashboard\Games\GameRemoveController@remove", $gra->id) }}">Usun</a>
                    @endif</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" role="button" href="{{ action('Dashboard\Games\GameAddController@showForm') }}">Dodaj Giery!</a>
@endsection