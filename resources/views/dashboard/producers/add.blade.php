@extends('layouts.dashboard')

@section('title', 'Dodaj Prodcenta')

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
                <label for="name">Nazwa producenta:</label>
                <input type="text" class="form-control" id="name" name="nazwa" placeholder="Nazwa" required>
            </div>
            <input type="submit" class="btn btn-block btn-primary" value='Dodaj Producencika'>
        </form>

        <a href="{{ action('Dashboard\Producers\ProducerController@index') }}">Nie chcesz dodać? nie ma problemu!</a>
    </div>
@endsection