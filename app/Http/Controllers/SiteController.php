<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Arr;
use Validator;
use Illuminate\Support\Facades\Redirect;
// ************ Requests ************
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ForgotRequest;
use App\Http\Requests\ResetRequest;
use App\Http\Requests\ContactUsRequest;
// ************ Mails ************
use App\Mail\Registration;
use App\Mail\ForgotPassword;
use App\Mail\Thankyou;
use App\Mail\ResendActiveTokenMail;
// ************ Models ************
use App\User;
use App\Card;
use App\Cms;
use App\Testimonial;
use App\Setting;
use App\CardArena;
use App\Feature;
class SiteController extends Controller {

    public function index() {
        $data = [];
        $data['banner1']=Cms::where('slug','=','slider1')->first();
        $data['banner2']=Cms::where('slug','=','slider2')->first();
        $data['banner3']=Cms::where('slug','=','slider3')->first();
        $data['testimonials'] = Testimonial::select('*')->where('status','1')->get();
        $data['cardarenas'] = CardArena::select('*')->where('status','1')->get();
        $data['signup_text'] = Cms::where('slug','=','signup_text')->first();
        $data['create_card_text'] = Cms::where('slug','=','create_card_text')->first();
        $data['share_your_card_text'] = Cms::where('slug','=','share_your_card_text')->first();
        $data['follow_Up_text'] = Cms::where('slug','=','follow_Up_text')->first();
        $data['why_digital_business_card_text'] = Cms::where('slug','=','why_digital_business_card_text')->first();
        $data['video_url_active']=Setting::where('slug','home_video')->first();
        $data['video_url'] = Cms::where('slug','=','home_video_url')->first();
        $data['total_visitors'] = Cms::where('slug','=','total_visitors')->first();
        $data['total_distributors'] = Cms::where('slug','=','total_distributors')->first();
        $data['total_users'] = Cms::where('slug','=','total_users')->first();
        $data['total_cards'] = Cms::where('slug','=','total_cards')->first();
        
        $data['valuable_clients_image1'] = Cms::where('slug','=','valuable_clients_image1')->first();
        $data['valuable_clients_image2'] = Cms::where('slug','=','valuable_clients_image2')->first();
        $data['valuable_clients_image3'] = Cms::where('slug','=','valuable_clients_image3')->first();
        $data['valuable_clients_image4'] = Cms::where('slug','=','valuable_clients_image4')->first();
        
        $data['valuable_clients_url1'] = Cms::where('slug','=','valuable_clients_url1')->first();
        $data['valuable_clients_url2'] = Cms::where('slug','=','valuable_clients_url2')->first();
        $data['valuable_clients_url3'] = Cms::where('slug','=','valuable_clients_url3')->first();
        $data['valuable_clients_url4'] = Cms::where('slug','=','valuable_clients_url4')->first();
        
        $data['tags'] = Cms::where('slug','=','tags')->first();
        
        
        return view('site.index', $data);
    }
    public function login() {
        $data = [];
        return view('site.login', $data);
    }
    public function about_us() {
        $data = [];
        $data['about_us'] = Cms::where('slug','=','about_us')->first();
        return view('site.about_us', $data);
    }
    public function contact() {
        $data = [];
        $data['office_address'] = Cms::where('slug','=','office_address')->first();
        $data['official_email'] = Cms::where('slug','=','official_email')->first();
        $data['map_iframe'] = Cms::where('slug','=','map_iframe')->first();
        return view('site.contact', $data);
    }
    public function franchise() {
        $data = [];
        $data['office_address'] = Cms::where('slug','=','office_address')->first();
        $data['official_email'] = Cms::where('slug','=','official_email')->first();
        return view('site.franchise', $data);
    }
    public function pricing() {
        $data = [];
        $data['subscription'] = Setting::where('slug', 'subscription_charge')->first();
        $data['sale_price'] = Setting::where('slug', 'sale_price')->first();
        $data['pricing_description'] = Cms::where('slug','=','pricing_description')->first();
        return view('site.pricing', $data);
    }
    public function features() {
        $data = [];
        $data['features_owl'] = Feature::select('*')->where('status','1')->get();
        $data['features'] = Cms::where('slug','=','features')->first();
        return view('site.features', $data);
    }
    public function how_it_works() {
        $data = [];
        $data['signup_text'] = Cms::where('slug','=','signup_text')->first();
        $data['create_card_text'] = Cms::where('slug','=','create_card_text')->first();
        $data['share_your_card_text'] = Cms::where('slug','=','share_your_card_text')->first();
        $data['follow_Up_text'] = Cms::where('slug','=','follow_Up_text')->first();
        $data['how_it_works_instructions'] = Cms::where('slug','=','how_it_works_instructions')->first();
        return view('site.how-it-works', $data);
    }

