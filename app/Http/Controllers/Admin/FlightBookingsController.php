<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\FlightBookings;
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

class FlightBookingsController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

    // For  destroy, restore, permanentdelete, and status methods.
    public function __construct()
    {
        parent::__construct(new FlightBookings());
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
            $data = FlightBookings::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
               return $btn = '<a type="button" href="' . route('admin.booking.card') . '" class="edit btn btn-success p-2" data-loading-text="Details...." data-rest-text="Details">Details</i></a>';
            })
            ->addColumn('order_date', function ($row) {
               return $data =  Carbon::parse($row->order_date)->format('d M Y');
            })

            ->addColumn('order_amount', function ($row) {
               return $data =  priceFormate($row->order_amount);
            })

            ->rawColumns(['action','order_date'])
            ->make(true);
        }
        
            $newdata = array();
            $newdata['page_title'] = "Flight Bookings List";
            $newdata['page_name'] = "Flight Bookings";


        return view('admin.flight_bookings.index',$newdata);
    }

}
