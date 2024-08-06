<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\Coupon;
use Intervention\Image\Facades\Image;
/// for reuse methods ///
use App\Http\Traits\ActionButtonsTrait;
use App\Http\Traits\StatusColumnTrait;
use App\Http\Traits\ImageColumnTrait;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class CouponController extends BaseController
{
    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;
    // For  destroy, restore, permanentdelete, and status methods.
    public function __construct()
    {
        parent::__construct(new Coupon());
    }
    //+
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, $status='')
     {
         if ($request->ajax()) {
             $data = Coupon::latest()->get();
             return Datatables::of($data)
                 ->addIndexColumn()
                 ->addColumn('action', function ($row) {
                     return $this->actionButtons($row, 'admin.coupon.edit', '', 'admin.coupon.show', '', '');
                 })
                 ->addColumn('status', function ($row) {
                     return $this->getStatusColumn($row, 'admin/coupon');

                 })
                 ->addColumn('image', function ($row) {
                    //  print_r($row->image);exit;
                     return $this->getImageColumn($row, 'image');
                })
                 ->rawColumns(['action','status','image'])
                 ->make(true);
         }
         $data = array();
         $data['page_title'] = "Coupon List";
         $data['page_name'] = "Coupon";
         $data['status'] = $status;
         return view('admin.coupon.index', $data);
     }
    public function create()
    {
        // echo "hello";exit;
        $data['page_title'] = "Add Coupon";
        $data['page_name'] = "Coupon";
        $data['page_url'] = route('admin.coupon.store');
        $data['method'] = 'POST';
        return view('admin.coupon.create', $data);
    }
    public function store(Request $request)
    {
        // print_r($request->all());exit;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required',
        ]);
        if ($validator->fails())
          {
              $message = [];
              foreach($validator->errors()->getMessages() as $keys=>$vals)
              {
                 foreach($vals as $k=>$v)
                 {
                   $message[] =  $v;
                 }
              }
              return response()->json([
                  'status' => false,
                  'errors' => $validator->errors(),
                  'msg' => $message[0]
                  ]);
          }
        $coupon = new Coupon();
        $coupon->name = $request->name;
        $coupon->coupon_code = $request->code;
        $coupon->type = $request->type;
        $coupon->begin_date = $request->begin_date;
        $coupon->last_date = $request->last_date;
        $coupon->discount = $request->discount;
        $coupon->min_cart_value = $request->min_cart_value;
        $coupon->uses_limit = $request->limit;
        $coupon->short_des = $request->short_des;
        $coupon->description = $request->description;
        $coupon->cancellation = $request->cancellation;
        $coupon->terms = $request->terms;
        if($request->hasFile('image')){
            $image = 'coupon_'.time().'.'.$request->image->extension();   
            $request->image->move(public_path('uploads/coupon'), $image);
            $image = "uploads/coupon/".$image;
            $coupon->image = $image;
        }
        
        if($request->hasFile('banner_image')){
            $banner_image = 'banner_'.time().'.'.$request->banner_image->extension();   
            $request->banner_image->move(public_path('uploads/coupon'), $banner_image);
            $banner_image = "uploads/coupon/".$banner_image;
            $coupon->banner_image = $banner_image;
        }
        $coupon->status = isset($request->status) ? $request->status : 'active';

        $coupon->save();

        return response()->json([
            'status' => true,
            'msg' => 'Coupon created successfully',
        ]);
    }
    public function edit($id)
    {
        $data = array();
        $data['page_title'] = "Edit Coupon";
        $data['page_name'] = "Coupon";
        $data['page_url'] = route('admin.coupon.update', $id);
        $id = base64_decode($id);
        $data['post'] = Coupon::find($id);
        return view('admin.coupon.create', $data);
    }
    public function update(Request $request, $id)
    {
        $id = base64_decode($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required',
        ]);
        if ($validator->fails())
          {
              $message = [];
              foreach($validator->errors()->getMessages() as $keys=>$vals)
              {
                 foreach($vals as $k=>$v)
                 {
                   $message[] =  $v;
                 }
              }
              return response()->json([
                  'status' => false,
                  'errors' => $validator->errors(),
                  'msg' => $message[0]
                  ]);
          }
        $coupon = Coupon::find($id);
        $coupon->name = $request->name;
        $coupon->coupon_code = $request->code;
        $coupon->type = $request->type;
        $coupon->begin_date = $request->begin_date;
        $coupon->last_date = $request->last_date;
        $coupon->discount = $request->discount;
        $coupon->min_cart_value = $request->min_cart_value;
        $coupon->uses_limit = $request->limit;
        $coupon->short_des = $request->short_des;
        $coupon->description = $request->description;
        $coupon->cancellation = $request->cancellation;
        $coupon->terms = $request->terms;
        if($request->hasFile('banner_image')){
            $banner_image = 'banner_'.time().'.'.$request->banner_image->extension();   
            $request->banner_image->move(public_path('uploads/coupon'), $banner_image);
            $banner_image = "uploads/coupon/".$banner_image;
            $coupon->banner_image = $banner_image;
        }
        if($request->hasFile('image')){
            $image = 'coupon_'.time().'.'.$request->image->extension();   
            $request->image->move(public_path('uploads/coupon'), $image);
            $image = "uploads/coupon/".$image;
            $coupon->image = $image;
        }
        $coupon->status = $request->status;

        $coupon->save();


        return response()->json(['status' => true, 'msg' => 'Coupon updated successfully']);
    }
    public function show(Request $request, $id)
    {
        $data = array();
        $data['coupon_id'] = base64_decode($id);
        $data['coupon'] = Coupon::find($data['coupon_id']);
        $data['page_name']= 'Coupon';
        $data['page_title'] = "Coupon Details";
        $data['page_name'] = "Coupon";
        return view('admin.coupon.show', $data);
    }
}
