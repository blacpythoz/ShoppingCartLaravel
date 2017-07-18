<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    //public function __construct()
    //{
     //   $this->middleware('guest');
    //}

    public function register(Request $request)
    {
        //dd($request->all());

       $this->validate($request,[
         'name' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|min:6|confirmed',
         'address' => 'required|string|min:6',
         'phone' => 'required|string|min:6',
         ]);


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->type = 'customer';
        $user->save();


        $message['messagecode']=201;
        $message['message']="Successfully created the user";
        return response()->json($message);
    }
}
