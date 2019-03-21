<?php

namespace App\Http\Controllers\Dashboard\Discounts;

use App\Http\Controllers\Dashboard\DashboardController;

use App\Models\KodRabatowy;

class DiscountController extends DashboardController
{
    public function index()
    {
        $kody = KodRabatowy::all();

        return view("dashboard.discounts.index", ["kody" => $kody]);
    }
}
