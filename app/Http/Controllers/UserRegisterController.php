<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
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

    public function register(SignupRequest $request){
        $request->merge(['password' => Hash::make($request->password)]);
        $student = Students::create($request->all());
        return redirect('/user/view');
    }

    public function view(){
        return view('view', ['students' => Students::all()]);
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
