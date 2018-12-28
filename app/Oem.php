<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oem extends Model
{
    protected $table = 'oem';
    protected $fillable = [
        'id','ten'
    ];
}
