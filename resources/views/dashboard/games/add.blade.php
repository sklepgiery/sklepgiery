@extends('layouts.dashboard')

@section('title', 'Dodaj Grę')

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

    <form method="POST">
        @csrf
        Nazwa:<input type="text" name='nazwa'><br>
        Producent:<select name="producent">
            @foreach ($producenci as $producent)
                <option value="{{$producent->id}}">{{ $producent->nazwa }}</option>
            @endforeach
        </select><br>
        Opis:<input type="textarea" name='opis'><br>
        Cena:<input type="number" step="0.01" name='cena'><br>
        Zdjęcie:<input type="text" name='zdjecie'><br>
        <input type="submit" value='Dodaj Giere'>
    </form>

    <a href="{{ action('Dashboard\Games\GameController@index') }}">Nie chcesz dodać? nie ma problemu!</a>
@endsection