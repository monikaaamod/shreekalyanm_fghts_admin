<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;
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

class ProductController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new Product());
     }

    public function index(Request $request,$status='')
    {
        if ($request->ajax()) {
            $data = Product::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actionButtons($row, 'admin.products.edit', '', 'admin.products.show', 'admin.products.restore', 'admin.products.permanentdelete');
                })
                ->addColumn('status', function ($row){
                    return $this->getStatusColumn($row, 'admin/products');                    
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        $newdata = array();
        $newdata['page_title'] = "Product List";
        $newdata['page_name'] = "Product";
        $newdata['status'] = $status;

        return view('admin.products.index',$newdata);
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $post = Product::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.products.update',$id);
        $newdata['page_title'] = 'Edit Product';
        $newdata['page_name'] = 'Product';
        return view('admin.products.create',compact('post', 'newdata'));
    
    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string',
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
               
            $products = Product::find($id);
            $products->name = $request->name;
            $products->save();
    
            return response()->json([
                'status' => true,
                'msg' => 'Product Updated successfully'
            ]);
    }

    public function create()
    {
        // print_r($post);exit;
        $data['page_name'] = "Product";
        $newdata['url'] = route('admin.products.store');
        $newdata['btn'] = "Save";
        $newdata['type'] = 'Select Role';
        $newdata['page_title'] = 'Create Product';
        $newdata['page_name'] = 'Product';
        return view('admin.products.create',compact('data', 'newdata'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string',
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

       

        
        $products = new Product();
        $products->name = $request->name;
        $products->save();
       
        return response()->json([
            'status' => true,
            'msg' => 'Product created successfully'
			]);

    }

    public function show($id)
    {
        $data = array();
        $data['products_id'] = base64_decode($id);
        $data['products'] = Product::find($data['products_id']);
        $data['page_name']= 'Product';
        $data['page_title'] = "Product Details";
        $data['page_name'] = "Product";
        return view('admin.products.show',$data);
    }
    
}
