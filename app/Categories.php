<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'danhmucsp';
    protected $fillable = [
        'id','ten'
    ];
}
