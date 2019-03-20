<?php

namespace App\Http\Controllers\Dashboard\Discounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\KodRabatowy;

class DiscountEditController extends DashBoardController
{
    public function showForm($id)
    {
        $code = KodRabatowy::find($id);
        if (!$code) {
            return redirect()->action("Dashboard\Discounts\DiscountController@index");
        }
        return view("dashboard.discounts.edit", ["code" => $code]);
    }

    public function save(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nazwa' => 'required',
            'znizka_procentowo' => 'required|numeric',
            'data_rozpoczecia' => 'required|date',
            'data_zakonczenia' => 'required|date',
        ]);

        $code = KodRabatowy::find($id);

        if (!$code) {
            return redirect()->action("Dashboard\Discounts\DiscountController@index");
        }

        $code->nazwa = $validatedData["nazwa"];
        $code->znizka_procentowo = $validatedData["znizka_procentowo"];
        $code->data_rozpoczecia = $validatedData["data_rozpoczecia"];
        $code->data_zakonczenia = $validatedData["data_zakonczenia"];

        $code->save();

        return redirect()->action("Dashboard\Discounts\DiscountController@index");
    }
}
