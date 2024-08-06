<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FareType;
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
use Carbon\Carbon;

class FareTypeController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new FareType());
     }

    public function index(Request $request,$status='')
    {
        if ($request->ajax()) {
            $data = FareType::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actionButtons($row, 'admin.fare_type.edit', '', 'admin.fare_type.show', 'admin.fare_type.restore', 'admin.fare_type.permanentdelete');
                })
                ->addColumn('created_at',function($row){
                    $date = "";
                   return  $data =  Carbon::parse($row->created_at)->format('d M Y');
                })
                ->addColumn('status', function ($row){
                    return $this->getStatusColumn($row, 'admin/fare_type');                    
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        $newdata = array();
        $newdata['page_title'] = "Fare Type List";
        $newdata['page_name'] = "Fare Type";
        $newdata['status'] = $status;

        return view('admin.fare_type.index',$newdata);
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $post = FareType::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.fare_type.update',$id);
        $newdata['page_title'] = 'Edit Fare Type';
        $newdata['page_name'] = 'Fare Type';
        return view('admin.fare_type.create',compact('post', 'newdata'));
    
    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'title'      => 'required',
            
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
            $fare_type = FareType::find($id);
            $fare_type->title = $request->title;
            $fare_type->description = $request->description;
            $fare_type->status = $request->status;

            $fare_type->save();
    
            return response()->json([
                'status' => true,
                'msg' => 'Fare Type Updated successfully'
            ]);
    }

    public function create()
    {
        // print_r($post);exit;
        $data['page_name'] = "Fare Type";
        $newdata['url'] = route('admin.fare_type.store');
        $newdata['btn'] = "Save";
        $newdata['type'] = 'Select Role';
        $newdata['page_title'] = 'Create Fare Type';
        $newdata['page_name'] = 'Fare Type';
        return view('admin.fare_type.create',compact('data', 'newdata'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'      => 'required',
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

       

        
        $fare_type = new FareType();
        $fare_type->title = $request->title;
        $fare_type->description = $request->description;
        $fare_type->status = $request->status;
        
        $fare_type->save();
       
        return response()->json([
            'status' => true,
            'msg' => 'Fare Type created successfully'
			]);

    }

    public function show($id)
    {
        $data = array();
        $data['fare_type_id'] = base64_decode($id);
        $data['fare_type'] = FareType::find($data['fare_type_id']);
        $data['page_name']= 'Fare Type';
        $data['page_title'] = "Fare Type Details";
        $data['page_name'] = "Fare Type";
        return view('admin.fare_type.show',$data);
    }
    
}
