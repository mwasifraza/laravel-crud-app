<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\Models\Student;

class UserRegisterController extends Controller
{
    public function index(){
        return view('home');
    }

    public function register(){
        $data = [
            'title' => "Register Yourself",
            'url' => route('user.create.action'),
            'btn' => "Submit",
            'student' => "",
        ];
        return view('register-update', $data);
    }

    public function register_user(SignupRequest $request){
        $request->merge(['password' => Hash::make($request->password)]);
        $student = Student::create($request->all());
        return redirect('/user/view');
    }

    public function view(){
        return view('view', ['students' => Student::all()]);
    }

    public function delete($id){
        $student = Student::find($id);
        if(!is_null($student)){
            $student->delete();
        }
        return redirect('/user/view');
    }

    public function update($id){
        $student = Student::find($id);
        if(is_null($student)){
            return redirect('/user/view');
        }else{
            $data = [
                'title' => "Update Your Data",
                'url' => url('/user/update')."/".$id,
                'btn' => "Update",
                'student' => $student,
            ];
            return view('register-update', $data);
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

        $student = Student::find($id);
        $student->fullname = $request['fullname'];
        $student->email = $request['email'];
        $student->username = $request['username'];
        $student->gender = $request['gender'];
        $student->save();

        return redirect('/user/view');
    }
}
