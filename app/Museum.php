<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Museum extends Model
{
    protected $fillable = ['name', 'name_en', 'description', 'address_url', 'website_url', 'time_open', 'time_close', 'day_open', 'phonenumber', 'email', 'facebook', 'instagram', 'day_start', 'day_end', 'image_url'];
    public function floors()
    {
        return $this->hasMany('App\Floor');
    }
    public function museum_images()
    {
        return $this->hasMany('App\MuseumImage');
    }
    // public function sound()
    // {
    //     return $this->hasOne('App\SoundLang', 'relation_id', 'id')->whereModel('App\Museum');
    // }
}
