@extends('layouts.dashboard')

@section('title', 'Edytuj giereczké')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p>Edytujesz {{$game->nazwa}}</p>
    <form method="POST">
            @csrf
            Nazwa:<input type="text" name='nazwa' value="{{$game->nazwa}}"><br>
            Producent:<select name="producent">
                @foreach ($producenci as $producent)
                    <option 
                    value="{{$producent->id}}" 
                    @if($producent->id == $game->producent->id)
                    selected
                    @endif
                    >
                        {{ $producent->nazwa }}
                    </option>
                @endforeach
            </select><br>
            Opis:<input type="textarea" name='opis' value="{{$game->opis}}"><br>
            Cena:<input type="number" step="0.01" name='cena' value="{{$game->cena}}"><br>
            Zdjęcie:<input type="text" name='zdjecie' value="{{$game->zdjecie}}"><br>
            Gatunki: <select name="gatunki[]" multiple>
                @foreach($gatunki as $gatunek)
                <option value="{{$gatunek->id}}"
                    @if ($game->gatunki->contains($gatunek))
                    selected
                    @endif    
                >{{$gatunek->nazwa}}</option>
                @endforeach
            </select>
            <input type="submit" value='Zapisz Giere'>
        </form>

    <a href="{{ action('Dashboard\Games\GameController@index') }}">Nie chcesz edytować? nie ma problemu!</a>
@endsection