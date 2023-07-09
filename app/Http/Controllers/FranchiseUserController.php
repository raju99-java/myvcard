<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
// ************ Requests ************
use App\Http\Requests\CustomerRequest;
// ************ Mails ************
// ************ Models ************
use App\User;
use App\Card;
use App\Coupon;

class FranchiseUserController extends Controller{

	public function franchise_user(Request $request) {
        if ($request->ajax()) {
            $data = User::where('type_id', '=', '2')->where('franchise_id',Auth()->guard('frontend')->user()->id)->where('payment_status','1')->where('subscription_end', '>=', Carbon::now()->format('Y-m-d'))->get();
            return Datatables::of($data)
                            ->addIndexColumn()
              				->editColumn('user_name', function($row) {
                              $card=Card::where('user_id',$row->id)->first();
                              if(!empty($card)){
                                $link = Route('card',['user_name'=>$row->user_name]);
                                return '<a href="' . $link . '" class="btn btn-outline btn-circle btn-sm blue" target="_blank">
                                        <i class="fa fa-eye"></i> View
                                    </a>';
                              }else{
                                return 'Not Available';
                              }
                                
                            })
              				->editColumn('coupen_used', function($row) {
                              $coupon_id=Coupon::where('id', '=', $row->coupen_used)->first();
                              if(!empty($coupon_id)){
                                
                                return $coupon_id->coupon_id;
                              }else{
                                return 'Not Available';
                              }
                            })
                            ->editColumn('last_login_at', function($row) {
                                return date('jS M Y, g:i A', strtotime($row->last_login_at));
                            })
                            ->editColumn('created_at', function($row) {
                                return date('jS M Y, g:i A', strtotime($row->created_at));
                            })
                            ->editColumn('payment_status', function($row) {
                                return ($row->payment_status == '1' && $row->subscription_end >= Carbon::now()->format('Y-m-d')) ? '<span class="label label-sm label-success"> Active </span>' : '<span class="label label-sm label-warning"> Inactive </span>';
                            })
                            ->editColumn('status', function($row) {
                                return ($row->status === '0') ? '<span class="label label-sm label-warning"> Inactive </span>' : (($row->status === '1') ? '<span class="label label-sm label-success"> Active </span>' : '<span class="label label-sm label-danger"> Block </span>');
                            })
                            ->rawColumns(['status', 'action','payment_status','user_name'])
                            ->make(true);
        }
        return view('franchiseuser.index');
    }
    
 


}
