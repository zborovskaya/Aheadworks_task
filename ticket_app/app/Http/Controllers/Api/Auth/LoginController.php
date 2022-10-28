<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;


class LoginController extends Controller
{
   public function login(Request $request){
       $creds =$request->only(['email','password']);
       if(!$token = auth('api')->attempt($creds)){
           return response()->json(['error' => true, 'message' => 'Incorrect Login/Password'], 401);
       }
       return response()->json(['token' => $token]);
   }
}
