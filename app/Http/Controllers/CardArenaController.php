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
use URL;
use App\Http\Requests\CardArenaRequest;
//********** Models ************//
use App\User;
use App\Setting;
use App\Coupon;
use App\CardArena;

class CardArenaController extends Controller {

    public function index(Request $request) {
        if ($request->ajax()) {
            $data = CardArena::select('*')->orderBy('id', 'DESC');
            return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row) {
                                return '<a href="' . Route('cardarena.show', ['id' => base64_encode($row->id)]) . '" class="btn btn-outline btn-circle btn-sm blue">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                    <a href="' . Route('cardarena.edit', ['id' => base64_encode($row->id)]) . '" class="btn btn-outline btn-circle btn-sm purple">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>';
                            })
                            ->editColumn('image', function($row) {
                                if (@getimagesize(URL::asset('public/uploads/cardarena/' . $row->image)) == true) {
                                $path = URL::asset('public/uploads/cardarena/' . $row->image);
                            } else {
                                $path = URL::asset('public/backend/no-image.png');
                            }
                            return '<img height="50" width="50" src="' . $path . '"/>';
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
                            ->rawColumns(['image','status', 'action'])
                            ->make(true);
        }
        if(Auth()->guard('frontend')->user()->type_id=='1'){
        return view('cardarena.index');
        }else{
            return redirect()->route('/')->with('error', 'oops! Something went wrong in this url.');
        }
    }
     public function create() {
        return view('cardarena.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CardArenaRequest $request) {
        $input = $request->all();
        $input['status'] = '1';
        if ($request->hasFile('image')) {
            $input['image'] = $this->uploadimage($request);
        }
        $model = CardArena::create($input);
        $request->session()->flash('success', 'New Card Arena created successfully.');
        return redirect()->route('cardarena.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id) {
        $id = base64_decode($id);
        $model = CardArena::findOrFail($id);
        return view('cardarena.view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id) {
        $id = base64_decode($id);
        $model = CardArena::findOrFail($id);
        return view('cardarena.update', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CardArenaRequest $request, $id) {
        $input = $request->all();
        $id = base64_decode($id);
        $model = CardArena::findOrFail($id);
        if ($request->hasFile('image')) {
            $model->image = $this->uploadimage($request);
            }
        $model->status = $request->input('status');
        $model->save();
        $request->session()->flash('success', 'Card Arena updated successfully.');
        return redirect()->route('cardarena.edit', ['id' => base64_encode($id)])->withInput();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id) {
        $id = base64_decode($id);
        User::findOrFail($id)->delete();
        Session::flash('success', "Card Arena Image deleted successfully.");
        return redirect()->route('cardarena.index');
    }
    public function uploadimage($request) {
        $sample_image = $request->file('image');
        $imagename = $this->rand_string(14) . '.' . $sample_image->getClientOriginalExtension();
        $destinationPath = public_path('uploads/cardarena');
        $sample_image->move($destinationPath, $imagename);
        return $imagename;
    }
    

}
