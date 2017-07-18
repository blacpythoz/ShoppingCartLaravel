<?php

namespace App\Http\Controllers\Api;
use \App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use \App\Product;
use \App\Feature;
use \App\Order;
use \App\Media;

class ProductController extends Controller
{

    public function index() {
       $products=Product::with('medias')->get();
       $featureImage=Media::get()->where('feature','=','yes');
       return response()->json(array('product'=>$products,'featureImage'=>$featureImage));
      // return response()->json(array('data' => $products));
   }
   public function show(Product $product) {
       //$product=Product::find($id);
       $feature=Feature::find($product->id)->with('medias')->get();
       $media=$product->medias;
      return response()->json(array('product'=>$product,'feature'=>$feature));

//       return response()->json($product);
   }

}
