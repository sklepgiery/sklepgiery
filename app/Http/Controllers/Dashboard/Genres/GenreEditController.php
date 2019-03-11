<?php

namespace App\Http\Controllers\Dashboard\Genres;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;
use App\Models\Gatunek;

class GenreEditController extends DashBoardController
{
    public function showForm($id)
    {
        $genre = Gatunek::find($id);
        if (!$genre) {
            return redirect()->action("Dashboard\Genres\GenreController@index");
        }
        return view("dashboard.genres.edit", ["genre" => $genre]);
    }

    public function save(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nazwa' => 'required',
        ]);

        $genre = Gatunek::find($id);

        if (!$genre) {
            return redirect()->action("Dashboard\Genres\GenreController@index");
        }

        $genre->nazwa = $validatedData["nazwa"];
        $genre->save();

        return redirect()->action("Dashboard\Genres\GenreController@index");
    }
}
