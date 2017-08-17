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
        $order->quantity=$request->quantity;
        $order->phone=$request->phone;
        $order->address=$request->address;
        if($request->status=="pre") {
            $order->status="pre";
        }
        $order->save();

        $message['messagecode']=200;
        $message['message']="Successfully ordered the product";
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