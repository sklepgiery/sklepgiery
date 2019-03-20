<?php

namespace App\Http\Controllers\User\Orders;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LibraryController extends UserController
{
    public function index()
    {
        $user = Auth::user();
        $gry = $user->gry;
        return view('user.orders.library', ["gry" => $gry]);
    }
}
