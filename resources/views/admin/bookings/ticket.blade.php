<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
           font-size:10px;
        }
        
        strong {
            font-weight: 600;
        }
        .container {
            background-color: #fff;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            /* margin-top: 10px; */
            max-width: 100%;
        }
        .header, .footer {
            padding: 20px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }
        /* .footer {
            border-top: none;
            margin-top: 20px;
        } */
        .section-title {
            font-weight: 600;
            font-size: 16px;
            margin-top: 20px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
        }
        .info-table th, .info-table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .rec th, .rec td {
            padding: 8px;
            border: none;
            text-align: left;
        }
        .rules {
            margin-top: 20px;
            font-size: 12px;
        }
        .rules ul {
            padding-left: 20px;
        }
        .info-table th {
            background: #FFF1E1;
        }
        .reciepthead{
            background: #FFF1E1;
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }
        .check-erecipt {
            display: flex;
        }

        table {
            width: 100%;
        }

    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <div class="row">
            <div class="col-md-12">
                <strong>KALPVRIKSHA ONLINE SOLUTION PVT LTD 981</strong><br>
                Moklam House, Pano Ka Dariba, Jaipur 302001<br>
                Mobile: 8769243784<br>
                Email: skrt.partners@gmail.com
            </div>
        </div>
    </div>

    
    <table class="table info-table">
        <thead>
            <tr>
                <th style="width: 25%;border: none !important;">Your e-receipt </th>
                <th style="width: 75%;border: none !important;text-align:right"><strong>Booked On: </strong>{{$booking->created_at ? (new DateTime($booking->created_at))->format('d-M-Y H:i A') : 'N/A'}}</th>
            </tr>
        </thead>
    </table>
    
    <div class="receipt-details">
        <table class="table rec">
            <tr>
                <td style="width: 33.33%;">
                    <strong>Issued By:</strong>
                    <img src="https://shreekalyanam.in/shree/public/airline_imagesssss/6E.png" alt="Indigo" class="img-fluid" style="height: 30px; border-radius: 10px;"><br>
                    <strong>Airline Contact:</strong>
                    {{$booking->email}}<br>
                    +{{$booking->country_code}} {{$booking->mobile_no}}
                </td>
                <td style="width: 23.33%; text-align: center;">
                    <strong>Airline PNR:</strong> {{$booking_root->pnr_no}}
                </td>
                <td style="width: 43.33%; text-align: right;">
                    <strong>Payment Reference:</strong> {{$booking->transaction_id}}<br>
                    <strong>Ticket Status:</strong> Tickted<br>
                    <strong>Class Of Travel:</strong> {{$booking->class}}<br>
                    <strong>Class Code:</strong> {{$booking->flight_fare_type}}
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    
                </td>
            </tr>
        </table>
    </div>

    <div class="section-title">Flight Details</div>
    <table class="table info-table">
        <thead>
            <tr>
                <th style="width: 15%;">Flight No</th>
                <th style="width: 20%;">Origin</th>
                <th style="width: 20%;">Destination</th>
                <th style="width: 15%;">Dep. Date</th>
                <th style="width: 15%;">Arrival Date</th>
                <th style="width: 15%;">Operated By</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($FlightDetailArray->data) && is_object($FlightDetailArray->data))
                @foreach($FlightDetailArray->data->fltOrder as $flightorder)
                    @foreach($FlightDetailArray->data->fltSchedule->$flightorder as $key=>$flightRoot) 
                        @foreach($flightRoot->OD as $OD) 
                            @foreach($OD->FS as $key=>$FS) 
                                @php 
                                    $firstFlight = $OD->FS[0];
                                    $airlinecode = $firstFlight->ac;
                                    $airlinename = $FlightDetailArray->data->airlineNames->$airlinecode ?? '';
                                    
                                    $flightNo = '';
                                    foreach($OD->FS as $key=>$FS)
                                    {
                                        if($key > 0)
                                        {
                                            $flightNo .= ', ';
                                        }
                                        $flightNo .= $FS->vc.'-'.$FS->fl;
                                        
                                        $arrival_time = $FS->ad;
                                        $arrival_aac_code = $FS->aac;
                                        
                                        $lastflight = $FS;
                                    
                                    } 
                                    $sector = $OD->FS[0]->dac.'-'.end($OD->FS)->aac;
                                    
                                    $orgCityCode = $FS->idac;
                                    $Orgcityname = $FlightDetailArray->data->cityNames->$orgCityCode;
                                    
                                    $destCityCode = $FS->iaac;
                                    $Destcityname = $FlightDetailArray->data->cityNames->$destCityCode;
                                                                
                                @endphp
                                @if($sector == $booking_root->bookingroot)
                                <tr>
                                    <td>{{$FS->vc.'-'.$FS->fl}}</td>
                                    <td>{{$Orgcityname}}</td>
                                    <td>{{$Destcityname}}</td>
                                    <td>{{$FS->dd}}, {{$FS->ddt ? (new DateTime($FS->ddt))->format('d-M-Y') : 'N/A'}}</td>
                                    <td>{{$FS->ad}}, {{$FS->adt ? (new DateTime($FS->adt))->format('d-M-Y') : 'N/A'}}</td>
                                    <td>{{$FS->ac}}</td>
                                </tr>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="section-title">Pax Details</div>
    <table class="table info-table">
        <thead>
            <tr>
                <th style="width: 25%;">Passenger Name</th>
                <th style="width: 20%;">Segment</th>
                <th style="width: 15%;">Flight No</th>
                <th style="width: 15%;">Ticket No</th>
                <th style="width: 10%;">Baggage Hand</th>
                <th style="width: 10%;">Baggage Free</th>
                <th style="width: 5%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($FlightDetailArray->data) && is_object($FlightDetailArray->data))
                @foreach($FlightDetailArray->data->fltOrder as $flightorder)
                    @foreach($FlightDetailArray->data->fltSchedule->$flightorder as $key=>$flightRoot) 
                        @foreach($flightRoot->OD as $FROD=>$OD) 
                            @php
                                $sector = $OD->FS[0]->dac.'-'.end($OD->FS)->aac;
                                $faredetail = $FlightDetailArray->data->fareDetails->{$flightorder}->{$flightRoot->ID};
                                $flightNo = '';
                                foreach($OD->FS as $key=>$FS)
                                {
                                    if($key > 0)
                                    {
                                        $flightNo .= ', ';
                                    }
                                    $flightNo .= $FS->vc.'-'.$FS->fl;
                                }
                            @endphp 
                            @if(isset($booking->booking_travellers) && ($sector == $booking_root->bookingroot))
                                @foreach($booking->booking_travellers as $k=>$traveller)
                                @php
                                    $pnr = '';
                                    $ticket_no = '';
                                    
                                    if(isset($traveller->ticket) && count($traveller->ticket) > 0)
                                    {
                                        foreach($traveller->ticket as $kk=>$tic){
                                            if($tic->booking_root == $sector)
                                            {
                                                $pnr = $tic->pnr_no;
                                                $ticket_no = $tic->ticket_no;
                                                $booking_status = $tic->booking_status;
                                            }
                                        }
                                    }
                                @endphp
                                <tr>
                                    <td>{{ucfirst($traveller->title.' '.$traveller->first_name.' '.$traveller->last_name )}}</td>
                                    <td>{{$sector}}</td>
                                    <td>{{$flightNo}}</td>
                                    <td>{{$ticket_no}}</td>
                                    <td>7 Kgs</td>    
                                    <td>{{$OD->bga}}</td>
                                    <td>{{$booking_status ?? $booking->status}}</td>
                                </tr>
                                @endforeach
                            @endif
                         @endforeach
                    @endforeach
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="section-title">Fare Details</div>
    <table class="table info-table">
        <thead>
            <tr>
                <th style="width: 25%;">Basic Fare</th>
                <th style="width: 25%;">INR {{$booking->total_flight_amt}}</th>
                <th style="width: 25%;">Reschedule Charge</th>
                <th style="width: 25%;">-</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tax & Others</td>
                <td>INR 0.00</td>
                <td>Service Fee</td>
                <td>{{$booking->service_fee}}</td>
            </tr>
            <tr>
                <td>Convenience Fee</td>
                <td>{{$booking->convenience_fee}}</td>
                <td>Discount</td>
                <td>{{$booking->discount}}</td>
            </tr>
            <tr>
                <td>Baggage Charge</td>
                <td></td>
                <td>Gateway Charge</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Meals Charge</td>
                <td></td>
                <td>Other Charge</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Seat Charge</td>
                <td></td>
                <td>Cancellation Charge</td>
                <td>-</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>Total Amount INR</td>
                <td>{{$booking->total_payable_amt}}</td>
            </tr>
        </tbody>
    </table>

    <div class="rules">
        <strong>Rules and Regulations</strong>
        <ul>
            <li>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem</li>
            <li>Ipsum has been the industry's standard dummy text ever since the 1500s,</li>
            <li>When an unknown printer took a galley of type and scrambled it to make a</li>
            <li>Type specimen book. It has survived not only five centuries, but also the leap</li>
            <li>Into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the</li>
        </ul>
    </div>
</div>
</body>
</html>
