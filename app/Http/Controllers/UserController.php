<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Charts;
//********** Requests ************//
use App\Http\Requests\ApplycouponRequest;
use App\Http\Requests\CustomerEditprofileRequest;
use App\Http\Requests\AllfromRequest;
use App\Http\Requests\EditAllfromRequest;
use App\Http\Requests\ChangePasswordRequest;
//********** Models ************//
use App\User;
use App\Setting;
use App\Coupon;
use App\Card;

class UserController extends Controller {

    public function get_dashboard() {
        $data = [];
        $data['subscription'] = Setting::where('slug', 'subscription_charge')->first();
        $data['total_users'] = User::where('type_id', '=', '2')->count();
        $data['total_coupon'] = Coupon::count();
        $data['total_coupon_used'] = Coupon::where('status', '0')->count();
      	$data['total_inactive_users'] = User::where('type_id', '=', '2')->where('status','0')->count();
      	$data['total_blocked_users'] = User::where('type_id', '=', '2')->where('status','2')->count();
        $data['total_subscribers'] = User::where('payment_status', '1')->where('subscription_end', '>=', Carbon::now()->format('Y-m-d'))->count();
      	if(Auth()->guard('frontend')->user()->type_id=='3')
        {
          $data['total_franchises_user'] =User::where('type_id', '=', '2')->where('franchise_id',Auth()->guard('frontend')->user()->id)->count();
          $data['total_franchises_user_this_month'] =User::where('type_id', '=', '2')->where('franchise_id',Auth()->guard('frontend')->user()->id)->whereMonth('subscription_date', Carbon::now()->month)->whereYear('subscription_date', Carbon::now()->year)->count();
            
        }
        return view('user.dashboard', $data);
    }

    public function card_form() {
        $card = Card::where('user_name', Auth()->guard('frontend')->user()->user_name)->where('status', '1')->first();
        $model = User::findOrFail(Auth::guard('frontend')->user()->id);
            $subscription = Setting::where('slug', 'subscription_charge')->first();
            $razorpay = Setting::where('slug', 'razorpay_key')->first();
        if (empty($card)) {
            
            return view('user.all_form', compact('model', 'subscription','razorpay'));
        } else {
//            return view('user.all_form', compact('model', 'subscription'));
            return view('user.edit_all_form', compact('card','model', 'subscription','razorpay'));
        }
    }
    
