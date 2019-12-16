<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Museum extends Model
{
    public function floors()
    {
        return $this->hasMany('App\Floor');
    }
    public function sound()
    {
        return $this->hasOne('App\SoundLang', 'relation_id', 'id')->whereModel('App\Museum');
    }
}