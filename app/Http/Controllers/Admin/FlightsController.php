<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Flights;
use App\Models\User;
use App\Models\Aircraft;
use App\Models\Airlines;
use App\Models\Airport;
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

class FlightsController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new Flights());
     }

    public function index(Request $request,$status='')
    {
        if ($request->ajax()) {
            $data = Flights::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actionButtons($row, 'admin.flights.edit', '', 'admin.flights.show', 'admin.flights.restore', 'admin.flights.permanentdelete');
                })
                ->addColumn('status', function ($row){
                    return $this->getStatusColumn($row, 'admin/flights');                    
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        $newdata = array();
        $newdata['page_title'] = "Flights List";
        $newdata['page_name'] = "Flights";
        $newdata['status'] = $status;

        return view('admin.flights.index',$newdata);
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $post = Flights::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.flights.update',$id);
        $newdata['page_title'] = 'Edit Flights';
        $newdata['page_name'] = 'Flights';
        $airport = Airport::latest()->get();
        $airline = Airlines::latest()->get();
        $aircraft = Aircraft::latest()->get();
        return view('admin.flights.create',compact('post', 'newdata','airport','airline','aircraft'));
    
    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'flight_name'      => 'required|string',
            'flight_number'     => 'required',
            'departure_airport'     => 'required',
            'arrival_airport'     => 'required',
            'departure_time'     => 'required',
            'arrival_time'     => 'required',
            'price'     => 'required|numeric',
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
            $flights = Flights::find($id);
            $flights->flight_name = $request->flight_name;
            $flights->flight_number = $request->flight_number;
            $flights->departure_airport = $request->departure_airport;
            $flights->arrival_airport = $request->arrival_airport;
            $flights->departure_time = $request->departure_time;
            $flights->arrival_time = $request->arrival_time;
            $flights->duration = $request->duration;
            $flights->airline = $request->airline;
            $flights->aircraft = $request->aircraft;
            $flights->price = $request->price;
            $flights->available_seats = $request->available_seats;
            $flights->no_of_stops = $request->no_of_stops;
            $flights->save();
    
            return response()->json([
                'status' => true,
                'msg' => 'Flights Updated successfully'
            ]);
    }

    public function create()
    {
        // print_r($post);exit;
        $data['page_name'] = "Flights";
        $newdata['url'] = route('admin.flights.store');
        $newdata['btn'] = "Save";
        $newdata['type'] = 'Select Role';
        $newdata['page_title'] = 'Create Flights';
        $newdata['page_name'] = 'Flights';
        $airport = Airport::latest()->get();
        $airline = Airlines::latest()->get();
        $aircraft = Aircraft::latest()->get();
        return view('admin.flights.create',compact('data', 'newdata', 'airport','airline','aircraft'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'flight_name'      => 'required|string',
            'flight_number'     => 'required',
            'departure_airport'     => 'required',
            'arrival_airport'     => 'required',
            'departure_time'     => 'required',
            'arrival_time'     => 'required',
            'price'     => 'required|numeric',
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

       

        
        $flights = new Flights();
        $flights->flight_name = $request->flight_name;
        $flights->flight_number = $request->flight_number;
        $flights->departure_airport = $request->departure_airport;
        $flights->arrival_airport = $request->arrival_airport;
        $flights->departure_time = $request->departure_time;
        $flights->arrival_time = $request->arrival_time;
        $flights->duration = $request->duration;
        $flights->airline = $request->airline;
        $flights->aircraft = $request->aircraft;
        $flights->price = $request->price;
        $flights->available_seats = $request->available_seats;
        $flights->no_of_stops = $request->no_of_stops;
        
        $flights->save();
       
        return response()->json([
            'status' => true,
            'msg' => 'Flights created successfully'
			]);

    }

    public function show($id)
    {
        $data = array();
        $data['flights_id'] = base64_decode($id);
        $data['flights'] = Flights::find($data['flights_id']);
        $data['page_name']= 'Flights';
        $data['page_title'] = "Flights Details";
        $data['page_name'] = "Flights";
        return view('admin.flights.show',$data);
    }
    
}
