<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\Agency;
use App\Models\TourCity;
use App\Models\TourState;
use App\Models\TourCountry;
use Carbon\Carbon;
/// for reuse methods ///
use Intervention\Image\Facades\Image;
use App\Http\Controllers\BaseController;
use App\Http\Traits\ActionButtonsTrait;
use App\Http\Traits\StatusColumnTrait;
use App\Http\Traits\ImageColumnTrait;

class AgencyController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new Agency());
     }
     //+
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Agency::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return $this->actionButtons($row, 'admin.agency.edit', '', 'admin.agency.show', 'admin.agency.restore', 'admin.agency.permanentdelete');
            })
            ->addColumn('created_at',function($row){
                $date = "";
                return  $data =  Carbon::parse($row->created_at)->format('d M Y');
            })

            ->addColumn('name',function($row){
                $date = "";
                $data =  $row->name . ' ' .$row->last_name;
                return  $data;
            })

            ->addColumn('checkbox', function ($row) {
                $box = "";
                $box = '<input type="checkbox" name="selectedData[]" value="'.$row->id.'">';

                return $box;
            })

            ->addColumn('image', function ($row) {
                return $this->getImageColumn($row, 'image');
            })

            ->addColumn('status', function ($row){
                return $this->getStatusColumn($row, 'admin/agency');
            })

            ->rawColumns(['action','status','image','checkbox'])
            ->make(true);
        }
        
            $newdata = array();
            $newdata['page_title'] = "Agency List";
            $newdata['page_name'] = "Agency";


        return view('admin.agency.index',$newdata);
    }

    public function create()
    {
        // echo "hello";exit;
        $data['page_title'] = "Add Agency";
        $data['page_name'] = "Agency";
        $data['page_url'] = route('admin.agency.store');
        $data['method'] = 'POST';
        $data['country'] = TourCountry::get();
        $data['domestic'] = TourCountry::where('name',"India")->first();
        $data['state'] = TourState::where('country_id',$data['domestic']->id)->get();
        $data['city'] = TourCity::get();
        
        return view('admin.agency.create',$data);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firm_name' => 'required',
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'gst' => 'required',
            'pan' => ['required', 'regex:/^[A-Z]{5}[0-9]{4}[A-Z]$/'],
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

        $agency = new Agency();

        $agency->firm_name = $request->firm_name;
        $agency->name = $request->name;
        $agency->last_name = $request->last_name;
        $agency->email = $request->email;
        $agency->mobile = $request->mobile;
        $agency->gst = $request->gst;
        $agency->pan = $request->pan;
        $agency->country = $request->country;
        $agency->state = $request->state;
        $agency->city = $request->city;
        $agency->pincode = $request->pincode;
        $agency->address = $request->address;
        $agency->terms = $request->terms;

        if($request->hasFile('image')){
            $image = 'logo_'.time().'.'.$request->image->extension();   
            $request->image->move(public_path('uploads/agency/logo'), $image);
            $image = "uploads/agency/logo/".$image;
            $agency->image = $image;
        }

        $agency->status = $request->status;
        $agency->save();

        return response()->json([
            'status' =>true,
            'msg' => 'Agency created Successfully.'
        ]);

    }

    public function edit($id)
    {
        $data = array();
        $data['page_title'] = "Update Agency";
        $data['page_name'] = "Agency";
        $data['page_url'] = route('admin.agency.update',$id);
        $data['method'] = 'PATCH';
        $data['agency_id'] = base64_decode($id);
        $data['post'] = Agency::find($data['agency_id']);
        $data['country'] = TourCountry::get();
        $data['domestic'] = TourCountry::where('name',"India")->first();
        $data['state'] = TourState::where('country_id',$data['domestic']->id)->get();
        $data['city'] = TourCity::get();

        return view('admin.agency.create',$data);
    }

    public function update(Request $request, $id)
    {
        $id = base64_decode($id);
        $validator = Validator::make($request->all(), [
            'firm_name' => 'required',
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'pan' => ['required', 'regex:/^[A-Z]{5}[0-9]{4}[A-Z]$/'],
            'gst' => 'required',
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

        $agency = Agency::find($id);

        $agency->firm_name = $request->firm_name;
        $agency->name = $request->name;
        $agency->last_name = $request->last_name;
        $agency->email = $request->email;
        $agency->mobile = $request->mobile;
        $agency->gst = $request->gst;
        $agency->pan = $request->pan;
        $agency->country = $request->country;
        $agency->state = $request->state;
        $agency->city = $request->city;
        $agency->pincode = $request->pincode;
        $agency->address = $request->address;
        $agency->terms = $request->terms;

        if($request->hasFile('image')){
            $image = 'logo_'.time().'.'.$request->image->extension();   
            $request->image->move(public_path('uploads/agency/logo'), $image);
            $image = "uploads/agency/logo/".$image;
            $agency->image = $image;
        }

        $agency->status = $request->status;
        $agency->save();

        return response()->json([
            'status' => true,
            'msg' => 'Agency updated successfully'
        ]);
    }

    public function show(Request $request, $id)
    {
        $data = array();
        $data['agency_id'] = base64_decode($id);
        $data['agency'] = Agency::find($data['agency_id']);
        $data['page_name']= 'Agency';
         $data['page_title'] = "Agency Details";
        $data['page_name'] = "Agency";
        return view('admin.agency.view',$data);
    }

    

}
