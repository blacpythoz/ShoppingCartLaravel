<?php

namespace App\Http\Controllers\Api;
use \App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use \App\Product;
use \App\Feature;

class SearchController extends Controller
{

    //public function search(Request $request) {
    	//dd($request->all());
    //$term=$request->term;
       //$products=Product::where('name','LIKE','%'.$term.'%')->get();
       //return response()->json($products);
       //return response()->json(array('data' => $products));
   //}

    public function search(Request $request) {
        //dd($request->all());
        $fromDate=$request->fromDate;
        $toDate=$request->toDate;
        $term=$request->term;
        $fromPrice=$request->fromPrice;
        $toPrice=$request->toPrice;

        $query = (new Product)->newQuery();

        // searching 
        if($term) {
           $query->where('name','LIKE','%'.$term.'%');
        }

        if($fromDate && $toDate) {
           $query->whereBetween('created_at', array($fromDate, $toDate));
        }

        if($fromPrice && $toPrice) {
           $query->whereBetween('price', array($fromPrice, $toPrice));
        }

        $products=$query->with('medias')->paginate(10);
       return response()->json($products);
       //return response()->json(array('data' => $products));

       //return view('products.index',compact('products'));
   }

}
