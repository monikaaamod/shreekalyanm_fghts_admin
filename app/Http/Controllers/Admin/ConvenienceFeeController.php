<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ConvenienceFee;
use App\Models\User;
use App\Models\Product;
use App\Models\SalesChannel;
use App\Models\PaymentMode;
use App\Models\Supplier;
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

class ConvenienceFeeController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new ConvenienceFee());
     }

    public function index(Request $request,$status='')
    {
        if ($request->ajax()) {
            $data = ConvenienceFee::with('product')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actionButtons($row, 'admin.conveniencefee.edit', '', 'admin.conveniencefee.show', 'admin.conveniencefee.restore', 'admin.conveniencefee.permanentdelete');
                })
                ->addColumn('status', function ($row){
                    return $this->getStatusColumn($row, 'admin/conveniencefee');                    
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        $newdata = array();
        $newdata['page_title'] = "Convenience Fee List";
        $newdata['page_name'] = "Convenience Fee";
        $newdata['status'] = $status;

        return view('admin.conveniencefee.index',$newdata);
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $post = ConvenienceFee::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.conveniencefee.update',$id);
        $newdata['page_title'] = 'Edit Convenience Fee';
        $newdata['page_name'] = 'ConvenienceFee';

        $newdata['product'] = Product::get();
        $newdata['supplier'] = Supplier::get();
        $newdata['sales_channel'] = SalesChannel::get();
        $newdata['payment_mode'] = PaymentMode::get();


        return view('admin.conveniencefee.create',compact('post', 'newdata'));
    
    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'product_id' => 'required|string',
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
               
            $conveniencefee = ConvenienceFee::find($id);
            $conveniencefee->title = $request->title;
            $conveniencefee->product_id = $request->product_id;
            $conveniencefee->sales_channel_id = $request->sales_channel_id;
            $conveniencefee->percentage_type = $request->percentage_type;
            $conveniencefee->convenience_fee = $request->convenience_fee;
            $conveniencefee->payment_mode = $request->payment_mode;
            $conveniencefee->sector_wise = $request->sector_wise;
            $conveniencefee->booking_type = $request->booking_type;
            $conveniencefee->sector = $request->sector;
            $conveniencefee->save();
    
            return response()->json([
                'status' => true,
                'msg' => 'ConvenienceFee Updated successfully'
            ]);
    }

    public function create()
    {
        // print_r($post);exit;
        $data['page_name'] = "Convenience Fee";
        $newdata['url'] = route('admin.conveniencefee.store');
        $newdata['btn'] = "Save";
        $newdata['type'] = 'Select Role';
        $newdata['page_title'] = 'Create Convenience Fee';
        $newdata['page_name'] = 'Convenience Fee';

        $newdata['product'] = Product::get();
        $newdata['supplier'] = Supplier::get();
        $newdata['sales_channel'] = SalesChannel::get();
        $newdata['payment_mode'] = PaymentMode::get();


        return view('admin.conveniencefee.create',compact('data', 'newdata'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'product_id' => 'required|string',
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

       

        
        $conveniencefee = new ConvenienceFee();
        $conveniencefee->title = $request->title;
        $conveniencefee->product_id = $request->product_id;
        $conveniencefee->sales_channel_id = $request->sales_channel_id;
        $conveniencefee->percentage_type = $request->percentage_type;
        $conveniencefee->convenience_fee = $request->convenience_fee;
        $conveniencefee->payment_mode = $request->payment_mode;
        $conveniencefee->sector_wise = $request->sector_wise;
        $conveniencefee->booking_type = $request->booking_type;
        $conveniencefee->sector = $request->sector;
        $conveniencefee->save();
       
        return response()->json([
            'status' => true,
            'msg' => 'ConvenienceFee created successfully'
			]);

    }

    public function show($id)
    {
        $data = array();
        $data['conveniencefee_id'] = base64_decode($id);
        $data['conveniencefee'] = ConvenienceFee::find($data['conveniencefee_id']);
        $data['page_name']= 'Convenience Fee';
        $data['page_title'] = "Convenience Fee Details";
        $data['page_name'] = "Convenience Fee";
        return view('admin.conveniencefee.show',$data);
    }
    
}
