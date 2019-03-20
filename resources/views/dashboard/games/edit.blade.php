@extends('layouts.dashboard')

@section('title', 'Edytuj giereczké')

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
                <label for="nazwa" >Nazwa gry:</label>
                <input type="text" value="{{$game->nazwa}}" class="form-control" id="nazwa" name="nazwa" placeholder="Nazwa" required>
            </div>
            <div class="form-group">
                <label for="producent">Producent:</label>
                <select class="form-control" id="producent" name="producent">
                @foreach ($producenci as $producent)
                    <option value="{{$producent->id}}" @if($producent->id == $game->producent->id)
                            selected
                            @endif>{{ $producent->nazwa }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cena">Opis:</label>
            <input type="text" class="form-control" value="{{$game->opis}}" id="opis" name="opis" placeholder="opis" required>
            </div>
            <div class="form-group">
                <label for="cena">Cena:</label>
                <input type="number" value={{$game->cena}} step="0.01" name='cena' class="form-control" id="cena" required>
            </div>
            <div class="form-group">
                <label for="zdjecie">Zdjęcie:</label>
                <input type="text" class="form-control" value="{{$game->zdjecie}}" id="zdjecie" name="zdjecie" placeholder="sciezka.jpg" required>
            </div>
            <div class="form-group">
                    <label for="gatunki">Gatunki:</label>
                    <select class="form-control" id="gatunki" name="gatunki[]" multiple>
                        @foreach($gatunki as $gatunek)
                            <option value="{{$gatunek->id}}" @if ($game->gatunki->contains($gatunek))
                                    selected
                                    @endif    >{{$gatunek->nazwa}}</option>
                        @endforeach
                    </select>
            </div>
            <input type="submit" class="btn btn-block btn-primary" value='Edytuj'>
        </form>
    
        <a href="{{ action('Dashboard\Games\GameController@index') }}">Nie chcesz dodać? nie ma problemu!</a>
    
@endsection