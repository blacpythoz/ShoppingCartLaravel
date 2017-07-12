<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'discountPrice', 'price','image_path'
    ];

    //
    public function feature() {
        return $this->hasOne('App\Feature','id','feature_id');
    }
}
