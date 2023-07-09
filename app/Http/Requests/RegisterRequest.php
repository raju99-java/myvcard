<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class RegisterRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'user_name' => 'required|regex:/^\S*$/u',
            'name' => 'required|max:100|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|min:8|max:20',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function withValidator($validator) {
        $validator->after(function ($validator) {
            $checkUsername = User::where('user_name', $this->user_name)->first();
            if (!empty($checkUsername)) {
                $validator->errors()->add('user_name', 'user name already in use.');
            }
            if (!empty($this->phone) && !preg_match('/^[1-9][0-9]*$/', $this->phone)) {
                $validator->errors()->add('phone', 'Please give a proper phone number.');
            }
            $checkUser = User::where('email', $this->email)->first();
            if (!empty($checkUser)) {
                $validator->errors()->add('email', 'Email already in use.');
            }
        });
    }

}
