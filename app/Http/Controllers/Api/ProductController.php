<?php

namespace App\Http\Controllers\Api;
use \App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use \App\Product;
use \App\Feature;
use \App\Order;
use \App\Media;
use App\Http\Controllers\Api\CustomResponse;

class ProductController extends Controller
{

    public function index() {
       $products=Product::with('medias')->get();
       $featureImage=Media::get()->where('feature','=','yes');
      return response()->json(array('product'=>$products,'featureImage'=>$featureImage));
//      CustomResponse::mainResponse((array('product'=>$products,'featureImage'=>$featureImage));
   }
   public function show(Product $product) {;
      $product->medias;
      $product->feature;
       return response()->json(array('product'=>$product));
   }

}
