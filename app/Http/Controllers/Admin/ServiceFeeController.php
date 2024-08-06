<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ServiceFee;
use App\Models\Product;
use App\Models\SalesChannel;
use App\Models\Supplier;
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

class ServiceFeeController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new ServiceFee());
     }

    public function index(Request $request,$status='')
    {
        if ($request->ajax()) {
            $data = ServiceFee::with('product','supplier')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actionButtons($row, 'admin.service_fee.edit', '', 'admin.service_fee.show', 'admin.service_fee.restore', 'admin.service_fee.permanentdelete');
                })
                ->addColumn('status', function ($row){
                    return $this->getStatusColumn($row, 'admin/service_fee');                    
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        $newdata = array();
        $newdata['page_title'] = "ServiceFee List";
        $newdata['page_name'] = "ServiceFee";
        $newdata['status'] = $status;

        return view('admin.service_fee.index',$newdata);
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $post = ServiceFee::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.service_fee.update',$id);
        $newdata['page_title'] = 'Edit ServiceFee';
        $newdata['page_name'] = 'ServiceFee';
        $newdata['product'] = Product::get();
        $newdata['supplier'] = Supplier::get();
        $newdata['sales_channel'] = SalesChannel::get();

        return view('admin.service_fee.create',compact('post', 'newdata'));
    
    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'title'      => 'required|string',
            'product_id'     => 'required',
            'supplier_id'     => 'required',
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
            
            $service_fee = ServiceFee::find($id);
            $service_fee->title = $request->title;
            $service_fee->product_id = $request->product_id;
            $service_fee->supplier_id = $request->supplier_id;
            $service_fee->sales_channel_id = $request->sales_channel_id;
            $service_fee->percentage_type = $request->percentage_type;
            $service_fee->is_gst = $request->is_gst;
            $service_fee->value = $request->value;
            $service_fee->booking_type = $request->booking_type;
            $service_fee->sector = $request->sector;
            $service_fee->save();
    
            return response()->json([
                'status' => true,
                'msg' => 'ServiceFee Updated successfully'
            ]);
    }

    public function create()
    {
        // print_r($post);exit;
        $data['page_name'] = "ServiceFee";
        $newdata['url'] = route('admin.service_fee.store');
        $newdata['btn'] = "Save";
        $newdata['type'] = 'Select Role';
        $newdata['page_title'] = 'Create ServiceFee';
        $newdata['page_name'] = 'ServiceFee';
        $newdata['product'] = Product::get();
        $newdata['supplier'] = Supplier::get();
        $newdata['sales_channel'] = SalesChannel::get();

        return view('admin.service_fee.create',compact('data', 'newdata'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'      => 'required|string',
            'product_id'     => 'required',
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

       

        
        $service_fee = new ServiceFee();
        $service_fee->title = $request->title;
        $service_fee->product_id = $request->product_id;
        $service_fee->supplier_id = $request->supplier_id;
        $service_fee->sales_channel_id = $request->sales_channel_id;
        $service_fee->percentage_type = $request->percentage_type;
        $service_fee->is_gst = $request->is_gst;
        $service_fee->value = $request->value;  
        $service_fee->booking_type = $request->booking_type;
        $service_fee->sector = $request->sector;      
        $service_fee->save();
       
        return response()->json([
            'status' => true,
            'msg' => 'ServiceFee created successfully'
			]);

    }

    public function show($id)
    {
        $data = array();
        $data['service_fee_id'] = base64_decode($id);
        $data['service_fee'] = ServiceFee::find($data['service_fee_id']);
        $data['page_name']= 'ServiceFee';
        $data['page_title'] = "ServiceFee Details";
        $data['page_name'] = "ServiceFee";
        return view('admin.service_fee.show',$data);
    }
    
}
