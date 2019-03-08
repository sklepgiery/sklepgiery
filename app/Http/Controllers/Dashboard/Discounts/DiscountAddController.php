<?php

namespace App\Http\Controllers\Dashboard\Discounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

class DiscountAddController extends DashBoardController
{
    public function showForm()
    {
        return view('dashboard.games.add');
    }
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'nazwa' => 'required',
            'producent' => 'required|exists:producenci,id',
            'cena' => 'required',
            'opis' => 'required',
            'zdjecie' => 'required',
        ]);

        $newGra = new Gra;
        $newGra->nazwa = $validatedData["nazwa"];
        $newGra->cena = $validatedData["cena"];
        $newGra->opis = $validatedData["opis"];
        $newGra->zdjecie = $validatedData["zdjecie"];

        $newGra->producent()->associate($validatedData["producent_id"]);

        $newGra->save();

        return view('dashboard.games.added');
    }
}
