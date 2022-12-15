<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class UserRegisterController extends Controller
{
    public function index(){
        // if user is login
        if(session()->has('login')){
            return redirect('/dashboard');
        }

        $title = "Register Yourself";
        $url = url('/user/register');
        $btn = "Submit";
        $data = compact('title', 'url', 'btn');
        return view('register')->with($data);
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
        // if user is login
        if(session()->has('login')){
            return redirect('/dashboard');
        }
        
        $students = Students::all();
        $data = compact('students');
        return view('view')->with($data);
    }

    public function delete($id){
        // if user is login
        if(session()->has('login')){
            return redirect('/dashboard');
        }

        $student = Students::find($id);
        if(!is_null($student)){
            $student->delete();
        }
        return redirect('/user/view');
    }

    public function update($id){
        // if user is login
        if(session()->has('login')){
            return redirect('/dashboard');
        }
        
        $student = Students::find($id);
        if(is_null($student)){
            return redirect('/user/view');
        }else{
            $title = "Update Your Data";
            $url = url('/user/update')."/".$id;
            $btn = "Update";
            $data = compact('student', 'title','url', 'btn');
            return view('register')->with($data);
        }
    }
    
    public function updateData($id, Request $request){
        $request->validate(
            [
                'fullname' => 'required',
                'email' => 'required|email',
                'username' => 'required',
                'gender' => 'required'
            ]
        );

        $student = Students::find($id);
        $student->fullname = $request['fullname'];
        $student->email = $request['email'];
        $student->username = $request['username'];
        $student->gender = $request['gender'];
        $student->save();

        return redirect('/user/view');
    }
}
