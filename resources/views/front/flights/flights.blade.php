@extends('front.layouts.flights_header')
@section('title') Search Flights @endsection
@section('inlinecss')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>

    .form-control[readonly] {
      background-color: #fff;
    }

    .trav_toggle {
        width: 93%;
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
        height: 40px;
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


    .select2-container--default .select2-selection--single {
      height: 50px; /* Set your desired height */
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered{
      line-height: 68px;
    }

    .select2-container{
      position: initial;
    }

	.select2-container--default .select2-selection--single .select2-selection__arrow {
		right: 13px;
	}

	.btn-outline-danger {
		--bs-btn-color: #dc3545;
		--bs-btn-border-color: #dc3545;
		--bs-btn-hover-color: #dc3545;
		--bs-btn-hover-bg: none;
		--bs-btn-hover-border-color: #dc3545;
		--bs-btn-focus-shadow-rgb: 220,53,69;
		--bs-btn-active-color: #dc3545;
		--bs-btn-active-bg: none;
		--bs-btn-active-border-color: #dc3545;
		--bs-btn-active-shadow: none;
		--bs-btn-disabled-color: #dc3545;
		--bs-btn-disabled-bg: transparent;
		--bs-btn-disabled-border-color: #dc3545;
		--bs-gradient: none;
	}

	.add_city_btn{
		font-size: larger;
		font-weight: 600;
		filter: drop-shadow(2px 4px 6px black);
		margin-top: -20px;
		cursor: pointer;
	}


	/* Price Range */

	.ui-widget.ui-widget-content {
      border: 1px solid #f1f1f1;
      background: linear-gradient(#e8e8e8, white);
    }
    
    .ui-slider-horizontal {
      height: 10px;
    }
    
    .ui-slider {
      position: relative;
      text-align: left;
    }
    
    .ui-slider-horizontal .ui-slider-range {
      top: 0;
      height: 100%;
    }
    
    .ui-slider-horizontal .ui-slider-handle {
      top: -5px;
      margin-left: -10px;
    }
    
    .ui-state-default,
    .ui-widget-content .ui-state-default {
      border: 1px solid #c5c5c5;
      background: #695D46;
      font-weight: normal;
      color: #454545;
    }
    
    .ui-slider .ui-slider-range {
      position: absolute;
      z-index: 1;
      display: block;
      border: 0;
      background-position: 0 0;
    }
    
    .ui-slider .ui-slider-handle {
      position: absolute;
      z-index: 2;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      cursor: pointer;
      -ms-touch-action: none;
      touch-action: none;
      outline: 0;
    }
    
    .ui-widget-header {
      border: 1px solid #dddddd;
      background: #ed9323 !important;
      color: #333333;
      font-weight: bold;
    }
    
    input#amount {
      position: absolute;
      top: 18px;
      left: calc(50% - 55px);
      width: 100px;
      text-align: center;
      border: 0;
      color: #f6931f;
      font-weight: normal;
      color: #fff;
      border-radius: 2px;
      background-color: #ed9323;
    }
    
    /*stops*/
    
    .stops-item {
        width: 32px;
        height: 32px;
        border-radius: 3px;
        border: 1px solid #dfdfdf;
        padding: 8px;
        border-left-width: 1px;
        cursor:pointer;
    }
    
    .input-hidden {
        opacity: 0;
        position: absolute;
    }
    
    .font-lightgrey {
        color: #666;
    }
    
    .stops-item.active p {
        color: #fff;
    }
    
    .stops-item.active {
        background: #ed9323e0;
        font-family: "Rubik-Medium";
    }
    
    /*Departure*/
    
    .dep-item {
        color: #8a8a8a;
        width: 58px;
        height: 52px;
        padding: 5px 0;
        margin-right: -4px;
        cursor:pointer;
    }
    
    .dep-item.active {
        background: #ed9323e0;
        font-family: "Rubik-Medium";
    }
    
    .dep-item.active p {
        color: #fff;
    }
    
    .dep-item {
        display: inline-block;
        border: 1px solid #dfdfdf;
        border-left-width: 0;
    }
    
    .dep-item:first-of-type {
        border-left-width: 1px;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    
    .fs-20 {
        font-size: 1.42857rem;
    }
    
    .fs-12 {
        font-size: .85714rem;
    }

    
    .form-check-label{
        font-family: "Rubik-Medium";
    }


	/* airports search */

	.autocomplete-results {
		position: absolute;
		background: white;
		z-index: 100000;
		overflow:scroll;
		height: 260px;
		top: 100%;
		left: 0;
		font-size: 13px;
		border: solid 1px #ddd;
		border-top-width: 0;
		border-bottom-color: #ccc;
		box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	}

	.autocomplete-result {
		padding: 12px 15px;
		border-bottom: solid 1px #eee;
		cursor: pointer;
	}

	.autocomplete-result:last-child {
		border-bottom-width: 0;
	}

	.autocomplete-location {
		opacity: .8;
		font-size: smaller;
	}



</style>
@endsection
@section('container')
<section class="hmg-bnnr">
			<div class="container">
				<div class="hmg-bnnr-main">
					<ul class="hmg-bnnr-tpbtn">
						<li><a href="https://shreekalyanamtravels.com/travels/"><i class="fas fa-suitcase-rolling me-2"></i>Tour Packages</a></li>
						<li><a href="javascript:void(0);" class="active"><i class="fas fa-plane me-2"></i>Flight</a></li>
					</ul>

					<div class="hmg-tab">
					<ul class="nav" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#hmg-tab-01" type="button">
							<span></span>One-way</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" data-bs-toggle="tab" data-bs-target="#hmg-tab-02" type="button"><span></span>Round-trip</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" data-bs-toggle="tab" data-bs-target="#hmg-tab-03" type="button"><span></span>Multi-city</button>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="hmg-tab-01" role="tabpanel">
							<!-- One-way form -->
							<!-- Include the HTML code for the one-way form here -->
								@include('front.flights.forms.oneway')
						</div>
						<div class="tab-pane fade" id="hmg-tab-02" role="tabpanel">
							<!-- Round-trip form -->
							<!-- Include the HTML code for the round-trip form here -->
							@include('front.flights.forms.roundtrip')
						</div>
						<div class="tab-pane fade" id="hmg-tab-03" role="tabpanel">
							   <!-- Multi-city form -->
								<!-- Include the HTML code for the multi-city form here -->
								@include('front.flights.forms.multicity')
						</div>

					</div>
				</div>
					
				</div>
			</div>
		</section>
		<section class="flightlst space">
			<div class="container">
				<div class="row">
    				<div class="col-lg-3 col-md-4 col-sm-12 d-none d-lg-block d-xl-block d-md-block">
				        <form method="get" action="{{route('search-flights')}}" id="flightsForm">
							@csrf
    						<div class="lft-bar sticky-top">
    							<h4 class="lft-bar-head brb p-15">Filters
    							<a href="" class="text-danger"><i class="far fa-times-circle me-2"></i>Clear filter</a>
    							</h4>
    							<div class="p-15 brb lft-bar-check">
    							    <h4 class="lft-bar-head p-0">Airlines</h4>
    								@foreach($airline as $key=>$val)
    									<div class="form-check" >
    										<input class="form-check-input airlines" name="airlines[]" onclick="getAirlines();" value="{{$val->title}}" type="checkbox" id="airlines{{$key}}">
    										<label class="form-check-label" for="airlines{{$key}}">{{$val->title}}</label>
    									</div>
    								@endforeach
    							</div>
    							<div class="p-15 brb lft-bar-check">
    							    <h4 class="lft-bar-head p-0">Aircraft</h4>
    								@foreach($aircraft as $key=>$val)
    									<div class="form-check" >
    										<input class="form-check-input aircraft" name="aircraft[]" onclick="getAircraft();" value="{{$val->title}}" type="checkbox" id="aircraft{{$key}}">
    										<label class="form-check-label" for="aircraft{{$key}}">{{$val->title}}</label>
    									</div>
    								@endforeach
    							</div>
    							<div class="progress-var p-15 brb">
    							    <h4 class="lft-bar-head">Price Range</h4>
    								<div class="slider">
                                        <p>
                                          <!--<label for="amount"><strong>Price Range</strong></label>-->
                                          <input type="text" name="price-range" id="amount" readonly>
                                        </p>
                                        <div id="slider-range"></div>
                                    </div>
    							</div>
    							<div class="stops-btn p-15 brb">
    								<h4 class="lft-bar-head">Stops</h4>
    								<label class="i-b mr-5 fs-12 stops-item text-center pr">
                                        <input type="checkbox" name="stops[]" class="input-hidden" value="0" onchange="toggleActiveClass(this)" />
                                        <p class="font-lightgrey">0</p>
                                    </label>
    								<label class="i-b mr-5 fs-12 stops-item text-center pr">
                                        <input type="checkbox" name="stops[]" class="input-hidden" value="1" onchange="toggleActiveClass(this)" />
                                        <p class="font-lightgrey">1</p>
                                    </label>
    								<label class="i-b mr-5 fs-12 stops-item text-center pr">
                                        <input type="checkbox" name="stops[]" class="input-hidden" value="2" onchange="toggleActiveClass(this)" />
                                        <p class="font-lightgrey">2</p>
                                    </label>
    
    								<!--<button type="button"> 00 <span>Non-stop</span> </button>-->
    								<!--<button type="button"> +1 <span>Stop</span> </button>-->
    								<!--<button type="button"> +2 <span>Stop</span> </button>-->
    							</div>
    							<div class="stops-btn p-15 brb">
    								<h4 class="lft-bar-head">Departure From Delhi</h4>
    								
    								<label class="fs-12 cursor-pointer dep-item text-center pr">
                                        <input type="checkbox" class="input-hidden" name="departure_time[]" value="00 - 06" onchange="toggleActiveClass(this)" />
                                        <p class="time-icon m-0"><i class="far fa-sun-cloud"></i></p>
                                        <p class="font-lightgrey fs-12">00 - 06</p>
                                    </label>
    								
    								<label class="fs-12 cursor-pointer dep-item text-center pr">
                                        <input type="checkbox" class="input-hidden" name="departure_time[]" value="06 - 12" onchange="toggleActiveClass(this)" />
                                        <p class="time-icon m-0"><i class="far fa-sun"></i></p>
                                        <p class="font-lightgrey fs-12">06 - 12</p>
                                    </label>
    								
    								<label class="fs-12 cursor-pointer dep-item text-center pr">
                                        <input type="checkbox" class="input-hidden" name="departure_time[]" value="12 - 18" onchange="toggleActiveClass(this)" />
                                        <p class="time-icon m-0"><i class="far fa-sun-haze"></i></p>
                                        <p class="font-lightgrey fs-12">12 - 18</p>
                                    </label>
    								
    								<label class="fs-12 cursor-pointer dep-item text-center pr">
                                        <input type="checkbox" class="input-hidden" name="departure_time[]" value="18 - 00" onchange="toggleActiveClass(this)" />
                                        <p class="time-icon m-0"><i class="far fa-moon"></i></p>
                                        <p class="font-lightgrey fs-12">18 - 00</p>
                                    </label>
    
    								<!--<button type="button"> Morning <span>6 AM</span> </button>-->
    								<!--<button type="button"> After-Non <span>12 PM - 6 PM</span> </button>-->
    								<!--<button type="button"> Evening <span>7 PM - 12 PM</span> </button>-->
    							</div>
    							
    							<div class="stops-btn p-15 brb d-flex justify-content-end">
    								<button class="bg-danger text-light border-danger m-0" id="searchFlightsData" type="submit">Apply Filter</button>
    							</div>
    						</div>
					    </form>
    				</div>
					<div class="col-lg-9 col-md-12 col-sm-12" id="getFlightsData">

						@foreach($flights as $k=>$v)
							<div class="cards ">
								<div class="p-10">
									<ul class="flight-lst-dtl">
										<li>
											<img src="{{asset('front/assets/images/flight-img.png')}}" alt="" class="img-60">
										</li>
										<li> <h5>{{$v->flight_name}} <span>{{$v->flight_number}}</span></h5>  </li>
										<li> <h5>{{$v->departure_time}} <span>{{$v->departure_airport_detail->name}}</span></h5>  </li>
										<li> <h5>{{$v->duration}} <span>+{{$v->no_of_stops}} Stop</span></h5>  </li>
										<li> <h5>{{$v->arrival_time}} <span>{{$v->arrival_airport_detail->name}}</span></h5>  </li>
										<li> <h5>₹ {{$v->price}}</h5> </li>
										<li><a class="thm-shrt-btn select-fare" data-bs-toggle="collapse" data-bs-target="#flight-fare-details{{$k}}" >Select Fare <i class="fa fa-caret-down"></i></a></li>
									</ul>
									<h3 class="off-txt">Get Rs 335 off using MMTDEAL* + Additional Flat Rs 50 off on UPI payments</h3>
								</div>

								<div class="accordion" id="accordionExample">
									<div class="flight-lst-dtl-innr">
										<div id="flight-fare-details{{$k}}" class="collapse">
											<div class="p-10 fligh-dtl-tab">
												<div class="tab-pane fade show active" id="dtl-01" role="tabpanel" >
													<table class="table">
														<thead>
															<tr>
																<th>Fare</th>
																<th>CABIN BAG</th>
																<th>CHECK-IN</th>
																<th>CANCELLATION</th>
																<th>DATE CHANGE</th>
																<th>SEAT</th>
																<th>MEAL</th>
																<th>Price</th>
																<th></th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<h4 class="lft-bar-head pb-2">FARE 1</h4>
															</tr>
															<tr>
																<td> <h5>Econ Semi Flex</td>
																<td> <h5>5 Kgs / Adult</h5>  </td>
																<td> <h5>30 Kgs / Adult</td>
																<td> <h5>Cancellation Fee starting ₹ 5,600</h5>  </td>
																<td> <h5>Date Change Fee starting ₹ 3,900</h5> </td>
																<td> <h5>------</h5> </td>
																<td> <h5>------</h5> </td>
																<td> <h5>₹ 5000</h5> </td>

																	@php				
																				
																	$encodedData = base64_encode(serialize($requestd_data));

																	@endphp

																<td><a href="{{route('flights_detail', ['flight_id'=>base64_encode($val->id), 'data' => $encodedData])}}" class="thm-shrt-btn">Buy Now</a></td>
															</tr>
															
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="accordion" id="accordionExample">
									<div class="flight-lst-dtl-innr">
										<h6 class="accordion-header" data-bs-toggle="collapse" data-bs-target="#flight-details{{$k}}">Flight Details</h6>
										<div id="flight-details{{$k}}" class="collapse">
											<div class="p-10 fligh-dtl-tab">
												<div class="nav" id="nav-tab">
													<a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#dtl-01">Flight Information</a>
													<a href="javascript:void(0);" class="nav-link"  data-bs-toggle="tab" data-bs-target="#dtl-02" >Fare Details & Rules</a>
													<a href="javascript:void(0);" class="nav-link"  data-bs-toggle="tab" data-bs-target="#dtl-03" >Baggage Information</a>
													<a href="javascript:void(0);" class="nav-link"  data-bs-toggle="tab" data-bs-target="#dtl-04" >Cancellation & Change Rule</a>
												</div>
												<div class="tab-content">
													<div class="tab-pane fade show active" id="dtl-01" role="tabpanel" >
														<h4 class="lft-bar-head pb-2">Delhi To Jaipur</h4>
														<ul class="flight-lst-dtl">
															<li><img src="{{asset('front/assets/images/flight-img.png')}}" alt="" class="img-60"></li>
															<li> <h5>{{$v->flight_name}} <span>{{$v->flight_number}}</span></h5>  </li>
															<li> <h5>{{$v->departure_time}} <span>{{$v->departure_airport_detail->name}}</span></h5>  </li>
															<li> <h5>{{$v->duration}} <span>+{{$v->no_of_stops}} Stop</span></h5>  </li>
															<li> <h5>{{$v->arrival_time}} <span>{{$v->arrival_airport_detail->name}}</span></h5>  </li>
															<li> <h5>₹ {{$v->price}}</h5> </li>
															<li><a href="javascript:void(0);" class="thm-shrt-btn">Buy Now</a></li>
														</ul>
													</div>
													<div class="tab-pane fade" id="dtl-02">
														<table class="table table-bordered table-second">
															<tr>
																<td>1 x Adult</td>
																<td>₹ 4700</td>
															</tr>
															<tr>
																<td>Total (Base Fare)</td>
																<td>₹ 4700</td>
															</tr>
															<tr>
																<td>Total Tax</td>
																<td>₹ 300</td>
															</tr>
															<tr>
																<td>Total (Fee & Tax)</td>
																<td>₹ 5000</td>
															</tr>
														</table>
														<h4 class="lft-bar-head mb-2 pb-0">Rules Details</h4>
														<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
													</div>
													<div class="tab-pane fade" id="dtl-03">
														<table class="table table-bordered">
															<thead class="table-primary">
																<tr>
																	<th>Airline</th>
																	<th>Check-in Baggage</th>
																	<th>Cabin Baggage</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>
																		<img src="{{asset('front/assets/images/flight-img.png')}}" alt="" class="img-30">
																		<span>indigo </span> <span>/ </span> <span>6E-2132</span>
																	</td>
																	<td> 15 KG </td>
																	<td>7 KG</td>
																</tr>
															</tbody>
															
														</table>
														<h4 class="lft-bar-head mb-2 pb-0">Note</h4>
														<p class="mb-1">Baggage information mentioned above is obtained from airline's reservation system, sky n ocean does not guarantee the accuracy of this information.</p>
														<p> The baggage allowance may vary according to stop-overs, connecting flights. changes in airline rules. etc.</p>
													</div>
													<div class="tab-pane fade" id="dtl-04">
														<table class="table table-bordered">
															<thead class="table-primary">
																<tr>
																	<th>Time Frame to cancel <span class="d-block">Before scheduled departure time</span></th>
																	<th>Airline Fees <span class="d-block">per passenger</span></th>
																	<th>Service Fees <span class="d-block">per passenger</span></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td> 2 hours to 4 days* </td>
																	<td> ₹ 5000 </td>
																	<td>₹ 300</td>
																</tr>
																<tr>
																	<td>4 days to 365 days*</td>
																	<td>₹ 4800</td>
																	<td>₹ 300</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
						{{-- <div class="cards ">
							<div class="p-10">
								<ul class="flight-lst-dtl">
									<li>
										<img src="{{asset('front/assets/images/flight-img.png')}}" alt="" class="img-60">
									</li>
									<li> <h5>indigo <span>6E-2132</span></h5>  </li>
									<li> <h5>3:15 <span>Delhi</span></h5>  </li>
									<li> <h5>02h 35m <span>+1 Stop</span></h5>  </li>
									<li> <h5>5:30 <span>Jaipur</span></h5>  </li>
									<li> <h5>₹ 5000</h5> </li>
									<li>
										<a href="{{route('flight-booking')}}" class="thm-shrt-btn">Buy Now</a>
									</li>
								</ul>
								<h3 class="off-txt">Get Rs 335 off using MMTDEAL* + Additional Flat Rs 50 off on UPI payments</h3>
							</div>
							<div class="accordion" id="accordionExample">
								<div class="flight-lst-dtl-innr">
									<h6 class="accordion-header" data-bs-toggle="collapse" data-bs-target="#flight-details1">Flight Details</h6>
									<div id="flight-details1" class="collapse">
										<div class="p-10 fligh-dtl-tab">
											<div class="nav" id="nav-tab">
												<a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#dtl-05">Flight Information</a>
												<a href="javascript:void(0);" class="nav-link"  data-bs-toggle="tab" data-bs-target="#dtl-06" >Fare Details & Rules</a>
												<a href="javascript:void(0);" class="nav-link"  data-bs-toggle="tab" data-bs-target="#dtl-07" >Baggage Information</a>
												<a href="javascript:void(0);" class="nav-link"  data-bs-toggle="tab" data-bs-target="#dtl-08" >Cancellation & Change Rule</a>
											</div>
											<div class="tab-content">
												<div class="tab-pane fade show active" id="dtl-05" role="tabpanel" >
													<h4 class="lft-bar-head pb-2">Delhi To Jaipur</h4>
													<ul class="flight-lst-dtl">
														<li>
															<img src="{{asset('front/assets/images/flight-img.png')}}" alt="" class="img-60">
														</li>
														<li> <h5>indigo <span>6E-2132</span></h5>  </li>
														<li> <h5>3:15 <span>Delhi</span></h5>  </li>
														<li> <h5>02h 35m <span>+1 Stop</span></h5>  </li>
														<li> <h5>5:30 <span>Jaipur</span></h5>  </li>
														<li> <h5>₹ 5000</h5> </li>
														<li>
															<a href="javascript:void(0);" class="thm-shrt-btn">Buy Now</a>
														</li>
													</ul>
												</div>
												<div class="tab-pane fade" id="dtl-06">
													<table class="table table-bordered table-second">
														<tr>
															<td>1 x Adult</td>
															<td>₹ 4700</td>
														</tr>
														<tr>
															<td>Total (Base Fare)</td>
															<td>₹ 4700</td>
														</tr>
														<tr>
															<td>Total Tax</td>
															<td>₹ 300</td>
														</tr>
														<tr>
															<td>Total (Fee & Tax)</td>
															<td>₹ 5000</td>
														</tr>
													</table>
													<h4 class="lft-bar-head mb-2 pb-0">Rules Details</h4>
													<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
												</div>
												<div class="tab-pane fade" id="dtl-07">
													<table class="table table-bordered">
														<thead class="table-primary">
															<tr>
																<th>Airline</th>
																<th>Check-in Baggage</th>
																<th>Cabin Baggage</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<img src="{{asset('front/assets/images/flight-img.png')}}" alt="" class="img-30">
																	<span>indigo </span> <span>/ </span> <span>6E-2132</span>
																</td>
																<td> 15 KG </td>
																<td>7 KG</td>
															</tr>
														</tbody>
														
													</table>
													<h4 class="lft-bar-head mb-2 pb-0">Note</h4>
													<p class="mb-1">Baggage information mentioned above is obtained from airline's reservation system, sky n ocean does not guarantee the accuracy of this information.</p>
													<p> The baggage allowance may vary according to stop-overs, connecting flights. changes in airline rules. etc.</p>
												</div>
												<div class="tab-pane fade" id="dtl-08">
													<table class="table table-bordered">
														<thead class="table-primary">
															<tr>
																<th>Time Frame to cancel <span class="d-block">Before scheduled departure time</span></th>
																<th>Airline Fees <span class="d-block">per passenger</span></th>
																<th>Service Fees <span class="d-block">per passenger</span></th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td> 2 hours to 4 days* </td>
																<td> ₹ 5000 </td>
																<td>₹ 300</td>
															</tr>
															<tr>
																<td>4 days to 365 days*</td>
																<td>₹ 4800</td>
																<td>₹ 300</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
		</section>
		<section class="faq-sec space">
			<div class="container">
				<h3 class="heading">Frequently asked questions</h3>
				<div class="accordion accordion-flush" id="accordionFlushExample">
					<div class="accordion-item">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-01"> How long is the flight from India to Malaysia? </button>
						<div id="faq-01" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
							<div class="accordion-body"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing</p></div>
						</div>
					</div>
					<div class="accordion-item">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-02">
						    Lorem Ipsum is simply dummy text of the printing and
						</button>
						<div id="faq-02" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
							<div class="accordion-body"><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non eligendi voluptatem nihil sunt minima autem dolorem tempore illo, atque dolores mollitia laboriosam quas quo earum praesentium recusandae, debitis accusantium architecto cupiditate beatae eius. Dolor facilis possimus quibusdam, odit voluptate architecto ad fugit nam similique a maxime vitae, atque molestias consequatur.</p></div>
						</div>
					</div>
					<div class="accordion-item">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-03">
						    How long is the flight from India to Malaysia?
						</button>
						<div id="faq-03" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
							<div class="accordion-body"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque mollitia, esse. Sed dolore officiis illum ea, quo enim inventore. Explicabo cumque debitis architecto quibusdam impedit molestiae mollitia itaque, corrupti odio fugiat et repellat sed accusamus saepe harum? Minima libero cum voluptatem, nostrum repellendus asperiores laudantium aspernatur, aliquam dolore ratione praesentium necessitatibus voluptatum deserunt, eaque ducimus vitae sunt illo labore consectetur?</p></div>
						</div>
					</div>
					<div class="accordion-item">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-04">
						How long is the flight from India to Malaysia?
						</button>
						<div id="faq-04" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
							<div class="accordion-body"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque mollitia, esse. Sed dolore officiis illum ea, quo enim inventore. Explicabo cumque debitis architecto quibusdam impedit molestiae mollitia itaque, corrupti odio fugiat et repellat sed accusamus saepe harum? Minima libero cum voluptatem, nostrum repellendus asperiores laudantium aspernatur, aliquam dolore ratione praesentium necessitatibus voluptatum deserunt, eaque ducimus vitae sunt illo labore consectetur?</p></div>
						</div>
					</div>
					<div class="accordion-item">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-05">
						    How long is the flight from India to Malaysia?
						</button>
						<div id="faq-05" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
							<div class="accordion-body"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque mollitia, esse. Sed dolore officiis illum ea, quo enim inventore. Explicabo cumque debitis architecto quibusdam impedit molestiae mollitia itaque, corrupti odio fugiat et repellat sed accusamus saepe harum? Minima libero cum voluptatem, nostrum repellendus asperiores laudantium aspernatur, aliquam dolore ratione praesentium necessitatibus voluptatum deserunt, eaque ducimus vitae sunt illo labore consectetur?</p></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="partner-sec">
			<div class="container space">
				<div class="owl-carousel owl-theme" id="partner-slider">
					<div class="item partner-img">
						<img src="{{asset('front/assets/images/partner-01.png')}}" alt="">
					</div>
					<div class="item partner-img">
						<img src="{{asset('front/assets/images/partner-02.png')}}" alt="">
					</div>
					<div class="item partner-img">
						<img src="{{asset('front/assets/images/partner-03.png')}}" alt="">
					</div>
					<div class="item partner-img">
						<img src="{{asset('front/assets/images/partner-04.png')}}" alt="">
					</div>
					<div class="item partner-img">
						<img src="{{asset('front/assets/images/partner-05.png')}}" alt="">
					</div>
				</div>
			</div>
		</section>

  @endsection

  @section('scriptjs')

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.16.1/lodash.min.js"></script>
  <script src="{{asset('front/assets/js/travellers.js')}}"></script>
<script src="https://unpkg.com/fuse.js@2.5.0/src/fuse.min.js"></script>
  
<script>
    // price range
    document.addEventListener('DOMContentLoaded',
      function(event) {
        $("#slider-range").slider({
          range: true,
          min: 0,
          max: 10000,
          values: [1000, 7000],
          step: 50,
          slide: function(event, ui) {
            var max = $("#slider-range").slider('option', 'max');
            $("#amount").val("₹" + ui.values[0] + " - " + "₹" + ui.values[1]);
            if (ui.values[1] == max) $('#amount').val($('#amount').val());
          }
        });
        $("#amount").val("₹" + $("#slider-range").slider("values", 0) + " - " + "₹" + $("#slider-range").slider("values", 1));
        $(".ui-widget-header").append($("input#amount, .triangle"));
     })

    // price range end
    function SetActiveBox(box)
	{
	    $('.radio').removeClass('fare-check');
	    $(box).addClass('fare-check');
	}

	function GetCountry(box){
		//alert();
		var countryCode = $('option:selected', box).data('country');
		var valueInput = $(box).data('id');
		$(valueInput).val(countryCode);
		//alert($(valueInput).val());
	}
      
    // datepikar

	$(function() {
		$(".date").datepicker({
		
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true,
			dateFormat: 'dd/mm/yy',
		
		});
	});


	function returnValidation(departure)
	{
		var date = $(departure).val();
		$("#return").datepicker({

			minDate: date,
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true,
			dateFormat: 'dd/mm/yy',

		});
	}


	$(document).on('click', '.interchange', function() {
		// Swap selected values between "From" and "To" dropdowns
		var fromid = $(this).data('from');
		var toid = $(this).data('to');
		var fromValue = $('#' + fromid).val();
		var toValue = $('#' + toid).val();

		$('#' + fromid).val(toValue).trigger("change");
		$('#' + toid).val(fromValue).trigger("change");
	});
</script>

<script>

	var counter = 0;
	function AddMultiCity()
	{
		
		$('#MultiCity').append(`
			<div class="row mt-3" id="MultiCity-${counter}">
				<div class="form_bx col-lg-3 col-md-6 col-sm-6 col-6">
					<span class="frm-tpname">Form</span>
					<select name="from[]" id="from2${counter}" onchange="GetCountry(this);" data-id="#origin_countryM${counter}" class="form-control multi">
						<option value=""></option>
						@foreach($airports as $key=>$val)
							<option value="{{$val->code}}" data-country="{{$val->country_code}}">{{$val->name}} ({{$val->code}})</option>
						@endforeach
					</select>
					<input type="hidden" name="origin_country[]" id="origin_countryM${counter}">
				</div>
				<div class="form_bx col-lg-3 col-md-6 col-sm-6 col-6">
					<span class="frm-tpname">To</span>
					<select name="to[]" id="to2${counter}" class="form-control multi" onchange="GetCountry(this);" data-id="#destination_countryM${counter}">
						<option value=""></option>
						@foreach($airports as $key=>$val)
							<option value="{{$val->code}}" data-country="{{$val->country_code}}">{{$val->name}} ({{$val->code}})</option>
						@endforeach
					</select>
					<button class="interchange" data-from="from2${counter}" data-to="to2${counter}" type="button"><i class="far fa-exchange"></i></button>
					<input type="hidden" name="destination_country[]" id="destination_countryM${counter}">
				</div>
				<div class="form_bx col-lg-3 col-md-4 col-sm-6">
					<span class="frm-tpname">Departure</span>
					<div class="form-group">
						<input type='text' name="departure[]" id="departureM${counter}" class="form-control input-lg date" />
					</div>
				</div>

				<div class="col-1 p-0" style="margin-top: -12px;margin-left: 10px;">
					<span class="text-danger add_city_btn" onclick="removeMultiCity(${counter})">X</span>
				</div>
				
			</div>
		`);

		if(counter == 0){
			var fromValue = $('#to2').val();
		}
		else{
			var formid = '#to2' + (counter-1);
			var fromValue = $(formid).val();
		}
		
	$('#from2' + counter).val(fromValue).trigger("change");
		
		$(".multi").select2();

			$(".date").datepicker({
			
				changeMonth: true,
				changeYear: true,
				showButtonPanel: true,
				dateFormat: 'dd/mm/yy',
			
			});

		counter++;
	}

	function removeMultiCity(id)
	{
		$("#MultiCity-"+id).remove();
		counter--;
	}
		
		
		
	function toggleActiveClass(checkbox) {
        var label = checkbox.parentNode; // Get the parent label element

        if (checkbox.checked) {
            label.classList.add("active");
        } else {
            label.classList.remove("active");
        }
    }
</script>

<script>

	// search filters
	$(function () {
		$('#flightsForm').submit(function(){
			
			$.ajax({
				url: $('#flightsForm').attr('action'),
				type: "GET",
				processData: false,  // Important!
				contentType: false,
				cache: false,
				data: new FormData($('#flightsForm')[0]),
				success: function(data) {
					$('#getFlightsData').html(data);
				},
				error: function() {
					// errorMsg('Create Banner', 'There has been an error, please alert us immediately');
					// buttonLoading('reset', $this);
				}
			});
			return false;
		});
	});

</script>

@include('front.flights.forms.scripts')

  @stop
  