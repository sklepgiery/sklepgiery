<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Gra;

class GameController extends DashboardController
{
    public function index()
    {   
        $gry = Gra::all();
        return view("user.auth.dashboard",['gry' => $gry]);
    }
}
