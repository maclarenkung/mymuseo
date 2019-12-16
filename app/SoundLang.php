<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoundLang extends Model
{
    protected $fillable = ['model', 'relation_id', 'lang_id', 'file_url'];

    protected $appends = ['lang_name'];
    protected $hidden = ['lang'];
    public function getLangNameAttribute()
    {
        return $this->lang->name;
    }
    public function lang()
    {
        return $this->belongsTo('App\Lang');
    }
}