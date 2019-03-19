@extends('layouts.dashboard')

@section('title', 'Edytuj użytkownika')

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
            <h2>Edytujesz {{$user->nick}}</h2>
            <div class="form-group">
                <label for="haslo">Hasło</label>
                <input type="password" class="form-control" id="haslo" name="password">
            </div>
            <div class="form-group">
                <label for="imie">Imie</label>
                <input type="text" class="form-control" id="imie" name="imie" value="{{$user->imie}}" required>
            </div>
            <div class="form-group">
                <label for="nazwisko">Nazwisko</label>
                <input type="text" class="form-control" id="nazwisko" name="nazwisko" value="{{$user->nazwisko}}" required>
            </div>
            <div class="form-group">
                <label for="plec">Płeć</label>
                <select class="custom-select" name="plec" id="plec" >
                    <option value="samica" @if($user->id == 1)
                            selected
                            @endif>Samica</option>
                    <option value="samiec" @if($user->id == 1)
                            selected
                            @endif>Samiec</option>
                </select>
            </div>
            <div class="form-group">
                <label for="data-ur">Data urodzenia</label>
                <input type="date" class="form-control" id="data-ur" name="data-ur"  value="{{$user->data_urodzenia}}" required>
            </div>
            <div class="form-group">
                <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="admin" id="admin" @if($user->admin)
                        checked
                        @endif>
                        <label class="form-check-label" for="admin">
                            Czy jesteś adminem? (proszę nie kłam)
                        </label>
                </div>
            </div>
            <input type="submit" class="btn btn-block btn-primary" value='Edytuj'>
        </form>

        <a href="{{ action('Dashboard\Users\UserController@index') }}">Nie chcesz edytować? nie ma problemu!</a>
    </div>
@endsection