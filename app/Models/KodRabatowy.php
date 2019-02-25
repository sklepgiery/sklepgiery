<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KodRabatowy extends Model
{
    protected $table = "kody_rabatowe";
    public $timestamps = false;

    public function zamowienia()
    {
        return $this->hasMany('App\Models\Zamowienia', 'kod_rabatowy_id');
    }
}
