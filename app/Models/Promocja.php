<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Promocja extends Model
{
    protected $table = "promocje";
    public $timestamps = false;

    public function gra()
    {
        return $this->belongsTo('App\Models\Gra');
    }
}
