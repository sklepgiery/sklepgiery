<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producent extends Model
{
    protected $table = "producenci";
    public $timestamps = false;

    public function gry()
    {
        return $this->hasMany('App\Models\Gra');
    }
}
