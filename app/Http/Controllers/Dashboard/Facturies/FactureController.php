<?php

namespace App\Http\Controllers\Dashboard\Facturies;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\Faktura;

class FactureController extends DashBoardController
{
    public function index()
    {
        $faktury = Faktura::all();

        return view("dashboard.facturies.index", ["faktury" => $faktury]);
    }
}
