<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MuseumPackage extends Model
{
    protected $fillable = ['package_id', 'museum_id', 'expiry_date'];
    protected $casts = [
        'expiry_date'  => 'date:d - m - y',
    ];
    public function package()
    {
        return $this->belongsTo('App\Package');
    }
}
