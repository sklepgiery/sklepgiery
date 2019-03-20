<?php

namespace App\Http\Controllers\Dashboard\Facturies;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\Faktura;

class FactureRemoveController extends DashBoardController
{
    public function remove($id)
    {
        $faktura = Faktura::find($id);

        if (!$faktura) {
            return redirect()->back();
        }
        $faktura->zamowienia[0]->faktura()->dissociate();
        $faktura->zamowienia[0]->save();
        $faktura->delete();

        return redirect()->back();
    }
}
