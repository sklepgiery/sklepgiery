<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

use App\Models\Gra;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $gry = Gra::all();

        dd($gry->contains($gry[0]));
        return view("shop.index", ["gry" => $gry]);
    }
}
