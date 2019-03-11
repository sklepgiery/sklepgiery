<?php

namespace App\Http\Controllers\Dashboard\Producers;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\Producent;

class ProducerEditController extends DashBoardController
{
    public function showForm($id)
    {
        $producer = Producent::find($id);
        if (!$producer) {
            return redirect()->action("Dashboard\Producers\ProducerController@index");
        }
        return view("dashboard.producers.edit", ["producer" => $producer]);
    }

    public function save(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nazwa' => 'required',
        ]);

        $producer = Producent::find($id);

        if (!$producer) {
            return redirect()->action("Dashboard\Producers\ProducerController@index");
        }

        $producer->nazwa = $validatedData["nazwa"];
        $producer->save();

        return redirect()->action("Dashboard\Producers\ProducerController@index");
    }
}
