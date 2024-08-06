<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Permission;
use Validator;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PermissionsController extends Controller
{
    public function index(Request $request){

        if ($request->ajax()) {
            $data = Permission::latest()->where('parent_id',0)->get();
            // print_r($data);exit;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = "";
                    $btn = '<a href="' . route('admin.permission.edit', base64_encode($row->id)) . '" class="btn btn-primary p-2" style="font-size: 13px;margin: 3px;"><i class="fa fa-edit"></i></a>';
                    // <a href="' . route('admin.permission.show', base64_encode($row->id)) . '" class="btn btn-success p-2" style="font-size: 13px;margin: 3px;"><i class="fa fa-eye"></i></a>
                            // <a href ="' . route('admin.permission.delete', base64_encode($row->id)) . '" onclick="return myFunction();" class="deleteButton btn btn-primary btn-sm" style="font-size: 13px;margin: 3px;"><i class="fa fa-trash"></i></a>
                    return $btn;
                                                // <a href="' . route('admin.permission.show', base64_encode($row->id)) . '" class="edit btn btn-primary btn-sm" style="font-size: 13px;margin: 3px;"><i class="fa fa-eye"></i></a>

                })
                
                ->rawColumns(['action'])
                ->make(true);
        }
        
            $newdata = array();
            $newdata['page_title'] = "Permissions List";
            $newdata['page_name'] = "Permissions";

            // print_r($newdata);exit;

            return view('admin.permission.index',$newdata);

    }


    public function create(){
         $newdata['url'] = route('admin.permission.store');
         $newdata['btn'] = "Save";
         $newdata['page_title'] = 'Create Permissions';
         $newdata['page_name'] = 'Permissions';

        //  $newdata['course'] = $course;
        return view('admin.permission.create',compact('newdata'));
    }

 
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name',
            'childs' => 'unique:permissions,name',
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


        $permission = new Permission();
        $permission->name = $request->name;
        $permission->slug = Str::slug($request->name, '.');
        $permission->parent_id = 0;
        $permission->save();

        if(isset($request->childs) && !empty($request->childs)){
            foreach($request->childs as $key=>$val){
                $childs = new Permission();
                $childs->name = $val;
                $childs->slug = Str::slug($request->childs[$key], '.');
                $childs->parent_id = $permission->id;
                $childs->save();
            }
        }
        
            return response()->json([
                'status' => true,
                'msg' => "Permissions Created Successfully."
            ]);
    }

    public function edit($id)
    {

        $id = base64_decode($id);
        
         $post = Permission::find($id);
         $childs = Permission::where('parent_id', $id)->get();
         $newdata['btn'] = "Update";
         $newdata['url'] = route('admin.permission.update',$id);
         $newdata['page_title'] = 'Edit Permission';
         $newdata['page_name'] = 'Permission';
         return view('admin.permission.create',compact('post', 'newdata','childs'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name',
            'childs' => 'unique:permissions,name',
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


        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->slug = Str::slug($request->name, '.');
        $permission->parent_id = 0;
        $permission->save();

        if(isset($request->childs_id) && $request->childs_id != ""){
            foreach($request->childs_id as $key=>$val){
                $childs = Permission::find($val);
                $childs->name = $request->childs[$key];
                $childs->slug = Str::slug($request->childs[$key], '.');
                $childs->parent_id = $permission->id;
                $childs->save();
            }
        }
    
            return response()->json([
                'status' => true,
                'msg' => "Permissions Updated Successfully."
            ]);
     }

     public function destroy($id){
        $id = base64_decode($id);
        $data = Permission::find($id);
        $data->deleted_at = 1;
        $data->save();

        $childs = Permission::where('parent_id',$id)->get();
        // print_r($childs);
        foreach($childs as $key=>$val){
            // print_r($val->id);exit;
            $post = Permission::find($val->id);
            $post->deleted_at = 1;
            $post->save();
        }
        // exit;

        Flash::success("<i class='fas fa-check'></i> Permission Deleted Successfully")->important();

        return redirect("admin/permission-list");
     }


     public function show($id)
     {
        $data = array();
        $data['permission_id'] = base64_decode($id);
        $data['permission'] = Permission::find($data['permission_id']);
        $data['page_name']= 'Permissions';
        $data['page_title'] = "Permissions Details";
        return view('admin.permission.show',$data);
     }
}
