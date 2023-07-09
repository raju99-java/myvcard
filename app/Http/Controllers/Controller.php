<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use MetaTag;
use App\Seo;
use Mail;
use App\Email;
use App\User;
use App\Cms;
use Storage;
use PDF;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function __construct(Request $request) {
        
    }
    
    public function rand_string($digits) {
        $alphanum = Str::random(40) . Carbon::now()->timestamp;
        $rand = Str::limit(str_shuffle($alphanum), $digits, '');
        return $rand;
    }

    public function SendMail($data) {
        $template = view('mail.layouts.template')->render();
        $content = view('mail.' . $data['template'], $data['data'])->render();
        $view = str_replace('[[email_message]]', $content, $template);
        $data['title']=Cms::where('slug','=','title')->first();
        // $title=isset($title->content_body) && $title->content_body!=''?$title->content_body:'Fast Card';
        $data['content'] = $view;
        $data['adminemail'] = User::where('type_id','1')->first();
//        $headers = "MIME-Version: 1.0" . "\r\n";
//        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//        $headers .= 'From: admin@laravel.com' . "\r\n" .
//                'Reply-To: no-reply@laravel.com' . "\r\n" .
//                'X-Mailer: PHP/' . phpversion();
//        $va = str_replace('[[email_message]]', $content, $template);
//        return mail($data['to'], $data['subject'], $va, $headers);
        Mail::send([], [], function ($message) use ($data) {
            $message->from("no-reply@myvcard.business", env('APP_NAME', 'My V Card'));
            $message->replyTo('no-reply@myvcard.business', env('APP_NAME', 'My V Card'));
            $message->subject(strip_tags($data['title']->content_body).' '.$data['subject']);
            $message->setBody($data['content'], 'text/html');
            $message->to($data['to']);
        });
    }


    public function get_email_data($slug, $replacedata = array()) {
        $email_data = Email::where(['slug' => $slug])->first();
        $email_msg = "";
        $email_array = array();
        $email_msg = $email_data->body;
        $subject = $email_data->subject;
        if (!empty($replacedata)) {
            foreach ($replacedata as $key => $value) {
                $email_msg = str_replace("{{" . $key . "}}", $value, $email_msg);
            }
        }
        return array('body' => $email_msg, 'subject' => $subject);
    }
  public function Send_invoice($data) {
        // $template = view('mail.layouts.template')->render();
        $template = view('mail.layouts.template')->render();
        $content = view('mail.' . $data['template'], $data['data'])->render();
        $view = str_replace('[[email_message]]', $content, $template);
        $model['sale_price']=$data['sell_price'];
    	$model['tax']=$data['tax'];
    	$model['currency']=$data['currency'];
    	$model['amount']=isset($data['amount'])?$data['amount']:$data['sell_price']+$data['tax'];
        $model['user']=User::where("id",$data['id'])->first();
    	$model['random']=$this->rand_string(8);
    	$path = public_path('uploads/pdf/invoice.pdf');
    	$data['pdf']=$pdf = PDF::loadView('mail.' . $data['card'],$model)->save($path);
    	//Storage::put('public/uploads/pdf/invoice.pdf', $pdf->output());
    	
        //print_r($model);die();
        //$view = view('mail.' . $data['template'], $model)->render();
    	//print_r($view);die();
        // $view = str_replace('[[email_message]]', $content, $template);
        $data['content'] = $view;
        Mail::send([], [], function ($message) use ($data,$pdf) {
            $message->from('noreply@myvcard.business', env('APP_NAME', 'My V Card'));
            $message->replyTo('noreply@myvcard.business', env('APP_NAME', 'My V Card'));
            $message->subject($data['subject']);
            $message->setBody($data['content'], 'text/html');
          	$message->attach(public_path('uploads/pdf/invoice.pdf'));
            $message->to($data['to']);
        });
    	
    }

}
