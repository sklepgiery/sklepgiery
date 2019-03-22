<?php

namespace App\Http\Controllers\Dashboard\Discounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashboardController;

use App\Models\KodRabatowy;

class DiscountAddController extends DashboardController
{
    public function showForm()
    {
        return view('dashboard.discounts.add');
    }

    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'nazwa' => 'required|unique:kody_rabatowe,nazwa',
            'znizka_procentowo' => 'required|numeric|between:0,100',
            'data_rozpoczecia' => 'required|date',
            'data_zakonczenia' => 'required|date',
        ]);

        $newCode = new KodRabatowy;
        $newCode->nazwa = $validatedData["nazwa"];
        $newCode->znizka_procentowo = $validatedData["znizka_procentowo"];
        $newCode->data_rozpoczecia = $validatedData["data_rozpoczecia"];
        $newCode->data_zakonczenia = $validatedData["data_zakonczenia"];
        $newCode->save();

        return view('dashboard.discounts.added');
    }
}
