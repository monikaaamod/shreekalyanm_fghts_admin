@extends('front.layouts.flights_header')
@section('title') Search Flights @endsection
@section('inlinecss')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    /* travller */

    /* .trav_engine {
        position: relative;
        width: 95%;
    } */

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
	
    .dealInfoBox {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 7px;
    }
    
    .dealCodetxt {
        background-color: #ed9323;
        font-size: 12px;
        color: #fff;
        line-height: 20px;
        padding: 8px 15px;
    }
    
    .dealCode {
        background: #fff;
        padding: 6px 15px;
        font-size: 14px;
        line-height: 22px;
        color: #000;
        font-weight: 600;
        border: 1px dashed #10355f;
    }
    
    .text {
       overflow: hidden;
       display: -webkit-box;
       -webkit-line-clamp: 2; /* number of lines to show */
               line-clamp: 2; 
       -webkit-box-orient: vertical;
    }
    
    .tc-box{
        font-size: 14px;
    }
    
    a {
        text-decoration: none !important;
        color: #000;
    }
    
#offr-slider1, #offr-slider2 {
    width: 100%;
}

#offr-slider1 .owl-item, #offr-slider2 .owl-item {
    width: 420px !important; /* Adjust the width of each item */
    margin-right: 10px; /* Adjust the margin between items */
    box-sizing: border-box;
}

#offr-slider1 .owl-item, #offr-slider2 .owl-item {
    box-sizing: border-box !important;
}


</style>

<style>
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
    <div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="offr-sec">
						<ul class="nav">
							<li class="offr-tb-item">
								<h5 class="contnt-head">Offers For You</h5>
							</li>
							<li class="offr-tb-item">
								<button class="offr-tb-btn active" data-bs-toggle="tab" data-bs-target="#offr-tb-01" type="button">Flight</button>
							</li>
							<!--<li class="offr-tb-item">-->
							<!--	<button class="offr-tb-btn" data-bs-toggle="tab" data-bs-target="#offr-tb-02" type="button">hotels</button>-->
							<!--</li>-->
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="offr-tb-01">
								<div class="owl-carousel owl-theme" id="offr-slider2">
									@php $offersChunks = $offers->chunk(2); @endphp
									
                                    @foreach($offersChunks as $offerSet)
                                        <div class="@if($loop->last) d-none @endif item">
                                            @foreach($offerSet as $offer)
                                                <div class="card m-2" style="height: 190px;">
                                                  <div class="row g-0">
                                                    <div class="col-md-4 pt-2 ps-1">
                                                      <a href="{{route('offer_detail',base64_encode($offer->id))}}"><img src="{{asset($offer->image)}}" class="rounded" style="height:130px" /></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <a href="{{route('offer_detail',base64_encode($offer->id))}}"><div class="card-body">
                                                        <h5 class="card-title text">{{$offer->name}}</h5>
                                                        <p class="card-text text">{{$offer->short_des}}</p>
                                                      </div></a>
                                                    </div>
                                                    <div class="col-md-4 ps-2 pt-3">
                                                        <span class="tc-box">T&C Apply</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="dealInfoBox">
                                                           <span class="dealCodetxt">Use Code: </span>
                                                           <span class="dealCode">{{$offer->coupon_code}}</span>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<section class="trpbook space">
			<div class="container">
				<div class="owl-carousel owl-theme" id="trpbook-slide">
					<div class="item trpbook-innr">
						<a href="javascript:void(0);">
							<img src="{{ asset('front/assets/images/trip-slide-01.png')}}" alt="">
						</a>
					</div>
					<div class="item trpbook-innr">
						<a href="javascript:void(0);">
							<img src="{{ asset('front/assets/images/trip-slide-01.png')}}" alt="">
						</a>
					</div>
				</div>
			</div>
		</section>

  @endsection

  @section('scriptjs')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script src="{{asset('front/assets/js/travellers.js')}}"></script>
 
  <script src="https://unpkg.com/fuse.js@2.5.0/src/fuse.min.js"></script>


	@include('front.flights.forms.scripts')
    <script>
    
    function SetActiveBox(box)
	{
	    $('.radio').removeClass('fare-check');
	    $(box).addClass('fare-check');
	}


	// get country code

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
						<input type="hidden" name="destination_country" id="destination_countryM${counter}">
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
		
		
		
		
	</script>



  @stop
  