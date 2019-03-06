@extends('layouts.dashboard')

@section('title', 'Dodaj Prodcenta')

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
        <input type="submit" value='Dodaj Producencika'>
    </form>

    <a href="{{ action('Dashboard\Producers\ProducerController@index') }}">Nie chcesz dodać? nie ma problemu!</a>
@endsection