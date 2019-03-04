<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//use App\Models\Producent;
use App\Models\Gra;

class GameController extends DashboardController
{
    public function index()
    {   
        $gry = Gra::all();
        /*$producent = new Producent;
        $producent->nazwa = "HAhaton kompany";
        $producent->save();
        $gra = new Gra;
        $gra->producent_id = 1;
        $gra->nazwa = "ten projekt to zart 2: zaginiecie michala";
        $gra->opis = "terefere sam jak palec a na spotify all by myself";
        $gra->cena = 20.69;
        $gra->zdjecie = "zdj.png";
        $gra->save();
        dd($gra);*/
        return view("user.auth.dashboard",['gry' => $gry]);
    }
}
