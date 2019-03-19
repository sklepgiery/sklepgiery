<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Status;
use App\Models\Zamowienie;

class Uzytkownik extends Authenticatable
{
    use Notifiable;

    protected $table = "uzytkownicy";
    public $timestamps = false;

    public function faktury()
    {
        return $this->hasMany('App\Models\Faktura');
    }

    public function zamowienia()
    {
        return $this->hasMany('App\Models\Zamowienie');
    }

    public function getKoszykAttribute()
    {
        $koszykStatus = Status::where("nazwa", "Koszyk")->first();
        $koszyk = Zamowienie::where([
            ["status_id", $koszykStatus->id],
            ["uzytkownik_id", $this->id]
            ])->first();

        return $koszyk;
    }

    public function getGryAttribute() {
        $gotoweStatus = Status::where("nazwa", "Gotowe")->first();

        $gry = [];

        $zamowienia = Zamowienie::with("gry")->where([
            ["status_id", $gotoweStatus->id],
            ["uzytkownik_id", $this->id]
            ])->get();


        foreach ($zamowienia as $zamowienie) {
            foreach ($zamowienie->gry as $gra) {
                array_push($gry, $gra);
            }
        }

        return collect($gry);
    }
}
