<?php

# Copy the code from below to that controller file located at app/Http/Controllers/RazorpayController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\User;
use App\Setting;
use App\Coupon;
use App\Card;
use App\Cms;

class RazorpayController extends Controller {

    public function pay() {
        if (Auth()->guard('frontend')->user()->type_id == '2' && Auth()->guard('frontend')->user()->payment_status == '1' && Auth()->guard('frontend')->user()->subscription_end >= Carbon::now()->format('Y-m-d')) {
            return redirect()->route('card_form');
        } else {
            $data = [];
            $data['subscription'] = Setting::where('slug', 'subscription_charge')->first();
            $data['razorpay'] = Setting::where('slug', 'razorpay_key')->first();
          	$data['inr_to_usd'] = Setting::where('slug', 'inr_to_usd')->first();
          	$data['paypal'] = Setting::where('slug', 'client_id')->first();
            return view('pay', $data);
        }
    }

    public function dopayment(Request $request) {
        //Input items of form
        $data_msg = [];
      	$title=Cms::where('slug','=','title')->first();
        $card=[];
        $input = $request->all();
		$coupen_id= $request->input('coupen_id');
      	$currency= $request->input('currency');
      	if($currency=='INR'){
          $amount= $request->input('amount')/100;
          $sell_price_old=($amount*100)/105;
          $sell_price=round($sell_price_old, 2);
        }else{
          $amount= $request->input('amount');
          $sell_price_old=($amount*100)/105;
          $sell_price=round($sell_price_old, 2);
        }
      	$tax_price=round((($sell_price_old*5)/100), 2);
      	if($coupen_id!=0){
          $coupen = Coupon::where('id', '=', $coupen_id)->first();
          $coupen->total_used =$coupen->total_used +1;
          $coupen->save();
          $input['franchise_id'] = $coupen->created_for;
          $input['coupen_used'] = $coupen_id;
        }
        $futureDate = date('Y-m-d', strtotime('+1 year'));
      	$todayDate = date('Y-m-d H:i:s');
        $input['payment_status'] = '1';
      	$input['subscription_date'] = $todayDate;
        $input['subscription_end'] = $futureDate;
        $model = User::findOrFail(Auth::guard('frontend')->user()->id);
        $card['user_id']=$user_id = Auth::guard('frontend')->user()->id;
        $card['user_name'] = Auth::guard('frontend')->user()->user_name;
        $cardmodel = Card::where('user_id', $user_id)->where('status', '1')->first();
        if (empty($cardmodel)){
             Card::create($card);
        }
      	$email_setting = $this->get_email_data('purchase_card', array('NAME' => $model->name,'TITLE'=>$title->content_body));
            
      	
      	$email_data = [
                'to' => $model->email,
                'subject' => "Card purchase",
                'template' => 'signup',
          		'card' => 'invoice',
          		'sell_price' => $sell_price,
          		'tax' => $tax_price,
          		'currency' => $currency,
          		'amount' => $amount,
                'id' => $model->id,
          		'data' => ['message' => $email_setting['body']]
            ];
      
        $this->Send_invoice($email_data);
        $admin_model = User::where('type_id','1')->first();
      	$email_setting = $this->get_email_data('admin_purchase_card', array('NAME' => $admin_model->name,'TITLE'=>$title->content_body));
      	$emails = array("$admin_model->email", "fastcardindia@gmail.com");
      	$email_data = [
                'to' => $emails,
                'subject' => "Card purchase",
                'template' => 'signup',
          		'card' => 'invoice',
          		'sell_price' => $sell_price,
          		'tax' => $tax_price,
          		'currency' => $currency,
          		'amount' => $amount,
                'id' => $model->id,
          		'data' => ['message' => $email_setting['body']]
            ];
         $this->Send_invoice($email_data);
      
        if ($model->update($input)) {
            $data_msg['msg'] = 'Your Payment is successful';
        }else{
          	$data_msg['msg'] = 'Some thing went wwrong!';
        }

        return response()->json($data_msg);
        // Please check browser console.
    }

}
