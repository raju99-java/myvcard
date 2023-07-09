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

class FranchiseController extends Controller{

	public function index(Request $request) {
        if ($request->ajax()) {
            $data = User::where('type_id', '=', '3')->get();
            return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row) {
                                return '<a href="' . Route('franchise.show', ['id' => base64_encode($row->id)]) . '" class="btn btn-outline btn-circle btn-sm blue">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                    <a href="' . Route('franchise.edit', ['id' => base64_encode($row->id)]) . '" class="btn btn-outline btn-circle btn-sm purple">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>';
                            })
                            ->editColumn('franchise_id', function($row) {
                                $total_franchises_user=User::where('type_id', '=', '2')->where('franchise_id',$row->id)->count();
                                return $total_franchises_user;
                            })
                            ->editColumn('subscription_date', function($row) {
                                $total_franchises_user_this_month =User::where('type_id', '=', '2')->where('franchise_id',$row->id)->whereMonth('subscription_date', Carbon::now()->month)->whereYear('subscription_date', Carbon::now()->year)->count();
                                return $total_franchises_user_this_month;
                            })
                            ->editColumn('last_login_at', function($row) {
                                return date('jS M Y, g:i A', strtotime($row->last_login_at));
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
        return view('franchise.index');
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create() {
        return view('franchise.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CustomerRequest $request) {
        $input = $request->all();
        $input['type_id'] = '3';
      
       $password = $this->rand_string(8);
        $input['password'] = Hash::make($password);
        $input['status'] = '1';
        $model = User::create($input);
        
        $email_setting = $this->get_email_data('new_account_create_for_franchise', array('NAME' => $input['name'], 'EMAIL' => $input['email'], 'PASSWORD' => $password));
           $email_data = [
               'to' => $model->email,
               'subject' => $email_setting['subject'],
               'template' => 'signup',
               'data' => ['message' => $email_setting['body']]
           ];
        $this->SendMail($email_data);
        $request->session()->flash('success', 'Franchise created successfully.');
        return redirect()->route('franchise.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id) {
        $id = base64_decode($id);
        $model = User::findOrFail($id);
        return view('franchise.view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id) {
        $id = base64_decode($id);
        $model = User::findOrFail($id);
        return view('franchise.update', compact('model'));
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
        $request->session()->flash('success', 'Franchise updated successfully.');
        return redirect()->route('franchise.edit', ['id' => base64_encode($id)])->withInput();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id) {
        $id = base64_decode($id);
        User::findOrFail($id)->delete();
        Session::flash('success', "Franchise deleted successfully.");
        return redirect()->route('franchise.index');
    }
 


}