    public function basicdetails() {
        $card = Card::where('user_name', Auth()->guard('frontend')->user()->user_name)->where('status', '1')->first();
        $model = User::findOrFail(Auth::guard('frontend')->user()->id);
            $subscription = Setting::where('slug', 'subscription_charge')->first();
            $razorpay = Setting::where('slug', 'razorpay_key')->first();
            return view('user.basicdetails', compact('card','model', 'subscription','razorpay'));
        
    }
    public function sociallinksdetails() {
        $card = Card::where('user_name', Auth()->guard('frontend')->user()->user_name)->where('status', '1')->first();
        $model = User::findOrFail(Auth::guard('frontend')->user()->id);
            $subscription = Setting::where('slug', 'subscription_charge')->first();
            $razorpay = Setting::where('slug', 'razorpay_key')->first();
            return view('user.sociallinksdetails', compact('card','model', 'subscription','razorpay'));
        
    }
    public function aboutdetails() {
        $card = Card::where('user_name', Auth()->guard('frontend')->user()->user_name)->where('status', '1')->first();
        $model = User::findOrFail(Auth::guard('frontend')->user()->id);
            $subscription = Setting::where('slug', 'subscription_charge')->first();
            $razorpay = Setting::where('slug', 'razorpay_key')->first();
            return view('user.aboutdetails', compact('card','model', 'subscription','razorpay'));
        
    }
    public function servicedetails() {
        $card = Card::where('user_name', Auth()->guard('frontend')->user()->user_name)->where('status', '1')->first();
        $model = User::findOrFail(Auth::guard('frontend')->user()->id);
            $subscription = Setting::where('slug', 'subscription_charge')->first();
            $razorpay = Setting::where('slug', 'razorpay_key')->first();
            return view('user.servicedetails', compact('card','model', 'subscription','razorpay'));
        
    }
    public function productdetails() {
        $card = Card::where('user_name', Auth()->guard('frontend')->user()->user_name)->where('status', '1')->first();
        $model = User::findOrFail(Auth::guard('frontend')->user()->id);
            $subscription = Setting::where('slug', 'subscription_charge')->first();
            $razorpay = Setting::where('slug', 'razorpay_key')->first();
            return view('user.productdetails', compact('card','model', 'subscription','razorpay'));
        
    }
    public function photodetails() {
        $card = Card::where('user_name', Auth()->guard('frontend')->user()->user_name)->where('status', '1')->first();
        $model = User::findOrFail(Auth::guard('frontend')->user()->id);
            $subscription = Setting::where('slug', 'subscription_charge')->first();
            $razorpay = Setting::where('slug', 'razorpay_key')->first();
            return view('user.photodetails', compact('card','model', 'subscription','razorpay'));
        
    }
    public function videodetails() {
        $card = Card::where('user_name', Auth()->guard('frontend')->user()->user_name)->where('status', '1')->first();
        $model = User::findOrFail(Auth::guard('frontend')->user()->id);
            $subscription = Setting::where('slug', 'subscription_charge')->first();
            $razorpay = Setting::where('slug', 'razorpay_key')->first();
            return view('user.videodetails', compact('card','model', 'subscription','razorpay'));
        
    }
    public function paymentdetails() {
        $card = Card::where('user_name', Auth()->guard('frontend')->user()->user_name)->where('status', '1')->first();
        $model = User::findOrFail(Auth::guard('frontend')->user()->id);
            $subscription = Setting::where('slug', 'subscription_charge')->first();
            $razorpay = Setting::where('slug', 'razorpay_key')->first();
            return view('user.paymentdetails', compact('card','model', 'subscription','razorpay'));
        
    }
    public function resetservice(Request $request) {
        
            if ($request->ajax()) {
                $input=[];
                $data_msg = [];
                $id=Auth::guard('frontend')->user()->id;
                $model = Card::where('user_id', $id)->where('status', '1')->first();;
                $input['service1'] =$input['service2'] =$input['service3'] =$input['service4'] =$input['service5'] =$input['service6'] =$input['service7'] =$input['service8']=$input['service9'] =$input['service10']  = null;
                if ($model->update($input)) {
                $data['msg'] = "You Reset the Service successfully.";
            }


            $data_msg['c_id'] = $model->id;
            $data_msg['msg'] = "You Reset the Service successfully";
            return response()->json($data_msg);
            }
        
    }
    
    public function resetphotos(Request $request) {
        
            if ($request->ajax()) {
                $input=[];
                $data_msg = [];
                $id=Auth::guard('frontend')->user()->id;
                $model = Card::where('user_id', $id)->where('status', '1')->first();;
                $input['gallery1_image'] =$input['gallery2_image'] =$input['gallery3_image'] =$input['gallery4_image'] =$input['gallery5_image'] =$input['gallery6_image'] =$input['gallery7_image'] =$input['gallery8_image']=$input['gallery9_image'] =$input['gallery10_image']  = null;
                if ($model->update($input)) {
                $data['msg'] = "You Reset the Photos successfully.";
            }


            $data_msg['c_id'] = $model->id;
            $data_msg['msg'] = "You Reset the Photos successfully";
            return response()->json($data_msg);
            }
        
    }
    public function resetproducts(Request $request) {
        
            if ($request->ajax()) {
                $input=[];
                $data_msg = [];
                $id=Auth::guard('frontend')->user()->id;
                $model = Card::where('user_id', $id)->where('status', '1')->first();
                
                $input['product1_image'] =$input['product1_title'] =$input['product1_details'] =$input['product1_price'] =$input['product2_image'] =$input['product2_title'] =$input['product2_details'] =$input['product2_price']=$input['product3_image'] =$input['product3_title'] =$input['product3_details'] =$input['product3_price']=$input['product4_image'] =$input['product4_title'] =$input['product4_details'] =$input['product4_price']=$input['product5_image'] =$input['product5_title'] =$input['product5_details'] =$input['product5_price']=$input['product6_image'] =$input['product6_title'] =$input['product6_details'] =$input['product6_price']=$input['product7_image'] =$input['product7_title'] =$input['product7_details'] =$input['product7_price']=$input['product8_image'] =$input['product8_title'] =$input['product8_details'] =$input['product8_price']=$input['product9_image'] =$input['product9_title'] =$input['product9_details'] =$input['product9_price']=$input['product10_image'] =$input['product10_title'] =$input['product10_details'] =$input['product10_price'] = null;
                if ($model->update($input)) {
                $data['msg'] = "You Reset the Products successfully.";
            }


            $data_msg['c_id'] = $model->id;
            $data_msg['msg'] = "You Reset the Products successfully.";
            return response()->json($data_msg);
            }
        
    }



