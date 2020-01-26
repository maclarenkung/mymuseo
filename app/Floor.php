<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FloorTranslation;

class Floor extends Model
{
    public function museum()
    {
        return $this->belongsTo('App\Museum');
    }

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }
    protected $appends =  ['translation'];
    public function getTranslationAttribute()
    {
        $trans = FloorTranslation::where('floor_id', $this->id)->where('lang_id',  getLangSlugId())->first();
        return $trans;
    }
}
