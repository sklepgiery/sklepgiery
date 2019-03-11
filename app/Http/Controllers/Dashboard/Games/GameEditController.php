<?php

namespace App\Http\Controllers\Dashboard\Games;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\Gra;
use App\Models\Producent;
use App\Models\Gatunek;


class GameEditController extends DashboardController
{
    public function showForm($id)
    {
        $game = Gra::find($id);
        if (!$game) {
            return redirect()->action("Dashboard\Games\GameController@index");
        }
        $producents = Producent::all();
        $genres = Gatunek::all();
        return view("dashboard.games.edit", ["game" => $game, 'producenci' => $producents, "gatunki" => $genres]);
    }

    public function save(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nazwa' => 'required',
            'producent' => 'required|exists:producenci,id',
            'cena' => 'required',
            'opis' => 'required',
            'zdjecie' => 'required',
            'gatunki' => 'required|array|exists:gatunki,id',
        ]);

        $game = Gra::find($id);

        if (!$game) {
            return redirect()->action("Dashboard\Games\GameController@index");
        }
        
        $game->nazwa = $validatedData["nazwa"];
        $game->cena = $validatedData["cena"];
        $game->opis = $validatedData["opis"];
        $game->zdjecie = $validatedData["zdjecie"];

        $game->producent()->associate($validatedData["producent"]);

        $game->save();

        $game->gatunki()->sync($validatedData["gatunki"]);

        return redirect()->action("Dashboard\Games\GameController@index");
    }
}
