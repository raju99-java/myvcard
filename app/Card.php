<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model {

    protected $table = 'cards';
    protected $fillable = [
        'theme_color','user_id', 'user_name','profile_picture','name','position','phone','email','website','whatsapp_no','residential_address',
        'facebook','twitter','instagram','pinterest','linkedin','youtube','blogger','snapchat','telegram','location_and_google',
        'company_name','company_address','company_email','company_nature','about_us','brochure','cv','service1','service2','service3',
        'service4','service5','service6','service7','service8','service9','service10','product1_image','product1_title','product1_details','product1_price',
        'product2_image','product2_title','product2_details','product2_price','product3_image','product3_title','product3_details','product3_price',
        'product4_image','product4_title','product4_details','product4_price','product5_image','product5_title','product5_details','product5_price',
        'product6_image','product6_title','product6_details','product6_price','product7_image','product7_title','product7_details','product7_price',
        'product8_image','product8_title','product8_details','product8_price','product9_image','product9_title','product9_details','product9_price',
        'product10_image','product10_title','product10_details','product10_price','gallery1_image','gallery2_image','gallery3_image','gallery4_image',
        'gallery5_image','gallery6_image','gallery7_image','gallery8_image','gallery9_image','gallery10_image','youtube_video_1','youtube_video_2','youtube_video_3','youtube_video_4',
        'gpay_number','gpay_QR','phonepay_number','phonepay_QR','paytm_number','paytm_QR','upi_number','upi_QR',
        'bank_name','branch_name','account_no','customer_id','swift_code','account_holder','ifsc_code','micr_code','bank_address','views','status'
    ];

}
