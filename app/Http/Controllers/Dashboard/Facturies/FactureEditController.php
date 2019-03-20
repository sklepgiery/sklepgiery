<?php

namespace App\Http\Controllers\Dashboard\Facturies;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\Faktura;

class FactureEditController extends DashBoardController
{
    public function showForm($id)
    {
        $faktura = Faktura::find($id);
        if (!$faktura) {
            
            $newFaktura = new Faktura;
            $newFaktura->uzytkownik_id = 1;
            $newFaktura->imie_nazwisko = "jan nowak";
            $newFaktura->adres = "test";
            $newFaktura->miasto = "Poznan";
            $newFaktura->kod_pocztowy = "60-300";
            $newFaktura->nazwa_firmy = "Przykładowa firma";
            $newFaktura->NIP = "1234567890";
            $newFaktura->wartosc = "99";


            $newFaktura->save();
            return redirect()->action("Dashboard\Facturies\FactureController@index");
        }
        return view("dashboard.facturies.edit", ["faktura" => $faktura]);
    }

    public function save(Request $request, $id)
    {
        $validatedData = $request->validate([
            'imie_nazwisko' => 'required',
            'adres' => 'required',
            'miasto' => 'required',
            'kod_pocztowy' => 'required',
            'nazwa_firmy' => 'required',
            'NIP' => 'required|numeric|digits:10',
        ]);

        $faktura = Faktura::find($id);

        if (!$faktura) {
            return redirect()->action("Dashboard\Facturies\FactureController@index");
        }

        $editFaktura = Faktura::find($id);
        $editFaktura->imie_nazwisko = $validatedData['imie_nazwisko'];
        $editFaktura->adres = $validatedData['adres'];
        $editFaktura->miasto = $validatedData['miasto'];
        $editFaktura->kod_pocztowy = $validatedData['kod_pocztowy'];
        $editFaktura->nazwa_firmy = $validatedData['nazwa_firmy'];
        $editFaktura->NIP = $validatedData['NIP'];

        $editFaktura->save();

        return redirect()->action("Dashboard\Facturies\FactureController@index");
    }
}
