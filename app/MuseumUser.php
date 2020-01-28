<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MuseumUser extends Model
{
    protected $fillable = ['user_id', 'museum_id'];
}
