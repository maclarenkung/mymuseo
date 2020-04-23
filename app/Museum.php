<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ItemScan;
use App\Item;
class Museum extends Model
{
    protected $fillable = ['name', 'name_en', 'description', 'address_url', 'website_url', 'time_open', 'time_close', 'day_open', 'phonenumber', 'email', 'facebook', 'instagram', 'day_start', 'day_end', 'image_url', 'locate_image_url'];
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

    protected $appends = ['scan_count_human','room_count', 'scan_count_max'];
    public function getScanCountHumanAttribute() {
        $MYID = $this->id;

        $findItem = Item::whereHas('room.floor.museum', function($query) use ($MYID){
          $query->where('id', $MYID);
        })->get()->pluck('id');

        return count(ItemScan::whereIn('item_id', $findItem)->get()->groupBy('ip'));
    }

    public function getRoomCountAttribute() {
        $count = 0;
        foreach($this->floors as $floor){
            $count += count($floor->rooms) ;
        }
        return $count;
    }

    public function getScanCountMaxAttribute()
    {
        $MYID = $this->id;

        $findItem = Item::whereHas('room.floor.museum', function ($query) use ($MYID) {
            $query->where('id', $MYID);
        })->get()->pluck('id');

        $idmax = ItemScan::whereIn('item_id', $findItem)->max('item_id');
        $count = Count(ItemScan::where('item_id', $idmax)->get());

        return [
            "count"=> $count,
            "item" => Item::find($idmax)
        ];
    }
}
