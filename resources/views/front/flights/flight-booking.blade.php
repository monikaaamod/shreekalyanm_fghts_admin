@extends('front.layouts.flights_header')
@section('title') Search Flights @endsection
@section('inlinecss')
<style>
    .trvl-frm .form-control, .trvl-frm .form-select {
        height: 35px;
        border-radius: 6px;
        border: 1px solid #E5EFFA;
    }
</style>
@endsection
@section('container')
<section class="hmg-innr-bnnr">
			<div class="container">
				<h1 class="text-center text-white">Complete your booking</h1>
			</div>
		</section>
		<section class="flight-dtl-sec">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-12 col-sm-12">
						<div class="card mb-4">
							<div class="booking-departure p-15">
								<h4>{{$flight->departure_airport_detail->city_name}} → {{$flight->arrival_airport_detail->city_name}} <a href="javascript:void(0);">CANCELLATION FEES APPLY</a></h4>
								<h6>{{$flight->flight_date ? (new DateTime($flight->flight_date))->format('d D, M, Y H:i') : 'N/A'}} <sub> Non Stop · {{$flight->duration}} Hours</sub></h6>
								<div class="cards p-20">
									<ul>
										<li><span class="dep-time">{{$flight->departure_time}}</span> <p class="dep-name">{{$flight->departure_airport_detail->city_name}} , {{$flight->departure_airport_detail->name}},Terminal T2</p></li>
										
										@php
											$departureTime = new DateTime($flight->departure_time);
											$arrivalTime = new DateTime($flight->arrival_time);

											$timeDifference = $departureTime->diff($arrivalTime);

											$differenceString = $timeDifference->format('%Hh %Im');
										@endphp

										<li class="total-time"><p><span>{{$differenceString}}</span></p></li>
										<li><span class="dep-time">{{$flight->arrival_time}}</span> <p class="dep-name">{{$flight->arrival_airport_detail->city_name}} , {{$flight->arrival_airport_detail->name}},Terminal T2</p></li>
									</ul>
									<p class="laguage">
										<span>Baggage <em>ADULT</em></span>
										<span>Check-in <em>15 Kgs (1 piece only)</em></span>
										<span>Cabin <em>7 Kgs (1 piece only)</em></span>
									</p>
								</div>
							</div>
						</div>
						
						
						<div class="booking-lft p-15 cards">
							<div class="brdr-card p-10 mb-2">
								<h3 class="heading shrt">Important Information</h3>
								<p><i class="fal fa-check-circle me-2"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
								<p><i class="fal fa-check-circle me-2"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
								<p><i class="fal fa-check-circle me-2"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
								<p><i class="fal fa-check-circle me-2"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
							</div>
							<div class="bg-clr p-10">
								<h3 class="heading shrt"><i class="fas fa-shield-check me-2 text-success"></i>Refund Policy</h3>
								<p><i class="fal fa-check-circle me-2"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
								<p><i class="fal fa-check-circle me-2"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
								<p><i class="fal fa-check-circle me-2"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
								<p><i class="fal fa-check-circle me-2"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
							</div>
						</div>
						<div class="cards p-10">
							<h3 class="heading shrt">Traveller Details</h3>
							<form action="booking_details" id="booking_details" class="row g-1 trvl-frm">
								@csrf

								<input type="hidden" name="flight_id" id="flight_id" value="{{$flight->id}}">
								<input type="hidden" name="flight_number" id="flight_number" value="{{$flight->flight_number}}">
								<input type="hidden" name="coupon_id" id="coupon_id" value="">
								<input type="hidden" name="discount" id="discount" value="">

								<div class="adultsdata">
									<div class="adultDetailsHeading">
										<div class="adultTitle"><i class="fal fa-user me-2 clr"></i>ADULT (12 yrs+)</div>
										<div class="dangererror errormessage" style="display:none"></div>
										<div class="adultCount"><span id="have_adults">0</span>/<span id="total_adults">{{$request_data['ADT']}}</span> added</div>
									</div>
									<div class="wrning trvl p-10"><h5><strong>Important</strong> :  Enter name as mentioned on your passport or Government approved IDs.</h5></div>
									<div class="cards trvl p-15">
										<a href="javascript:void(0);" class="wrning" id="adults_warning">You have not added any adults to the list</a>
									
										
										
										<div class="adultDetailsForm d-none" id="adultDetailsForm0">
											
											<div class="adultList"> <div style="float-left"><input type="checkbox"  class="is_adult" name="is_adult[]" id="is_adult0" data-id="0"> ADULT 1 </div> <div class="dangererror errorfeildsmessage0" style="display:none"></div></div>
											<div class="row adultrow" id="adultrow0">
												<div class="col-md-6">
												<label for="adult_first_name0">First Name  <span class="required">*</span> </label>
												<input class="form-control" type="text" name="adult_first_name[]" id="adult_first_name0" value="" placeholder="First Name">
												
											</div>
												<div class="col-md-6">
												<label for="adult_last_name0">Last Name <span class="required">*</span> </label>
												<input class="form-control" type="text" name="adult_last_name[]" id="adult_last_name0" value="" placeholder="Last Name">
												</div>

												<div class="col-md-6 mt-2">
												<label for="adult_gender0">Gender <span class="required">*</span> </label>
												<select name="adult_gender[]" id="adult_gender0" class="form-control">
														<option value="">Gender</option>
														<option value="male">Male</option>
														<option value="female">Female</option>
													</select>
												</div>

												<div class="col-md-6 mt-2">
												<label for="adult_country_code0">Country Code <span class="required">*</span> </label>
												<select name="adult_country_code[]" id="adult_country_code0" class="form-control">
														<option value="">Country Code</option>
														<option value="male">India(91)</option>
													</select>
												</div>

												<div class="col-md-6 mt-2">
												<label for="adult_mobile_no0">Mobile No <span class="required">*</span> </label>
												<input class="form-control" type="text" name="adult_mobile_no[]" id="adult_mobile_no0" value="" placeholder="Mobile No(Optional)">
												</div>

												<div class="col-md-6 mt-2">
												<label for="adult_email0">Email <span class="required">*</span> </label>
												<input class="form-control" type="text" name="adult_email[]" id="adult_email0" value="" placeholder="Email(Optional)">
												</div>
											</div>
										</div>
										
										<div class="otherList"><button type="button" class="addTravellerBtn" onclick="AddNewAdult();">+ ADD NEW ADULT</button></div>
									</div>
								</div>


								<div class="childsdata">
									<div class="childDetailsHeading">
										<div class="childTitle"><i class="fal fa-user me-2 clr"></i>CHILD (2-12 Yrs)</div>
										<div class="dangererror errormessage_child" style="display:none"></div>
										<div class="childCount"><span id="have_childs">0</span>/<span id="total_childs">{{$request_data['CHD']}}</span> added</div>
									</div>
									<div class="wrning trvl p-10"><h5><strong>Important</strong> :  Enter name as mentioned on your passport or Government approved IDs.</h5></div>
									<div class="cards trvl p-15">
										<a href="javascript:void(0);" class="wrning" id="childs_warning">You have not added any childs to the list</a>
										
										<div class="childDetailsForm d-none" id="childDetailsForm0">
											<div class="childList"> <input type="checkbox"  class="is_child" name="is_child[]" id="is_child0" data-id="0"> CHILD 1</div>
											<div class="row childrow" id="childrow0">
												<div class="col-md-6">
												<label for="child_first_name0">First Name <span class="required">*</span> </label>
												<input class="form-control" type="text" name="child_first_name[]" id="child_first_name0" value="" placeholder="First Name">
												</div>
												<div class="col-md-6">
												<label for="child_last_name0">Last Name <span class="required">*</span> </label>
												<input class="form-control" type="text" name="child_last_name[]" id="child_last_name0" value="" placeholder="Last Name">
												</div>

												<div class="col-md-6 mt-2">
												<label for="child_gender0">Gender <span class="required">*</span> </label>
												<select name="child_gender[]" id="child_gender0" class="form-control">
														<option value="">Gender</option>
														<option value="male">Male</option>
														<option value="female">Female</option>
													</select>
												</div>
											</div>
										</div>

										<div class="otherList"><button type="button" class="addTravellerBtn" onclick="AddNewChild();">+ ADD NEW CHILD</button></div>
									</div>
								</div>


								<div class="infentsdata">
									<div class="infentDetailsHeading">
										<div class="infentTitle"><i class="fal fa-user me-2 clr"></i>Infent (15 days - 2 Yrs)</div>
										<div class="dangererror errormessage_infent" style="display:none"></div>
										<div class="infentCount"><span id="have_infents">0</span>/<span id="total_infents">{{$request_data['INF']}}</span> added</div>
									</div>
									<div class="wrning trvl p-10"><h5><strong>Important</strong> :  Enter name as mentioned on your passport or Government approved IDs.</h5></div>
									<div class="cards trvl p-15">
										<a href="javascript:void(0);" class="wrning" id="infents_warning">You have not added any infents to the list</a>
										
										<div class="infentDetailsForm d-none" id="infentDetailsForm0">
											<div class="infentList"> <input type="checkbox"  class="is_infent" name="is_infent[]" id="is_infent0" data-id="0"> INFENT 1</div>
											<div class="row infentrow" id="infentrow0">
												<div class="col-md-6">
												<label for="infent_first_name0">First Name <span class="required">*</span>  </label>
												<input class="form-control" type="text" name="infent_first_name[]" id="infent_first_name0" value="" placeholder="First Name">
												</div>
												<div class="col-md-6">
												<label for="infent_last_name0">Last Name <span class="required">*</span>  </label>
												<input class="form-control" type="text" name="infent_last_name[]" id="infent_last_name0" value="" placeholder="Last Name">
												</div>

												<div class="col-md-6 mt-2">
													<label for="infent_gender0">Gender <span class="required">*</span>  </label>
													<select name="infent_gender[]" id="infent_gender0" class="form-control">
														<option value="">Gender</option>
														<option value="male">Male</option>
														<option value="female">Female</option>
													</select>
												</div>

												<div class="col-md-6">
													<label for="infent_dob0">Date Of Birth <span class="required">*</span>  </label>
													<input class="form-control" type="date" name="infent_dob[]" id="infent_dob0" value="" placeholder="Date Of Birth">
												</div>
											</div>
										</div>

										<div class="otherList"><button type="button" class="addTravellerBtn" onclick="AddNewInfent();">+ ADD NEW INFENT</button></div>
									</div>
								</div>
						</div>

						<div class="cards p-10">
							<h3 class="heading shrt">Booking details will be sent to</h3>
								<!--<div class="col-lg-2 col-md-2 col-sm-4 mb-4">-->
								<!--	<label for="" class="form-label">Country Code</label>-->
								<!--	<select name="" id="" class="form-select">-->
								<!--		<option selected="">Select Code</option>-->
								<!--		<option value="">India +91 </option>-->
								<!--		<option value="">India +91 </option>-->
								<!--	</select>-->
								<!--</div>-->
								<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-8 mb-3">
									<label for="" class="form-label m-0">First Name</label>
									<input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter Your Name ">
								</div>
								<div class="col-lg-3 col-md-3 col-sm-8 mb-3">
									<label for="" class="form-label m-0">Last Name</label>
									<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Your Name ">
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 mb-3">
									<label for="" class="form-label m-0">Mobile Number</label>
									<input type="number" name="mobile_no" id="mobile_no"class="form-control" placeholder="Enter Mobile Number">
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 mb-3">
									<label for="" class="form-label m-0">Email Address</label>
									<input type="email" name="email" id="email"class="form-control" placeholder="Enter Email Address">
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 mb-1">
									<div class="form-check">
										<input class="form-check-input" name="is_gst" type="checkbox" value="" id="is_gst">
										<label class="form-check-label" for="is_gst"> I have a GST number (Optional) </label>
									</div>
								</div>
								</div>
								<div class="row d-none" id="gst-detail">
    								<div class="col-lg-4 col-md-4 col-sm-4 mb-3">
    									<label for="" class="form-label m-0">Company Name</label>
    									<input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter Company Name">
    								</div>
    								<div class="col-lg-4 col-md-4 col-sm-4 mb-3">
    									<label for="" class="form-label m-0">Registration No</label>
    									<input type="text" name="gst_reg_no" id="gst_reg_no" class="form-control" placeholder="Enter Registration No">
    								</div>
    								
    								<div class="col-lg-4 col-md-4 col-sm-4 mb-3">
    									<label for="" class="form-label m-0">GST</label>
    									<input type="text" name="gst_number" id="gst_number" class="form-control" placeholder="Enter GST No">
    								</div>
								
    							
    								<div class="col-lg-4 col-md-4 col-sm-6 mb-4">
    									<label for="" class="form-label m-0">Pin Code</label>
    									<input type="number" name="pincode" id="pincode" class="form-control" placeholder="Enter Pin Code">
    								</div>
									
    								<div class="col-lg-4 col-md-4 col-sm-6 mb-3">
    									<label for="" class="form-label m-0">State</label>
    									<select name="state" id="state" class="form-select">
    										<option selected>Select State</option>
    										<option value="">Rajasthan</option>
    									</select>
    								</div>
    								<div class="col-lg-4 col-md-4 col-sm-6 mb-3">
    									<label for="" class="form-label m-0">Address</label>
    									<input type="number" name="address" id="address" class="form-control" placeholder="Enter Address">
    								</div>
								</div>
							
								<div class="col-lg-12 text-end">
									<button type="button" class="thm-shrt-btn rounded" id="continue">Continue</button>
								</div>
							</form>
						</div>

						<div class="cards adultlist p-15">
							<a href="javascript:void(0);">Terms and conditions</a>
						</div>
						
					</div>
					<div class="col-lg-3 col-md-12 col-sm-12">
						<div class="trvl-rgt-bar">
							<div class="cards p-10">
								<h3 class="heading shrt mb-4">Billing Details</h3>
								<ul class="trvl-rgt-lst">
									<li>
										<div class="trvl-rgt-lst-lft">
											<h5>Base Fare</h5>
											@if($request_data['ADT'] > 0)
												<p>Adult(s) ({{$request_data['ADT']}} X ₹ {{$flight->price}})</p>
											@endif

											@if($request_data['CHD'] > 0)
												<p>Chlid(s) ({{$request_data['CHD']}} X ₹ {{$flight->price}})</p>
											@endif

											@if($request_data['INF'] > 0)
												<p>Infent(s) ({{$request_data['INF']}} X ₹ {{$flight->price}})</p>
											@endif
										</div>
										<div class="trvl-rgt-lst-rgt">
											@php
												$adultprice = 0;
												$childprice = 0;
												$infentprice = 0;
												$baseprice = 0;
											
												if($request_data['ADT'] > 0)
												{
													$adultprice = $request_data['ADT'] * $flight->price;
												}

												if($request_data['CHD'] > 0)
												{
													$childprice =  $request_data['CHD'] * $flight->price;
												}

												if($request_data['INF'] > 0)
												{
													$infentprice = $request_data['INF'] * $flight->price;
												}

												$baseprice = $adultprice + $childprice + $infentprice;
												$taxes = 200;
												$totalprice = $baseprice + $taxes;
												$coupon_discount = 0;

											@endphp
											
											<h4>₹ {{$baseprice}}</h4>

											@if($request_data['ADT'] > 0)
												<p>₹ {{$adultprice}}</p>
											@endif

											@if($request_data['CHD'] > 0)
												<p>₹ {{$childprice}}</p>
											@endif

											@if($request_data['INF'] > 0)
												<p>₹ {{$infentprice}}</p>
											@endif


										</div>
									</li>
									
									<li>
										<div class="trvl-rgt-lst-lft">
											<h5>Taxes and Surcharges</h5>
											<p>Airline Taxes and Surcharges</p>
										</div>
										<div class="trvl-rgt-lst-rgt">
											<h4>₹ {{$taxes}}</h4>
										</div>
									</li>
									<li>
										<div class="trvl-rgt-lst-lft">
											<h5>Other Services</h5>
										</div>
										<div class="trvl-rgt-lst-rgt">
											<h4>₹ 00</h4>
										</div>
									</li>
									<li>
										<div class="trvl-rgt-lst-rgt">
											<h4>Discount</h4>
										</div>
										<div class="trvl-rgt-lst-rgt">
											<h4 id="coupon_discount">- ₹ {{$coupon_discount}}</h4>
										</div>
									</li>
									<li>
										<div class="trvl-rgt-lst-rgt">
											<h4>Total Amount</h4>
										</div>
										<div class="trvl-rgt-lst-rgt">
											<h4 id="finalprice">₹ {{$totalprice}}</h4>
											<input type="hidden" name="total" id="total" value="{{$totalprice}}">
											<input type="hidden" name="totalprice" id="totalprice" value="{{$totalprice}}">
										</div>
									</li>
								</ul>
								<!-- <div class="text-center mt-4">
									<a href="javascript:void(0);" class="thm-shrt-btn rounded">Pay Now</a>
								</div> -->
							</div>
							<div class="cards cupon p-10">
								<h3 class="heading shrt mb-4">Coupon Codes</h3>
								<ul>
									@foreach($coupon as $key=>$val)
									<li>
										<div class="round-radio">
											<label class="radio label-check w-100">
												<input type="radio" name="coupon_radio" id="{{$val->id}}" value="{{$val->discount}}" data-type="{{$val->type}}"  class="rdobtn coupon_radio">
												<span class="checkmark"></span>
												<em>{{$val->coupon_code}}</em>
											    <p class="mb-0 ms-5">@if($val->type == 'Price') ₹ {{$val->discount}} @else {{$val->discount}}% @endif</p>
											</label>
										</div>
										<p class="mb-0">{{$val->short_des}}</p>
									</li>
									@endforeach
								</ul>
							</div>
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


		<!-- Modal -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Review Details</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p class="darkText">Please ensure that the spelling of your name and other details match with your travel document/govt. ID, as these cannot be changed later. Errors might lead to cancellation penalties.</p>
						<div class="reviewDtlsOverlayContent customScroll">

							<div class="tvlrDtlsCard">
								<p class="makeFlex appendBottom7 title"><span class="blackText blackFont ">ADULT 1</span></p>
								<p class="makeFlex appendBottom7"><span class="tvlrLftInfo">First &amp; Middle Name</span><span class="blackText boldFont flexOne">dsfdsf</span></p>
								<p class="makeFlex appendBottom7"><span class="tvlrLftInfo">Last Name</span><span class="blackText boldFont flexOne">dfdsfsdf</span></p>
								<p class="makeFlex appendBottom7"><span class="tvlrLftInfo">Gender</span><span class="blackText boldFont flexOne">MALE</span></p>
							</div>

						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">EDIT</button>
						<button type="button" class="btn btn-primary">CONFIRM</button>
					</div>
				</div>
			</div>
		</div>

