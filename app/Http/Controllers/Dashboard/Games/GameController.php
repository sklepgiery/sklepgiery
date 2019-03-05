<?php

namespace App\Http\Controllers\Dashboard\Games;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\Gra;

class GameController extends DashboardController
{
    public function index()
    {   
        $gry = Gra::all();
        return view("dashboard.games.index", ['gry' => $gry]);
    }
}
