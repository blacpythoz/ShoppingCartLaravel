<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    //public function __construct()
    //{
     //   $this->middleware('guest');
    //}

    public function login(Request $request)
    {
        //dd($request->all());

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            $message['messagecode']=200;
            $message['message']="Authorized";
        } else {
            $message['messagecode']=401;
            $message['message']="Unauthorized";
        }

        return response()->json($message);
    }
}
