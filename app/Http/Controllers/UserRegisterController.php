<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class UserRegisterController extends Controller
{
    public function index(){
        return view('register');
    }
    public function register(Request $request){
        $request->validate(
            [
                'fullname' => 'required',
                'email' => 'required|email',
                'username' => 'required',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
                'gender' => 'required'
            ]
        );

        $student = new Students;
        $student->fullname = $request['fullname'];
        $student->email = $request['email'];
        $student->username = $request['username'];
        $student->password = md5($request['password']);
        $student->gender = $request['gender'];
        $student->save();

        return redirect('/user/view');
    }
    public function view(){
        $students = Students::all();
        $data = compact('students');
        return view('view')->with($data);
    }
}
