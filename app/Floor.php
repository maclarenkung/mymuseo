<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    public function museum()
    {
        return $this->belongsTo('App\Museum');
    }
}