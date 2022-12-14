<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class UserLoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function loginUser(Request $request){
        $username = $request['username'];
        $password = md5($request['password']);
        $user = Students::where('username', $username)->first();
        if($user){
            if($password === $user['password']){
                echo "login";
            }else{
                echo "invalid password";
            }
        }else{
            echo 'user not found';
        }
        
    }
}
