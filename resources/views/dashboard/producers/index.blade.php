@extends('layouts.dashboard')

@section('title', 'Producenci')

@section('content')
    <table class="table table-striped">
        <thead class="thead-light">
          <tr>
            <th scope="col">Nazwa</th>
            <th scope="col">ilość gier:</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($producers as $producer)
            <tr>
                <td>{{ $producer->nazwa }}</td>
                <td>{{ $producer->gry->count() }}</td>
                <td><a class="btn btn-success" href="{{ action("Dashboard\Producers\ProducerEditController@showForm", $producer->id) }}">Edytuj</a></td>
                <td>@if($producer->gry->isEmpty())
                        <a  class="btn btn-danger" href="{{ action("Dashboard\Producers\ProducerRemoveController@remove", $producer->id) }}">Usun</a>
                    @endif</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" role="button" href="{{ action('Dashboard\Producers\ProducerAddController@showForm') }}">Dodaj Producentów!</a>
@endsection
