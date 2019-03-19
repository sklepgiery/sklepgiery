@extends('layouts.user') 
@section('title', 'Zaloguj się') 
@section('content')
<div class="col-md-4 m-auto card p-3">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form method="POST">
    @csrf
    <h2 class="text-center">Zaloguj się</h2>
    <div class="form-group">
      <label for="nick">Nick</label>
      <input type="text" class="form-control" id="nick" name="nick" placeholder="Nick" required>
    </div>
    <div class="form-group">
      <label for="password">Hasło</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Hasło" required>
    </div>
    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember" id="zap">
        <label class="form-check-label" for="zap">
          Zapamiętaj mnie
        </label>
      </div>
    </div>
    <button type="submit" class="btn btn-block btn-primary">Wyślij</button>
  </form>
  <div class="m-auto pt-2">
    <a href="{{ action('User\Auth\RegisterController@showForm') }}">Nie masz konta? Zarejestruj się!</a>
  </div>
</div>
@endsection