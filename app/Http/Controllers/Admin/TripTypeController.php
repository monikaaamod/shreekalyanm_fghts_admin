<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TripType;
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

class TripTypeController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new TripType());
     }

    public function index(Request $request,$status='')
    {
        if ($request->ajax()) {
            $data = TripType::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actionButtons($row, 'admin.trip_type.edit', '', 'admin.trip_type.show', 'admin.trip_type.restore', 'admin.trip_type.permanentdelete');
                })
                ->addColumn('created_at',function($row){
                    $date = "";
                   return  $data =  Carbon::parse($row->created_at)->format('d M Y');
                })
                ->addColumn('status', function ($row){
                    return $this->getStatusColumn($row, 'admin/trip_type');                    
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        $newdata = array();
        $newdata['page_title'] = "Trip Type List";
        $newdata['page_name'] = "Trip Type";
        $newdata['status'] = $status;

        return view('admin.trip_type.index',$newdata);
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $post = TripType::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.trip_type.update',$id);
        $newdata['page_title'] = 'Edit Trip Type';
        $newdata['page_name'] = 'Trip Type';
        return view('admin.trip_type.create',compact('post', 'newdata'));
    
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
            $trip_type = TripType::find($id);
            $trip_type->title = $request->title;
            $trip_type->status = $request->status;

            $trip_type->save();
    
            return response()->json([
                'status' => true,
                'msg' => 'Trip Type Updated successfully'
            ]);
    }

    public function create()
    {
        // print_r($post);exit;
        $data['page_name'] = "Trip Type";
        $newdata['url'] = route('admin.trip_type.store');
        $newdata['btn'] = "Save";
        $newdata['type'] = 'Select Role';
        $newdata['page_title'] = 'Create Trip Type';
        $newdata['page_name'] = 'Trip Type';
        return view('admin.trip_type.create',compact('data', 'newdata'));
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

       

        
        $trip_type = new TripType();
        $trip_type->title = $request->title;
        $trip_type->status = $request->status;
        
        $trip_type->save();
       
        return response()->json([
            'status' => true,
            'msg' => 'Trip Type created successfully'
			]);

    }

    public function show($id)
    {
        $data = array();
        $data['trip_type_id'] = base64_decode($id);
        $data['trip_type'] = TripType::find($data['trip_type_id']);
        $data['page_name']= 'Trip Type';
        $data['page_title'] = "Trip Type Details";
        $data['page_name'] = "Trip Type";
        return view('admin.trip_type.show',$data);
    }
    
}
