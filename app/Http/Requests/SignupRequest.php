<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullname' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:students',
            'username' => 'required|min:5|unique:students|regex:/^[a-zA-Z0-9\._]+$/',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password',
            'gender' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'fullname.required' => 'Don\'t you have a :attribute?',
            'email.required' => 'The :attribute is must!',
            'email.unique' => 'Ops! The :attribute is taken.',
            'username.required' => 'The :attribute is mandatory!',
            'username.unique' => 'Try again, the :attribute is busy.',
            'username.regex' => 'the :attribute can only contain letter, digits and synbols: ._',
            'password.required' => 'Please enter a :attribute.',
            'gender.required' => 'Please select your :attribute.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email' => 'email address',
            'fullname' => 'name',
        ];
    }
}
