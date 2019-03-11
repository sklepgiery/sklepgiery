<?php

namespace App\Http\Controllers\Dashboard\Games;

use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\Gra;

class GameController extends DashboardController
{
    public function index()
    {
        $gry = Gra::get();
        return view("dashboard.games.index", ['gry' => $gry]);
    }

    public function redirect($id)
    {
        return redirect()->action("Dashboard\Games\GameEditController@showForm", $id);
    }
}
