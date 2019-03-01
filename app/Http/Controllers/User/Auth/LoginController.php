<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nick', 'password');

        if (Auth::attempt($credentials)) {
            return "zalogowano";
        }
        else
        {
            return back()->withErrors(["credentials" => "Błędny login lub hasło"]);
        }
    }
}