    public function check_form(AllfromRequest $request) {
        if ($request->ajax()) {
            ini_set('max_execution_time', 0);
            $data_msg = [];
            $input = $request->all();
            $input['user_id'] = Auth::guard('frontend')->user()->id;
            $input['user_name'] = Auth::guard('frontend')->user()->user_name;
            if($request->input('youtube_video_1')){
                $input['youtube_video_1'] = $this->YoutubeID($request->input('youtube_video_1'));
            }
            if($request->input('youtube_video_2')){
                $input['youtube_video_2'] = $this->YoutubeID($request->input('youtube_video_2'));
            }
            if ($request->hasFile('profile_picture')) {
                $input['profile_picture'] = $this->cardimageUpload($request->file('profile_picture'));
            }
            if ($request->hasFile('brochure')) {
                $input['brochure'] = $this->cardbrochureUpload($request->file('brochure'));
            }
            if ($request->hasFile('cv')) {
                $input['cv'] = $this->cardcvUpload($request->file('cv'));
            }
            if ($request->hasFile('service1')) {
                $input['service1'] = $this->cardimageUpload($request->file('service1'));
            }
            if ($request->hasFile('service2')) {
                $input['service2'] = $this->cardimageUpload($request->file('service2'));
            }
            if ($request->hasFile('service3')) {
                $input['service3'] = $this->cardimageUpload($request->file('service3'));
            }
            if ($request->hasFile('service4')) {
                $input['service4'] = $this->cardimageUpload($request->file('service4'));
            }
            if ($request->hasFile('service5')) {
                $input['service5'] = $this->cardimageUpload($request->file('service5'));
            }
            if ($request->hasFile('service6')) {
                $input['service6'] = $this->cardimageUpload($request->file('service6'));
            }
            if ($request->hasFile('service7')) {
                $input['service7'] = $this->cardimageUpload($request->file('service7'));
            }
            if ($request->hasFile('service8')) {
                $input['service8'] = $this->cardimageUpload($request->file('service8'));
            }
            if ($request->hasFile('service9')) {
                $input['service9'] = $this->cardimageUpload($request->file('service9'));
            }
            if ($request->hasFile('service10')) {
                $input['service10'] = $this->cardimageUpload($request->file('service10'));
            }
            if ($request->hasFile('product1_image')) {
                $input['product1_image'] = $this->cardimageUpload($request->file('product1_image'));
            }
            if ($request->hasFile('product2_image')) {
                $input['product2_image'] = $this->cardimageUpload($request->file('product2_image'));
            }
            if ($request->hasFile('product3_image')) {
                $input['product3_image'] = $this->cardimageUpload($request->file('product3_image'));
            }
            if ($request->hasFile('product4_image')) {
                $input['product4_image'] = $this->cardimageUpload($request->file('product4_image'));
            }
            if ($request->hasFile('product5_image')) {
                $input['product5_image'] = $this->cardimageUpload($request->file('product5_image'));
            }
            if ($request->hasFile('product6_image')) {
                $input['product6_image'] = $this->cardimageUpload($request->file('product6_image'));
            }
            if ($request->hasFile('product7_image')) {
                $input['product7_image'] = $this->cardimageUpload($request->file('product7_image'));
            }if ($request->hasFile('product8_image')) {
                $input['product8_image'] = $this->cardimageUpload($request->file('product8_image'));
            }if ($request->hasFile('product9_image')) {
                $input['product9_image'] = $this->cardimageUpload($request->file('product9_image'));
            }if ($request->hasFile('product10_image')) {
                $input['product10_image'] = $this->cardimageUpload($request->file('product10_image'));
            }
            if ($request->hasFile('gallery1_image')) {
                $input['gallery1_image'] = $this->cardimageUpload($request->file('gallery1_image'));
            }
            if ($request->hasFile('gallery2_image')) {
                $input['gallery2_image'] = $this->cardimageUpload($request->file('gallery2_image'));
            }
            if ($request->hasFile('gallery3_image')) {
                $input['gallery3_image'] = $this->cardimageUpload($request->file('gallery3_image'));
            }
            if ($request->hasFile('gallery4_image')) {
                $input['gallery4_image'] = $this->cardimageUpload($request->file('gallery4_image'));
            }
            if ($request->hasFile('gallery5_image')) {
                $input['gallery5_image'] = $this->cardimageUpload($request->file('gallery5_image'));
            }
            if ($request->hasFile('gallery6_image')) {
                $input['gallery6_image'] = $this->cardimageUpload($request->file('gallery6_image'));
            }
            if ($request->hasFile('gallery7_image')) {
                $input['gallery7_image'] = $this->cardimageUpload($request->file('gallery7_image'));
            }
            if ($request->hasFile('gallery8_image')) {
                $input['gallery8_image'] = $this->cardimageUpload($request->file('gallery8_image'));
            }
            if ($request->hasFile('gallery9_image')) {
                $input['gallery9_image'] = $this->cardimageUpload($request->file('gallery9_image'));
            }
            if ($request->hasFile('gallery10_image')) {
                $input['gallery10_image'] = $this->cardimageUpload($request->file('gallery10_image'));
            }
            if ($request->hasFile('gpay_QR')) {
                $input['gpay_QR'] = $this->cardimageUpload($request->file('gpay_QR'));
            }
            if ($request->hasFile('phonepay_QR')) {
                $input['phonepay_QR'] = $this->cardimageUpload($request->file('phonepay_QR'));
            }
            if ($request->hasFile('paytm_QR')) {
                $input['paytm_QR'] = $this->cardimageUpload($request->file('paytm_QR'));
            }
            if ($request->hasFile('upi_QR')) {
                $input['upi_QR'] = $this->cardimageUpload($request->file('upi_QR'));
            }

            $model = Card::create($input);

            $data_msg['c_id'] = $model->id;
            $data_msg['msg'] = "You have successfully submit the visiting card form.";
            $request->session()->flash('success', 'You have successfully submit the visiting card form');
            return response()->json($data_msg);
        }
    }
    function YoutubeID($url)
    {
        if(strlen($url) > 11)
        {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
            {
                return $match[1];
            }
            else
                return false;
        }

        return $url;
    }


