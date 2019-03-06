<?php

namespace App\Http\Controllers\Dashboard\Producers;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\Producent;

class ProducerAddController extends DashBoardController
{
    public function showForm()
    {
        return view('dashboard.producers.add');
    }

    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'nazwa' => 'required',
        ]);

        $newProducent = new Producent;
        $newProducent->nazwa = $validatedData["nazwa"];
        $newProducent->save();

        return view('dashboard.producers.added');
    }
}
