<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'sanpham';

    protected $fillable = [
        'id','ten','gia','sl','id_dm','id_oem'
    ];

    public function category()
    {
        return $this->belongsTo('App\Categories','id_dm','id');
    }

    public function oem()
    {
        return $this->belongsTo('App\Oem','id_oem','id');
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'ten'
            ]
        ];
    }
}
