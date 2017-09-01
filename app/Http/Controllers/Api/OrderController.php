<?php

namespace App\Http\Controllers\Api;
use \App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use \App\Product;
use \App\Feature;
use \App\User;
use \App\Order;

class OrderController extends Controller
{
    public function order(Request $request)  {
        $order = new Order;
        $order->product_id=$request->product_id;
        $order->user_id=$request->user_id;

        $order->phone=$request->phone;
        $order->address=$request->address;
        if($request->status=="pre") {
            $order->status="pre";
        }
        $order->save();
        $order->quantity=$request->quantity;

        if($order->quantity <= $order->product->stock) {
            $order->product->stock=intval($order->product->stock)-intval($order->quantity);
            $order->product->save();
            $message['messagecode']=200;
            $message['message']="Successfully ordered the product";
        } else {
            $order->delete();
            $message['messagecode']=400;
            $message['message']="Cannot order the product";
        }


        return response()->json($message);
    }
    public function preOrderInfo(User $user) {
        $message['messagecode']=200;
        $message['message']="Successfully retrived user";
        $preOrders=$user->preOrders;
        $message['data']=$preOrders;
        return response()->json($message);

    }
}