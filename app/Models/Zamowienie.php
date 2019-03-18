<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zamowienie extends Model
{
    protected $table = "zamowienia";
    public $timestamps = false;

    public function uzytkownik()
    {
        return $this->belongsTo('App\Models\Uzytkownik');
    }

    public function faktura()
    {
        return $this->belongsTo('App\Models\Faktura');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function kodRabatowy()
    {
        return $this->belongsTo('App\Models\KodRabatowy', 'kod_rabatowy_id');
    }

    public function gry()
    {
        return $this->belongsToMany('App\Models\Gra', 'elementy_zamowienia');
    }
}
