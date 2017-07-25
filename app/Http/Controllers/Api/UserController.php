<?php

namespace App\Http\Controllers\Api;
use \App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use \App\Product;
use \App\Feature;
use \App\Order;
use \App\Media;
use \App\User;

class UserController extends Controller
{

   public function show(User $user) {
       return response()->json(array('user'=>$user));
   }
   public function update(Request $request) {

   }

}
