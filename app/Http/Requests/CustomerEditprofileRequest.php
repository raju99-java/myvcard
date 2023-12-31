<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use App\User;
use App\Business;

class CustomerEditprofileRequest extends FormRequest {

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
            'name' => 'required|max:100|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|min:8|max:20',
        ];
    }

    public function withValidator($validator) {
        $validator->after(function ($validator) {
            
            $user = User::findOrFail(Auth::guard('frontend')->user()->id);
            if ($user->email !== $this->email) {
                $checkUser = User::where('email', $this->email)->first();
                if (!empty($checkUser))
                    $validator->errors()->add('email', 'Email already in use.');
            }
           
        });
    }

}
