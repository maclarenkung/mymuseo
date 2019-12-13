<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function floor()
    {
        return $this->belongsTo('App\Floor');
    }
    public function items()
    {
        return $this->hasMany('App\Item');
    }
}