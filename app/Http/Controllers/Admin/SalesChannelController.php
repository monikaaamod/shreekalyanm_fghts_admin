<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SalesChannel;
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

class SalesChannelController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new SalesChannel());
     }

    public function index(Request $request,$status='')
    {
        if ($request->ajax()) {
            $data = SalesChannel::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actionButtons($row, 'admin.sales_channels.edit', '', 'admin.sales_channels.show', 'admin.sales_channels.restore', 'admin.sales_channels.permanentdelete');
                })
                ->addColumn('status', function ($row){
                    return $this->getStatusColumn($row, 'admin/sales_channels');                    
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        $newdata = array();
        $newdata['page_title'] = "SalesChannel List";
        $newdata['page_name'] = "SalesChannel";
        $newdata['status'] = $status;

        return view('admin.sales_channels.index',$newdata);
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $post = SalesChannel::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.sales_channels.update',$id);
        $newdata['page_title'] = 'Edit SalesChannel';
        $newdata['page_name'] = 'SalesChannel';
        return view('admin.sales_channels.create',compact('post', 'newdata'));
    
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
               
            $sales_channels = SalesChannel::find($id);
            $sales_channels->name = $request->name;
            $sales_channels->save();
    
            return response()->json([
                'status' => true,
                'msg' => 'SalesChannel Updated successfully'
            ]);
    }

    public function create()
    {
        // print_r($post);exit;
        $data['page_name'] = "SalesChannel";
        $newdata['url'] = route('admin.sales_channels.store');
        $newdata['btn'] = "Save";
        $newdata['type'] = 'Select Role';
        $newdata['page_title'] = 'Create SalesChannel';
        $newdata['page_name'] = 'SalesChannel';
        return view('admin.sales_channels.create',compact('data', 'newdata'));
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

       

        
        $sales_channels = new SalesChannel();
        $sales_channels->name = $request->name;
        $sales_channels->save();
       
        return response()->json([
            'status' => true,
            'msg' => 'SalesChannel created successfully'
			]);

    }

    public function show($id)
    {
        $data = array();
        $data['sales_channels_id'] = base64_decode($id);
        $data['sales_channels'] = SalesChannel::find($data['sales_channels_id']);
        $data['page_name']= 'SalesChannel';
        $data['page_title'] = "SalesChannel Details";
        $data['page_name'] = "SalesChannel";
        return view('admin.sales_channels.show',$data);
    }
    
}
