@extends('layouts.dashboard')

@section('title', 'Gatunki')

@section('content')
<table class="table table-striped">
        <thead class="thead-light">
          <tr>
            <th scope="col">Gatunek</th>
            <th scope="col">Ilość gier:</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($gatuneczeks as $gatuneczek)
            <tr>
                <td>{{ $gatuneczek->nazwa }}</td>
                <td>{{ $gatuneczek->gry->count() }}</td>
                <td><a class="btn btn-success" href="{{ action("Dashboard\Genres\GenreEditController@showForm", $gatuneczek->id) }}">Edytuj</a></td>
                <td>@if($gatuneczek->gry->isEmpty())
                        <a  class="btn btn-danger" href="{{ action("Dashboard\Genres\GenreRemoveController@remove", $gatuneczek->id) }}">Usun</a>
                    @endif</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" role="button" href="{{ action('Dashboard\Genres\GenreAddController@showForm') }}">Dodaj Gatunek!</a>
@endsection