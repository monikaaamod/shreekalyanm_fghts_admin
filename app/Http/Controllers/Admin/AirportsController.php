<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Airport;
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

class AirportsController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new Airport());
     }

    public function index(Request $request,$status='')
    {
        if ($request->ajax()) {
            $data = Airport::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actionButtons($row, 'admin.airports.edit', '', 'admin.airports.show', 'admin.airports.restore', 'admin.airports.permanentdelete');
                })
                ->addColumn('status', function ($row){
                    return $this->getStatusColumn($row, 'admin/airports');                    
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        $newdata = array();
        $newdata['page_title'] = "Airports List";
        $newdata['page_name'] = "Airports";
        $newdata['status'] = $status;

        return view('admin.airports.index',$newdata);
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $post = Airport::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.airports.update',$id);
        $newdata['page_title'] = 'Edit Airport';
        $newdata['page_name'] = 'Airport';
        return view('admin.airports.create',compact('post', 'newdata'));
    
    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'code'     => 'required',
            'city'  => 'required',
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
            $airports = Airport::find($id);
            $airports->name = $request->name;
            $airports->code = $request->code;
            $airports->country_name = $request->country;
            $airports->country_code = $request->country_code;
            $airports->city_name = $request->city;
            $airports->city_code = $request->city_code;

            $airports->save();
    
            return response()->json([
                'status' => true,
                'msg' => 'Airport Updated successfully'
            ]);
    }

    public function create()
    {
        // print_r($post);exit;
        $data['page_name'] = "Airport";
        $newdata['url'] = route('admin.airports.store');
        $newdata['btn'] = "Save";
        $newdata['type'] = 'Select Role';
        $newdata['page_title'] = 'Create Airport';
        $newdata['page_name'] = 'Airport';
        return view('admin.airports.create',compact('data', 'newdata'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'code'     => 'required',
            'city'  => 'required',
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

       

        
        $airports = new Airport();
        $airports->name = $request->name;
        $airports->code = $request->code;
        $airports->country_name = $request->country;
        $airports->country_code = $request->country_code;
        $airports->city_name = $request->city;
        $airports->city_code = $request->city_code;
        
        $airports->save();
       
        return response()->json([
            'status' => true,
            'msg' => 'Airport created successfully'
			]);

    }

    public function show($id)
    {
        $data = array();
        $data['airports_id'] = base64_decode($id);
        $data['airports'] = Airport::find($data['airports_id']);
        $data['page_name']= 'Airport';
        $data['page_title'] = "Airport Details";
        $data['page_name'] = "Airport";
        return view('admin.airports.show',$data);
    }
    
}
