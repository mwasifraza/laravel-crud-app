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
        $user = Students::where('username', '=', $username)->where('password', '=', $password)->first();
        if($user){
            // echo "login";
            session()->put(['login'=>true]);
            session()->put(['id'=>$user['student_id']]);
            session()->put(['username'=>$user['username']]);
            session()->put(['fullname'=>$user['fullname']]);
            return redirect("dashboard");
        }else{
            return redirect('/login')->withErrors(['password' => 'Invalid username or password!']);
        }
        
    }
    public function logoutUser(){
        return redirect('/login');
    }
}
