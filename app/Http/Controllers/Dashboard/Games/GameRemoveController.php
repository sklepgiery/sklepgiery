<?php

namespace App\Http\Controllers\Dashboard\Games;

use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\Gra;

class GameRemoveController extends DashboardController
{
    public function remove($id)
    {
        $game = Gra::find($id);
        
        if (!$game) {
            return redirect()->back();
        }

        $game->delete();
        return redirect()->back();
    }
}
