<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FloorTranslation extends Model
{
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    protected $fillable =  ['lang_id', 'floor_id', 'name', 'description', 'audio_url'];
}
