<?php

namespace App\Http\Controllers\Api;
use \App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use \App\Product;
use \App\Feature;

class SearchController extends Controller
{

    public function search(Request $request) {
    	//dd($request->all());
    $term=$request->term;
       $products=Product::where('name','LIKE','%'.$term.'%')->get();
       return response()->json($products);
       return response()->json(array('data' => $products));
   }

}
