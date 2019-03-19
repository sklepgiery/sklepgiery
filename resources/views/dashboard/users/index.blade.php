@extends('layouts.dashboard')

@section('title', 'Producenci')

@section('content')
    <table class="table table-striped">
        <thead class="thead-light">
          <tr>
            <th scope="col">nick</th>
            <th scope="col">haslo</th>
            <th scope="col">imie</th>
            <th scope="col">nazwisko</th>
            <th scope="col">email</th>
            <th scope="col">plec</th>
            <th scope="col">data urodzenia</th>
            <th scope="col">Czy admin</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->nick }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ $user->imie }}</td>
                <td>{{ $user->nazwisko }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->plec }}</td>
                <td>{{ $user->data_urodzenia }}</td>
                <td>
                @if($user->admin)
                    Tak
                @endif</td>
                <td><a class="btn btn-success" href="{{ action("Dashboard\Users\UserEditController@showForm", $user->id) }}">Edytuj</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
