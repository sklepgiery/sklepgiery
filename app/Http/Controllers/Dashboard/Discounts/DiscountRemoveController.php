<?php

namespace App\Http\Controllers\Dashboard\Discounts;

use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\KodRabatowy;

class DiscountRemoveController extends DashBoardController
{
    public function remove($id)
    {
        $code = KodRabatowy::find($id);

        if (!$code) {
            return redirect()->back();
        }

        $code->delete();
        return redirect()->back();
    }
}
