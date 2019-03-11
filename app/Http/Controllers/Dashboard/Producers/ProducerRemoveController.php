<?php

namespace App\Http\Controllers\Dashboard\Producers;

use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\Producent;

class ProducerRemoveController extends DashBoardController
{
    public function remove($id)
    {
        $producer = Producent::find($id);

        if (!$producer) {
            return redirect()->back();
        }

        $producer->delete();
        return redirect()->back();
    }
}
