<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "statusy";
    public $timestamps = false;

    public function zamowienia()
    {
        return $this->hasMany('App\Models\Zamowienia');
    }
}
