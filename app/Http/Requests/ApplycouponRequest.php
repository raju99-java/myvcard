<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;
use App\Coupon;

class ApplycouponRequest extends FormRequest {

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
            'coupon_id' => 'required',
        ];
    }

    public function withValidator($validator) {
        $validator->after(function ($validator) {
            $checkCoupon = Coupon::where('coupon_id', $this->coupon_id)->where('status','1')->first();
            if (empty($checkCoupon))
                $validator->errors()->add('coupon_id', 'Coupon code is not found');
        });
    }

}
