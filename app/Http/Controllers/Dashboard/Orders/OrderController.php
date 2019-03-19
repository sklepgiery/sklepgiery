<?php

namespace App\Http\Controllers\Dashboard\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\Zamowienie;

class OrderController extends DashBoardController
{
    public function index()
    {
        $zamowienia = Zamowienie::all();
        return view("dashboard.orders.index", ['zamowienia' => $zamowienia]);
    }
}