@endsection

@section('scriptjs')


<script>
    $(document).on('click','#is_gst',function(){
       var box = $(this);

        if (box.prop('checked')) {
            $('#gst-detail').removeClass('d-none');
        } else {
            $('#gst-detail').addClass('d-none');
        } 
    });


	$(document).on('click','.is_child',function(){
       var box = $(this);
		var getid = $(this).data('id');
		// alert(getid);
        if (box.prop('checked')) {
            $('#childrow' + getid).removeClass('d-none');
        } else {
            $('#childrow' + getid).addClass('d-none');
        } 
    });


	$(document).on('click','.is_infent',function(){
       var box = $(this);
		var getid = $(this).data('id');
		// alert(getid);
        if (box.prop('checked')) {
            $('#infentrow' + getid).removeClass('d-none');
        } else {
            $('#infentrow' + getid).addClass('d-none');
        } 
    });

	$(document).on('click','.is_adult',function(){
       var box = $(this);
		var getid = $(this).data('id');
		// alert(getid);
        if (box.prop('checked')) {
            $('#adultrow' + getid).removeClass('d-none');
        } else {
            $('#adultrow' + getid).addClass('d-none');
        } 
    });

</script>

<script>

	var isFirstClick = true;
	var counter = 0;

	function AddNewAdult() {
		var adultsTotalcount = $("#total_adults").text();
		var adultscount = $("#have_adults").text();

		if(adultscount < adultsTotalcount)
		{
			if (isFirstClick) {
				// Remove the class display-none from the adultDetailsForm
				var adultForm = document.querySelector('.adultDetailsForm');
				adultForm.classList.remove('d-none');
				
				// Update the variable to indicate that it's not the first click anymore
				isFirstClick = false;

				$("#have_adults").text(counter + 1);
				counter++;

				$("#adults_warning").addClass('d-none');
				$("#is_adult0").prop("checked", true);

			

			} else {
				$('.adultDetailsForm').append(`
					<div class="adultList"> <div><input type="checkbox" checked  class="is_adult" name="is_adult[]" id="is_adult${counter}" data-id="${counter}"> ADULT ${counter + 1}</div> <div class="dangererror errorfeildsmessage${counter}" style="display:none"></div></div>
					<div class="row adultrow" id="adultrow${counter}">
						<div class="col-md-6">
						<label for="adult_first_name${counter}">First Name <span class="required">*</span> </label>
						<input class="form-control" type="text" name="adult_first_name[]" id="adult_first_name${counter}" value="" placeholder="First Name">
						</div>
						<div class="col-md-6">
						<label for="adult_last_name${counter}">Last Name <span class="required">*</span> </label>
						<input class="form-control" type="text" name="adult_last_name[]" id="adult_last_name${counter}" value="" placeholder="Last Name">
						</div>

						<div class="col-md-6 mt-2">
						<label for="adult_gender${counter}">Gender <span class="required">*</span> </label>
						<select name="adult_gender[]" id="adult_gender${counter}" class="form-control">
								<option value="">Gender</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>

						<div class="col-md-6 mt-2">
						<label for="adult_country_code${counter}">Country Code <span class="required">*</span>  </label>
						<select name="adult_country_code[]" id="adult_country_code${counter}" class="form-control">
								<option value="">Country Code</option>
								<option value="male">India(91)</option>
							</select>
						</div>

						<div class="col-md-6 mt-2">
						<label for="adult_mobile_no${counter}">Mobile No <span class="required">*</span>  </label>
						<input class="form-control" type="text" name="adult_mobile_no[]" id="adult_mobile_no${counter}" value="" placeholder="Mobile No(Optional)">
						</div>

						<div class="col-md-6 mt-2">
						<label for="adult_email${counter}">Email <span class="required">*</span>  </label>
						<input class="form-control" type="text" name="adult_email[]" id="adult_email${counter}" value="" placeholder="Email(Optional)">
						</div>
					</div>
				`);
				$("#have_adults").text(counter + 1);

				counter++;
			}
		}
		else
		{
			var message = 'You have already selected '+ adultscount +' ADULT. Remove before adding a new one.';
			$(".errormessage").css('display','block');
			$(".errormessage").text(message);

			// Redirect to the element with class .errormessage
			$('html, body').animate({
				scrollTop: $(".errormessage").offset().top
			});

			// Hide the error message after 5 seconds
			setTimeout(function() {
				$(".errormessage").fadeOut('slow');
			}, 5000);
		}
	}

	var isFirstChildClick = true;
	var child_counter = 0;

	function AddNewChild() {

		var childsTotalcount = $("#total_childs").text();
		var childscount = $("#have_childs").text();

		if(childscount < childsTotalcount)
		{

			if (isFirstChildClick) {
				// Remove the class display-none from the childDetailsForm
				var childForm = document.querySelector('.childDetailsForm');
				childForm.classList.remove('d-none');
				
				// Update the variable to indicate that it's not the first click anymore
				isFirstChildClick = false;
				$("#have_childs").text(child_counter + 1);
				child_counter++;

				$("#childs_warning").addClass('d-none');
				$("#is_child0").prop("checked", true);

			} else {
				$('.childDetailsForm').append(`
					<div class="childList"> <input type="checkbox" checked  class="is_child" name="is_child[]" id="is_child${child_counter}" data-id="${child_counter}"> CHILD ${child_counter + 1}</div>
					<div class="row childrow" id="childrow${child_counter}">
						<div class="col-md-6">
						<label for="child_first_name${child_counter}">First Name <span class="required">*</span>  </label>
						<input class="form-control" type="text" name="child_first_name[]" id="child_first_name${child_counter}" value="" placeholder="First Name">
						</div>
						<div class="col-md-6">
						<label for="child_last_name${child_counter}">Last Name <span class="required">*</span>  </label>
						<input class="form-control" type="text" name="child_last_name[]" id="child_last_name${child_counter}" value="" placeholder="Last Name">
						</div>

						<div class="col-md-6 mt-2">
						<label for="child_gender${child_counter}">Gender <span class="required">*</span>  </label>
						<select name="child_gender[]" id="child_gender${child_counter}" class="form-control">
								<option value="">Gender</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
					</div>
				`);
				$("#have_childs").text(child_counter + 1);

				child_counter++;
			}
		}
		else
		{
			var message = 'You have already selected '+ childscount +' CHILD. Remove before adding a new one.';
			$(".errormessage_child").css('display','block');
			$(".errormessage_child").text(message);

			// Redirect to the element with class .errormessage_child
			$('html, body').animate({
				scrollTop: $(".errormessage_child").offset().top
			});

			// Hide the error message after 5 seconds
			setTimeout(function() {
				$(".errormessage_child").fadeOut('slow');
			}, 5000);
		}
	}



	var infent_counter = 0;
	var isFirstInfentClick = true;

	function AddNewInfent() {
		var infentsTotalcount = $("#total_infents").text();
		var infentscount = $("#have_infents").text();

		if(infentscount < infentsTotalcount)
		{
			if (isFirstInfentClick) {
				// Remove the class display-none from the infentDetailsForm
				var infentForm = document.querySelector('.infentDetailsForm');
				infentForm.classList.remove('d-none');
				
				// Update the variable to indicate that it's not the first click anymore
				isFirstInfentClick = false;
				$("#have_infents").text(infent_counter + 1);
				infent_counter++;

				$("#infents_warning").addClass('d-none');
				$("#is_infent0").prop("checked", true);


			} else {
				$('.infentDetailsForm').append(`
					<div class="infentList"> <input type="checkbox" checked  class="is_infent" name="is_infent[]" id="is_infent${infent_counter}" data-id="${infent_counter}"> INFENT ${infent_counter + 1}</div>
					<div class="row infentrow" id="infentrow${infent_counter}">
						<div class="col-md-6">
						<label for="infent_first_name${infent_counter}">First Name <span class="required">*</span> </label>
						<input class="form-control" type="text" name="infent_first_name[]" id="infent_first_name${infent_counter}" value="" placeholder="First Name">
						</div>
						<div class="col-md-6">
						<label for="infent_last_name${infent_counter}">Last Name <span class="required">*</span> </label>
						<input class="form-control" type="text" name="infent_last_name[]" id="infent_last_name${infent_counter}" value="" placeholder="Last Name">
						</div>

						<div class="col-md-6 mt-2">
							<label for="infent_gender${infent_counter}">Gender <span class="required">*</span> </label>
							<select name="infent_gender[]" id="infent_gender${infent_counter}" class="form-control">
								<option value="">Gender</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>

						<div class="col-md-6">
							<label for="infent_dob${infent_counter}">Date Of Birth <span class="required">*</span> </label>
							<input class="form-control" type="date" name="infent_dob[]" id="infent_dob${infent_counter}" value="" placeholder="Date Of Birth">
						</div>
					</div>
				`);
				$("#have_infents").text(infent_counter + 1);

				infent_counter++;
			}
		}
		else
		{
			var message = 'You have already selected '+ infentscount +' INFENT. Remove before adding a new one.';
			$(".errormessage_infent").css('display','block');
			$(".errormessage_infent").text(message);

			// Redirect to the element with class .errormessage_infent
			$('html, body').animate({
				scrollTop: $(".errormessage_infent").offset().top
			});

			// Hide the error message after 5 seconds
			setTimeout(function() {
				$(".errormessage_infent").fadeOut('slow');
			}, 5000);
		}
	}

