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
        ]);

        $code = KodRabatowy::find($id);

        if (!$code) {
            return redirect()->action("Dashboard\Discounts\DiscountController@index");
        }

        $code->nazwa = $validatedData["nazwa"];
        $code->save();

        return redirect()->action("Dashboard\Discounts\DiscountController@index");
    }
}
