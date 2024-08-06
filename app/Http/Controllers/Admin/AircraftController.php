<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Aircraft;
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

class AircraftController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new Aircraft());
     }

    public function index(Request $request,$status='')
    {
        if ($request->ajax()) {
            $data = Aircraft::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actionButtons($row, 'admin.aircraft.edit', '', 'admin.aircraft.show', 'admin.aircraft.restore', 'admin.aircraft.permanentdelete');
                })
                ->addColumn('created_at',function($row){
                    $date = "";
                   return  $data =  Carbon::parse($row->created_at)->format('d M Y');
                })
                ->addColumn('status', function ($row){
                    return $this->getStatusColumn($row, 'admin/aircraft');                    
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        $newdata = array();
        $newdata['page_title'] = "Aircraft List";
        $newdata['page_name'] = "Aircraft";
        $newdata['status'] = $status;

        return view('admin.aircraft.index',$newdata);
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $post = Aircraft::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.aircraft.update',$id);
        $newdata['page_title'] = 'Edit Aircraft';
        $newdata['page_name'] = 'Aircraft';
        return view('admin.aircraft.create',compact('post', 'newdata'));
    
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
            $aircraft = Aircraft::find($id);
            $aircraft->title = $request->title;
            $aircraft->description = $request->description;
            $aircraft->status = $request->status;

            $aircraft->save();
    
            return response()->json([
                'status' => true,
                'msg' => 'Aircraft Updated successfully'
            ]);
    }

    public function create()
    {
        // print_r($post);exit;
        $data['page_name'] = "Aircraft";
        $newdata['url'] = route('admin.aircraft.store');
        $newdata['btn'] = "Save";
        $newdata['page_title'] = 'Create Aircraft';
        $newdata['page_name'] = 'Aircraft';
        return view('admin.aircraft.create',compact('data', 'newdata'));
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

       

        
        $aircraft = new Aircraft();
        $aircraft->title = $request->title;
        $aircraft->description = $request->description;
        $aircraft->status = $request->status;
        
        $aircraft->save();
       
        return response()->json([
            'status' => true,
            'msg' => 'Aircraft created successfully'
			]);

    }

    public function show($id)
    {
        $data = array();
        $data['aircraft_id'] = base64_decode($id);
        $data['aircraft'] = Aircraft::find($data['aircraft_id']);
        $data['page_name']= 'Aircraft';
        $data['page_title'] = "Aircraft Details";
        $data['page_name'] = "Aircraft";
        return view('admin.aircraft.show',$data);
    }
    
}