</script>


<script>
	// Function to handle form submission
		// document.getElementById("booking_details").addEventListener("submit", function(event) {

		document.getElementById("continue").addEventListener("click", function() {

			// Check if all adults are added
			var totalAdults = parseInt($("#total_adults").text());
			var addedAdults = document.querySelectorAll('.is_adult:checked').length;
			
			// alert(addedAdults);
			// alert(totalAdults);

			if (addedAdults !== totalAdults) {
				
				// Set error message for adults
				$(".errormessage").text("Kindly add all adult travelers before proceeding.");

				$(".errormessage").css('display','block');
				// Scroll to the error message
				$('html, body').animate({
					scrollTop: $(".errormessage").offset().top
				}, 'slow');

				setTimeout(function() {
					$(".errormessage").fadeOut('slow');
				}, 5000);

				
				return; // Exit the function
			}

			
			// Check if all children are added
			var totalChildren = parseInt($("#total_childs").text());
			var addedChildren = document.querySelectorAll('.is_child:checked').length;
	
			if (addedChildren !== totalChildren) {
				// Set error message for children
				$(".errormessage_child").text("Kindly add all child travelers before proceeding.");
				$(".errormessage_child").css('display','block');
				// Scroll to the error message
				$('html, body').animate({
					scrollTop: $(".errormessage_child").offset().top
				}, 'slow');

				setTimeout(function() {
					$(".errormessage_child").fadeOut('slow');
				}, 5000);

				return; // Exit the function
			}


			// Check if all infents are added
			var totalInfents = parseInt($("#total_infents").text());
			var addedInfents = document.querySelectorAll('.is_infent:checked').length;
			
			if (addedInfents !== totalInfents) {
				// Set error message for infents
				$(".errormessage_infent").text("Kindly add all infent travelers before proceeding.");
				$(".errormessage_infent").css('display','block');
				// Scroll to the error message
				$('html, body').animate({
					scrollTop: $(".errormessage_infent").offset().top
				}, 'slow');
				setTimeout(function() {
					$(".errormessage_infent").fadeOut('slow');
				}, 5000);
				return; // Exit the function
			}

			var isValid = true;

			var isValidAdult = validateTravelers('#booking_details', 'adult');
			var isValidChild = validateTravelers('#booking_details', 'child');
			var isValidInfent = validateTravelers('#booking_details', 'infent');
			var validateAdditional = validateAdditionalFields('#booking_details');
			// alert(validateAdditional);

			
			if (isValidAdult && isValidChild && isValidInfent && validateAdditional) {
				// If all validations pass, open the Bootstrap modal
				
				let myform = document.getElementById("booking_details");
    			let fd = new FormData(myform );

				console.log(fd);
				var modalBody = document.querySelector('#staticBackdrop .modal-body');
				// Assuming you're using jQuery for Ajax
					$.ajax({

						url: "{{ route('preview_travel') }}",
						data: fd,
						cache: false,
						processData: false,
						contentType: false,
						type: 'POST',
						success: function(response) {

							$('#staticBackdrop').modal('show');

							modalBody.innerHTML = response;
						},
						error: function(xhr, status, error) {
							console.error(error);
						}
					});
				
			}
			
		});


		// function validateTravelers(form, travelerType) {
		// 	$(form).find('.' + travelerType + 'DetailsForm').each(function(index) {
		// 		// Check if the corresponding checkbox is checked
		// 		let isChecked = $(this).find('.is_' + travelerType).prop('checked');

		// 		// Iterate over each traveler row only if the checkbox is checked
		// 		if (isChecked) {
		// 			$(this).find('.' + travelerType + 'row').each(function(inner_index) {
		// 				let $row = $(this);
		// 				// Remove existing error messages and danger spans
		// 				$row.find('.error-message').remove();
		// 				$row.find('.danger').remove();
		// 				$row.find('span.required').remove();

		// 				let errorMsg = ''; // Reset errorMsg for each traveler row

		// 				// Array to store field names for the traveler type
		// 				let fieldNames = ['first_name', 'last_name'];
		// 				if (travelerType === 'adult') {
		// 					fieldNames.push('gender', 'country_code', 'mobile_no', 'email');
		// 				} else if (travelerType === 'infent') {
		// 					fieldNames.push('dob');
		// 				}

		// 				// Iterate over each field name to validate
		// 				fieldNames.forEach(function(fieldName) {
		// 					let $field = $('#' + travelerType + '_' + fieldName + inner_index);
		// 					let fieldValue = $field.val();

		// 					// Check if the field is required and if the value is empty
		// 					if ((!fieldValue || fieldValue.trim() === '') && (fieldName !== 'country_code' && fieldName !== 'mobile_no' && fieldName !== 'email')) {
		// 						errorMsg = '<span class="required"> Please fill in the ' + fieldName.replace('_', ' ') + ' for ' + travelerType.charAt(0).toUpperCase() + travelerType.slice(1) + ' ' + (inner_index + 1) + '</span>';
		// 						$field.addClass('error-input').after(errorMsg);
		// 					} else {
		// 						$field.removeClass('error-input'); // Remove error class if no error
		// 					}
		// 				});

		// 				// Additional validation for adults (country_code, mobile_no, email)
		// 				if (travelerType === 'adult') {
		// 					let $country_codefield = $('#' + travelerType + '_country_code' + inner_index);
		// 					let country_codeValue = $country_codefield.val();

		// 					if (!country_codeValue || country_codeValue.trim() === '') {
		// 						errorMsg = '<span class="required"> Please fill in the Country Code for ' + travelerType.charAt(0).toUpperCase() + travelerType.slice(1) + ' ' + (inner_index + 1) + '</span>';
		// 						$country_codefield.addClass('error-input').after(errorMsg);
		// 					} else {
		// 						$country_codefield.removeClass('error-input'); // Remove error class if no error
		// 					}

		// 					let $mobile_nofield = $('#' + travelerType + '_mobile_no' + inner_index);
		// 					let mobile_noValue = $mobile_nofield.val();

		// 					if (!mobile_noValue || mobile_noValue.trim() === '') {
		// 						errorMsg = '<span class="required"> Please fill in the Mobile Number for ' + travelerType.charAt(0).toUpperCase() + travelerType.slice(1) + ' ' + (inner_index + 1) + '</span>';
		// 						$mobile_nofield.addClass('error-input').after(errorMsg);
		// 					} else if (isNaN(mobile_noValue.trim())) {
		// 						errorMsg = '<span class="required"> Mobile Number should be a number for ' + travelerType.charAt(0).toUpperCase() + travelerType.slice(1) + ' ' + (inner_index + 1) + '</span>';
		// 						$mobile_nofield.addClass('error-input').after(errorMsg);
		// 					} else {
		// 						$mobile_nofield.removeClass('error-input'); // Remove error class if no error
		// 					}

		// 					let $emailfield = $('#' + travelerType + '_email' + inner_index);
		// 					let emailValue = $emailfield.val();
		// 					if (!emailValue || emailValue.trim() === '') {
		// 						errorMsg = '<span class="required"> Please fill in the Email for ' + travelerType.charAt(0).toUpperCase() + travelerType.slice(1) + ' ' + (inner_index + 1) + '</span>';
		// 						$emailfield.addClass('error-input').after(errorMsg);
		// 					} else if (!isValidEmail(emailValue.trim())) {
		// 						errorMsg = '<span class="required"> Invalid Email format for ' + travelerType.charAt(0).toUpperCase() + travelerType.slice(1) + ' ' + (inner_index + 1) + '</span>';
		// 						$emailfield.addClass('error-input').after(errorMsg);
		// 					} else {
		// 						$emailfield.removeClass('error-input'); // Remove error class if no error
		// 					}
		// 				}

		// 				// Display error message if any field is empty or invalid
		// 				if (errorMsg !== '') {
		// 					isValid = false;
		// 					// Append new error message after the input field
		// 					$row.append('<div class="error-message">' + errorMsg + '</div>');
		// 				}
		// 			});
		// 		}
		// 	});
		// }


		function validateTravelers(form, travelerType) {

			let isValid = true;

			$(form).find('.' + travelerType + 'DetailsForm').each(function(index) {
				let isChecked = $(this).find('.is_' + travelerType).prop('checked');

				if (isChecked) {
					$(this).find('.' + travelerType + 'row').each(function(inner_index) {
						let $row = $(this);
						$row.find('.error-message').remove();
						$row.find('.danger').remove();
						$row.find('span.required').remove();

						let fieldNames = ['first_name', 'last_name', 'gender'];
						if (travelerType === 'adult') {
							fieldNames.push('country_code', 'mobile_no', 'email');
						} else if (travelerType === 'infent') {
							fieldNames.push('dob');
						}

						fieldNames.forEach(function(fieldName) {
							// validateField(travelerType, fieldName, inner_index);

							if (!validateField(travelerType, fieldName, inner_index)) {
								// If any field validation fails, set isValid to false
								isValid = false;
							}
							
						});
					});
				}
			});
			return isValid;
		}

		function validateField(travelerType, fieldName, inner_index) {
			let $field = $('#' + travelerType + '_' + fieldName + inner_index);
			let fieldValue = $field.val();
			let errorMsg = '';

			if ((!fieldValue || fieldValue.trim() === '') && (fieldName !== 'country_code' && fieldName !== 'mobile_no' && fieldName !== 'email')) {
				errorMsg = '<span class="required"> Please fill in the ' + fieldName.replace('_', ' ') + ' for ' + travelerType.charAt(0).toUpperCase() + travelerType.slice(1) + ' ' + (inner_index + 1) + '</span>';
			} else if (fieldName === 'country_code' || fieldName === 'mobile_no' || fieldName === 'email') {
				if (!fieldValue || fieldValue.trim() === '') {
					errorMsg = '<span class="required"> Please fill in the ' + fieldName.replace('_', ' ') + ' for ' + travelerType.charAt(0).toUpperCase() + travelerType.slice(1) + ' ' + (inner_index + 1) + '</span>';
				} else if (fieldName === 'mobile_no' && isNaN(fieldValue.trim()) && !isValidMobileNumber(fieldValue.trim()) ) {
					errorMsg = '<span class="required"> Mobile Number should be a number for ' + travelerType.charAt(0).toUpperCase() + travelerType.slice(1) + ' ' + (inner_index + 1) + '</span>';
				} else if (fieldName === 'email' && !isValidEmail(fieldValue.trim())) {
					errorMsg = '<span class="required"> Invalid Email format for ' + travelerType.charAt(0).toUpperCase() + travelerType.slice(1) + ' ' + (inner_index + 1) + '</span>';
				}
			}

			if (errorMsg !== '') {
				$field.addClass('error-input').after(errorMsg);
				return false;
			} else {
				$field.removeClass('error-input');
				return true;
			}
		}
		

		// Function to validate email format
		function isValidEmail(email) {
			// Regular expression for email validation
			let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
			return emailRegex.test(email);
		}	

		function isValidMobileNumber(mobileNumber) {
			// Regular expression for a basic mobile number validation
			// This example assumes a simple format of 10 digits
			let mobileNumberPattern = /^\d{10}$/;
			
			return mobileNumberPattern.test(mobileNumber);
		}



		function validateAdditionalFields(form) {
			let isValid = true; // Initialize validation flag

			// Remove any existing error messages
			$(form).find('.error-message').remove();

			// Example validation logic for email field
			let emailField = $(form).find('#email');
			
			if (emailField.length > 0) {
				
				let emailValue = emailField.val().trim();
				if (emailValue === '' || !isValidEmail(emailValue)) {
					let errorMsg = '<span class="error-message">Invalid email format</span>';
					emailField.after(errorMsg);
					isValid = false;
				}
			}

			// Example validation logic for mobile number field
			let mobileField = $(form).find('#mobile_no');
			if (mobileField.length > 0) {
				let mobileNoValue = mobileField.val().trim();
				if (mobileNoValue === '' || !isValidMobileNumber(mobileNoValue)) {
					let errorMsg = '<span class="error-message">Invalid mobile number format</span>';
					mobileField.after(errorMsg);
					isValid = false;
				}
			}

			// Example validation logic for last name field
			let lastNameField = $(form).find('#last_name');
			if (lastNameField.length > 0) {
				let lastNameValue = lastNameField.val().trim();
				if (lastNameValue === '') {
					let errorMsg = '<span class="error-message">Last name is required</span>';
					lastNameField.after(errorMsg);
					isValid = false;
				}
			}

			return isValid; // Return validation result
		}


