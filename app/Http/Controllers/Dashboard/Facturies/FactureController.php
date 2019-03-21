<?php

namespace App\Http\Controllers\Dashboard\Facturies;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashboardController;

use App\Models\Faktura;

class FactureController extends DashboardController
{
    public function index()
    {
        $faktury = Faktura::all();

        return view("dashboard.facturies.index", ["faktury" => $faktury]);
    }
}