    function cardimageUpload($image) {
        //check the file present or not
//        $image = $request->file('image'); //get the file
        $name = $this->rand_string(15) . time() . '.' . $image->getClientOriginalExtension(); //get the  file extention
        $destinationPath = public_path('uploads/card/original/'); //public path folder dir
        $path = public_path('uploads/card/');
        Image::make($image->getRealPath())->resize(170, 170)->save($path . 'preview/' . $name);
        Image::make($image->getRealPath())->resize(100, 100)->save($path . 'thumb/' . $name);
        $image->move($destinationPath, $name);
        return $name;
    }

    function cardbrochureUpload($brochure) {
        $name = $this->rand_string(15) . time() . '.' . $brochure->getClientOriginalExtension(); //get the  file extention
        $destinationPath = public_path('uploads/card/brochure/'); //public path folder dir
        $brochure->move($destinationPath, $name);
        return $name;
    }
    function cardcvUpload($cv) {
        $name = $this->rand_string(15) . time() . '.' . $cv->getClientOriginalExtension(); //get the  file extention
        $destinationPath = public_path('uploads/card/cv/'); //public path folder dir
        $cv->move($destinationPath, $name);
        return $name;
    }

    public function edit_check_form(EditAllfromRequest $request) {
        if ($request->ajax()) {
            // ini_set('max_execution_time', 0);
            $data_msg = [];
            // print_r(1);
            // exit;
            $model = Card::findOrFail($request->input('id'));
            
            $input = $request->all();
            if($request->input('youtube_video_1')){
            $input['theme_color'] =$request->input('theme_color');
            }
            if($request->input('youtube_video_1')){
                $input['youtube_video_1'] = $this->YoutubeID($request->input('youtube_video_1'));
            }
            if($request->input('youtube_video_2')){
                $input['youtube_video_2'] = $this->YoutubeID($request->input('youtube_video_2'));
            }
            if($request->input('youtube_video_3')){
                $input['youtube_video_3'] = $this->YoutubeID($request->input('youtube_video_3'));
            }
            if($request->input('youtube_video_4')){
                $input['youtube_video_4'] = $this->YoutubeID($request->input('youtube_video_4'));
            }
            if ($request->hasFile('profile_picture')) {
                $input['profile_picture'] = $this->cardimageUpload($request->file('profile_picture'));
            }
            if ($request->hasFile('brochure')) {
                $input['brochure'] = $this->cardbrochureUpload($request->file('brochure'));
            }
            if ($request->hasFile('cv')) {
                $input['cv'] = $this->cardcvUpload($request->file('cv'));
            }
            if ($request->hasFile('service1')) {
                $input['service1'] = $this->cardimageUpload($request->file('service1'));
            }
            if ($request->hasFile('service2')) {
                $input['service2'] = $this->cardimageUpload($request->file('service2'));
            }
            if ($request->hasFile('service3')) {
                $input['service3'] = $this->cardimageUpload($request->file('service3'));
            }
            if ($request->hasFile('service4')) {
                $input['service4'] = $this->cardimageUpload($request->file('service4'));
            }
            if ($request->hasFile('service5')) {
                $input['service5'] = $this->cardimageUpload($request->file('service5'));
            }
            if ($request->hasFile('service6')) {
                $input['service6'] = $this->cardimageUpload($request->file('service6'));
            }
            if ($request->hasFile('service7')) {
                $input['service7'] = $this->cardimageUpload($request->file('service7'));
            }
            if ($request->hasFile('service8')) {
                $input['service8'] = $this->cardimageUpload($request->file('service8'));
            }
            if ($request->hasFile('service9')) {
                $input['service9'] = $this->cardimageUpload($request->file('service9'));
            }
            if ($request->hasFile('service10')) {
                $input['service10'] = $this->cardimageUpload($request->file('service10'));
            }
            if ($request->hasFile('product1_image')) {
                $input['product1_image'] = $this->cardimageUpload($request->file('product1_image'));
            }
            if ($request->hasFile('product2_image')) {
                $input['product2_image'] = $this->cardimageUpload($request->file('product2_image'));
            }
            if ($request->hasFile('product3_image')) {
                $input['product3_image'] = $this->cardimageUpload($request->file('product3_image'));
            }
            if ($request->hasFile('product4_image')) {
                $input['product4_image'] = $this->cardimageUpload($request->file('product4_image'));
            }
            if ($request->hasFile('product5_image')) {
                $input['product5_image'] = $this->cardimageUpload($request->file('product5_image'));
            }
            if ($request->hasFile('product6_image')) {
                $input['product6_image'] = $this->cardimageUpload($request->file('product6_image'));
            }
            if ($request->hasFile('product7_image')) {
                $input['product7_image'] = $this->cardimageUpload($request->file('product7_image'));
            }if ($request->hasFile('product8_image')) {
                $input['product8_image'] = $this->cardimageUpload($request->file('product8_image'));
            }if ($request->hasFile('product9_image')) {
                $input['product9_image'] = $this->cardimageUpload($request->file('product9_image'));
            }if ($request->hasFile('product10_image')) {
                $input['product10_image'] = $this->cardimageUpload($request->file('product10_image'));
            }
            if ($request->hasFile('gallery1_image')) {
                $input['gallery1_image'] = $this->cardimageUpload($request->file('gallery1_image'));
            }
            if ($request->hasFile('gallery2_image')) {
                $input['gallery2_image'] = $this->cardimageUpload($request->file('gallery2_image'));
            }
            if ($request->hasFile('gallery3_image')) {
                $input['gallery3_image'] = $this->cardimageUpload($request->file('gallery3_image'));
            }
            if ($request->hasFile('gallery4_image')) {
                $input['gallery4_image'] = $this->cardimageUpload($request->file('gallery4_image'));
            }
            if ($request->hasFile('gallery5_image')) {
                $input['gallery5_image'] = $this->cardimageUpload($request->file('gallery5_image'));
            }
            if ($request->hasFile('gallery6_image')) {
                $input['gallery6_image'] = $this->cardimageUpload($request->file('gallery6_image'));
            }
            if ($request->hasFile('gallery7_image')) {
                $input['gallery7_image'] = $this->cardimageUpload($request->file('gallery7_image'));
            }
            if ($request->hasFile('gallery8_image')) {
                $input['gallery8_image'] = $this->cardimageUpload($request->file('gallery8_image'));
            }
            if ($request->hasFile('gallery9_image')) {
                $input['gallery9_image'] = $this->cardimageUpload($request->file('gallery9_image'));
            }
            if ($request->hasFile('gallery10_image')) {
                $input['gallery10_image'] = $this->cardimageUpload($request->file('gallery10_image'));
            }
            if ($request->hasFile('gpay_QR')) {
                $input['gpay_QR'] = $this->cardimageUpload($request->file('gpay_QR'));
            }
            if ($request->hasFile('phonepay_QR')) {
                $input['phonepay_QR'] = $this->cardimageUpload($request->file('phonepay_QR'));
            }
            if ($request->hasFile('paytm_QR')) {
                $input['paytm_QR'] = $this->cardimageUpload($request->file('paytm_QR'));
            }
            if ($request->hasFile('upi_QR')) {
                $input['upi_QR'] = $this->cardimageUpload($request->file('upi_QR'));
            }

            if ($model->update($input)) {
                $data['msg'] = "You have successfully updated the Business card form";
            }


            $data_msg['c_id'] = $model->id;
            $data_msg['msg'] = "You have successfully updated the Business card form";
            return response()->json($data_msg);
        }
    }

