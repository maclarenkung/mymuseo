<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Museum extends Model
{
    public function floors()
    {
        return $this->hasMany('App\Floor');
    }
}