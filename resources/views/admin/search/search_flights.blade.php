@extends('admin.layouts.app')
@section('title')
{{$page_name}}
@stop
@section('stylecss')

<style>
    .form-group label {
        font-weight:600;
        font-size:15px;
    }

    .form-control{
        height:40px;
    }

    .input-group-append .input-group-text, .input-group-prepend .input-group-text {
        height:43px;
    }

    /* travller */

    .trav_engine {
        position: relative;
        width: 95%;
    }

    .trav_toggle {
        width: 97%;
        box-sizing: border-box;
        line-height: 32px;
        font-size: 0;
        position: absolute;
        top: 0;
    }
    .trav_form {
        border: 1px solid #ddd;
        width: 100%;
        box-sizing: border-box;
        float: left;
        position:absolute;
        z-index: 500;
        background-color:#fff;
    }
    .trav_item {
        border-bottom: 1px solid #eaeaea;
        width: 100%;
        box-sizing: border-box;
        padding: 10px;
        float: left;
    }
    .trav_inner1 {
        width: 60%;
        float: left;
        font-size: 15px;
        line-height: 17px;
        color: #333333;
        box-sizing: border-box;
    }
    .trav_inner1 span {
        font-size: 11px;
        display: block;
        color: #888888;
    }
    .trav_inner2 {
        width: 40%;
        float: left;
        font-size: 13px;
        line-height: 30px;
        color: #666;
        box-sizing: border-box;
        display: flex;
    }
    .minus, .plus {
        border: 1px solid #ddd;
        width: 36px;
        text-decoration: none;
        font-size: 18px;
        height: 34px;
        text-align: center;
        box-sizing: border-box;
        float: left;
        background: #ddd;   
        background: rgb(255,255,255);
        background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(242,242,242,1) 48%, rgba(255,255,255,1) 100%); 
        background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(242,242,242,1) 48%,rgba(255,255,255,1) 100%);
        background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(242,242,242,1) 48%,rgba(255,255,255,1) 100%); 
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff',GradientType=0);
    }
    .minus {
        border-radius: 50% 0 0 50%;
    }
    .plus {
        border-radius: 0 50% 50% 0;
    }
    .txt_trav {
        outline:none;
        border: 1px solid #ddd;
        height: 34px;
        width: 36px;
        float: left;
        text-align: center;
        line-height: 34px;
        box-sizing: border-box;
        border-left: 0;
        border-right: 0;
        font-size: 16px;
        color: #444;
    }
    .txt_Traveler {
        border: 1px solid #aaa;
        width: 100%;
        height: 43px;
        box-sizing: border-box;
        padding: 10px;
        outline: none;
        border-radius: 3px;
    }



    .trav_toggle.open {
        background: url('{{asset("front/images/down.png")}}') no-repeat right 8px;
        background-size: 20px;
    }
    .trav_toggle.close {
        background: url('{{asset("front/images/up.png")}}') no-repeat right 8px;
        background-size: 20px;
    }

    .trav_done {
        padding: 6px;
        display: block;
        border-radius: 2px;
        background: #f2f2f2;
        font-size: 14px;
        border: 1px solid #ddd;
        color: #444;
        width: 70px;
        margin: 0 auto;
        text-align: center;
        cursor: default;
    }

    .input-group .select2{
        width:242px !important;
    }

    .select2{
        width:100% !important;
    }

    .btn-secondary:hover, .btn-secondary:focus {
        background: #fff;
        border:2px solid #d8d8d8;
        color: #000;
    }

    .active_button {
        background: #fff;
        border:2px solid #d8d8d8;
        color: #000;
    }

