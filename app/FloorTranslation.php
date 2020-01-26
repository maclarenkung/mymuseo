<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FloorTranslation extends Model
{
    protected $fillable =  ['lang_id', 'item_id', 'name', 'description', 'audio_url'];
}
