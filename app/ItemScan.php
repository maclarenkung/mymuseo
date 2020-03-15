<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemScan extends Model
{
    protected $fillable = ['item_id', 'ip'];
}
