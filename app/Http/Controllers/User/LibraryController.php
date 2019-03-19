<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LibraryController extends UserController
{
    public function index()
    {
        return view('user.library');
    }
}
