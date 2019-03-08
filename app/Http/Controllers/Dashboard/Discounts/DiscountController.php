<?php

namespace App\Http\Controllers\Dashboard\Discounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

use App\Models\KodRabatowy;

class DiscountController extends DashBoardController
{
    public function index()
    {   
        $kody = KodRabatowy::all();

        return view("dashboard.discounts.index",["kody" => $kody]);
    }
}
