<?php

namespace App\Http\Controllers\Dashboard\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\Uzytkownik;

class UserController extends DashBoardController
{
    public function index()
    {   
        $users = Uzytkownik::all();
        return view("dashboard.users.index", ['users' => $users]);
    }
}
