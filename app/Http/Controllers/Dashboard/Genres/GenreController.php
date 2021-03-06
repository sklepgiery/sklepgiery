<?php

namespace App\Http\Controllers\Dashboard\Genres;

use App\Http\Controllers\Dashboard\DashboardController;

use App\Models\Gatunek;

class GenreController extends DashboardController
{
    public function index()
    {
        $gatuneks = Gatunek::with("gry")->get();
        return view("dashboard.genres.index", ['gatuneczeks' => $gatuneks]);
    }
}
