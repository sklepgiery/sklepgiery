@extends('layouts.dashboard')

@section('title', 'Dodaj Grę')

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
        <div class="form-group">
            <label for="nazwa">Nazwa gry:</label>
            <input type="text" class="form-control" id="nazwa" name="nazwa" placeholder="Nazwa" required>
        </div>
        <div class="form-group">
            <label for="producent">Producent:</label>
            <select class="form-control" id="producent" name="producent">
            @foreach ($producenci as $producent)
                <option value="{{$producent->id}}">{{ $producent->nazwa }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cena">Opis:</label>
            <input type="text" class="form-control" id="opis" name="opis" placeholder="opis" required>
        </div>
        <div class="form-group">
            <label for="cena">Cena:</label>
            <input type="number" step="0.01" name='cena' class="form-control" id="cena" required>
        </div>
        <div class="form-group">
            <label for="zdjecie">Zdjęcie:</label>
            <input type="text" class="form-control" id="zdjecie" name="zdjecie" placeholder="sciezka.jpg" required>
        </div>
        <div class="form-group">
                <label for="gatunki">Gatunki:</label>
                <select class="form-control" id="gatunki" name="gatunki[]" multiple>
                    @foreach($gatunki as $gatunek)
                        <option value="{{$gatunek->id}}">{{$gatunek->nazwa}}</option>
                    @endforeach
                </select>
        </div>
        <input type="submit" class="btn btn-block btn-primary" value='Dodaj Giere'>
    </form>

    <a href="{{ action('Dashboard\Games\GameController@index') }}">Nie chcesz dodać? nie ma problemu!</a>
</div>
@endsection
