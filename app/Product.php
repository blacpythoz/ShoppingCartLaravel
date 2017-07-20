<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'discountPrice', 'price','description','information','brand','category_id'
    ];

    //
    public function feature() {
        return $this->hasOne(Feature::class);
    }
    public function category() {
    	return $this->belongsTo('App\Category','category_id','id');
    }
    public function medias() {
        return $this->hasMany('App\Media','product_id','id')->where('feature','no');
    }
    public function featuredMedias() {
        return $this->hasMany('App\Media','product_id','id')->where('feature','yes');
    }

}
