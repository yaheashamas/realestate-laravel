<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login(Request $request){
        $cred = $request->only(['email','password']);
        if (!$token = auth()->attempt($cred)){
            return response()->json(['error'=> 'Incorrect email/password'],401);
        }
        return response()->json(['token' => $token]);
    }
}
