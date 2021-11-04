<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }
}
