<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\WalletDiscount;
use App\Models\User;
use App\Models\Product;
use App\Models\SalesChannel;
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

class WalletDiscountController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new WalletDiscount());
     }

    public function index(Request $request,$status='')
    {
        if ($request->ajax()) {
            $data = WalletDiscount::with('product','supplier')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actionButtons($row, 'admin.walletdiscount.edit', '', 'admin.walletdiscount.show', 'admin.walletdiscount.restore', 'admin.walletdiscount.permanentdelete');
                })
                ->addColumn('status', function ($row){
                    return $this->getStatusColumn($row, 'admin/walletdiscount');                    
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        $newdata = array();
        $newdata['page_title'] = "WalletDiscount List";
        $newdata['page_name'] = "WalletDiscount";
        $newdata['status'] = $status;

        return view('admin.walletdiscount.index',$newdata);
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $post = WalletDiscount::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.walletdiscount.update',$id);
        $newdata['page_title'] = 'Edit WalletDiscount';
        $newdata['page_name'] = 'WalletDiscount';

        $newdata['product'] = Product::get();
        $newdata['supplier'] = Supplier::get();
        $newdata['sales_channel'] = SalesChannel::get();


        return view('admin.walletdiscount.create',compact('post', 'newdata'));
    
    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'product_id' => 'required|string',
            'supplier_id' => 'required|string',
            'sales_channel_id' => 'required|string',
            'value' => [
                'required', // Validation rule for 'value'
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->payment_type === 'percentage' && (float) $value > 100) {
                        $fail('The value field must not be greater than 100 when payment type is percentage.');
                    }
                },
            ],
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
            
        $walletdiscount = WalletDiscount::find($id);
        $walletdiscount->title = $request->title;
        $walletdiscount->product_id = $request->product_id;
        $walletdiscount->supplier_id = $request->supplier_id;
        $walletdiscount->sales_channel_id = $request->sales_channel_id;
        $walletdiscount->payment_type = $request->payment_type;
        $walletdiscount->value = $request->value;
        $walletdiscount->booking_type = $request->booking_type;
        $walletdiscount->max_value = $request->max_value;
        $walletdiscount->sector = $request->sector;
        $walletdiscount->save();

        return response()->json([
            'status' => true,
            'msg' => 'WalletDiscount Updated successfully'
        ]);
    }

    public function create()
    {
        // print_r($post);exit;
        $data['page_name'] = "WalletDiscount";
        $newdata['url'] = route('admin.walletdiscount.store');
        $newdata['btn'] = "Save";
        $newdata['type'] = 'Select Role';
        $newdata['page_title'] = 'Create WalletDiscount';
        $newdata['page_name'] = 'WalletDiscount';

        $newdata['product'] = Product::get();
        $newdata['supplier'] = Supplier::get();
        $newdata['sales_channel'] = SalesChannel::get();

        return view('admin.walletdiscount.create',compact('data', 'newdata'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'product_id' => 'required|string',
            'supplier_id' => 'required|string',
            'sales_channel_id' => 'required|string',
            'value' => [
                'required_if:payment_type,percentage|string', // Validation rule for 'value'
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->payment_type === 'percentage' && (float) $value > 100) {
                        $fail('The value field must not be greater than 100 when payment type is percentage.');
                    }
                },
            ],
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
        
        $walletdiscount = new WalletDiscount();
        $walletdiscount->title = $request->title;
        $walletdiscount->product_id = $request->product_id;
        $walletdiscount->supplier_id = $request->supplier_id;
        $walletdiscount->sales_channel_id = $request->sales_channel_id;
        $walletdiscount->payment_type = $request->payment_type;
        $walletdiscount->value = $request->value;
        $walletdiscount->booking_type = $request->booking_type;
        $walletdiscount->max_value = $request->payment_type === 'fixed' ? $request->max_value : 0;
        $walletdiscount->sector = $request->sector;
        $walletdiscount->save();
       
        return response()->json([
            'status' => true,
            'msg' => 'WalletDiscount created successfully'
			]);

    }

    public function show($id)
    {
        $data = array();
        $data['walletdiscount_id'] = base64_decode($id);
        $data['walletdiscount'] = WalletDiscount::find($data['walletdiscount_id']);
        $data['page_name']= 'WalletDiscount';
        $data['page_title'] = "WalletDiscount Details";
        $data['page_name'] = "WalletDiscount";
        return view('admin.walletdiscount.show',$data);
    }
    
}
