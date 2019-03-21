<?php

namespace App\Http\Controllers\Dashboard\Genres;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Models\Gatunek;

class GenreRemoveController extends DashboardController
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
