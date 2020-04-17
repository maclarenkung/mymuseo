<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomTranslation extends Model
{
    protected $fillable =  ['lang_id', 'room_id', 'name', 'description', 'audio_url'];
}
