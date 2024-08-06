<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
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

class SupplierController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new Supplier());
     }

    public function index(Request $request,$status='')
    {
        if ($request->ajax()) {
            $data = Supplier::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actionButtons($row, 'admin.suppliers.edit', '', 'admin.suppliers.show', 'admin.suppliers.restore', 'admin.suppliers.permanentdelete');
                })
                ->addColumn('status', function ($row){
                    return $this->getStatusColumn($row, 'admin/suppliers');                    
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        $newdata = array();
        $newdata['page_title'] = "Supplier List";
        $newdata['page_name'] = "Supplier";
        $newdata['status'] = $status;

        return view('admin.suppliers.index',$newdata);
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $post = Supplier::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.suppliers.update',$id);
        $newdata['page_title'] = 'Edit Supplier';
        $newdata['page_name'] = 'Supplier';
        return view('admin.suppliers.create',compact('post', 'newdata'));
    
    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'gst_no' => 'required',
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
               
            $suppliers = Supplier::find($id);
            $suppliers->name = $request->name;
            $suppliers->gst_no = $request->gst_no;
            $suppliers->support_no = $request->support_no;
            $suppliers->address = $request->address;
            $suppliers->save();
    
            return response()->json([
                'status' => true,
                'msg' => 'Supplier Updated successfully'
            ]);
    }

    public function create()
    {
        // print_r($post);exit;
        $data['page_name'] = "Supplier";
        $newdata['url'] = route('admin.suppliers.store');
        $newdata['btn'] = "Save";
        $newdata['type'] = 'Select Role';
        $newdata['page_title'] = 'Create Supplier';
        $newdata['page_name'] = 'Supplier';
        return view('admin.suppliers.create',compact('data', 'newdata'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'gst_no' => 'required',
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

       

        
        $suppliers = new Supplier();
        $suppliers->name = $request->name;
        $suppliers->gst_no = $request->gst_no;
        $suppliers->support_no = $request->support_no;
        $suppliers->address = $request->address;
        $suppliers->save();
       
        return response()->json([
            'status' => true,
            'msg' => 'Supplier created successfully'
			]);

    }

    public function show($id)
    {
        $data = array();
        $data['supplier_ids'] = base64_decode($id);
        $data['suppliers'] = Supplier::find($data['supplier_ids']);
        $data['page_name']= 'Supplier';
        $data['page_title'] = "Supplier Details";
        $data['page_name'] = "Supplier";
        return view('admin.suppliers.show',$data);
    }
    
}
