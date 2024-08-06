<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PaymentMode;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Illuminate\Support\Facades\Validator;
/// for reuse methods ///
use App\Http\Controllers\BaseController;
use App\Http\Traits\ActionButtonsTrait;
use App\Http\Traits\StatusColumnTrait;
use App\Http\Traits\ImageColumnTrait;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class PaymentModeController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new PaymentMode());
     }

    public function index(Request $request,$status='')
    {
        if ($request->ajax()) {
            $data = PaymentMode::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actionButtons($row, 'admin.paymentmodes.edit', '', 'admin.paymentmodes.show', 'admin.paymentmodes.restore', 'admin.paymentmodes.permanentdelete');
                })
                ->addColumn('status', function ($row){
                    return $this->getStatusColumn($row, 'admin/paymentmodes');                    
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        $newdata = array();
        $newdata['page_title'] = "PaymentMode List";
        $newdata['page_name'] = "PaymentMode";
        $newdata['status'] = $status;

        return view('admin.paymentmodes.index',$newdata);
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $post = PaymentMode::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.paymentmodes.update',$id);
        $newdata['page_title'] = 'Edit PaymentMode';
        $newdata['page_name'] = 'PaymentMode';
        return view('admin.paymentmodes.create',compact('post', 'newdata'));
    
    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string',
        ]);
    
            if ($validator->fails()) {
                $message = [];
                foreach($validator->errors()->getMessages() as $keys=>$vals) {
                    foreach($vals as $k=>$v) {
                        $message[] =  $v;
                    }
                }

                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors(),
                    'msg' => $message[0]
                ]);
            }
               
            $paymentmodes = PaymentMode::find($id);
            $paymentmodes->name = $request->name;
            $paymentmodes->save();
    
            return response()->json([
                'status' => true,
                'msg' => 'PaymentMode Updated successfully'
            ]);
    }

    public function create()
    {
        // print_r($post);exit;
        $data['page_name'] = "PaymentMode";
        $newdata['url'] = route('admin.paymentmodes.store');
        $newdata['btn'] = "Save";
        $newdata['type'] = 'Select Role';
        $newdata['page_title'] = 'Create PaymentMode';
        $newdata['page_name'] = 'PaymentMode';
        return view('admin.paymentmodes.create',compact('data', 'newdata'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string',
            ]);
    
            if ($validator->fails()) {
                $message = [];
                foreach($validator->errors()->getMessages() as $keys=>$vals) {
                    foreach($vals as $k=>$v) {
                        $message[] =  $v;
                    }
                }

                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors(),
                    'msg' => $message[0]
                ]);
            }

       

        
        $paymentmodes = new PaymentMode();
        $paymentmodes->name = $request->name;
        $paymentmodes->save();
       
        return response()->json([
            'status' => true,
            'msg' => 'PaymentMode created successfully'
			]);

    }

    public function show($id)
    {
        $data = array();
        $data['paymentmodes_id'] = base64_decode($id);
        $data['paymentmodes'] = PaymentMode::find($data['paymentmodes_id']);
        $data['page_name']= 'PaymentMode';
        $data['page_title'] = "PaymentMode Details";
        $data['page_name'] = "PaymentMode";
        return view('admin.paymentmodes.show',$data);
    }
    
}
