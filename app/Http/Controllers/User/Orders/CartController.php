<?php

namespace App\Http\Controllers\User\Orders;

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;

class CartController extends UserController
{
    public function index() {
        return view("user.orders.cart", ["koszyk" => Auth::user()->koszyk]);
    }
}
