<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Feature;
use \App\Category;
use \App\User;
use \App\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::get();
        $categories=Category::get();
        $users=User::get();
        $orders=Order::get();

        return view('dashboard.index',compact(['products','categories','users','orders']));
    }
}
