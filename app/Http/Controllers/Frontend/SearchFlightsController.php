<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use PDF;
use App\Models\BlogCategory;
use App\Models\SimilarCategory;
use App\Models\ServiceableCities;
use App\Models\VideoCategory;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Cms;
use App\Models\Banner;
use App\Models\Aboutus;
use App\Models\Social;
use App\Models\User;
use App\Models\PaymentPolicy;
use App\Models\Service;
use App\Models\ServiceOffered;
use App\Models\Video;
use App\Models\Airport;
use App\Models\Coupon;
use App\Models\TravelClass;
use App\Models\FareType;
use App\Models\Aircraft;
use App\Models\Airlines;
use App\Models\Flights;
use Validator;
use Auth;
use Session;
use Redirect;
use Str;



class SearchFlightsController extends Controller
{
    public function flights(Request $request)
    {

      $validator = Validator::make($request->all(), [
        'type'=> 'required',
        // 'viewName'=> 'required',
        'fare_type'=> 'required',
        'no_segments'=> 'required',
        'travelers'=> 'required',
        'adults'=> 'required',
        'childs'=> 'required',
        'infants'=> 'required',
        'class'=> 'required',
        'arrivalDate'=> 'required_if:type,R',

        'country_code.*'=> 'required',
        'origin.*'=> 'required',
        'from_city.*'=> 'required',
        'to_city.*'=> 'required',
        'flight_depart_date.*'=> 'required',
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

      $requestd_data = array();

      // print_r($request->all());exit;
     

      if(!empty($request->type))
      {

        if($request->type == 'R')
        {
          $requestd_data['arrivalDate'] = date('d/m/Y', strtotime($request->arrivalDate));
        }

        if($request->type != 'M')
        {
          $requestd_data['source'] = 'fresco-home'; 
          $requestd_data['booking-type'] = 'official';  
        }


        $origin = Airport::where('code',$request->from_city)->first();
        $destination = Airport::where('code',$request->to_city)->first();

          $requestd_data['type'] = $request->type;
          $requestd_data['viewName'] = 'normal';
          $requestd_data['flexi'] = $request->fare_type;
          $requestd_data['noOfSegments'] = $request->no_segments;
          $requestd_data['originCountry'] = $origin->country_code;
          $requestd_data['origin'] = $request->from_city;
          $requestd_data['destinationCountry'] = $destination->country_code;
          $requestd_data['destination'] = $request->to_city;
          $requestd_data['flight_depart_date'] = date('d/m/Y', strtotime($request->departure));
          $requestd_data['travelers'] = $request->travelers;
          $requestd_data['ADT'] = $request->adults;
          $requestd_data['CHD'] = $request->childs;
          $requestd_data['INF'] = $request->infants;
          $requestd_data['class'] = $request->class;
          $requestd_data['hb'] = 0; //// Hand Bagege////

         
      }

        $data['requestd_data'] = $requestd_data;

        // print_r($requestd_data);exit;

        $data['airports'] = Airport::where('status','Active')->get();
        $data['class'] = TravelClass::where('status','Active')->get();
        $data['airline'] = Airlines::where('status','Active')->get();
        $data['aircraft'] = Aircraft::where('status','Active')->get();
        $data['fare_type'] = FareType::where('status','Active')->get();
        $data['flights'] = searchLocalflights($requestd_data); /// localdatabase check
        // $data['flights'] = searchFlights($requestd_data); //// live apis //// 

        return view('front.flights.flights',$data);
    }


    public function flights_detail(Request $request)
    {

      // print_r($request->all());exit;

      $encodedData = $request->query('data');
      $arrayData = unserialize(base64_decode($encodedData));
      // Use $arrayData as needed
  
      $flight_id = $request->query('flight_id');
      $flight_id = base64_decode($flight_id); 

      $data['request_data'] = $arrayData;
      $data['flight'] = Flights::where('id',$flight_id)->first();
      $data['coupon'] = Coupon::where('status','Active')->latest()->limit(6)->get();

      // print_r($data);exit;

      return view('front.flights.flight-booking',$data);
    }

    public function search_flights(Request $request)
    {
      // print_r($request->all());exit;

      $data = array(
        0 => 1,
        1 => 2
      );
      $html = view('front.flights.flights_data',compact('data'))->render();

      return $html;
    }


    public function showPreviewTravel(Request $request)
    {
        // Retrieve form data from the request
        $formData = $request->all();
        // print_r($request->all());exit;
        // Pass the form data to the view and return the view
        return view('front.flights.preview', compact('formData'));
    }
}
