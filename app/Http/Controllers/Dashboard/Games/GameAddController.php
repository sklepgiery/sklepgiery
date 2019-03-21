<?php

namespace App\Http\Controllers\Dashboard\Games;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashboardController;

use App\Models\Producent;
use App\Models\Gra;
use App\Models\Gatunek;
use Illuminate\Support\Facades\Storage;

class GameAddController extends DashboardController
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
            'zdjecie' => 'required|file|image',
            'gatunki' => 'required|array|exists:gatunki,id',
        ]);

        $newGra = new Gra;
        $newGra->nazwa = $validatedData["nazwa"];
        $newGra->cena = $validatedData["cena"];
        $newGra->opis = $validatedData["opis"];

        $newGra->zdjecie = $validatedData["zdjecie"];
        $newGra->producent()->associate($validatedData["producent"]);
        $newGra->zdjecie = "empty";
        $newGra->save();

        $newGra->gatunki()->attach($validatedData["gatunki"]);

        $sciezka = "miniatury/";
        Storage::putFileAs($sciezka, $request->file('zdjecie'), $newGra->id.".jpg");
        $newGra->zdjecie = $sciezka . $newGra->id.".jpg";

        $newGra->save();

        return view('dashboard.games.added');
    }
}