    public function get_signup() {
        $data = [];
        
        return view('site.registration', $data);
    }
    public function privacy_policy() {
        $data = [];
        $data['privacy_policy'] = Cms::where('slug','=','privacy_policy')->first();
        return view('site.privacy_policy', $data);
    }
    public function terms_conditions() {
        $data = [];
        $data['terms_and_condition'] = Cms::where('slug','=','terms_and_condition')->first();
        return view('site.terms_conditions', $data);
    }
  
  	public function return_refund_policy() {
        $data = [];
        $data['return_and_refund_policy'] = Cms::where('slug','=','return_and_refund_policy')->first();
        return view('site.return_refund_policy', $data);
    }

    public function post_signup(RegisterRequest $request) {
        if ($request->ajax()) {
            ini_set('max_execution_time', 0);
            $data_msg = [];
            $input = $request->all();
            if ($request->hasFile('image')) {
                $input['image'] = $this->imageUpload($request);
            }
            $input['type_id'] = '2';
            $input['password'] = Hash::make($input['password']);
            $input['active_token'] = $this->rand_string(20);
            $model = User::create($input);

            $link = Route('active-account', ['id' => base64_encode($model->id), 'token' => $model->active_token]);
            $title=Cms::where('slug','=','title')->first();
            $email_setting = $this->get_email_data('customer_registration', array('NAME' => $model->name, 'LINK' => $link,'TITLE'=>$title->content_body));
            $email_data = [
                'to' => $model->email,
                'subject' => $email_setting['subject'],
                'template' => 'signup',
                'data' => ['message' => $email_setting['body']]
            ];
            $this->SendMail($email_data);

    
            $data_msg['u_id'] = $model->id;
            $data_msg['msg'] = "You are successfully registered. Please check your email to verify your account.";
            return response()->json($data_msg);
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

//    public function resend_active_token(Request $request) {
//        if ($request->ajax()) {
//            $user_id = $request->input('id');
//            if (!empty($user_id)) {
//                $model = User::findorFail($user_id);
//            } else {
//                $model = NULL;
//            }
//            if (!empty($model)  && $model->active_token !== NULL) {
//                $link = Route('active-account', ['id' => base64_encode($model->id), 'token' => $model->active_token]);
//                Mail::to($model->email)->send(new ResendActiveTokenMail($model, $link));
//                $data['msg'] = 'A resend mail send to your registered mail address.';
//                $data['status'] = 200;
//            } else {
//                $data['msg'] = 'Opps! something went wrong.';
//            }
//            return response()->json($data);
//        }
//    }

    public function get_active_account(Request $request, $id, $token) {
        if ($id == "" && $token == "") {
            return redirect()->route('/')->with('error', 'Oops! Something went wrong in this url.');
        }
        $id = base64_decode($id);
        $model = User::where('id', $id)->where('active_token', $token)->first();

        if (empty($model)) {

            return redirect()->route('/')->with('error', 'Requested url is no longer valid. Please try again.');
        } else {
            Auth::guard('frontend')->login($model);
            $model->email_verified_at = Carbon::now()->toDateTimeString();
            $model->active_token = NULL;
            $model->status = '1';
            $model->last_login_at = Carbon::now()->toDateTimeString();
            $model->save();
            return redirect()->route('dashboard')->with('success', 'Your account has been activated successfully.');
        }
    }

    public function post_login(LoginRequest $request) {
        if ($request->ajax()) {
            $data_msg = [];
            $input = $request->only('email');
            $model = User::where('email', '=', $input['email'])->first();
            
            Auth::guard('frontend')->login($model);
            $model->last_login_at = Carbon::now()->toDateTimeString();
            $model->save();
            $data_msg['link'] = Route('dashboard');
            $request->session()->flash('success', 'You are successfully logged in.');
            return response()->json($data_msg);
        }
    }

    public function logout() {
        Auth::guard('frontend')->logout();
        return redirect('/')->with('success', 'You are successfully logged out.');
    }

    public function get_forgot_password() {
        $data = [];

        return view('site.forgot-one', $data);
    }

    public function post_forgot_password(ForgotRequest $request) {
        if ($request->ajax()) {
            $data_msg = [];
            $input = $request->all();
            $input['reset_token'] = $this->rand_string(20);
            $model = User::where('email', '=', $input['email'])->first();
            $model->update($input);
            $link = Route('reset-password', ['id' => base64_encode($model->id), 'token' => $model->reset_token]);
            $title=Cms::where('slug','=','title')->first();
            $email_setting = $this->get_email_data('forgot_password', array('NAME' => $model->name, 'EMAIL' => $input['email'], 'LINK' => $link,'TITLE'=>$title->content_body));
            $email_data = [
                'to' => $model->email,
                'subject' => $email_setting['subject'],
                'template' => 'forgot_password',
                'data' => ['message' => $email_setting['body']]
            ];
            $this->SendMail($email_data);
            $data_msg['msg'] = 'Your reset password link has been sent to your email.';
            return response()->json($data_msg);
        }
    }

    public function get_reset_password($id, $token) {
        if ($id === "" && $token === "") {
            return redirect()->route('/')->with('error', 'oops! Something went wrong in this url.');
        }
        $id = base64_decode($id);
        $model = User::where('id', $id)->where('reset_token', $token)->first();
        if (empty($model))
            return redirect()->route('/')->with('error', 'oops! Something went wrong in this url.');
        else {
            Session::put('user_id', $id);
            Session::put('forgot_token', $token);
            $data = [];
            return view('site.forgot-two', $data);
        }
    }

    public function post_reset_password(ResetRequest $request) {
        if ($request->ajax()) {
            $data_msg = [];
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $input['reset_token'] = NULL;
            $user_id = Session::get('user_id');
            $model = User::findOrFail($user_id);
            $model->update($input);
            Session::remove('user_id');
            Session::remove('forgot_token');
            $data_msg['link'] = Route('/');
            $data_msg['msg'] = 'Your password changed successfully.';
            return response()->json($data_msg);
        }
    }

    public function post_contact(ContactUsRequest $request) {
        if ($request->ajax()) {
            $data_msg = [];
            $email = User::where('id',$request->input('user_id'))->first();
            $input = $request->all();
            
            if (!empty($email)):
                $email_setting = $this->get_email_data('contact_us', array('ADMIN' => "$email->name", 'NAME' => $input['name'], 'EMAIL' => $input['email'],
                    'PHONE' => ($input['phone'] != "") ? $input['phone'] : 'Not Provided', 'MESSAGE' => $input['message']));
                $email_data = [
                    'to' => $email->email,
                    'subject' => $email_setting['subject'],
                    'template' => 'signup',
                    'data' => ['message' => $email_setting['body']]
                ];
                $this->SendMail($email_data);
            endif;

            $data_msg['msg'] = 'Thank you for contacting us. We will Contact you soon.';
            return response()->json($data_msg);
        }
    }
    public function post_contact_admin(Request $request) {
            $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'message' => 'required'
        ]);
        $validator->after(function($validator) use($request){
           
        });
            if ($validator->passes()) {
             $data_msg = [];
            $email = User::where('type_id','1')->first();
            $input = $request->all();
            
            if (!empty($email)):
               
                $email_setting = $this->get_email_data('contact_us', array('ADMIN' => "$email->name", 'NAME' => $input['name'], 'EMAIL' => $input['email'],
                    'PHONE' => ($input['phone'] != "") ? $input['phone'] : 'Not Provided',
                    'MESSAGE' => $input['message']));
                $email_data = [
                    'to' => $email->email,
                    'subject' => $email_setting['subject'],
                    'template' => 'signup',
                    'data' => ['message' => $email_setting['body']]
                ];
                $this->SendMail($email_data);
            endif;
            
            return redirect()->route('contact')->with('success', 'Thank you for contacting us. We will Contact you soon.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput()->with('error_msg', 'Something went wrong please check your input.');
        }
            
        
    }
    public function post_franchise_admin(Request $request) {
            $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'message' => 'required'
        ]);
        $validator->after(function($validator) use($request){
           
        });
            if ($validator->passes()) {
             $data_msg = [];
            $email = User::where('type_id','1')->first();
            $input = $request->all();
            
            if (!empty($email)):
               
                $email_setting = $this->get_email_data('franchise', array('ADMIN' => "$email->name", 'NAME' => $input['name'], 'EMAIL' => $input['email'],
                    'PHONE' => ($input['phone'] != "") ? $input['phone'] : 'Not Provided','COMPANY' => ($input['company'] != "") ? $input['company'] : 'Not Provided',
                    'MESSAGE' => $input['message']));
                $email_data = [
                    'to' => $email->email,
                    'subject' => $email_setting['subject'],
                    'template' => 'signup',
                    'data' => ['message' => $email_setting['body']]
                ];
                $this->SendMail($email_data);
            endif;
            
            return redirect()->route('franchises')->with('success', 'Thank you for contacting us. We will Contact you soon.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput()->with('error_msg', 'Something went wrong please check your input.');
        }
            
        
    }

function raf_create_vcard(){
$format_name = utf8_encode($name);
$format_email = utf8_encode($email);
$format_tel = utf8_encode($tel);
$format_fax = utf8_encode($fax);
$format_www = utf8_encode($www);
$format_address = utf8_encode($address);

return 'BEGIN%3AVCARD%0D%0AVERSION%3A4.0%0D%0AN%3A%3B'.$format_name.'%3B%3B%3B%0D%0AFN%3A'.$format_name.'%0D%0AEMAIL%3A'.$format_email.'%0D%0AORG%3A'.$format_name.'%0D%0ATEL%3A'.$format_tel.'%0D%0ATEL%3Btype%3DFAX%3A'.$format_fax.'%0D%0AURL%3Btype%3Dpref%3A'.$format_www.'%0D%0AADR%3A%3B'.$format_address.'%3B%3B%3B%3B%3BSpain%0D%0AEND%3AVCARD';   
}


    public function card($username) {
        $data = [];
        if ($username === "") {
            return redirect()->route('/')->with('error', 'oops! Something went wrong in this url.');
        }
        $model = Card::where('user_name', $username)->where('status', '1')->first();
        if (empty($model))
            return view('errors.404', $data);
        else {
            $user = User::where('id', $model->user_id)->where('status', '1')->first();
            $model->views = $model->views+1 ;
            $model->save();
            $user_id= $model->user_id;
            if (isset($user) && $user->payment_status == '1' && $user->subscription_end >= Carbon::now()->format('Y-m-d')) {
                return view('card.card', compact('user_id', 'model','user'));
            } else {
                return view('errors.404', $data);
            }
        }
    }

}
