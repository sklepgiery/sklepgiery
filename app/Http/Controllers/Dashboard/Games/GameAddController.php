<?php

namespace App\Http\Controllers\Dashboard\Games;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\Producent;
use App\Models\Gra;
use App\Models\Gatunek;

class GameAddController extends DashBoardController
{
    public function showForm()
    {
        $producent = Producent::all();
        $gatunki = Gatunek::all();

        return view('dashboard.games.add', ['producenci' => $producent, 'gatunki' => $gatunki]);
    }
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'nazwa' => 'required',
            'producent' => 'required|exists:producenci,id',
            'cena' => 'required|numeric',
            'opis' => 'required',
            'zdjecie' => 'required',
            'gatunki' => 'required|array|exists:gatunki,id',
        ]);

        $newGra = new Gra;
        $newGra->nazwa = $validatedData["nazwa"];
        $newGra->cena = $validatedData["cena"];
        $newGra->opis = $validatedData["opis"];
        $newGra->zdjecie = $validatedData["zdjecie"];

        $newGra->producent()->associate($validatedData["producent"]);

        $newGra->save();

        $newGra->gatunki()->attach($validatedData["gatunki"]);

        return view('dashboard.games.added');
    }
}
