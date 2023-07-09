<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::middleware(['web'])->group(function () {

//    Route::get('contact-us', 'SiteController@get_contactus')->name('contact-us');
//    Route::post('contact-us', 'SiteController@post_contact')->name('contact-us');
    Route::get('/', 'SiteController@index')->name('/');
    Route::get('card/{user_name}', 'SiteController@card')->name('card');
    Route::post('contactUs', 'SiteController@post_contact')->name('contactUs');
    Route::post('contact-admin', 'SiteController@post_contact_admin')->name('contact-admin');
    Route::get('about-us', 'SiteController@about_us')->name('about-us');
    Route::get('contact', 'SiteController@contact')->name('contact');
    Route::get('franchises', 'SiteController@franchise')->name('franchises');
    Route::post('franchise-admin', 'SiteController@post_franchise_admin')->name('franchise-admin');
    Route::get('pricing', 'SiteController@pricing')->name('pricing');
    Route::get('features', 'SiteController@features')->name('features');
    Route::get('how-it-works', 'SiteController@how_it_works')->name('how-it-works');
    Route::get('privacy_policy', 'SiteController@privacy_policy')->name('privacy_policy');
    Route::get('terms_conditions', 'SiteController@terms_conditions')->name('terms_conditions');
  	Route::get('return-refund-policy', 'SiteController@return_refund_policy')->name('return-refund-policy');
    Route::get('vcf', 'SiteController@raf_create_vcard')->name('vcf');
    /*     * ***********************Search Controller***************************** */

    Route::middleware(['user_not_logged_in'])->group(function () {
        Route::get('login', 'SiteController@login')->name('login');
        Route::get('signup', 'SiteController@get_signup')->name('signup');
        Route::post('signup', 'SiteController@post_signup')->name('signup');
        Route::get('active-account/{id}/{token}', 'SiteController@get_active_account')->name('active-account');
        Route::post('resend-active-token', 'SiteController@resend_active_token')->name('resend-active-token');
        Route::post('login', 'SiteController@post_login')->name('login');
        Route::get('forgot-password', 'SiteController@get_forgot_password')->name('forgot-password');
        Route::post('forgot-password', 'SiteController@post_forgot_password')->name('forgot-password');
        Route::get('reset-password/{id}/{token}', 'SiteController@get_reset_password')->name('reset-password');
        Route::post('set-password', 'SiteController@post_reset_password')->name('set-password');
    });

    Route::middleware(['user_logged_in'])->group(function () {
        Route::get('logout', 'SiteController@logout')->name('logout');
        Route::get('dashboard', 'UserController@get_dashboard')->name('dashboard');
        Route::get('card_form', 'UserController@card_form')->name('card_form');
        
        Route::get('basicdetails_form', 'UserController@basicdetails')->name('basicdetails_form');
        Route::get('sociallinksdetails_form', 'UserController@sociallinksdetails')->name('sociallinksdetails_form');
        Route::get('aboutdetails_form', 'UserController@aboutdetails')->name('aboutdetails_form');
        Route::get('servicedetails_form', 'UserController@servicedetails')->name('servicedetails_form');
        Route::get('productdetails_form', 'UserController@productdetails')->name('productdetails_form');
        Route::get('photodetails_form', 'UserController@photodetails')->name('photodetails_form');
        Route::get('videodetails_form', 'UserController@videodetails')->name('videodetails_form');
        Route::get('paymentdetails_form', 'UserController@paymentdetails')->name('paymentdetails_form');
        
        Route::post('resetservice', 'UserController@resetservice')->name('resetservice');
        Route::post('resetphotos', 'UserController@resetphotos')->name('resetphotos');
        Route::post('resetproducts', 'UserController@resetproducts')->name('resetproducts');
        
        
        
        Route::get('card_form', 'UserController@card_form')->name('card_form');
        
        Route::post('check-form', 'UserController@check_form')->name('check-form');
        Route::post('edit-check-form', 'UserController@edit_check_form')->name('edit-check-form');
        
        Route::get('profile', 'UserController@edit_profile')->name('my-profile');
        Route::post('profile', 'UserController@post_profile')->name('post-myprofile');
        Route::post('post-reset-password', 'UserController@reset_password')->name('post-reset-password');
        Route::post('apply-coupon', 'UserController@apply_coupon')->name('apply-coupon');

        Route::get('pay', 'RazorpayController@pay')->name('pay');
        Route::post('dopayment', 'RazorpayController@dopayment')->name('dopayment');
        
        Route::get('coupon', 'CouponController@index')->name('coupon');
        Route::get('coupon-add', ['uses' => 'CouponController@get_add', 'as' => 'coupon-add']);
        Route::post('coupon-add', ['uses' => 'CouponController@post_add', 'as' => 'coupon-add']);
      	Route::get('coupon-edit/{id}', ['uses' => 'CouponController@edit', 'as' => 'coupon-edit']);
        Route::post('coupon-edit/{id}', ['uses' => 'CouponController@update', 'as' => 'coupon-edit']);
        
        Route::get('settings', 'SettingsController@index')->name('admin-settings');
        Route::put('settings', 'SettingsController@store')->name('admin-settings');
        
        Route::resource('cms', 'CmsController')->only(['index', 'show', 'edit', 'update']);
        Route::resource('testimonial', 'TestimonialController');
        Route::resource('cardarena', 'CardArenaController');
        Route::resource('feature', 'FeatureController');
        Route::resource('customer', 'CustomerController');
        
        Route::get('customer-subscription-add/{id}', ['uses' => 'CustomerController@get_subscription_add', 'as' => 'customer-subscription-add']);
        Route::post('customer-subscription-add/{id}', ['uses' => 'CustomerController@post_subscription_add', 'as' => 'customer-subscription-add']);
        Route::get('customer-subscription-edit/{id}', ['uses' => 'CustomerController@get_subscription_edit', 'as' => 'customer-subscription-edit']);
        Route::post('customer-subscription-update/{id}', ['uses' => 'CustomerController@post_subscription_update', 'as' => 'customer-subscription-update']);
      
      	Route::resource('franchise', 'FranchiseController');
      
      	Route::get('franchise-user', ['uses' => 'FranchiseUserController@franchise_user', 'as' => 'franchise-user']);
      
      	Route::get('franchise-registration', ['uses' => 'FranchiseRegistrationController@index', 'as' => 'franchise-registration']);
      	Route::post('post-franchise-registration', ['uses' => 'FranchiseRegistrationController@franchise_registration', 'as' => 'post-franchise-registration']);
      	
      	Route::get('admin-emails', ['uses' => 'EmailController@index', 'as' => 'admin-emails']);
        Route::get('admin-viewemail/{id}', ['uses' => 'EmailController@view', 'as' => 'admin-viewemail']);
        Route::get('admin-updateemail/{id}', ['uses' => 'EmailController@get_update', 'as' => 'admin-updateemail']);
        Route::post('admin-updateemail/{id}', ['uses' => 'EmailController@post_update', 'as' => 'admin-updateemail']);
    });
});
