<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faktura extends Model
{
    protected $table = "faktury";
    public $timestamps = false;

    public function uzytkownik()
    {
        return $this->belongsTo('App\Models\Uzytkownik');
    }
}
