<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TravelClass;
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

class TravelClassController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new TravelClass());
     }

    public function index(Request $request,$status='')
    {
        if ($request->ajax()) {
            $data = TravelClass::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actionButtons($row, 'admin.travel_class.edit', '', 'admin.travel_class.show', 'admin.travel_class.restore', 'admin.travel_class.permanentdelete');
                })
                ->addColumn('created_at',function($row){
                    $date = "";
                   return  $data =  Carbon::parse($row->created_at)->format('d M Y');
                })
                ->addColumn('status', function ($row){
                    return $this->getStatusColumn($row, 'admin/travel_class');                    
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        $newdata = array();
        $newdata['page_title'] = "Travel Class List";
        $newdata['page_name'] = "Travel Class";
        $newdata['status'] = $status;

        return view('admin.travel_class.index',$newdata);
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $post = TravelClass::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.travel_class.update',$id);
        $newdata['page_title'] = 'Edit Travel Class';
        $newdata['page_name'] = 'Travel Class';
        return view('admin.travel_class.create',compact('post', 'newdata'));
    
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
            $travel_class = TravelClass::find($id);
            $travel_class->title = $request->title;
            $travel_class->status = $request->status;

            $travel_class->save();
    
            return response()->json([
                'status' => true,
                'msg' => 'Travel Class Updated successfully'
            ]);
    }

    public function create()
    {
        // print_r($post);exit;
        $data['page_name'] = "Travel Class";
        $newdata['url'] = route('admin.travel_class.store');
        $newdata['btn'] = "Save";
        $newdata['type'] = 'Select Role';
        $newdata['page_title'] = 'Create Travel Class';
        $newdata['page_name'] = 'Travel Class';
        return view('admin.travel_class.create',compact('data', 'newdata'));
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

       

        
        $travel_class = new TravelClass();
        $travel_class->title = $request->title;
        $travel_class->status = $request->status;
        
        $travel_class->save();
       
        return response()->json([
            'status' => true,
            'msg' => 'Travel Class created successfully'
			]);

    }

    public function show($id)
    {
        $data = array();
        $data['travel_class_id'] = base64_decode($id);
        $data['travel_class'] = TravelClass::find($data['travel_class_id']);
        $data['page_name']= 'Travel Class';
        $data['page_title'] = "Travel Class Details";
        $data['page_name'] = "Travel Class";
        return view('admin.travel_class.show',$data);
    }
    
}
