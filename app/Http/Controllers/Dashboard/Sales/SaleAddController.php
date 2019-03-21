<?php

namespace App\Http\Controllers\Dashboard\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashboardController;

use App\Models\Gra;
use App\Models\Promocja;

class SaleAddController extends DashboardController
{
    public function showForm()
    {
        $gry = Gra::all();

        return view('dashboard.sales.add', ['gry' => $gry]);
    }
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'gra_id' => 'required|exists:gry,id',
            'znizka_procentowo' => 'required|numeric',
            'data_rozpoczecia' => 'required|date',
            'data_zakonczenia' => 'required|date',
        ]);

        $newPromocja = new Promocja;
        $newPromocja->gra_id = $validatedData["gra_id"];
        $newPromocja->znizka_procentowo = $validatedData["znizka_procentowo"];
        $newPromocja->data_rozpoczecia = $validatedData["data_rozpoczecia"];
        $newPromocja->data_zakonczenia = $validatedData["data_zakonczenia"];
        
        $newPromocja->gra()->associate($validatedData["gra_id"]);
        $newPromocja->save();


        return view('dashboard.sales.added');
    }
}
