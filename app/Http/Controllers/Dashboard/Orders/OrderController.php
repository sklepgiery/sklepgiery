<?php

namespace App\Http\Controllers\Dashboard\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashboardController;

use App\Models\Zamowienie;

class OrderController extends DashboardController
{
    public function index()
    {
        $zamowienia = Zamowienie::all();
        return view("dashboard.orders.index", ['zamowienia' => $zamowienia]);
    }
}
