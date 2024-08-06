<?php
use App\Models\Cms;
use App\Models\Social;
use App\Models\Flights;
function set_active($route)
{
    return Route::is($route) ? 'active' : '';
}


function getContactDetails()
{
    $contact_detail = Cms::where('type','Contact Us')->first();
    return $contact_detail;
}


function socialId()
{
    $social_id = Social::where('id',1)->first();
    return $social_id;
}

function web_url()
{
    $web_url = "https://shreekalyanam.com/public";
    return $web_url;
}

function priceFormate($price = null)
{   
    if($price)
    {
        return  $formattedAmount = '₹ ' .number_format($price, 2, '.');
    }
    return 0;
}




////////////////////////////Flights Api ///////////////////

function searchLocalflights($requestd_data)
{
    $data = Flights::where('deleted_at',null)
                    ->where(function($query) use($requestd_data){

                      $query->where('type',$requestd_data['type']);
                      $query->where('departure_airport',$requestd_data['origin']);
                      $query->where('arrival_airport',$requestd_data['destination']);

                    //   $query->where('viewName',$requestd_data['viewName']);
                    //   $query->where('flexi',$requestd_data['flexi']);
                    //   $query->where('destinationCountry',$requestd_data['destinationCountry']);
                    //   $query->where('departure_airport',$requestd_data['origin']);
                    //   $query->where('originCountry',$requestd_data['originCountry']);
                    //   $query->where('arrival_airport',$requestd_data['destination']);
                    //   $query->where('flight_depart_date',$requestd_data['flight_depart_date']);

                    })->get();
    return $data;



   

}

function searchFlights($requestd_data)
{

  print_r($requestd_data);exit;
  $curl = curl_init();

  if($requestd_data['origin'] == 'IN' && $requestd_data['destination'] == 'IN')
  {
    $url = 'https://secureqa.yatra.com/flightsapi/air-service/b2bdomapi/search';
  }
  else
  {
    $url = 'https://secureqa.yatra.com/flightsapi/air-service/b2bint/search';
  }
  

  $basic = $url.'?' .
  'type='.$requestd_data['type'].
  '&viewName='.$requestd_data['viewName'].
  '&flexi='.$requestd_data['flexi'].
  '&noOfSegments='.$requestd_data['noOfSegments'].
  '&ADT='.$requestd_data['ADT'].
  '&CHD='.$requestd_data['CHD'].
  '&INF='.$requestd_data['INF'].
  '&class='.$requestd_data['class'].
  '&hb='.$requestd_data['hb'];


  if ($requestd_data['type'] === 'R') {
    // Assuming you have a value for arrivalDate when type is 'R'
    $basic .= '&arrivalDate=' . urlencode($requestd_data['arrivalDate']);
  }

  if($requestd_data['type'] == 'M')
  {
    foreach ($city_count as $key => $val) {
      $basic .= '&flight_depart_date_' . $key . '=' . urlencode($val->flight_depart_date[$key]) .
          '&origin_' . $key . '=' . urlencode($val->origin[$key]) .
          '&originCountry_' . $key . '=' . urlencode($val->originCountry[$key]) .
          '&destination_' . $key . '=' . urlencode($val->destination[$key]) .
          '&destinationCountry_' . $key . '=' . urlencode($val->destinationCountry[$key]);
    }
  }

  if($requestd_data['type'] != 'M')
  {
    $basic .= '&origin='.$requestd_data['origin'].
                '&originCountry='.$requestd_data['originCountry'].
                '&destination='.$requestd_data['destination'].
                '&destinationCountry='.$requestd_data['destinationCountry'].
                '&flight_depart_date='.$requestd_data['flight_depart_date'].
                '&source='.$requestd_data['source'].
                '&booking-type='.$requestd_data['booking-type'];
  }

  // print_r($basic);exit;

  curl_setopt_array($curl, array(
    CURLOPT_URL => $basic,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'emailId: apit3018@gmail.com',
      'password: apitest1234',
      'apiKey: 432612d4-ecf8-4321-9ccb-05610c19f028',
      'Content-Type: application/x-www-form-urlencoded',
      'Host: secureqa.yatra.com'
    ),
  ));
  
  $response = curl_exec($curl);
  
  curl_close($curl);
  
  print_r(json_decode($response));
    exit;


}



////////////////////////////Flights Api End ///////////////////





