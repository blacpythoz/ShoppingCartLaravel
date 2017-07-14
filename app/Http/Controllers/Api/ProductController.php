<?php

namespace App\Http\Controllers\Api;
use \App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use \App\Product;
use \App\Feature;
use \App\Order;

class ProductController extends Controller
{

    public function index() {
       $products=Product::all();
       return response()->json($products);
      // return response()->json(array('data' => $products));
   }
   public function show($id) {
       $product=Product::find($id);
       $feature=Feature::find($product->id);
      return response()->json(array('product'=>$product,'feature'=>$feature));
//       return response()->json($product);
   }

}