    public function edit_profile() {
        $model = User::findOrFail(Auth::guard('frontend')->user()->id);
        return view('user.edit_profile', compact('model'));
    }

    public function post_profile(CustomerEditprofileRequest $request) {
        if ($request->ajax()) {
            $data = [];
            $model = User::findOrFail(Auth::guard('frontend')->user()->id);
            $input = $request->all();
            if ($request->hasFile('image')) {
                $input['image'] = $this->imageUpload($request);
            }

            if ($model->update($input)) {
                $data['msg'] = "Profile updated successfully.";
            }
            $notification = [];
            $user_id = Auth::guard('frontend')->user()->id;

            return response()->json($data);
        }
    }

    function imageUpload(Request $request) {
        if ($request->hasFile('image')) {  //check the file present or not
            $image = $request->file('image'); //get the file
            $name = $this->rand_string(15) . time() . '.' . $image->getClientOriginalExtension(); //get the  file extention
            $destinationPath = public_path('uploads/frontend/profile_picture/original/'); //public path folder dir
            $path = public_path('uploads/frontend/profile_picture/');
            Image::make($image->getRealPath())->resize(300, 300)->save($path . 'preview/' . $name);
            Image::make($image->getRealPath())->resize(100, 100)->save($path . 'thumb/' . $name);
            $image->move($destinationPath, $name);
            return $name;
        }
    }

