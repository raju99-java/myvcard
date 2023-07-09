<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Datatables;
use Validator;
//********** Models ************//
use App\User;
use App\Setting;
use App\Coupon;

class CouponController extends Controller {

    public function index(Request $request) {
        if ($request->ajax()) {
//            print_r(1);
//            exit;
            $model = Coupon::select('*')->orderBy('id', 'DESC');
            return DataTables::of($model)
                            ->addColumn('action', function($row) {
                                return '<a href="' . Route('coupon-edit', ['id' => base64_encode($row->id)]) . '" class="btn btn-outline btn-circle btn-sm purple">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>';
                            })
                            ->editColumn('Coupon_id', function ($model) {
                                return $model->Coupon_id;
                            })
                            ->editColumn('status', function ($model) {
                                if ($model->status == '0') {
                                    $status = '<span class="badge badge-warning"><i class="icofont-warning"></i>Inacive</span>';
                                } else if ($model->status == '1') {
                                    $status = '<span class="badge badge-success"><i class="icofont-check"></i>Active</span>';
                                }
                                return $status;
                            })
                            ->editColumn('total_used', function ($model) {
                                return $model->total_used;
                            })
                            ->editColumn('amount', function ($model) {
                                return (!empty($model->amount)) ? $model->amount : 'Not applicable';
                            })
                            ->editColumn('created_at', function ($model) {
                                return (!empty($model->created_at)) ? \Carbon\Carbon::parse($model->created_at)->format('Y-m-d') : 'Not Found';
                            })
                            ->editColumn('created_for', function ($model) {
                                $franchise = User::where('id', $model->created_for)->where('status', '1')->first();
                                return (!empty($franchise)) ? $franchise->name : 'Not applicable';
                            })
                            ->rawColumns(['status', 'action'])
                            ->make(true);
        }
        if (Auth()->guard('frontend')->user()->type_id == '1') {
            return view('coupons.index');
        } else {
            return redirect()->route('/')->with('error', 'oops! Something went wrong in this url.');
        }
    }

    public function get_add() {
        $data = [];
        $data['coupon_code'] = $this->rand_string(20);
        if (Auth()->guard('frontend')->user()->type_id == '1') {
            $data['franchises'] = User::where('type_id', '3')->where('status', '1')->get();
            return view('coupons.add', $data);
        } else {
            return redirect()->route('/')->with('error', 'oops! Something went wrong in this url.');
        }
    }

    public function post_add(Request $request) {
        $validator = Validator::make($request->all(), [
                    'coupon_id' => 'required',
                    'amount' => 'required|numeric',
        ]);
        $validator->after(function($validator) use($request) {
            $checkCoupon = Coupon::where('coupon_id', $request->input('coupon_id'))->where('status', '1')->count();
            if ($checkCoupon > 0) {
                $validator->errors()->add('coupon_id', 'coupon code already in use.');
            }
            $subscription = Setting::where('slug', 'subscription_charge')->first();

            if ($request->input('amount') == 0 || $request->input('amount') > $subscription->value) {
                $validator->errors()->add('amount', 'please enter a value less than subscription charge');
            }
        });
        if ($validator->passes()) {
            $input = $request->all();
            $input['status'] = '1';
            $model = Coupon::create($input);

            return redirect()->route('coupon')->with('success', 'Coupon added successfully.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput()->with('error_msg', 'Something went wrong please check your input.');
        }
    }

    public function edit($id) {
        $id = base64_decode($id);
        $model = Coupon::findOrFail($id);
        return view('coupons.update', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
                    'status' => 'required',
        ]);
        $validator->after(function($validator) use($request) {
            
        });
        if ($validator->passes()) {
            $input = $request->all();
            $id = base64_decode($id);
            $model = Coupon::findOrFail($id);
            $model->update($input);
            $request->session()->flash('success', 'Coupon updated successfully.');
            return redirect()->route('coupon-edit', ['id' => base64_encode($id)])->withInput();
        } else {
            return redirect()->back()->withErrors($validator)->withInput()->with('error_msg', 'Something went wrong please check your input.');
        }
    }

}