</style>
@stop
@section('content')
 <!-- partial -->
 <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-8">
                    <div class="search-header mb-2">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#online" role="tab">Online </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#home" role="tab">Sales Agent </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Vendor </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="card-title card-title-dash">{{$page_title}}</h4>
                            </div>
                                <form id="submitForm" class="form-horizontal" method="post" action="{{ $page_url }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="tab-content">
                                        
                                        <div class="tab-pane active" id="online" role="tabpanel">
                                            <div class="row">
                                                <div class="col-sm-12 mb-3">
                                                    <button class="btn btn-secondary btn-sm rounded-1 active_button" id="round-trip" data-id="one-way" onclick="tabActive(this);" type="button">Round Trip</button>
                                                    <button class="btn btn-secondary btn-sm rounded-1" type="button" id="one-way" data-id="round-trip" onclick="tabActive(this);">One-Way</button>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group local-forms">
                                                        <label for="from">From <span class="login-danger">*</span></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-plane-departure"></i></span>
                                                            </div>
                                                            <select name="from" id="from" class="form-control multi">
                                                                <option value="">Departure City</option>
                                                                @foreach($airports as $key=>$val)
                                                                    <option value="{{$val->id}}">{{$val->name}} ({{$val->code}})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group local-forms">
                                                        <label for="from">To <span class="login-danger">*</span></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i class="fa-sharp fa-solid fa-plane-arrival"></i></span>
                                                            </div>
                                                            <select name="to" id="to" class="form-control multi">
                                                                <option value="">Destination City</option>
                                                                @foreach($airports as $key=>$val)
                                                                    <option value="{{$val->id}}">{{$val->name}} ({{$val->code}})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group local-forms">
                                                        <label for="trip_date">Departure Date <span class="login-danger">*</span></label>
                                                        <div class="input-group datepicker-autoclose date datepicker navbar-date-picker">
                                                            <span class="input-group-addon input-group-prepend border-right">
                                                                <span class="icon-calendar input-group-text calendar-icon"></span>
                                                            </span>
                                                            <input type="text" class="form-control" style="height:2rem;" name="departure_date" id="departure_date">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group local-forms">
                                                        <label for="trip_date">Return Date <span class="login-danger">*</span></label>
                                                        <div class="input-group datepicker-autoclose date datepicker navbar-date-picker">
                                                            <span class="input-group-addon input-group-prepend border-right">
                                                                <span class="icon-calendar input-group-text calendar-icon"></span>
                                                            </span>
                                                            <input type="text" class="form-control" name="return_date" id="return_date">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6">
        											<div class="form-group local-forms">
        											    <span class="frm-tpname"><label for="from">Travellers <span class="login-danger">*</span></span>
        												<div class="trav_engine">
        													<input type="text" id="txtTotalTravelers" class="txt_Traveler form-control" name="travelers" value="1 Traveler(s),{{$class[0]->title}}" readonly="readonly" />
        													<div class="trav_toggle open" style="width: 86%;">
        														<a href="#">Open</a>
        													</div>
        													<div class="trav_form" style="display: none;">
        														<div class="trav_item">
        															<div class="trav_inner1">
        																Adults
        																<span>12+ yrs</span>
        															</div>
        															<div class="trav_inner2">
        																<a href="javascript:void(0)" class="minus" onclick="javascript:process(-1)">-</a>
        																<input type="text" value="{{isset($post)?$post->adults:'1'}}" id="ddlAdult" name="adults" class="txt_trav" readonly="readonly" onkeypress="return false;" />
        																<a href="javascript:void(0)" class="plus" onclick="javascript:process(1)">+</a>
        															</div>
        														</div>
        														<div class="trav_item">
        															<div class="trav_inner1">
        																Children
        																<span>2 - 11 yrs</span>
        															</div>
        															<div class="trav_inner2">
        																<a href="javascript:void(0)" class="minus" onclick="javascript:process2(-1)">-</a>
        																<input type="text" value="{{isset($post)?$post->childs:'0'}}" id="ddlChild" name="childs" class="txt_trav" readonly="readonly" onkeypress="return false;" />
        																<a href="javascript:void(0)" class="plus" onclick="javascript:process2(1)">+</a>
        															</div>
        														</div>
        														<div class="trav_item">
        															<div class="trav_inner1">
        																Infants
        																<span>under 2 yrs</span>
        															</div>
        															<div class="trav_inner2">
        																<a href="javascript:void(0)" class="minus" onclick="javascript:process3(-1)">-</a>
        																<input type="text" value="{{isset($post)?$post->infants:'0'}}" id="ddlInfant" name="infants" class="txt_trav" readonly="readonly" onkeypress="return false;" />
        																<a href="javascript:void(0)" class="plus" onclick="javascript:process3(1)">+</a>
        															</div>
        														</div>
        														<div class="trav_item">
        															<div class="trav_inner1 w-100">
        																<!--<lable >Choose Travel Class</lable>-->
        																<select class="form-control h-100" onchange="GetClass(this);" name="class" id="class">
        																    <!--<option value="">Select Travel Class</option>-->
        																    @foreach($class as $key=>$val)
        																        <option data-id="{{$val->title}}" value="{{$val->id}}">{{$val->title}}</option>
        																    @endforeach
        																</select>
        															</div>
        														</div>
        														<div class="trav_item">
        															<span class="trav_done">Done</span>
        														</div>
        													</div>
        												</div>
        											</div>
        										</div>
        										
        										<div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="from">Fare Type <span class="login-danger">*</span></label>
                                                        <select name="fare_type" id="fare_type" class="form-control multi">
                                                            <option value="">Select Preferred Airline</option>
                                                            @foreach($fare_type as $key=>$val)
                                                                <option value="{{$val->id}}">{{$val->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="tab-pane" id="home" role="tabpanel">
                                            <div class="row">
                                                <div class="col-sm-12 mb-3">
                                                    <button class="btn btn-secondary btn-sm rounded-1 active_button" id="round-trip" data-id="one-way" onclick="tabActive(this);" type="button">Round Trip</button>
                                                    <button class="btn btn-secondary btn-sm rounded-1" type="button" id="one-way" data-id="round-trip" onclick="tabActive(this);">One-Way</button>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group local-forms">
                                                        <label for="from">From <span class="login-danger">*</span></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-plane-departure"></i></span>
                                                            </div>
                                                            <select name="from" id="from" class="form-control multi">
                                                                <option value="">Departure City</option>
                                                                @foreach($airports as $key=>$val)
                                                                    <option value="{{$val->id}}">{{$val->name}} ({{$val->code}})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group local-forms">
                                                        <label for="from">To <span class="login-danger">*</span></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i class="fa-sharp fa-solid fa-plane-arrival"></i></span>
                                                            </div>
                                                            <select name="to" id="to" class="form-control multi">
                                                                <option value="">Destination City</option>
                                                                @foreach($airports as $key=>$val)
                                                                    <option value="{{$val->id}}">{{$val->name}} ({{$val->code}})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group local-forms">
                                                        <label for="trip_date">Departure Date <span class="login-danger">*</span></label>
                                                        <div class="input-group datepicker-autoclose date datepicker navbar-date-picker">
                                                            <span class="input-group-addon input-group-prepend border-right">
                                                                <span class="icon-calendar input-group-text calendar-icon"></span>
                                                            </span>
                                                            <input type="text" class="form-control" style="height:2rem;" name="departure_date" id="departure_date">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group local-forms">
                                                        <label for="trip_date">Return Date <span class="login-danger">*</span></label>
                                                        <div class="input-group datepicker-autoclose date datepicker navbar-date-picker">
                                                            <span class="input-group-addon input-group-prepend border-right">
                                                                <span class="icon-calendar input-group-text calendar-icon"></span>
                                                            </span>
                                                            <input type="text" class="form-control" name="return_date" id="return_date">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6">
        											<div class="form-group local-forms">
        											    <span class="frm-tpname"><label for="from">Travellers <span class="login-danger">*</span></span>
        												<div class="trav_engine">
        													<input type="text" id="txtTotalTravelers" class="txt_Traveler form-control" name="travelers" value="1 Traveler(s),{{$class[0]->title}}" readonly="readonly" />
        													<div class="trav_toggle open" style="width: 86%;">
        														<a href="#">Open</a>
        													</div>
        													<div class="trav_form" style="display: none;">
        														<div class="trav_item">
        															<div class="trav_inner1">
        																Adults
        																<span>12+ yrs</span>
        															</div>
        															<div class="trav_inner2">
        																<a href="javascript:void(0)" class="minus" onclick="javascript:process(-1)">-</a>
        																<input type="text" value="{{isset($post)?$post->adults:'1'}}" id="ddlAdult" name="adults" class="txt_trav" readonly="readonly" onkeypress="return false;" />
        																<a href="javascript:void(0)" class="plus" onclick="javascript:process(1)">+</a>
        															</div>
        														</div>
        														<div class="trav_item">
        															<div class="trav_inner1">
        																Children
        																<span>2 - 11 yrs</span>
        															</div>
        															<div class="trav_inner2">
        																<a href="javascript:void(0)" class="minus" onclick="javascript:process2(-1)">-</a>
        																<input type="text" value="{{isset($post)?$post->childs:'0'}}" id="ddlChild" name="childs" class="txt_trav" readonly="readonly" onkeypress="return false;" />
        																<a href="javascript:void(0)" class="plus" onclick="javascript:process2(1)">+</a>
        															</div>
        														</div>
        														<div class="trav_item">
        															<div class="trav_inner1">
        																Infants
        																<span>under 2 yrs</span>
        															</div>
        															<div class="trav_inner2">
        																<a href="javascript:void(0)" class="minus" onclick="javascript:process3(-1)">-</a>
        																<input type="text" value="{{isset($post)?$post->infants:'0'}}" id="ddlInfant" name="infants" class="txt_trav" readonly="readonly" onkeypress="return false;" />
        																<a href="javascript:void(0)" class="plus" onclick="javascript:process3(1)">+</a>
        															</div>
        														</div>
        														<div class="trav_item">
        															<div class="trav_inner1 w-100">
        																<!--<lable >Choose Travel Class</lable>-->
        																<select class="form-control h-100" onchange="GetClass(this);" name="class" id="class">
        																    <!--<option value="">Select Travel Class</option>-->
        																    @foreach($class as $key=>$val)
        																        <option data-id="{{$val->title}}" value="{{$val->id}}">{{$val->title}}</option>
        																    @endforeach
        																</select>
        															</div>
        														</div>
        														<div class="trav_item">
        															<span class="trav_done">Done</span>
        														</div>
        													</div>
        												</div>
        											</div>
        										</div>

                                                <!--<div class="col-12 col-sm-4">-->
                                                <!--    <div class="form-group">-->
                                                <!--        <label for="from">Class <span class="login-danger">*</span></label>-->
                                                <!--        <select name="class" id="class" class="form-control multi">-->
                                                <!--            <option value="">Select Class</option>-->
                                                <!--            @foreach($class as $key=>$val)-->
                                                <!--                <option value="{{$val->id}}">{{$val->title}}</option>-->
                                                <!--            @endforeach-->
                                                <!--        </select>-->
                                                <!--    </div>-->
                                                <!--</div>-->

                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="from">Airline <span class="login-danger">*</span></label>
                                                        <select name="class" id="class" class="form-control multi">
                                                            <option value="">Select Preferred Airline</option>
                                                            @foreach($airline as $key=>$val)
                                                                <option value="{{$val->id}}">{{$val->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <div class="" style="margin-right:31px">
                                                            <input type="checkbox" id="direct_flights" name="flight_preference" onclick="toggleCheckbox(this)" class="form-radio">
                                                            <label for="direct_flights" style="font-size: 14px;"> Show Direct Flights Only</label>
                                                        </div>

                                                        <div class="" style="margin-right:31px">
                                                            <input type="checkbox" id="flexible" name="flight_preference" onclick="toggleCheckbox(this)" class="form-radio">
                                                            <label for="flexible" style="font-size: 14px;"> My Dates Are Flexible (+/- 3 Days)</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mt-3">
                                                    <div class="form-group">
                                                        <label for="from">Select Supplier</label>
                                                        <div class="d-flex">
                                                            <div class="" style="margin-right:31px">
                                                                <input type="checkbox" id="selectall" name="selectall" class="form-radio">
                                                                <label for="selectall" style="font-size: 14px;"> Select All</label>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="" style="margin-right:31px">
                                                                <input type="checkbox" id="1" name="supplier[]" class="supplier form-radio">
                                                                <label for="1" style="font-size: 14px;"> Amadeus</label>
                                                            </div>

                                                            <div class="" style="margin-right:31px">
                                                                <input type="checkbox" id="flexible" name="supplier[]" class="supplier form-radio">
                                                                <label for="flexible" style="font-size: 14px;"> 1G 0XB7 LIVE</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="profile" role="tabpanel">
                                            <div class="row">
                                                <div class="col-sm-12 mb-3">
                                                    <button class="btn btn-secondary btn-sm rounded-1 active_button" id="round-trip" data-id="one-way" onclick="tabActive(this);" type="button">Round Trip</button>
                                                    <button class="btn btn-secondary btn-sm rounded-1" type="button" id="one-way" data-id="round-trip" onclick="tabActive(this);">One-Way</button>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group local-forms">
                                                        <label for="from">From <span class="login-danger">*</span></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-plane-departure"></i></span>
                                                            </div>
                                                            <select name="from" id="from1" class="form-control multi">
                                                                <option value="">Departure City</option>
                                                                @foreach($airports as $key=>$val)
                                                                    <option value="{{$val->id}}">{{$val->name}} ({{$val->code}})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group local-forms">
                                                        <label for="from">To <span class="login-danger">*</span></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i class="fa-sharp fa-solid fa-plane-arrival"></i></span>
                                                            </div>
                                                            <select name="to" id="to2" class="form-control multi">
                                                                <option value="">Destination City</option>
                                                                @foreach($airports as $key=>$val)
                                                                    <option value="{{$val->id}}">{{$val->name}} ({{$val->code}})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group local-forms">
                                                        <label for="trip_date">Departure Date <span class="login-danger">*</span></label>
                                                        <div class="input-group datepicker-autoclose date datepicker navbar-date-picker">
                                                            <span class="input-group-addon input-group-prepend border-right">
                                                                <span class="icon-calendar input-group-text calendar-icon"></span>
                                                            </span>
                                                            <input type="text" class="form-control" style="height:2rem;" name="departure_date" id="departure_date">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group local-forms">
                                                        <label for="trip_date">Return Date <span class="login-danger">*</span></label>
                                                        <div class="input-group datepicker-autoclose date datepicker navbar-date-picker">
                                                            <span class="input-group-addon input-group-prepend border-right">
                                                                <span class="icon-calendar input-group-text calendar-icon"></span>
                                                            </span>
                                                            <input type="text" class="form-control" name="return_date" id="return_date">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6">
        											<div class="form-group local-forms">
        											<span class="frm-tpname"><label for="from">Travellers <span class="login-danger">*</span></label></span>
        												<div class="trav_engine">
        													<input type="text" id="txtTotalTravelers" class="txt_Traveler form-control" name="travelers" value="1 Traveler(s),{{$class[0]->title}}" readonly="readonly" />
        													<div class="trav_toggle open" style="width: 86%;">
        														<a href="#">Open</a>
        													</div>
        													<div class="trav_form" style="display: none;">
        														<div class="trav_item">
        															<div class="trav_inner1">
        																Adults
        																<span>12+ yrs</span>
        															</div>
        															<div class="trav_inner2">
        																<a href="javascript:void(0)" class="minus" onclick="javascript:process(-1)">-</a>
        																<input type="text" value="{{isset($post)?$post->adults:'1'}}" id="ddlAdult" name="adults" class="txt_trav" readonly="readonly" onkeypress="return false;" />
        																<a href="javascript:void(0)" class="plus" onclick="javascript:process(1)">+</a>
        															</div>
        														</div>
        														<div class="trav_item">
        															<div class="trav_inner1">
        																Children
        																<span>2 - 11 yrs</span>
        															</div>
        															<div class="trav_inner2">
        																<a href="javascript:void(0)" class="minus" onclick="javascript:process2(-1)">-</a>
        																<input type="text" value="{{isset($post)?$post->childs:'0'}}" id="ddlChild" name="childs" class="txt_trav" readonly="readonly" onkeypress="return false;" />
        																<a href="javascript:void(0)" class="plus" onclick="javascript:process2(1)">+</a>
        															</div>
        														</div>
        														<div class="trav_item">
        															<div class="trav_inner1">
        																Infants
        																<span>under 2 yrs</span>
        															</div>
        															<div class="trav_inner2">
        																<a href="javascript:void(0)" class="minus" onclick="javascript:process3(-1)">-</a>
        																<input type="text" value="{{isset($post)?$post->infants:'0'}}" id="ddlInfant" name="infants" class="txt_trav" readonly="readonly" onkeypress="return false;" />
        																<a href="javascript:void(0)" class="plus" onclick="javascript:process3(1)">+</a>
        															</div>
        														</div>
        														<div class="trav_item">
        															<div class="trav_inner1 w-100">
        																<!--<lable >Choose Travel Class</lable>-->
        																<select class="form-control h-100" onchange="GetClass(this);" name="class" id="class">
        																    <!--<option value="">Select Travel Class</option>-->
        																    @foreach($class as $key=>$val)
        																        <option data-id="{{$val->title}}" value="{{$val->id}}">{{$val->title}}</option>
        																    @endforeach
        																</select>
        															</div>
        														</div>
        														<div class="trav_item">
        															<span class="trav_done">Done</span>
        														</div>
        													</div>
        												</div>
        											</div>
        										</div>

                                                <!--<div class="col-12 col-sm-4">-->
                                                <!--    <div class="form-group">-->
                                                <!--        <label for="from">Class <span class="login-danger">*</span></label>-->
                                                <!--        <select name="class" id="class1" class="form-control multi">-->
                                                <!--            <option value="">Select Class</option>-->
                                                <!--            @foreach($class as $key=>$val)-->
                                                <!--                <option value="{{$val->id}}">{{$val->title}}</option>-->
                                                <!--            @endforeach-->
                                                <!--        </select>-->
                                                <!--    </div>-->
                                                <!--</div>-->

                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="from">Airline <span class="login-danger">*</span></label>
                                                        <select name="airline" id="airline1" class="form-control multi">
                                                            <option value="">Select Preferred Airline</option>
                                                            @foreach($airline as $key=>$val)
                                                                <option value="{{$val->id}}">{{$val->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <div class="" style="margin-right:31px">
                                                            <input type="checkbox" id="direct_flights" name="flight_preference" onclick="toggleCheckbox(this)" class="form-radio">
                                                            <label for="direct_flights" style="font-size: 14px;"> Show Direct Flights Only</label>
                                                        </div>

                                                        <div class="" style="margin-right:31px">
                                                            <input type="checkbox" id="flexible" name="flight_preference" onclick="toggleCheckbox(this)" class="form-radio">
                                                            <label for="flexible" style="font-size: 14px;"> My Dates Are Flexible (+/- 3 Days)</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mt-3">
                                                    <div class="form-group">
                                                        <label for="from">Select Supplier</label>
                                                        <div class="d-flex">
                                                            <div class="" style="margin-right:31px">
                                                                <input type="checkbox" id="selectall" name="selectall" class="form-radio">
                                                                <label for="selectall" style="font-size: 14px;"> Select All</label>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="" style="margin-right:31px">
                                                                <input type="checkbox" id="1" name="supplier[]" class="supplier form-radio">
                                                                <label for="1" style="font-size: 14px;"> Amadeus</label>
                                                            </div>

                                                            <div class="" style="margin-right:31px">
                                                                <input type="checkbox" id="flexible" name="supplier[]" class="supplier form-radio">
                                                                <label for="flexible" style="font-size: 14px;"> 1G 0XB7 LIVE</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                  <!-- <hr> -->
                                    <div class="form-group mt-2">
                                        <div class="row row-sm">
                                            <div class="col-md-9">
                                            <button type="submit" id="submitButton" class="btn btn-danger float-right"
                                                data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..."
                                                data-rest-text="Search">Search Flights</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>    
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scriptjs')
    <script src="{{asset('admin/js/formpickers.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="{{asset('front/assets/js/travellers.js')}}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->

    <script type="text/javascript">
           $(".multi").select2();


    function toggleCheckbox(checkbox) {
        var checkboxes = document.getElementsByName(checkbox.name);

        checkboxes.forEach(function (currentCheckbox) {
            if (currentCheckbox !== checkbox) {
                currentCheckbox.checked = false;
            }
        });
    }

    function tabActive(val) {
        $(val).addClass('active_button');
        var id = "#" + $(val).data('id');
        $(id).removeClass('active_button');

        if($(val).attr('id') == "one-way"){
            $('#return_date').prop('disabled', true);
        }
        else{
            $('#return_date').prop('disabled', false);
        }
    }

        $('#selectall').click(function(event) {
            if (this.checked) {
                // Iterate each checkbox
                $('.supplier').each(function() {
                    this.checked = true;
                });
            } else {
                $('.supplier').each(function() {
                    this.checked = false;
                });
            }
        });
        


    </script>
@stop
