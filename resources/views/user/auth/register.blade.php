@extends('layouts.user') 
@section('title', 'Zarejestruj się') 
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
    <h2 class="text-center">Zarejestruj się</h2>
    <div class="form-group">
      <label for="nick">Nick</label>
      <input type="text" class="form-control" id="nick" name="nick" placeholder="Nick" required>
    </div>
    <div class="form-group">
      <label for="password">Hasło</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Hasło" required>
    </div>
    <div class="form-group">
      <label for="imie">Imię</label>
      <input type="text" class="form-control" id="imie" name="imie" placeholder="Imię" required>
    </div>
    <div class="form-group">
      <label for="nazwisko">Nazwisko</label>
      <input type="text" class="form-control" id="nazwisko" name="nazwisko" placeholder="Nazwisko" required>
    </div>
    <div class="form-group">
      <label for="nazwisko">E-Mail</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail" required>
    </div>
    <div class="form-group">
      <label for="plec">Płeć</label>
      <select class="custom-select" name="plec" id="plec">
          <option value="samica">Samica</option>
          <option value="samiec">Samiec</option>
      </select>
    </div>
    <div class="form-group">
      <label for="data-ur">Data urodzenia</label>
      <input type="date" class="form-control" id="data-ur" name="data-ur" required>
    </div>
    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="admin" id="admin">
        <label class="form-check-label" for="admin">
            Czy jesteś adminem? (proszę nie kłam)
        </label>
      </div>
    </div>
    <button type="submit" class="btn btn-block btn-primary">Wyślij</button>
  </form>
  <div class="m-auto pt-2">
    <a href="{{ action('User\Auth\LoginController@showForm') }}">Masz konto? Zaloguj się!</a>
  </div>
</div>
@endsection