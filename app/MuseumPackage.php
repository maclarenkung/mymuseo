<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MuseumPackage extends Model
{
    public function package()
    {
        return $this->belongsTo('App\Package');
    }
}
