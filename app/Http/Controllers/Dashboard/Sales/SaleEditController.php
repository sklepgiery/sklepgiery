<?php

namespace App\Http\Controllers\Dashboard\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashboardController;

use App\models\Promocja;
use App\models\Gra;

class SaleEditController extends DashboardController
{
    public function showForm($id)
    {
        $promocja = Promocja::find($id);
        if (!$promocja) {
            return redirect()->action("Dashboard\Sales\SaleController@index");
        }
        $gry = Gra::all();
        
        return view("dashboard.sales.edit", ["promocja" => $promocja, "gry" => $gry]);
    }

    public function save(Request $request, $id)
    {
        $validatedData = $request->validate([
            'gra_id' => 'required|exists:gry,id',
            'znizka_procentowo' => 'required|numeric|between:0,100',
            'data_rozpoczecia' => 'required|date',
            'data_zakonczenia' => 'required|date',
        ]);

        $promocja = Promocja::find($id);

        if (!$promocja) {
            return redirect()->action("Dashboard\Sales\SaleController@index");
        }
        
        $promocja->gra_id = $validatedData["gra_id"];
        $promocja->znizka_procentowo = $validatedData["znizka_procentowo"];
        $promocja->data_rozpoczecia = $validatedData["data_rozpoczecia"];
        $promocja->data_zakonczenia = $validatedData["data_zakonczenia"];

        $promocja->gra()->associate($validatedData["gra_id"]);

        $promocja->save();

        return redirect()->action("Dashboard\Sales\SaleController@index");
    }
}
