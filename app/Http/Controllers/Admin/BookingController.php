<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\Agency;
use App\Models\TourCity;
use App\Models\Booking;
use App\Models\TourState;
use App\Models\WalletTransaction;
use App\Models\BookingTraveller;
use App\Models\BookingRoot;
use App\Models\BookingTickets;
use App\Models\TourCountry;
use Carbon\Carbon;
/// for reuse methods ///
use Intervention\Image\Facades\Image;
use App\Http\Controllers\BaseController;
use App\Http\Traits\ActionButtonsTrait;
use App\Http\Traits\StatusColumnTrait;
use App\Http\Traits\ImageColumnTrait;
use PDF;

class BookingController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new Booking());
     }
     //+
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request,$status='')
    {
        if ($request->ajax()) {
            // return 'yes';
            $data = Booking::with('vendor_detail','corporate_detail')->latest()->get();
            // print_r($data);exit;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $btn = ' <a href="' . route('admin.booking.detail', base64_encode($row->booking_id)) . '" class="view btn btn-info p-2"><i class="fas fa-eye fa-sm"></i></a>';
                })
                ->addColumn('travllers',function($row){
                    $travllers = $row->adt + $row->chd + $row->inf;
                   return  $travllers;
                })
                ->editColumn('created_at', function ($row) {
                    $date = "";
                    return  $data =  Carbon::parse($row->created_at)->format('d M Y');
                })
                ->editColumn('business_name', function ($row) {
                    if(!empty($row->vendor_id))
                    {
                        return $row->vendor_detail->business_name;
                    }
                    else
                    {
                        return $row->corporate_detail->name;
                    }
                })
                ->rawColumns(['created_at','action','business_name'])
                ->make(true);
        }
        $newdata = array();
        $newdata['page_title'] = "Booking List";
        $newdata['page_name'] = "Bookings";
        $newdata['status'] = $status;

        return view('admin.bookings.index',$newdata);
    }


    public function BookingDetail($booking_id)
    {
        $booking_id = base64_decode($booking_id);
        // echo "hello";exit;
        $data['page_name']= 'Bookings';
        $data['page_title'] = "Booking Detail";
        $data['method'] = 'POST';
        $data['booking'] = Booking::with('vendor_detail','corporate_detail','wallet_transaction','booking_root','booking_travellers','payment_modes')->where('booking_id',$booking_id)->first();

        $data['FlightDetailArray'] = unserialize(base64_decode($data['booking']->flightsDataArray));
        // print_r($data['booking']);exit;
        return view('admin.bookings.booking_detail',$data);
    }
    
    public function ViewTicket($rootkey)
    {
        $data['booking_root'] = BookingRoot::with('root_ticket')->find($rootkey);
        $data['booking'] = Booking::with('booking_root','booking_travellers')->where('booking_id',$data['booking_root']->booking_id)->first();
        $data['FlightDetailArray'] = unserialize(base64_decode($data['booking']->flightsDataArray));
        
        // print_r($data['FlightDetailArray']);exit;
        return view('admin.bookings.view_ticket',$data);
    }
    
    public function TicketPdf($rootkey)
    {
        $data['booking_root'] = BookingRoot::with('root_ticket')->find($rootkey);
        $data['booking'] = Booking::with('booking_root','booking_travellers')->where('booking_id',$data['booking_root']->booking_id)->first();
        $data['FlightDetailArray'] = unserialize(base64_decode($data['booking']->flightsDataArray));
        
        $pdf = PDF::loadView('admin.bookings.ticket', $data);
        $dom_pdf = $pdf->stream('pdf_file.pdf');
        return $dom_pdf;
        
        return view('admin.bookings.ticket',$data);
    }


    public function search_bookings()
    {
        // echo "hello";exit;
        $data['page_name']= 'Bookings';
        $data['page_title'] = "Open Existing Booking";
        $data['page_url'] = route('admin.agency.store');
        $data['method'] = 'POST';
        
        return view('admin.bookings.search_bookings',$data);
    }


    public function booking_card()
    {
        // echo "hello";exit;
        $data['page_name']= 'Bookings';
        $data['page_title'] = "Booking Card";
        $data['page_url'] = route('admin.agency.store');
        $data['method'] = 'POST';
        
        return view('admin.bookings.booking_card',compact('data'));
    }
    
    
    public function CreateTicket(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'booking_id' => 'required',
            'booking_root' => 'required',
            'pnr_no' => 'required',
            'ticket_no.*' => 'required',
            'travel_id.*' => 'required',
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
        
        foreach($request->travel_id as $k=>$travel)
        {
            $ticket = BookingTickets::where('booking_id',$request->booking_id)
                                        ->where('booking_root',$request->booking_root)
                                        ->where('booking_traveller_id',$travel)
                                        ->first();
            if(empty($ticket))
            {
                $ticket = new BookingTickets();
            }
            
            $ticket->booking_id = $request->booking_id;
            $ticket->pnr_no = $request->pnr_no;
            $ticket->ticket_no = $request->ticket_no[$k];
            $ticket->booking_traveller_id = $travel;
            $ticket->booking_root = $request->booking_root;
            $ticket->booking_status = 'Tickted';
            $ticket->save();
        }
        
        $bookingdetail = BookingRoot::where('bookingroot',$request->booking_root)->where('booking_id',$request->booking_id)->first();
        $bookingdetail->pnr_no = $request->pnr_no;
        $bookingdetail->save();
        
        
        $roots = BookingRoot::where('booking_id',$request->booking_id)->get();
        foreach($roots as $key=>$root)
        {
            $bookingticket = BookingTickets::where('booking_id',$request->booking_id)->where('booking_root',$root->bookingroot)->first();
            if(empty($bookingticket))
            {
                $allticket = 0;
            }
            else
            {
                $allticket = 1;
            }
        }
        
        if($allticket == 1)
        {
            $booking = Booking::where('booking_id',$request->booking_id)->first();
            $booking->status =  'Tickted';
            $booking->save();
        }
        
        return response()->json([
            'status' => false,
            'msg' => 'Ticket Genrated Successfully'
        ]);
    
    
    }

    

}
