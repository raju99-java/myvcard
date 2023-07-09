<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use App\Card;

class EditAllfromRequest extends FormRequest {

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
            'profile_picture' => 'nullable|dimensions:min_width=170,min_height=170',
            'name' => 'nullable',
            'position' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable',
            'whatsapp_no' => 'nullable',
            'residential_address' => 'nullable',
            'company_name' => 'nullable',
            'company_address' => 'nullable',
            'company_email' => 'nullable',
            'company_nature' => 'nullable',
            'about_us' => 'nullable',
            'product1_details' => 'nullable|max:255',
            'product1_title' => 'nullable',
            'product1_price' => 'nullable|numeric',
            'product2_title' => 'nullable',
            'product2_details' => 'nullable|max:255',
            'product3_details' => 'nullable|max:255',
            'product4_details' => 'nullable|max:255',
            'product5_details' => 'nullable|max:255',
            'product6_details' => 'nullable|max:255',
            'product7_details' => 'nullable|max:255',
            'product8_details' => 'nullable|max:255',
            'product9_details' => 'nullable|max:255',
            'product10_details' => 'nullable|max:255',
            'product2_price' => 'nullable|numeric',
            'product3_price' => 'nullable|numeric',
            'product4_price' => 'nullable|numeric',
            'product5_price' => 'nullable|numeric',
            'product6_price' => 'nullable|numeric',
            'bank_name' => 'nullable',
            'branch_name' => 'nullable',
            'account_no' => 'nullable',
            'customer_id' => 'nullable',
            'swift_code' => 'nullable',
            'account_holder' => 'nullable',
            'ifsc_code' => 'nullable',
            'micr_code' => 'nullable',
            'bank_address' => 'nullable',
            
        ];
    }

    public function withValidator($validator) {
        $validator->after(function ($validator) {
            
        });
    }

}
