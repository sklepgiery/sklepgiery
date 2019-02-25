<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gatunek extends Model
{
    protected $table = "gatunki";
    public $timestamps = false;

    public function gry()
    {
        return $this->belongsToMany('App\Models\Gra', 'gatunki_gry');
    }
}
