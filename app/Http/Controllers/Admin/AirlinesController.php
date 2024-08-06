<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Airlines;
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

class AirlinesController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new Airlines());
     }

    public function index(Request $request,$status='')
    {
        if ($request->ajax()) {
            $data = Airlines::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actionButtons($row, 'admin.airlines.edit', '', 'admin.airlines.show', 'admin.airlines.restore', 'admin.airlines.permanentdelete');
                })
                ->addColumn('created_at',function($row){
                    $date = "";
                   return  $data =  Carbon::parse($row->created_at)->format('d M Y');
                })
                ->addColumn('status', function ($row){
                    return $this->getStatusColumn($row, 'admin/airlines');                    
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        $newdata = array();
        $newdata['page_title'] = "Airlines List";
        $newdata['page_name'] = "Airlines";
        $newdata['status'] = $status;

        return view('admin.airlines.index',$newdata);
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $post = Airlines::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.airlines.update',$id);
        $newdata['page_title'] = 'Edit Airlines';
        $newdata['page_name'] = 'Airlines';
        return view('admin.airlines.create',compact('post', 'newdata'));
    
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
            $airlines = Airlines::find($id);
            $airlines->title = $request->title;
            $airlines->description = $request->description;
            $airlines->status = $request->status;

            $airlines->save();
    
            return response()->json([
                'status' => true,
                'msg' => 'Airlines Updated successfully'
            ]);
    }

    public function create()
    {
        // print_r($post);exit;
        $data['page_name'] = "Airlines";
        $newdata['url'] = route('admin.airlines.store');
        $newdata['btn'] = "Save";
        $newdata['page_title'] = 'Create Airlines';
        $newdata['page_name'] = 'Airlines';
        return view('admin.airlines.create',compact('data', 'newdata'));
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

       

        
        $airlines = new Airlines();
        $airlines->title = $request->title;
        $airlines->description = $request->description;
        $airlines->status = $request->status;
        
        $airlines->save();
       
        return response()->json([
            'status' => true,
            'msg' => 'Airlines created successfully'
			]);

    }

    public function show($id)
    {
        $data = array();
        $data['airlines_id'] = base64_decode($id);
        $data['airlines'] = Airlines::find($data['airlines_id']);
        $data['page_name']= 'Airlines';
        $data['page_title'] = "Airlines Details";
        $data['page_name'] = "Airlines";
        return view('admin.airlines.show',$data);
    }
    
}
