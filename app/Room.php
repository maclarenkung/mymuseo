<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RoomTranslation;

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
    protected $appends =  ['translation'];
    public function getTranslationAttribute()
    {
        $trans = RoomTranslation::where('room_id', $this->id)->where('lang_id',  getLangSlugId())->first();
        return $trans;
    }
}
