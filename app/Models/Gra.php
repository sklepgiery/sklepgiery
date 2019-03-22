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

    public function getCurrentSaleAttribute()
    {
        $lastSale = $this->promocje->last();
        if (! $lastSale) {
            return null;
        }

        $now = strtotime("now");
        if (strtotime($lastSale->data_rozpoczecia) < $now && strtotime($lastSale->data_zakonczenia) > $now) {
            return $lastSale;
        } else {
            return null;
        }
    }

    public function getCurrentPriceAttribute()
    {
        $currentSale = $this->currentSale;
        if (! $currentSale) {
            return $this->cena;
        }

        $cena = $this->cena * ((100 - $currentSale->znizka_procentowo) / 100);

        return round($cena, 2);
    }
}