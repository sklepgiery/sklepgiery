@extends('layouts.dashboard')

@section('title', 'Edytuj Gatuneczek')

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

    <p>Edytujesz {{$genre->nazwa}}</p>
    <form method="POST">
        @csrf
        Nazwa:<input type="text" name='nazwa' value="{{$genre->nazwa}}"><br>
        <input type="submit" value='Zapisz Gatuneczek'>
    </form>

    <a href="{{ action('Dashboard\Genres\GenreController@index') }}">Nie chcesz edytować? nie ma problemu!</a>
@endsection