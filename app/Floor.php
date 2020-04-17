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
    protected $fillable =  ['museum_id', 'image_url'];

    protected $appends =  ['translation'];
    public function getTranslationAttribute()
    {
        $trans = FloorTranslation::where('floor_id', $this->id)->where('lang_id',  getLangSlugId())->first();
        return $trans;
    }


    public function transByLangId($lang_id)
    {
        $trans = FloorTranslation::where('floor_id', $this->id)->where('lang_id', $lang_id)->first();
        return $trans;
    }

    public function image()
    {
        return $this->hasMany('App\FloorImage');
    }
}
