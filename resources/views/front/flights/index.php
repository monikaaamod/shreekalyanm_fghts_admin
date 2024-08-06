<?php

echo "heloo";
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://secureqa.yatra.com/flightsapi/air-service/b2bdomapi/search?type=O&viewName=normal&flexi=0&noOfSegments=1&origin=DEL&originCountry=IN&destination=GOI&destinationCountry=IN&flight_depart_date=31%2F04%2F2024&ADT=1&CHD=0&INF=1&class=Economy&hb=0&source=fresco-home&booking-type=official',
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
echo $response;
echo "bye";exit;
