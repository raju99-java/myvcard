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

use App\Http\Requests\TestimonialRequest;
//********** Models ************//
use App\User;
use App\Setting;
use App\Coupon;
use App\Testimonial;

class TestimonialController extends Controller {

    public function index(Request $request) {
        if ($request->ajax()) {
            $data = Testimonial::select('*')->orderBy('id', 'DESC');
            return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row) {
                                return '<a href="' . Route('testimonial.show', ['id' => base64_encode($row->id)]) . '" class="btn btn-outline btn-circle btn-sm blue">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                    <a href="' . Route('testimonial.edit', ['id' => base64_encode($row->id)]) . '" class="btn btn-outline btn-circle btn-sm purple">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>';
                            })
                            ->editColumn('name', function($row) {
                                return $row->name;
                            })
                            ->editColumn('company_name', function($row) {
                                return $row->company_name;
                            })
                            ->editColumn('created_at', function($row) {
                                return date('jS M Y, g:i A', strtotime($row->created_at));
                            })
                            ->editColumn('status', function($row) {
                                return ($row->status === '0') ? '<span class="label label-sm label-warning"> Inactive </span>' : (($row->status === '1') ? '<span class="label label-sm label-success"> Active </span>' : '<span class="label label-sm label-danger"> Block </span>');
                            })
                            ->rawColumns(['status', 'action'])
                            ->make(true);
        }
        if(Auth()->guard('frontend')->user()->type_id=='1'){
        return view('testimonial.index');
        }else{
            return redirect()->route('/')->with('error', 'oops! Something went wrong in this url.');
        }
    }
     public function create() {
        return view('testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(TestimonialRequest $request) {
        $input = $request->all();
        $input['status'] = '1';
        $model = Testimonial::create($input);

        $request->session()->flash('success', 'Testimonial created successfully.');
        return redirect()->route('testimonial.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id) {
        $id = base64_decode($id);
        $model = Testimonial::findOrFail($id);
        return view('testimonial.view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id) {
        $id = base64_decode($id);
        $model = Testimonial::findOrFail($id);
        return view('testimonial.update', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(TestimonialRequest $request, $id) {
        $input = $request->all();
        $id = base64_decode($id);
        $model = Testimonial::findOrFail($id);
        $model->update($input);
        $request->session()->flash('success', 'Testimonial updated successfully.');
        return redirect()->route('testimonial.edit', ['id' => base64_encode($id)])->withInput();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id) {
        $id = base64_decode($id);
        User::findOrFail($id)->delete();
        Session::flash('success', "Testimonial deleted successfully.");
        return redirect()->route('testimonial.index');
    }
    

}
