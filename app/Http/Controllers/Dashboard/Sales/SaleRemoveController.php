<?php

namespace App\Http\Controllers\Dashboard\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashboardController;

use App\models\Promocja;

class SaleRemoveController extends DashboardController
{
    public function remove($id)
    {
        $promocja = Promocja::find($id);

        if (!$promocja) {
            return redirect()->back();
        }

        $promocja->delete();
        return redirect()->back();
    }
}
