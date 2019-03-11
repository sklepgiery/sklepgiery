<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gra extends Model
{
    protected $table = "gry";
    public $timestamps = false;
    
    public function producent()
    {
        return $this->belongsTo('App\Models\Producent');
    }

    public function promocje()
    {
        return $this->hasMany('App\Models\Promocja');
    }

    public function gatunki()
    {
        return $this->belongsToMany('App\Models\Gatunek', 'gatunki_gry');
    }

    public function zamowienia()
    {
        return $this->belongsToMany('App\Models\Zamowienie', 'elementy_zamowienia');
    }

    //TODO
    public function getCurrentPriceAttribute() {

    }
}