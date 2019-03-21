<?php

namespace App\Http\Controllers\Dashboard\Producers;

use App\Http\Controllers\Dashboard\DashboardController;

use App\Models\Producent;

class ProducerController extends DashboardController
{
    public function index()
    {   
        $producers = Producent::with('gry')->get();
        return view("dashboard.producers.index", ['producers' => $producers]);
    }
}
