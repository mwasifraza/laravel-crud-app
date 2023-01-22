<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\Student;

class UserLoginController extends Controller
{
    public function login(){ 
        return view('login');
    }

    public function login_user(LoginRequest $request){
        if (Auth::attempt(['username'=>$request->username, 'password'=>$request->password])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'password' => 'Invalid username or password.',
        ])->onlyInput('username');        
    }

    public function logout_user(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
