@extends('admin.layouts.app')
@section('title')
{{$page_title}}
@stop
@section('stylecss')
<style>
.card {
    border-radius: inherit;
}

.nav-tabs .nav-link {
    padding: 3px;
}

.nav-link {
    font-size: 11px;
}

.title {
    font-size: 14px;
}

.col-md-2.pe-5.title {
    color: #a39292;
}

.title-content {
    font-size: 10px;
    font-weight: 700;
    justify-content: center;
    display: flex;
}

.card-body .icon {
    font-size: 25px;
    color: #3aafe7;
}

.price {
    text-align: right;
}

.client {
    font-size: 12px;
    font-weight: 500;
}

.client-name {
    font-weight: 700;
}

.address {
    font-size:14px;
}

.ticket-detail {
    --bs-table-color-type: #fff !important;
    --bs-table-bg-type: #44a4e0 !important;
}

table.table.border.ticket_table td {
    border: solid 1px #ccc;
}
table.table.border.ticket_table th {
    border: solid 1px #ccc;
}


/*Booking Detail Page Css*/

    .heading p {
        font-weight: 600;
        color: #414141;
        font-size: 16px;
    }
    span.success {
        color: #2CA900;
    }
    .view-detail{
        padding: 5px 20px;
        border-radius: 6px;
        background-color: #ee902c;
        color: #fff;
        border: none;
        box-shadow: 3px 6px 3px rgb(12 12 12 / 10%);
    }
    h1.tb-heading {
        font-size: 18px;
        font-weight: 600;
        background-color: #F5F5F5;
        border-radius: 0px 0px 6px 6px;
        padding: 10px 15px;
        position: relative;
        color: #000000;
        cursor: pointer;
        margin-bottom: 1rem;
        /* transition: 0.2s; */
    }
    .bflno{
        margin-left:10px;
    }
    .bflname{
        display:block;
    }
    .img-15{
        width: 15px;
        height: 15px;
    }
    .bfldetails .firstdiv{
        display:flex;
    }
    .bfldetails{
        display:flex;
    }
    .firstdiv img{
        margin-right:10px;
    }
    
    .firstdiv p.head{
        font-weight:600;
        color: #000000;
    }
    .firstdiv p {
        margin-bottom: 4px;
    }
    
    .timeline-container {
        position: relative;
        width: 100%;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .timeline {
        position: absolute;
        width: 100%;
        height: 0px;
        border-top: 1px dashed #ccc;
    }
    
    .flight-icon {
        position: relative;
        display: inline-block;
    }
    
    .img-20 {
        width: 20px;
        height:auto;
    }
    .p-rl{
        padding: 0px 30px
    }
    .p-rl-15{
        padding: 0px 15px
    }
    
    .img-40 {
        height: 40px;
        width: 40px;
        border-radius: 10px;
    }
    .img-50 {
        height: 50px;
        width: 50px;
        border-radius: 10px;
    }
    .cards {
        border-radius: 6px;
        box-shadow: 0px 1px 10px 0px #CCC;
        background-color: #fff;
        margin-bottom: 1rem;
        /* filter: hue-rotate(45deg); */
    }
    .p-20 {
        padding: 20px;
    }

/*Booking Detail Page Css*/

</style>
@stop

@section('content')

@php use Carbon\Carbon; @endphp
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h4 class="card-title card-title-dash">{{$page_title}}</h4>
                        </div>
                        <ul class="nav  nav-tabs-solid nav-tabs-rounded nav-justified">
                            <li class="nav-item">
                                <div class="title">Booking Creater</div>
                                <div class="title-content font-size-normal">@if(!empty($booking->vendor_id)) Vendor Website @elseif($booking->coroprate_id) Corporate Website @else Admin @endif</div>
                            </li>
                            <li class="nav-item ">
                                <div class="title">Agency Branch</div>
                                <div class="title-content font-size-normal">Test Branch</div>
                            </li>
                            <li class="nav-item ">
                                <div class="title">Booked On</div>
                                <div class="title-content font-size-normal">{{$booking->created_at->format('d M Y')}}</div>
                            </li>
                            <li class="nav-item">
                                <div class="title">Authorized By</div>
                                <div class="title-content font-size-normal">WEBSITE</div>
                            </li>
                            <li class="nav-item">
                                <div class="title">Authorized On</div>
                                <div class="title-content font-size-normal">@if(isset($booking->authorized_date)){{$booking->authorized_date->format('d M Y')}} @else Not Authorized @endif</div>
                            </li>
                            <li class="nav-item">
                                <div class="title">Sales Channel</div>
                                <div class="title-content font-size-normal">Media</div>
                            </li>
                            <li class="nav-item">
                                <div class="title">Client Status</div>
                                <div class="btn btn-sm bg-success text-light">Active</div>
                            </li>
                        </ul>
                    </div>
                </div><br>
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#customer">Customer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#products">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#fare">Fare Breakdown</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#traveller">Traveller</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#customer-payment">Customer Payment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#documents">Documents</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#dispatch">Dispatch</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#messages">Messages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#supplier-payment">Supplier Payment</a>
                            </li>
                        </ul>

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Tab Content -->
                                <div class="tab-content border-0">
                                    <div id="customer" class="tab-pane fade active show">
                                        <div class="row p-3">
                                            <div class="card rounded">
                                                <div class="card-body p-3">
                                                    @if(isset($booking->vendor_detail) && !empty($booking->vendor_detail))
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="client">Client</div>
                                                            <div class="client-name pb-3">{{$booking->vendor_detail->business_name}}</div>
                                                        </div>
                                                        <hr>
                                                        <div class="col-md-4">
                                                            <div class="font-size-normal client-name">Address</div>
                                                            <div class="font-size-normal">{{$booking->vendor_detail->business_location}}</div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="font-size-normal client-name">Contact Details
                                                            </div>
                                                            <div class="font-size-normal">{{$booking->vendor_detail->business_number}} (Mobile)</div>
                                                            <div class="font-size-normal">{{$booking->vendor_detail->business_email}} (Email)</div>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="client">Client</div>
                                                            <div class="client-name pb-3">{{$booking->corporate_detail->name}}</div>
                                                        </div>
                                                        <hr>
                                                        <div class="col-md-4">
                                                            <div class="font-size-normal client-name">Address</div>
                                                            <div class="font-size-normal">{{$booking->corporate_detail->address}}</div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="font-size-normal client-name">Contact Details</div>
                                                            <div class="font-size-normal">{{$booking->corporate_detail->mobile}} (Mobile)</div>
                                                            <div class="font-size-normal">{{$booking->corporate_detail->email}} (Email)</div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="traveller" class="tab-pane fade">

                                        <div class="row p-3">
                                            <div class="card">
                                                <div class="card-body p-3">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No.</th>
                                                                <th>Title</th>
                                                                <th>First Name</th>
                                                                <th>Last Name</th>
                                                                <th>Date of Birth</th>
                                                                <th>Type</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(isset($booking->booking_travellers))
                                                                @foreach($booking->booking_travellers as $key=>$traveller)
                                                                <tr>
                                                                    <td>{{$key + 1}}</td>
                                                                    <td>{{ucfirst($traveller->title)}}</td>
                                                                    <td>{{ucfirst($traveller->first_name)}}</td>
                                                                    <td>{{ucfirst($traveller->last_name)}}</td>
                                                                    <td>{{$traveller->dob}}</td>
                                                                    <td>@if($traveller->type == 'ADT') ADULT @elseif($traveller->type == 'CHD') CHILD @else INFANT @endif</td>
                                                                </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="products" class="tab-pane fade">
                                        <div class="row">                                       
                                            <div class="col-md-12">
                                                <div class="table-responsive mt-3">
                                                    <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Flight Id</th>
                                                            <th>Flight No</th>
                                                            <th>Depature City</th>
                                                            <th>Depature Date</th>
                                                            <th>Arrival City</th>
                                                            <th>Arrival Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                        @if (isset($FlightDetailArray->data) && is_object($FlightDetailArray->data))
                                                            @foreach($FlightDetailArray->data->fltOrder as $flightorder)
                                                                @foreach($FlightDetailArray->data->fltSchedule->$flightorder as $key=>$flightRoot) 
                                                                    @foreach($flightRoot->OD as $OD) 
                                                                    @php
                                                                    $sector = $OD->FS[0]->dac.'-'.end($OD->FS)->aac;
                                                                    @endphp 
                                                                    <tr> 
                                                                        <td colspan="8" style="background-color: #f95f53;color: #fff;}">{{$sector}} ({{ $FlightDetailArray->data->cityNames->{$OD->FS[0]->dac}.' - '.$FlightDetailArray->data->cityNames->{end($OD->FS)->aac} }} )</td>
                                                                        @foreach($OD->FS as $fskey=>$FS)
                                                                            @php
                                                                                $dep_city = $FS->dac;
                                                                                $arv_city = $FS->aac;
                                                                               
                                                                            @endphp
                                                                            <tr> 
                                                                                <td><i class="menu-icon icon mdi mdi-airplane"></i> {{$dep_city}} - {{$arv_city}}</td>
                                                                                <td>{{$FS->ac.'-'.$FS->fl}}</td>
                                                                                <td>{{$FlightDetailArray->data->cityNames->$dep_city}},{{$FS->dcn}}</td>
                                                                                <td>{{ Carbon::parse($FS->ddt)->format('d M Y') }} {{ Carbon::createFromFormat('H:i', $FS->dd)->format('h:i A') }}</td>
                                                                                <td>{{$FlightDetailArray->data->cityNames->$arv_city}},{{$FS->dcn}}</td>
                                                                                <td>{{ Carbon::parse($FS->adt)->format('d M Y') }} {{ Carbon::createFromFormat('H:i', $FS->ad)->format('h:i A') }}</td>
                                                                            </tr> 
                                                                        @endforeach
                                                                    </tr>
                                                                    @endforeach
                                                                @endforeach
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div id="fare" class="tab-pane fade">
                                        <div class="row p-3">
                                            <div class="card">
                                                <div class="card-body p-3">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <h4 class="card-title card-title-dash"><i class="menu-icon icon mdi mdi-airplane text-danger me-2"></i>Flight</h4>
                                                        <div class="add-items d-flex mb-2">
                                                            <span class="text-warning font-size-normal">GDS PNR: PNR-005554654 </span> <span class="text-primary font-size-normal ps-2"> Retrieve</span>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped border">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.no</th>
                                                                    <th>Sectors</th>
                                                                    <th>Flight</th>
                                                                    <th>PAX Name</th>
                                                                    <th>Ticket No</th>
                                                                    <th>Type</th>
                                                                    <th>Class</th>
                                                                    <th>Fare</th>
                                                                    <th>Tax</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @if (isset($FlightDetailArray->data) && is_object($FlightDetailArray->data))
                                                                    @foreach($FlightDetailArray->data->fltOrder as $flightorder)
                                                                        @foreach($FlightDetailArray->data->fltSchedule->$flightorder as $key=>$flightRoot) 
                                                                            @foreach($flightRoot->OD as $OD) 
                                                                                @php
                                                                                    $sector = $OD->FS[0]->dac.' - '.end($OD->FS)->aac;
    
                                                                                    $faredetail = $FlightDetailArray->data->fareDetails->{$flightorder}->{$flightRoot->ID};
                                                                               
                                                                                @endphp 
                                                                               
                                                                                    @if(isset($booking->booking_travellers))
                                                                                        @foreach($booking->booking_travellers as $k=>$traveller)
                                                                                            <tr>
                                                                                                <td>{{$k + 1}}</td>
                                                                                                <td>{{$sector}}</td>
                                                                                                <td>{{$flightRoot->ID}}</td>
                                                                                                <td>{{ucfirst($traveller->title.' '.$traveller->first_name.' '.$traveller->last_name )}}</td>
                                                                                                <td>---</td>
                                                                                                <td>{{$traveller->type}}</td>
                                                                                                <td>{{$booking->class}}</td>
                                                                                                <td>{{$faredetail->O->{$traveller->type}->bf}}</td>
                                                                                                <td>{{$faredetail->O->{$traveller->type}->tf - $faredetail->O->{$traveller->type}->bf}}</td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    @endif
                                                                               
                                                                            @endforeach
                                                                        @endforeach
                                                                    @endforeach
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mt-4">
                                                        </div>
                                                        <div class="col-md-6 mt-4">
                                                            <div class="card rounded">
                                                                <div class="card-body pt-2 ps-2">
                                                                    <div class="row">
                                                                        <div class="col-md-2 pe-5 title"></div>
                                                                        <div class="col-md-6 pe-5 title client-name"><p>Gross:</p></div>
                                                                        <div class="col-md-4 ps-2 title client-name price">{{$booking->total_flight_amt}}</div>
                                                                        
                                                                        <div class="col-md-2 pe-5 title">Add:</div>
                                                                        <div class="col-md-6 pe-5 title_txt"><p>Service Fees</p></div>
                                                                        <div class="col-md-4 ps-2 title price">{{$booking->service_fee}}</div>

                                                                        <div class="col-md-2 pe-5 title">Less:</div>
                                                                        <div class="col-md-6 pe-5 title_txt"><p>Discount</p></div>
                                                                        <div class="col-md-4 ps-2 title price">{{$booking->discount}}</div>
                                                                        
                                                                        <div class="col-md-2 pe-5 title">Add:</div>
                                                                        <div class="col-md-6 pe-5 title_txt"><p>Convenience Fees</p></div>
                                                                        <div class="col-md-4 ps-2 title price">{{$booking->convenience_fee}}</div>

                                                                        <div class="col-md-2 pe-5 title">Add:</div>
                                                                        <div class="col-md-6 pe-5 title_txt"><p>CGST @0%</p></div>
                                                                        <div class="col-md-4 ps-2 title price">0.0</div>
                                                                        
                                                                        <div class="col-md-2 pe-5 title">Less:</div>
                                                                        <div class="col-md-6 pe-5 title_txt"><p>SGST @0%</p></div>
                                                                        <div class="col-md-4 ps-2 title price">0.0</div>
                                                                       
                                                                        <div class="col-md-2 pe-5 title">Less:</div>
                                                                        <div class="col-md-6 pe-5 title_txt"><p>IGST @0%</p></div>
                                                                        <div class="col-md-4 ps-2 title price">0.0</div>

                                                                        <div class="col-md-2 pe-5 title"></div>
                                                                        <div class="col-md-6 pe-5 title client-name"><p>Net Amount:</p></div>
                                                                        <div class="col-md-4 ps-2 title price client-name">{{$booking->total_payable_amt}}</div>

                                                                        <div class="col-md-2 pe-5 title"></div>
                                                                        <div class="col-md-6 pe-5 title client-name"><p>Net Receivable:</p></div>
                                                                        <div class="col-md-4 ps-2 title price client-name">{{$booking->total_payable_amt}}</div>

                                                                        <hr>
                                                                        <div class="col-md-2 pe-2 title">Note:</div>
                                                                        <div class="col-md-10 pe-5 title"><p>(Amount in ₹)</p></div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="customer-payment" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="table-responsive mt-3">
                                                    <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Booking Id</th>
                                                            <th>Transaction Date</th>
                                                            <th>Transaction Amount</th>
                                                            <th>Mode Of Payment</th>
                                                            <th>Recipt No./Trans Id</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$booking->booking_id}}</td>
                                                            <td>{{$booking->created_at->format('d M Y')}}</td>
                                                            <td>{{$booking->total_payable_amt}}</td>
                                                            <td>{{$booking->payment_modes->name}}</td>
                                                            <td>{{$booking->transaction_id}}</td>
                                                            <td>{{$booking->payment_status}}</td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mt-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="client-name address">Billing Address</div>
                                                                <hr>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="font-size-normal client-name">Address</div>
                                                                <p>hjgjbj</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="font-size-normal client-name">City</div>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <div class="font-size-normal">Jaipur</div>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <div class="font-size-normal client-name">State</div>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <div class="font-size-normal">RJ</div>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <div class="font-size-normal client-name">Post Code</div>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <div class="font-size-normal">302012</div>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <div class="font-size-normal client-name">Country</div>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <div class="font-size-normal">India</div>
                                                            </div>
                                                            <div class="col-md-12 mt-2">
                                                                <div class="font-size-normal client-name">Email</div>
                                                            </div>
                                                            <div class="col-md-12 mt-2">
                                                                <div class="font-size-normal">client@gmail.com</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="documents" class="tab-pane fade">
                                        <div class="row mt-3">
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
                                                           
                                                                <div class="card mt-3">
                                                                    <div class="card-body p-3">
                                                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                                                            <h4 class="card-title card-title-dash">Ticket Details ({{$sector}})</h4>
                                                                            <i class="menu-icon icon mdi mdi-account-edit" data-toggle="modal" data-target="#CreateTicket{{$OD->FS[0]->dac}}"></i>
                                                                        </div>
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped">
                                                                                <thead>
                                                                                    <tr class="ticket-detail">
                                                                                        <th>S.No.</th>
                                                                                        <th>PNR</th>
                                                                                        <th>Routing</th>
                                                                                        <th>Airline</th>
                                                                                        <th>Fare Type</th>
                                                                                        <th>Ticket Status</th>
                                                                                        <th>Ticket No.</th>
                                                                                        <th>PAX</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @if(isset($booking->booking_travellers))
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
                                                                                            <td>{{$k + 1}}</td>
                                                                                            <td>{{$pnr}}</td>
                                                                                            <td>{{$sector}}</td>
                                                                                            <td>{{$flightNo}}</td>
                                                                                            <td>{{$booking->flight_fare_type}}</td>    
                                                                                            <td>{{$booking_status ?? $booking->status}}</td>
                                                                                            <td>{{$ticket_no}}</td>
                                                                                            <td>{{ucfirst($traveller->title.' '.$traveller->first_name.' '.$traveller->last_name )}} ({{$traveller->type}})</td>
                                                                                        </tr>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <div class="modal" id="CreateTicket{{$OD->FS[0]->dac}}" aria-hidden="true" style="display: none;">
                                                                <div class="modal-dialog" style="max-width:1100px">
                                                                    <div class="modal-content">
                
                                                                            <!-- Modal Header -->
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Create Ticket ({{$sector}})</h4>
                                                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                                                            </div>
                    
                                                                            <!-- Modal body -->
                                                                            <form id="ticketForm" method="post" action="{{route('admin.booking.create.ticket')}}">
                                                                                <div class="modal-body">
                                                                                    @csrf
                                                                                    <div class="row">
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                            <div class="row p-rl-15">
                                                                                                 @foreach($OD->FS as $fskey=>$FS)
                                                                                                    @php 
                                                                                                        $firstFlight = $OD->FS[0];
                                            															$airlinecode = $firstFlight->ac;
                                            															$airlinename = $FlightDetailArray->data->airlineNames->$airlinecode ?? '';
                                            															
                                                														
                                            															$flightNo = $FS->vc.'-'.$FS->fl;
                                            															
                                        																$arrival_time = $FS->ad;
                                        																$arrival_aac_code = $FS->aac;
                                        																
                                        																$lastflight = $FS;
                                        																
                                                													@endphp
                                                                                                    <div class="cards p-20">
                                                                        								<div class="firstdiv">
                                                                								           <img src="{{asset('/airline_imagesssss/'.$airlinecode.'.png')}}" alt="" class="img-40">
                                                                								            <span class="bflno">{{$flightNo}}</span></h5> 
                                                                								        </div>
                                                                        								<div class="bfldetails">
                                                                        								    <div class="col-lg-3 col-md-12 col-sm-12">
                                                                        								        <div class="firstdiv">
                                                                        								            <p class="head">{{$airlinename}}</p>
                                                                        								        </div>
                                                                        								        <div class="firstdiv">
                                                                        								            <img src="{{asset('admin/images/gray-flight.png')}}" alt="" class="img-15">
                                                                        								            <p>Operated by : {{$airlinecode}}</p>
                                                                        								        </div>
                                                                        								        <div class="firstdiv">
                                                                        								            <img src="{{asset('admin/images/gray-class.png')}}" alt="" class="img-15">
                                                                        								            <p>Class : {{$FS->classtype}}</p>
                                                                        								        </div>
                                                                        								    </div>
                                                                        								    <div class="col-lg-2 col-md-12 col-sm-12">
                                                                        								        <div class="firstdiv">
                                                                        								            <p class="head">{{$FS->dac}}</p>
                                                                        								        </div>
                                                                        								        <div class="firstdiv">
                                                                        								            <p>{{\Carbon\Carbon::createFromFormat('Y-m-d', $FS->ddt)->format('d F Y') }}  </p>
                                                                        								        </div>
                                                                        								        <div class="firstdiv">
                                                                        								            <p>{{$FS->dd}} hr</p>
                                                                        								        </div>
                                                                        								    </div>
                                                                        								    <div class="col-lg-5 col-md-12 col-sm-12">
                                                                        								        <div class="timeline-container">
                                                                                                                    <span class="timeline"></span>
                                                                                                                    <span class="flight-icon">
                                                                                                                        <img src="{{asset('admin/images/orange-right-flight.png')}}" alt="Flight Icon" >
                                                                                                                    </span>
                                                                                                                </div>
                                                                        								       
                                                                        								    </div>
                                                                        								    <div class="col-lg-2 col-md-12 col-sm-12">
                                                                        								        <div class="firstdiv">
                                                                        								            <p class="head">{{$FS->aac}}</p>
                                                                        								        </div>
                                                                        								        <div class="firstdiv">
                                                                        								            <p>{{\Carbon\Carbon::createFromFormat('Y-m-d', $FS->adt)->format('d F Y') }} </p>
                                                                        								        </div>
                                                                        								        <div class="firstdiv">
                                                                        								            <p>{{$FS->ad}} hr</p>
                                                                        								        </div>
                                                                        								    </div>
                                                                        								</div>
                                                            					                    </div>
                                                    									        @endforeach
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <input type="hidden" name="booking_id" id="booking_id" value="{{$booking->booking_id}}">
                                                                                        
                                                                                        <div class="form-group col-sm-6">
                                                                                            <label class="form-label">PNR No</label>
                                                                                            @if(empty($pnr)) 
                                                                                                <input type="text" class="form-control" name="pnr_no" id="pnr_no" value="{{$pnr}}">
                                                                                            @else
                                                                                                <b> :- {{$pnr}} </b>
                                                                                            @endif
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="table-responsive">
                                                                                        <table class="table border ticket_table">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>S.No.</th>
                                                                                                    <th>Title</th>
                                                                                                    <th>First Name</th>
                                                                                                    <th>Last Name</th>
                                                                                                    <th>Type</th>
                                                                                                    <th>Ticket No</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @if(isset($booking->booking_travellers))
                                                                                                    @foreach($booking->booking_travellers as $key=>$traveller)
                                                                                                    @php
                                                                                                        $ticket_no = '';
                                                                                                        
                                                                                                        if(isset($traveller->ticket) && count($traveller->ticket) > 0)
                                                                                                        {
                                                                                                            foreach($traveller->ticket as $kk=>$tic){
                                                                                                                if($tic->booking_root == $sector)
                                                                                                                {
                                                                                                                    $ticket_no = $tic->ticket_no;
                                                                                                                }
                                                                                                            }
                                                                                                        }
                                                                                                    @endphp
                                                                                                    <tr>
                                                                                                        <td>{{$key + 1}}</td>
                                                                                                        <td>{{ucfirst($traveller->title)}}</td>
                                                                                                        <td>{{ucfirst($traveller->first_name)}}</td>
                                                                                                        <td>{{ucfirst($traveller->last_name)}}</td>
                                                                                                        <td>@if($traveller->type == 'ADT') ADULT @elseif($traveller->type == 'CHD') CHILD @else INFANT @endif</td>
                                                                                                        <td>
                                                                                                            @if(empty($ticket_no)) 
                                                                                                                <input class="form-control" type="text" name="ticket_no[]" id="ticket_no" value="{{$ticket_no}}">
                                                                                                            @else
                                                                                                                {{$ticket_no}}
                                                                                                            @endif
                                                                                                        </td>
                                                                                                        <input type="hidden" name="travel_id[]" value="{{$traveller->id}}">
                                                                                                        <input type="hidden" name="booking_root" id="booking_root" value="{{$FS->dac.'-'.$FS->aac}}">
                                                                                                    </tr>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                
                                                                                </div>
                        
                                                                                <!-- Modal footer -->
                                                                                <div class="modal-footer">
                                                                                    @if(empty($pnr))
                                                                                    <button type="submit" class="btn btn-primary" id="ticketButton">Save</button>
                                                                                    @endif
                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                         
                                                         @endforeach
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        </div>
                                            
                                            
                                           

                                            {{--<div class="card mt-3">
                                                <div class="card-body p-3">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <h4 class="card-title card-title-dash">EMDA / EMDS</h4>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                        <thead>
                                                            <tr class="ticket-detail">
                                                                <th>Description</th>
                                                                <th>EMD Doc. No.</th>
                                                                <th>Start Date</th>
                                                                <th>EMD Voucher No.</th>
                                                                <th>Issued On</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="6" class="client-name text-center">No Data Found</td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>--}}
                                            <h4 class="mt-3 card-title-dash">Client Documents</h4>
                                            <div class="card mt-2">
                                                <div class="card-body p-3">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <h4 class="card-title card-title-dash">Issued Vouchers</h4>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                        <thead>
                                                            <tr class="ticket-detail">
                                                                <th>Description</th>
                                                                <th>Start Date</th>
                                                                <th>Issued On</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($booking->booking_root as $rootkey)
                                                            <tr>
                                                                <td>{{$rootkey->bookingroot}}</td>
                                                                <td>{{$rootkey->flight_depart_date}}</td>
                                                                <td>{{$rootkey->flight_depart_date}}</td>
                                                                <td>{{$booking->status}}</td>
                                                                <td><i class="menu-icon icon mdi mdi-download"></i>
                                                                <i class="menu-icon icon mdi mdi-eye"></i>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                           <tr>
                                                                <td colspan="5" class="client-name text-center">No Data Found</td>
                                                            </tr>
                                                        
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mt-3">
                                                <div class="card-body p-3">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <h4 class="card-title card-title-dash">Financial Documents</h4>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                        <thead>
                                                            <tr class="ticket-detail">
                                                                <th>Description</th>
                                                                <th>Document No.</th>
                                                                <th>Parent Doc No.</th>
                                                                <th>Amount</th>
                                                                <th>Converted Amount</th>
                                                                <th>Issued On</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Invoice [AIR] [SYD-AVV]</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td><i class="menu-icon icon mdi mdi-account-edit"></i></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Customer Recipt (credit)</td>
                                                                <td>REC465465</td>
                                                                <td>-</td>
                                                                <td>5000</td>
                                                                <td>5000</td>
                                                                <td>07 Dec 2023</td>
                                                                <td>Ok</td>
                                                                <td><i class="menu-icon icon mdi mdi-account-edit"></i></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mt-3">
                                                <div class="card-body p-3">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <h4 class="card-title card-title-dash">Credit Card Authorisation Doc</h4>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                        <thead>
                                                            <tr class="ticket-detail">
                                                                <th>Description</th>
                                                                <th>Document No.</th>
                                                                <th>Issued On</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4" class="client-name text-center">No Data Found</td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mt-2">
                                                <div class="card-body p-3">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <h4 class="card-title card-title-dash">Uploaded Document</h4>
                                                        <div class="add-items d-flex mb-2">
                                                            <span class="font-size-normal" style="color:#44a4e0;"><i class="menu-icon icon mdi mdi-file-upload"></i> Upload Document</span>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                        <thead>
                                                            <tr class="ticket-detail">
                                                                <th>Document Title</th>
                                                                <th>Document Type</th>
                                                                <th>PAX Name</th>
                                                                <th>LPO No.</th>
                                                                <th>Created Date</th>
                                                                <th>View</th>
                                                                <th>Delete</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4" class="client-name text-center">No Data Found</td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                       </div>
                                    </div>
                                    <div id="dispatch" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="menu-icon icon mdi mdi-file-document d-flex justify-content-center"></i></div>
                                                        <div class="title-content"> Add Dispacth Details</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="d-flex justify-content-center menu-icon icon mdi mdi-file-document"></i></div>
                                                        <div class="title-content"> Add / Edit Personal Details</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8 mt-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-3">
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <div class="client-name pb-3">Dispacth1</div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="client-name pb-3"><i class="menu-icon icon mdi mdi-content-save-edit d-flex justify-content-center"></i></div>
                                                            </div>
                                                            <hr>
                                                            <div class="col-md-6">
                                                                <div class="font-size-normal client-name">Name</div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="font-size-normal">Client Name</div>
                                                            </div>
                                                            <div class="col-md-6 mt-3">
                                                                <div class="font-size-normal client-name">Mode Of Delivery</div>
                                                            </div>
                                                            <div class="col-md-6 mt-3">
                                                                <div class="font-size-normal">ETX-Delivery</div>
                                                            </div>
                                                            <div class="col-md-6 mt-3">
                                                                <div class="font-size-normal client-name">Created On</div>
                                                            </div>
                                                            <div class="col-md-6 mt-3">
                                                                <div class="font-size-normal">07 Dec 2023</div>
                                                            </div>
                                                            <div class="col-md-12 mt-5">
                                                                <button type="button" class="btn btn-outline-info btn-fw">Dispacth</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="messages" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="menu-icon icon mdi mdi-message d-flex justify-content-center"></i></div>
                                                        <div class="title-content"> Send A Message</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <div class="alert alert-danger" role="alert">
                                                    There is no message history against this booking. 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="supplier-payment" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="menu-icon icon mdi mdi-currency-rupee d-flex justify-content-center"></i></div>
                                                        <div class="title-content"> Make Supplier Payment</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <div class="alert alert-danger" role="alert">
                                                    No Payment have been paid to supplier against this booking.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-3">
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="mt-3"><button class="btn btn-danger btn-lg pt-3 pb-3 ps-1 pe-4 w-100 font-size-normal"><i class="menu-icon mdi mdi-thumb-up me-4"></i>Authorize</button></div>
                                        <div class="mt-3"><button class="btn btn-danger btn-lg pt-3 pb-3 ps-1 pe-4 w-100 font-size-normal"><i class="menu-icon mdi mdi-history ms-3 me-2"></i>Booking History</button></div>
                                        <div class="mt-3"><button class="btn btn-danger btn-lg pt-3 pb-3 ps-1 pe-4 w-100 font-size-normal"><i class="menu-icon mdi mdi-cancel ms-3 me-2"></i>Reject Booking</button></div>
                                        <div class="mt-3"><button class="btn btn-danger btn-lg pt-3 pb-3 ps-1 pe-4 w-100 font-size-normal"><i class="menu-icon mdi mdi-lock ms-1 me-2"></i>Lock Booking</button></div>
                                        <div class="mt-3"><button class="btn btn-secondary btn-lg pt-3 pb-3 ps-0 pe-4 w-100 font-size-normal"><i class="menu-icon mdi mdi-location-exit me-5"></i>Close</button></div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptjs')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript">

        $(function () {

           $('#ticketForm').submit(function(){
            var $this = $('#ticketButton');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();
            $.ajax({
                url: $('#ticketForm').attr('action'),
                type: "POST",
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#ticketForm')[0]),
                success: function(data) {
                    if(data.status){
                        successMsg('Update Banner', data.msg);
						window.location.reload();
                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
                        buttonLoading('reset', $this);
						errorMsg('Edit Banner', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Update banner', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });

           });


    </script>
@stop