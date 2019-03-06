<?php

namespace App\Http\Controllers\Dashboard\Genres;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\Gatunek;

class GenreController extends DashBoardController
{
    public function index()
    {   
        $gatuneks = Gatunek::all();
        return view("dashboard.genres.index", ['gatuneczeks' => $gatuneks]);
    }
}
