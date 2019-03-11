<?php

namespace App\Http\Controllers\Dashboard\Producers;

use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\Producent;

class ProducerController extends DashBoardController
{
    public function index()
    {   
        $producers = Producent::with('gry')->get();
        return view("dashboard.producers.index", ['producers' => $producers]);
    }

    public function redirect($id)
    {   
        return redirect()->action("Dashboard\Genres\ProducerEditController@showForm", $id);
    }
}
