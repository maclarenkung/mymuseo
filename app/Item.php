<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    protected $appends =  ['qrcode_url'];
    protected $fillable =  ['room_id', 'name', 'description', 'image_url'];

    public function getQrcodeUrlAttribute()
    {
        return 'https://api.qrserver.com/v1/create-qr-code/?data=' . request()->root() . '/item/' . $this->id;
    }

    public function sound()
    {
        return $this->hasOne('App\SoundLang', 'relation_id', 'id')->whereModel('App\Item');
    }
}