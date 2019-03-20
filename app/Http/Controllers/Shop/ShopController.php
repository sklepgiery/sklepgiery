<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

use App\Models\Gra;

class ShopController extends Controller
{
    public function index()
    {
        $gry = Gra::all();
        return view("shop.index", ["gry" => $gry]);
    }
}
