<?php

namespace App\Http\Controllers\Dashboard\Games;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\Producent;
use App\Models\Gra;

class GameAddController extends DashBoardController
{
    public function showForm()
    {
        $producent = Producent::all();
        return view('dashboard.games.addGame', ['producenci' => $producent]);
    }
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'nazwa' => 'required',
            'producent_id' => 'required|exists:producenci,id',
            'cena' => 'required',
            'opis' => 'required',
            'zdjecie' => 'required',
        ]);
        $newGra = new Gra;
        $newGra->nazwa = $validatedData["nazwa"];
        $newGra->producent_id = $validatedData["producent_id"];
        $newGra->cena = $validatedData["cena"];
        $newGra->opis = $validatedData["opis"];
        $newGra->zdjecie = $validatedData["zdjecie"];
        
        $newGra->save();

        return view('dashboard.games.addedGame');
    }
}
