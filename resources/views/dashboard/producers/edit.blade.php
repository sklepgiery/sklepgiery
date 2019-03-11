@extends('layouts.dashboard')

@section('title', 'Edytuj producenta')

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

    <p>Edytujesz {{$producer->nazwa}}</p>
    <form method="POST">
        @csrf
        Nazwa:<input type="text" name='nazwa' value="{{$producer->nazwa}}"><br>
        <input type="submit" value='Zapisz Producencika'>
    </form>

    <a href="{{ action('Dashboard\Producers\ProducerController@index') }}">Nie chcesz edytować? nie ma problemu!</a>
@endsection