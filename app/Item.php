<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ItemTranslation;
use App\ItemImage;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    protected $appends =  ['qrcode_url', 'translation'];
    protected $fillable =  ['room_id', 'image_url'];

    public function getQrcodeUrlAttribute()
    {
        return 'https://api.qrserver.com/v1/create-qr-code/?data=' . request()->root() . '/item/' . $this->id;
    }

    public function sound()
    {
        return $this->hasOne('App\SoundLang', 'relation_id', 'id')->whereModel('App\Item');
    }

    public function getTranslationAttribute()
    {
        // $trans = ItemTranslation::where('item_id', $this->id)->where('lang_id',  getLangSlugId())->secound();
        $trans = ItemTranslation::where('item_id', $this->id)->where('lang_id',  getLangSlugId())->first();
        return $trans;
    }
    // public function getImageAttribute()
    // {
    //     $trans = ItemImage::where('item_id', $this->id);
    //     return $trans;
    // }
    public function images()
    {
        return $this->HasMany('App\ItemImage');
    }
}
