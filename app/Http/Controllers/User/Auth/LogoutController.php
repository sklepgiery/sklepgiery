<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware("user.logged.in");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->action('User\Auth\LoginController@showForm');
    }

}
