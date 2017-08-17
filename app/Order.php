<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function product() {
	    return $this->belongsTo('App\Product')->with('medias');
    }




    public function user() {
	    return $this->belongsTo('App\User');
    }
}
