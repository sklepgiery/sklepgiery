<?php

namespace App\Http\Controllers\Dashboard\Games;

use App\Http\Controllers\Dashboard\DashboardController;

use App\Models\Gra;

class GameController extends DashboardController
{
    public function index()
    {
        $gry = Gra::get();
        return view("dashboard.games.index", ['gry' => $gry]);
    }
}
