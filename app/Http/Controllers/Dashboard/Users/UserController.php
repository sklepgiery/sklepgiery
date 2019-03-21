<?php

namespace App\Http\Controllers\Dashboard\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashboardController;

use App\Models\Uzytkownik;

class UserController extends DashboardController
{
    public function index()
    {   
        $users = Uzytkownik::all();
        return view("dashboard.users.index", ['users' => $users]);
    }
}
