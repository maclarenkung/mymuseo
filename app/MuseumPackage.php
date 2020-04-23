<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MuseumPackage extends Model
{
    protected $fillable = ['package_id', 'museum_id', 'expiry_date'];
    protected $casts = [
        'ex_text'  => 'date:d - m - y',
    ];
    protected $appends = ['ex_text'];
    
    public function package()
    {
        return $this->belongsTo('App\Package');
    }
    
    public function getExTextAttribute(){
        return $this->expiry_date;
    }

}
