<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
}
