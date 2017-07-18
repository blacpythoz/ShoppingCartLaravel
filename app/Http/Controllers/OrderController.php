<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Feature;
use \App\Order;
use \App\Category;

class OrderController extends Controller
{
    //
     //public function __construct()
    //{
        //$this->middleware('auth');
    //}
 public function index() {
     $orders=Order::orderBy('id','desc')->paginate(10);
     $categories=Category::take(5)->get();
     return view('orders.index',compact(['orders','categories']));
 }
   // for editing the product
    public function edit(Order $order) {
        //$order = Order::find($id);
        return view('orders.edit',compact('order'));
    }
    public function update(Request $request,Order $order) {
        //$order=Order::find($id);
        $order->status=$request->order_status;
        $order->save();
         $orders=Order::orderBy('id','desc')->paginate(10);
         $categories=Category::take(5)->get();
         return view('orders.index',compact(['orders','categories']));

    }

      // for searching the products
 public function search(Request $request) {
        //dd($request->all());
    $fromDate=$request->fromDate;
    $toDate=$request->toDate;
    $term=$request->search;
    $categoryId=$request->category_id;

    $query = (new Order)->newQuery();

        // searching 
    if($term) {
       $query->join('products','orders.product_id', '=', 'products.id')
       ->where('products.name','LIKE','%'.$term.'%');
   }
    if($fromDate && $toDate) {
           $query->whereBetween('orders.created_at', array($fromDate, $toDate));
        }

        // this is done because there will be two joins for products.
        // so if term is set, do without joining again
        // if it not set , then join the products
    if($categoryId && !$term) {
       $query->join('products','orders.product_id', '=', 'products.id')
       ->where('products.category_id','=',$categoryId);
   }

     if($categoryId && $term) {
           $query->where('products.category_id','=',$categoryId);
       }

        //if($fromPrice && $toPrice) {
           //$query->whereBetween('price', array($fromPrice, $toPrice));
        //}

   $orders=$query->paginate(10);
   //dd($orders);
     $categories=Category::take(5)->get();
     return view('orders.index',compact(['orders','categories'])); 

}

}
