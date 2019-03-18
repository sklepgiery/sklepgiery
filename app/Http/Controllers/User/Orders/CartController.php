<?php

namespace App\Http\Controllers\User\Orders;

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;

use App\Models\Gra;
use App\Models\Zamowienie;
use App\Models\Status;

class CartController extends UserController
{
    public function index() {
        return view("user.orders.cart", ["koszyk" => Auth::user()->koszyk]);
    }

    public function addGame($graId) {
        $gra = Gra::find($graId);
        if (! $gra) {
            return redirect()->back();
        }
        
        $user = Auth::user();

        $koszyk = $user->koszyk;
        if (! $koszyk) {
            $koszykStatus = Status::where("nazwa", "Koszyk")->first();
            $koszyk = new Zamowienie();

            $koszyk->uzytkownik()->associate($user);
            $koszyk->status()->associate($koszykStatus);
            $koszyk->wartosc = 0;
            $koszyk->save();
        }

        if (! $koszyk->gry->contains($gra)) {
            $koszyk->gry()->attach($gra);
        }

        return redirect()->action("User\Orders\CartController@index");
    }
}
