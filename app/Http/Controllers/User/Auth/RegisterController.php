<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use App\Models\Uzytkownik;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware("user.logged.in");
    }

    public function showForm()
    {
        return view('user.auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nick' => 'required|unique:uzytkownicy,nick',
            'password' => 'required',
            'imie' => 'required',
            'nazwisko' => 'required',
            'plec' => [
                'required',
                Rule::in(['samica', 'samiec']),    
            ],
            'email' => 'required|unique:uzytkownicy,email|E-Mail',
            'data-ur' => 'required|date|before:today',
            'admin' => 'nullable'
        ]);

        $nowyCzlonekKlanu = new Uzytkownik;
        $nowyCzlonekKlanu->nick = $validatedData["nick"];
        $nowyCzlonekKlanu->haslo = Hash::make($validatedData["password"]);
        $nowyCzlonekKlanu->imie = $validatedData["imie"];
        $nowyCzlonekKlanu->nazwisko = $validatedData["nazwisko"];
        $nowyCzlonekKlanu->plec = $validatedData["plec"];
        $nowyCzlonekKlanu->email = $validatedData["email"];
        $nowyCzlonekKlanu->data_urodzenia = $validatedData["data-ur"];

        if (isset($validatedData["admin"])) {
            $nowyCzlonekKlanu->admin = true;
        } else {
            $nowyCzlonekKlanu->admin = false;
        }

        $nowyCzlonekKlanu->save();

        return view('user.auth.registered');
    }
}
