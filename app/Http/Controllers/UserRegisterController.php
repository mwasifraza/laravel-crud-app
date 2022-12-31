<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class UserRegisterController extends Controller
{
    public function index(){
        $data = [
            'title' => "Register Yourself",
            'url' => url('/user/register'),
            'btn' => "Submit",
            'student' => "",
        ];
        return view('register', $data);
    }

    public function register(Request $request){
        $request->validate(
            [
                'fullname' => 'required|regex:/^[a-zA-Z\s]+$/',
                'email' => 'required|email|unique:students',
                'username' => 'required|min:5|unique:students|regex:/^[a-zA-Z0-9\._]+$/',
                'password' => 'required|min:4',
                'confirm_password' => 'required|same:password',
                'gender' => 'required'
            ],
            [
                'fullname.required' => 'Don\'t you have a :attribute?',
                'email.required' => 'The :attribute is must!',
            ],
            [
                'email' => 'email address'
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
        $data = ['students' => Students::all()];
        return view('view', $data);
    }

    public function delete($id){
        $student = Students::find($id);
        if(!is_null($student)){
            $student->delete();
        }
        return redirect('/user/view');
    }

    public function update($id){
        $student = Students::find($id);
        if(is_null($student)){
            return redirect('/user/view');
        }else{
            $data = [
                'title' => "Update Your Data",
                'url' => url('/user/update')."/".$id,
                'btn' => "Update",
                'student' => $student,
            ];
            return view('register', $data);
        }
    }
    
    public function updateData($id, Request $request){
        $request->validate(
            [
                'fullname' => 'required|regex:/^[a-zA-Z\s]+$/',
                'email' => 'required|email|unique:students,email,'.$id.',student_id',
                'username' => 'required|min:5|regex:/^[a-zA-Z0-9\._]+$/|unique:students,username,'.$id.',student_id',
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
