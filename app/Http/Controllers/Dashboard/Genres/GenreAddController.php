<?php

namespace App\Http\Controllers\Dashboard\Genres;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\Gatunek;

class GenreAddController extends DashBoardController
{
    public function showForm()
    {
        return view('dashboard.genres.add');
    }
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'nazwa' => 'required',
        ]);

        $newGatunek = new Gatunek;
        $newGatunek->nazwa = $validatedData["nazwa"];
        $newGatunek->save();

        return view('dashboard.genres.added');
    }
}
