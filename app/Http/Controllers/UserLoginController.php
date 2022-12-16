<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class UserLoginController extends Controller
{
    public function index(){
        // if user is login
        if(session()->has('login')){
            return redirect('/dashboard');
        }
        
        return view('login');
    }

    public function loginUser(Request $request){
        $username = $request['username'];
        $password = md5($request['password']);
        $user = Students::where('username', $username)->first();
        if($user){
            if($password === $user['password']){
                // echo "login";
                session()->put(['login'=>true]);
                session()->put(['id'=>$user['student_id']]);
                session()->put(['username'=>$user['username']]);
                session()->put(['fullname'=>$user['fullname']]);
                return redirect("dashboard");
                
            }else{
                echo "invalid username or password";
            }
        }else{
            echo 'invalid user!';
        }
        
    }
    public function logoutUser(){
        if(session()->has("login")){
            session()->flush();
        }
        return redirect('/login');
    }
}
