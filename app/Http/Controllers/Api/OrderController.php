<?php

namespace App\Http\Controllers\Api;
use \App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use \App\Product;
use \App\Feature;
use \App\Order;

class OrderController extends Controller
{
    public function order(Request $request)  {
        $order = new Order;
        $order->product_id=$request->product_id;
        $order->user_id=$request->user_id;
        $order->quantity=$request->quantity;
        $order->save();

        $message['messagecode']=200;
        $message['message']="Successfully ordered the product";
        return response()->json($message);
    }
}