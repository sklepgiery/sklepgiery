<?php

namespace App\Http\Controllers\Dashboard\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

use App\models\Promocja;

class SaleController extends DashBoardController
{
    public function index()
    {
        $promocje = Promocja::all();
        return view("dashboard.sales.index", ['promocje' => $promocje]);
    }
}
