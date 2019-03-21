<?php

namespace App\Http\Controllers\Dashboard\Producers;

use App\Http\Controllers\Dashboard\DashboardController;

use App\Models\Producent;

class ProducerRemoveController extends DashboardController
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
