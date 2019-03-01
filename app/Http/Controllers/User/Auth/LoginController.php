<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware("user.not.logged.in");
    }

    public function showForm()
    {
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'nick' => 'required',
            'password' => 'required',
        ]);
        $credentials = [
            "nick"=>$validatedData["nick"],
            "password"=>$validatedData["password"]
        ];
        if (Auth::attempt($credentials)) {
            return redirect()->action('User\UserController@index');
        }
        else {
            return back()->withErrors(["credentials" => "Błędny login lub hasło"]);
        }
    }
}
