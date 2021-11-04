<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function plates()
    {
        return $this->belongsToMany('App\Models\Plate');
    }
}
