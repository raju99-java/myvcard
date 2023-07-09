<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
class Coupon extends Model {
    protected $table = 'coupons';
    protected $fillable = [
        'coupon_id','created_for','amount','status'
    ];

    

   

}
