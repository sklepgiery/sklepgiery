<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nick', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return "zalogowano";
        }
        else
        {
            return back()->with("loginError", true);
        }
    }
}
