<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class LoginController extends Controller
{
    function dangNhap(Request $request){
		$user = Array(
			0 => Array(
				'email' => 'ottoan@cusc.ctu.edu.vn',
				'password' => md5(111111),
				'token' => 'askjdhqiweyuquiwdasjdnakjsdhauihsJHKAHAKJhaushuiqwhekjqwnjkdnasdnakshdjakshdjkahsdkjahsdkjahsdkashd'
			)
		);
		$userData = [
            "uid"         => 0,          // From Auth
            "displayName" => "Ong Thanh Toàn", // From Auth
            "about"       => "Dessert chocolate cake lemon drops jujubes. Biscuit cupcake ice cream bear claw brownie brownie marshmallow.",
            "photoURL"    => "images\portrait\small\avatar-s-11.jpg", // From Auth
            "status"      => "online",
            "userRole"    => "admin"
        ];
		$email = $request->email;
		$pass = $request->password;
		foreach ($user as $key => $value) {
			if($email == $value['email'] && md5($pass) == $value['password']){
				return response()->json([
					'success' => true,
					'accessToken' => $value['token'],
					'userData' => $userData
				]);
			}
		}
	}
}
