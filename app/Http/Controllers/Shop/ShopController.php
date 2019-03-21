<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

use App\Models\Gra;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input("wyszukano");

        $gry = null;
        if ($query) {
            $gry = Gra::where("nazwa", "like", "%$query%")->get();
        } else {
            $gry = Gra::all();
        }
        
        return view("shop.index", ["gry" => $gry, "wyszukano" => $query]);
    }
}
