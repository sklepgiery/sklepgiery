<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('user.register');
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
            ]
            'email' => 'required|unique:uzytkownicy,email|email',
            'data-ur' => 'required|date',
        ]);
        return "ok";    
    }
}
