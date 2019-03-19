<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Producent;
use App\Models\Gra;
use App\Models\Gatunek;
use App\Models\KodRabatowy;
use App\Models\Faktura;
use App\Models\Status;
use App\Models\Uzytkownik;
use App\Models\Zamowienie;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware("user.is.admin");
    }

    public function index()
    {
        $producent = Producent::count();
        $gra = Gra::count();
        $gatunek = Gatunek::count();
        $kodRabatowy = KodRabatowy::count();
        $faktura = Faktura::count();
        $status = Status::count();
        $zamowienie = Zamowienie::count();
        $uzytkownik = Uzytkownik::count();

        return view("dashboard.index", 
        ["producent" => $producent, 
        "gra" => $gra,
        "gatunek" => $gatunek, 
        "kodRabatowy" => $kodRabatowy, 
        "faktura" => $faktura, 
        "status" => $status,
        "zamowienie" => $zamowienie,
        "uzytkownik" => $uzytkownik]);
    }
}