</script>



<script>
	/////////////////// Coupon Related /////

    $(document).on('click','.coupon_radio',function(){

		var selectedid = document.querySelector('input[name="coupon_radio"]:checked').id;
		var couponprice = document.querySelector('input[name="coupon_radio"]:checked').value;
		var coupontype =  $('input[type=radio][name=coupon_radio]:checked').attr('data-type');
		var discount  = 0;
		var after_discount  = 0;
		
		
		var originalPrice = parseFloat($("#total").val());;

		if(coupontype == 'Price')
		{
			discount = couponprice;
			after_discount = originalPrice - discount;
		}
		else if(coupontype == 'Percentage')
		{
			// Get original price and discount percentage from input fields
			
			var discountPercentage = couponprice;

			// Convert percentage to decimal
			var decimalPercentage = discountPercentage / 100;

			// Calculate discount amount
			discount = originalPrice * decimalPercentage;

			// Calculate discounted price
			var discountedPrice = originalPrice - discount;
			
			after_discount = originalPrice - discount;

		}
		
		$("#coupon_id").val(selectedid);
		$("#coupon_discount").text("- ₹ "+ discount);
		$("#discount").val(discount);
		$("#totalprice").val(after_discount);
		$("#finalprice").text("₹ "+after_discount);
		
		// alert(document.querySelector('input[name="coupon_radio"]:checked').value);
	});

</script>

@stop
  