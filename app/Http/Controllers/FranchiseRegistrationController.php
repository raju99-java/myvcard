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
use App\Http\Requests\FranchiseRegistrationRequest;
// ************ Mails ************
// ************ Models ************
use App\User;
use App\Card;
use App\Coupon;

class FranchiseRegistrationController extends Controller{

	public function index(Request $request) {
      	
        $franchises = User::where('type_id', '=', '3')->where('status','1')->get();
        return view('franchiseregistration.index',compact('franchises'));
    }
  public function franchise_registration(FranchiseRegistrationRequest $request) {
        if ($request->ajax()) {
          	$franchise=[];
          	$id=$request->input('franchise');
          	$year = !empty($request->input('year')) ? $request->input('year') : date('Y');
          	$month = !empty($request->input('month')) ? $request->input('month') : date('m');
          	
          
          	$franchise['total']=$total = User::where('type_id', '=', '2')->where('franchise_id',$id)->whereMonth('subscription_date', '=', $month)->whereYear('subscription_date', $year)->count();
          	$franchise['users'] = User::where('type_id', '=', '2')->where('franchise_id',$id)->whereMonth('subscription_date', '=', $month)->whereYear('subscription_date', $year)->get();
            $data['content'] = view('franchiseregistration.result', $franchise)->render();
            $data['status'] = 200;
            return response()->json($data);
        }
        
    }
    
 


}
