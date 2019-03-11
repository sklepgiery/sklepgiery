<?php

namespace App\Http\Controllers\Dashboard\Genres;

use App\Http\Controllers\Dashboard\DashBoardController;
use App\Models\Gatunek;

class GenreRemoveController extends DashBoardController
{
    public function remove($id)
    {
        $genre = Gatunek::find($id);
        
        if (!$genre) {
            return redirect()->back();
        }

        $genre->delete();
        return redirect()->back();
    }
}
