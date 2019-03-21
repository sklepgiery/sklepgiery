<?php

namespace App\Http\Controllers\User\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;

use App\Models\Gra;
use App\Models\Zamowienie;
use App\Models\Status;
use App\Models\KodRabatowy;
use App\Models\Faktura;

class CartController extends UserController
{
    public function index()
    {
        return view("user.orders.cart", ["koszyk" => Auth::user()->koszyk]);
    }

    public function addGame($graId)
    {
        $gra = Gra::find($graId);
        if (!$gra) {
            return redirect()->back();
        }

        $user = Auth::user();
        $koszyk = $user->koszyk;

        if (!$koszyk) {
            $koszykStatus = Status::where("nazwa", "Koszyk")->first();
            $koszyk = new Zamowienie();

            $koszyk->uzytkownik()->associate($user);
            $koszyk->status()->associate($koszykStatus);
            $koszyk->wartosc = 0;
            $koszyk->save();
        }

        if ($user->can("buy", $gra)) {
            $koszyk->gry()->attach($gra);
        }

        return redirect()->back();
    }

    public function removeGame($graId)
    {
        $gra = Gra::find($graId);
        if (!$gra) {
            return redirect()->back();
        }

        $user = Auth::user();
        $koszyk = $user->koszyk;

        if (!$koszyk) {
            return redirect()->back();
        }

        if ($koszyk->gry->contains($gra)) {
            $koszyk->gry()->detach($gra);
        }

        return redirect()->back();
    }

    public function addDiscountCode(Request $request)
    {
        $user = Auth::user();
        $koszyk = $user->koszyk;

        if (!$koszyk || $koszyk->kodRabatowy) {
            return redirect()->back();
        }

        $kod = KodRabatowy::where("nazwa", $request->input("code"))->first();

        $now = strtotime("now");

        if (!$kod || strtotime($kod->data_rozpoczecia) > $now || strtotime($kod->data_zakonczenia) < $now) {
            return redirect()->back()->withErrors(["discount-code" => "Błędny kod rabatowy"]);
        }

        $koszyk->kodRabatowy()->associate($kod);
        $koszyk->save();

        return redirect()->back();
    }

    public function removeDiscountCode()
    {
        $user = Auth::user();
        $koszyk = $user->koszyk;

        if (!$koszyk || !$koszyk->kodRabatowy) {
            return redirect()->back();
        }

        $koszyk->kodRabatowy()->dissociate();
        $koszyk->save();

        return redirect()->back();
    }

    public function addInvoice()
    {
        $user = Auth::user();
        $koszyk = $user->koszyk;

        if (!$koszyk || $koszyk->faktura) {
            return redirect()->back();
        }

        $pustaFaktura = new Faktura;
        $pustaFaktura->uzytkownik()->associate($user);
        $pustaFaktura->imie_nazwisko = "";
        $pustaFaktura->adres = "";
        $pustaFaktura->miasto = "";
        $pustaFaktura->kod_pocztowy = "";
        $pustaFaktura->nazwa_firmy = "";
        $pustaFaktura->NIP = "";
        $pustaFaktura->wartosc = 0;

        $pustaFaktura->save();
        $koszyk->faktura()->associate($pustaFaktura);
        $koszyk->save();

        return redirect()->back();
    }

    public function editInvoice(Request $request)
    {
        $user = Auth::user();
        $koszyk = $user->koszyk;

        if (!$koszyk || !$koszyk->faktura) {
            return redirect()->back();
        }

        $validatedData = $request->validate([
            'imie_nazwisko' => 'required',
            'adres' => 'required',
            'miasto' => 'required',
            'kod_pocztowy' => 'required',
            'nip' => 'required',
            'nazwa_firmy' => 'required',
        ]);

        $faktura = $koszyk->faktura;
        $faktura->imie_nazwisko = $validatedData["imie_nazwisko"];
        $faktura->adres = $validatedData["adres"];
        $faktura->miasto = $validatedData["miasto"];
        $faktura->kod_pocztowy = $validatedData["kod_pocztowy"];
        $faktura->nazwa_firmy = $validatedData["nazwa_firmy"];
        $faktura->NIP = $validatedData["nip"];
        $faktura->wartosc = 0;

        $faktura->save();

        return redirect()->back();
    }

    public function removeInvoice()
    {
        $user = Auth::user();
        $koszyk = $user->koszyk;

        if (!$koszyk || !$koszyk->faktura) {
            return redirect()->back();
        }

        $faktura = $koszyk->faktura;
        $koszyk->faktura()->dissociate();
        $koszyk->save();
        $faktura->delete();  

        return redirect()->back();
    }

    public function end()
    {
        $user = Auth::user();
        $koszyk = $user->koszyk;

        if (!$koszyk) {
            return redirect()->back();
        }

        if ($koszyk->kodRabatowy) {
            $koszyk->wartosc = round($koszyk->gry->sum("currentPrice") * ((100 - $koszyk->kodRabatowy->znizka_procentowo) / 100), 2);
        } else {
            $koszyk->wartosc = round($koszyk->gry->sum("currentPrice"), 2);
        }

        $faktura = $koszyk->faktura;
        if ($faktura) {
            if ($faktura->imie_nazwisko == "") {
                return redirect()->back()->withErrors(["faktura"=> "Prosimy o wypełnienie faktury i kliknięcie przycisku zapisz fakturę"]);
            }
            $faktura->wartosc = $koszyk->wartosc;
            $faktura->save();
        }

        $paidStatus = Status::where("nazwa", "Gotowe")->first();
        $koszyk->status()->associate($paidStatus);
        $koszyk->save();

        return view("user.orders.paid");
    }
}
