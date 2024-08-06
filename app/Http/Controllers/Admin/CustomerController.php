<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FrontUser;
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

class CustomerController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new FrontUser());
     }

    public function index(Request $request,$status='')
    {
        if ($request->ajax()) {
            $data = FrontUser::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actionButtons($row, '', '', 'admin.customer.show', '', '');
                })
                ->addColumn('status', function ($row){
                    return $this->getStatusColumn($row, 'admin/customers');                    
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        $newdata = array();
        $newdata['page_title'] = "Customer List";
        $newdata['page_name'] = "Customer";
        $newdata['status'] = $status;

        return view('admin.customer.customer-list',$newdata);
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $post = FrontUser::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.customer.update',$id);
        $newdata['page_title'] = 'Edit Customer';
        $newdata['page_name'] = 'Customer';
        return view('admin.customer.create',compact('post', 'newdata'));
    
    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            //    'course'=>'required',
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
            $front_user = FrontUser::find($id);
            $front_user->name = $request->name;
            $front_user->last_name = $request->last_name;
            $front_user->email = $request->email;
            $front_user->mobile = $request->mobile;
            $front_user->address = $request->address;
            
            if($request->image){
                if($request->hasFile('image')){
                    $image = 'profile_'.time().'.'.$request->image->extension();   
                    $request->image->move(public_path('uploads/front_user/images'), $image);
                    $image = "uploads/front_user/images/".$image;
                    $front_user->image = $image;
                }
            }

            $front_user->save();
    
            return response()->json([
                'status' => true,
                'msg' => 'Customer Updated successfully'
                ]);
    }

    public function create()
    {
        // print_r($post);exit;
        $data['page_name'] = "Customer";
        $newdata['url'] = route('admin.customer.store');
        $newdata['btn'] = "Save";
        $newdata['type'] = 'Select Role';
        $newdata['page_title'] = 'Create Customer';
        $newdata['page_name'] = 'Customer';
        return view('admin.customer.create',compact('data', 'newdata'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255',
            'password'  => 'required|string|min:8',
            // 'mobile'  => 'required|string|min:10|unique:front_user',     
            // 'role_name'  => 'required',
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

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $user->type = 'customer';
        $user->save();
        
        $front_user = new FrontUser();
        $front_user->user_id = $user->id;
        $front_user->name = $request->name;
        $front_user->last_name = $request->last_name;
        $front_user->email = $request->email;
        $front_user->mobile = $request->mobile;
        if($request->image){
            if($request->hasFile('image')){
                $image = 'profile_'.time().'.'.$request->image->extension();   
                $request->image->move(public_path('uploads/front_user/images'), $image);
                $image = "uploads/front_user/images/".$image;
                $front_user->image = $image;
            }
        }
        $front_user->save();
        // print_r($post);exit;

        return response()->json([
            'status' => true,
            'msg' => 'Customer created successfully'
			]);

    }

    public function show($id)
    {
        $data = array();
        $data['front_user_id'] = base64_decode($id);
        $data['front_user'] = FrontUser::find($data['front_user_id']);
        $data['page_name']= 'Customer';
        $data['page_title'] = "Customer Details";
        $data['page_name'] = "Customer";
        return view('admin.customer.customer-show',$data);
    }
    
}