    public function reset_password(ChangePasswordRequest $request) {
        if ($request->ajax()) {
            $data_msg = [];
            $model = User::findOrFail(Auth::guard('frontend')->user()->id);
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $model->update($input);
            $data_msg['msg'] = 'Your password changed successfully.';
            return response()->json($data_msg);
        }
    }

    public function apply_coupon(ApplycouponRequest $request) {
        if ($request->ajax()) {

            $data_msg = [];
            $subscription = Setting::where('slug', 'subscription_charge')->first();

            $input = $request->only('coupon_id');
            $model = Coupon::where('coupon_id', '=', $input['coupon_id'])->first();
            $value = $model->amount;
            $bal = $subscription->value - $value;
            // print_r(1);
            // exit;
            if ($bal == 0) {
              $model->total_used =$model->total_used +1;
            	$model->save();
                $user = [];
                $card=[];
                $todayDate = date('Y-m-d H:i:s');
                $futureDate = date('Y-m-d H:i:s', strtotime('+1 year'));
              	$user['franchise_id'] = $model->created_for;
                $user['coupen_used'] = $model->id;
                $user['payment_status'] = '1';
                $user['subscription_date'] = $todayDate;
                $user['subscription_end'] = $futureDate;
                $models = User::findOrFail(Auth::guard('frontend')->user()->id);
                $models->update($user);
                $data_msg['type'] = 'done';
                $data_msg['link'] = Route('dashboard');
                $request->session()->flash('success', 'you apply a Coupon code successfully.');
                $card['user_id']=$user_id = Auth::guard('frontend')->user()->id;
                $card['user_name'] = Auth::guard('frontend')->user()->user_name;
                $cardmodel = Card::where('user_id', $user_id)->where('status', '1')->first();
                if (empty($cardmodel)){
                Card::create($card);
                }
              
            } else {
              	$user = [];
              
              	$inr_to_usd = Setting::where('slug', 'inr_to_usd')->first();
              	$paypal_bal=round($bal/$inr_to_usd->value,2);
              	$data_msg['coupen_id'] =$model->id ;
                $data_msg['type'] = 'notdone';
                $data_msg['bal'] = $bal . '00';
                $data_msg['total'] = $bal;
              	$data_msg['paypal_bal'] = $paypal_bal;
                $data_msg['paypal_total'] = $paypal_bal;
                $data_msg['msg'] = 'you applied coupon code successfully';
            }
            return response()->json($data_msg);
        }
    }

}
