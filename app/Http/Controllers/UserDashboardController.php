<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index(){
        if(!session()->has('login')){
            return redirect('/login');
        }
        return view('dashboard');
    }
}
