<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Charges;
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

class ChargesController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new Charges());
     }

    public function index(Request $request,$status='')
    {
        if ($request->ajax()) {
            $data = Charges::where('type','flights')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actionButtons($row, 'admin.charges.edit', '', 'admin.charges.show', 'admin.charges.restore', 'admin.charges.permanentdelete');
                })
                ->addColumn('status', function ($row){
                    return $this->getStatusColumn($row, 'admin/charges');                    
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        $newdata = array();
        $newdata['page_title'] = "Charges List";
        $newdata['page_name'] = "Charges";
        $newdata['status'] = $status;

        return view('admin.charges.index',$newdata);
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $post = Charges::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.charges.update',$id);
        $newdata['page_title'] = 'Edit Charges';
        $newdata['page_name'] = 'Charges';
        return view('admin.charges.create',compact('post', 'newdata'));
    
    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'title'      => 'required|string',
            'amount'     => 'required|numeric',
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
                // print_r($request->all());exit;
            $charges = Charges::find($id);
            $charges->title = $request->title;
            $charges->description = $request->description;
            $charges->amount = $request->amount;
            $charges->type = 'flights';
            $charges->save();
    
            return response()->json([
                'status' => true,
                'msg' => 'Charges Updated successfully'
            ]);
    }

    public function create()
    {
        // print_r($post);exit;
        $data['page_name'] = "Charges";
        $newdata['url'] = route('admin.charges.store');
        $newdata['btn'] = "Save";
        $newdata['type'] = 'Select Role';
        $newdata['page_title'] = 'Create Charges';
        $newdata['page_name'] = 'Charges';
        return view('admin.charges.create',compact('data', 'newdata'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'      => 'required|string',
            'amount'     => 'required|numeric',
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

       

        
        $charges = new Charges();
        $charges->title = $request->title;
        $charges->description = $request->description;
        $charges->amount = $request->amount;
        $charges->type = 'flights';
        
        $charges->save();
       
        return response()->json([
            'status' => true,
            'msg' => 'Charges created successfully'
			]);

    }

    public function show($id)
    {
        $data = array();
        $data['charges_id'] = base64_decode($id);
        $data['charges'] = Charges::find($data['charges_id']);
        $data['page_name']= 'Charges';
        $data['page_title'] = "Charges Details";
        $data['page_name'] = "Charges";
        return view('admin.charges.show',$data);
    }
    
}
