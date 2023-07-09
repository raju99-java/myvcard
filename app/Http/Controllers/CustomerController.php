<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Validator;
// ************ Requests ************
use App\Http\Requests\CustomerRequest;
// ************ Mails ************
// ************ Models ************
use App\User;
use App\Card;
use App\Coupon;

class CustomerController extends Controller {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = User::where('type_id', '=', '2')->get();
            return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row) {
                                $card=Card::where('user_id',$row->id)->first();
                                if(empty($card)){
                                    $subscription= '<a href="' . Route('customer-subscription-add', ['id' => base64_encode($row->id)]) . '" class="btn btn-outline btn-circle btn-sm green">
                                        <i class="fa fa-plus"></i> Add Subscription
                                    </a>';
                                }else{
                                    $subscription= '<a href="' . Route('customer-subscription-edit', ['id' => base64_encode($row->id)]) . '" class="btn btn-outline btn-circle btn-sm green">
                                        <i class="fa fa-plus"></i> Edit Subscription
                                    </a>';
                                }
                                return '<a href="' . Route('customer.show', ['id' => base64_encode($row->id)]) . '" class="btn btn-outline btn-circle btn-sm blue">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                    <a href="' . Route('customer.edit', ['id' => base64_encode($row->id)]) . '" class="btn btn-outline btn-circle btn-sm purple">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>'.$subscription;
                            })
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
        return view('customer.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
//    public function create() {
//        return view('customer.create');
//    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
//    public function store(CustomerRequest $request) {
//        $input = $request->all();
//        $input['type_id'] = '4';
//        $password = $this->rand_string(8);
//        $input['password'] = Hash::make($password);
//        $input['status'] = '1';
//        $model = User::create($input);
////        Mail::to($model->email)->send(new CreateCustomerMail($model, $password));
//        $email_setting = $this->get_email_data('new_account_create_for_customer', array('NAME' => $input['first_name'], 'EMAIL' => $input['email'], 'PASSWORD' => $password));
//            $email_data = [
//                'to' => $model->email,
//                'subject' => $email_setting['subject'],
//                'template' => 'create_customer',
//                'data' => ['message' => $email_setting['body']]
//            ];
//            $this->SendMail($email_data);
//        $request->session()->flash('success', 'Customer created successfully.');
//        return redirect()->route('customer.index');
//    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id) {
        $id = base64_decode($id);
        $model = User::findOrFail($id);
        return view('customer.view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id) {
        $id = base64_decode($id);
        $model = User::findOrFail($id);
        return view('customer.update', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CustomerRequest $request, $id) {
        $input = $request->all();
        $id = base64_decode($id);
        $model = User::findOrFail($id);
        $model->update($input);
        $request->session()->flash('success', 'Customer updated successfully.');
        return redirect()->route('customer.edit', ['id' => base64_encode($id)])->withInput();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id) {
        $id = base64_decode($id);
        User::findOrFail($id)->delete();
        Session::flash('success', "Customer deleted successfully.");
        return redirect()->route('customer.index');
    }
    
    
    
    public function get_subscription_add($id) {
        $id = base64_decode($id);
        $model = User::findOrFail($id);
        return view('customer.addSubscription', compact('model'));
    }
    
    public function post_subscription_add(Request $request, $id) {
        $validator = Validator::make($request->all(), [
                    'subscription_end' => 'required',
        ]);
        $validator->after(function($validator) use($request) {
            
        });
        if ($validator->passes()) {
            $input = $request->all();
            $id = base64_decode($id);
            $model = User::findOrFail($id);
            $todayDate = date('Y-m-d H:i:s');
            $input['payment_status'] = '1';
          	$input['subscription_date'] = $todayDate;
            $model->update($input);
            /* Card Add */
            $card=[];
            $card['user_id']=$user_id = $model->id;
            $card['user_name'] = $model->user_name;
            $cardmodel = Card::where('user_id', $user_id)->where('status', '1')->first();
            if (empty($cardmodel)){
                 Card::create($card);
            }
            // $request->session()->flash('success', 'User subscription added successfully.');
            return redirect()->route('customer.index')->with('success', 'User subscription added successfully.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput()->with('error_msg', 'Something went wrong please check your input.');
        }
    }
    
    public function get_subscription_edit($id) {
        $id = base64_decode($id);
        $model = User::findOrFail($id);
        return view('customer.editSubscription', compact('model'));
    }
    
    public function post_subscription_update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
                    'subscription_end' => 'required',
                    'payment_status' => 'required',
        ]);
        $validator->after(function($validator) use($request) {
            
        });
        if ($validator->passes()) {
            $input = $request->all();
            $id = base64_decode($id);
            $model = User::findOrFail($id);
            $todayDate = date('Y-m-d H:i:s');
            // $input['payment_status'] = '1';
        //   	$input['subscription_date'] = $todayDate;
            $model->update($input);
            /* Card Add */
           
            // $request->session()->flash('success', 'User subscription update successfully.');
            return redirect()->route('customer.index')->with('success', 'User subscription update successfully.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput()->with('error_msg', 'Something went wrong please check your input.');
        }
    }

}
