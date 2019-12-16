<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoundLang extends Model
{
    protected $fillable = ['model', 'relation_id', 'lang_id', 'file_url'];
}