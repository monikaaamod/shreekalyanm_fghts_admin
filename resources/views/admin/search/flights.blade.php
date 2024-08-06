@extends('admin.layouts.app')
@section('title')
{{$page_name}}
@stop
@section('stylecss')

<style>
	/* * {
		box-sizing: border-box;
	}	 */

		/* body {
			background-color: lightblue;
		} */


		.ticket3 {
			position: relative;
			display: flex;
			flex-direction: row;
			width: 100%;
			margin-bottom:30px;
			/* margin: 100px; */
			/* filter: drop-shadow(2px 5px 5px rgba(0, 0, 0, 0.15)); */
		}
		.ticket3__details {
			flex: 3;
			background-color: #fff;
			min-height: 150px;
			padding: 1rem;
			border-radius: 5px 0 0 5px;
		}

		.ticket3__title {
			margin-top: 0;
		}
		
		ul {
			margin: 0;
			padding: 0;
			list-style: none;
		}

		li {
			margin: 0.7rem 0;
		}
			
		.ticket3__rip {
			position: relative;
			height: 160px;
			flex-shrink: 0;
			background-color: #fff;
			border: 2px dotted #b4b7bd;
		}
		.ticket3__rip::before,
		.ticket3__rip::after {
			left: 50%;
			transform: translateX(-50%) rotate(135deg);
			position: absolute;
			content: "";
			width: 35px;
			height: 35px;
			border: 5px solid transparent;
			border-top-color: #fff;
			border-right-color: #fff;
			border-radius: 50%;
			background-color: #f4f5f7;
		}

		.ticket3__rip::before {
			top: -19px;
			/* border-top-color: #E91E63;
			border-right-color: #fff; */
		}

		.ticket3__rip::after {
			/* border-right-color: #E91E63;
			border-top-color: #fff; */
			bottom: -31px;
			transform: translateX(-50%) rotate(-45deg);
		}
		

		.ticket3__price {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			flex: 1;
			background-color: #fff;
			min-height: 150px;
			padding: 1rem;
			border-radius: 0 5px 5px 0;
			color: #000;
		}
		.heading {
			font-size: 13px;
			color: #b4b7bd;
			margin-left: -5px;
		}
		
		.price {
			font-size: 19px;
			font-weight: bold;
			margin-left: -5px;
		}

		.flight_time{
			font-weight:600;
		}

		.city{
			color: #b4b7bd;
    		font-size: 15px;
		}

		.departure_flight{
			color:#b4b7bd;
			font-size:22px;
			margin-left:5px;
		}

		.discount{
			color: #09e709;
    		font-size: 14px;
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

	.form-group label {
        font-weight:600;
        font-size:15px;
    }

    .form-control{
        height:40px;
    }

    .input-group-append .input-group-text, .input-group-prepend .input-group-text {
        height:44px;
        width:36px;
    }

	.search_bar {
		background-color: #f7f7f7;
		/* margin-bottom: 30px; */
		/* padding: 15px; */
		/* border-radius: 12px; */
		filter: drop-shadow(2px 5px 5px rgba(0, 0, 0, 0.15));
	}
	.filter_bar {
		background-color: #fff;
		padding: 15px;
		filter: drop-shadow(2px 5px 5px rgba(0, 0, 0, 0.15));
	}

	.btn.btn-lg{
		padding: 0.5rem 1.4rem;
		margin-top: 19px;
	}

	.mdi-filter{
		font-size:23px;
	}

	.stop {
		border: 1px solid #d9d6d6;
		padding: 2px 5px 2px 7px;
		margin-right: 6px;
		background-color: #fff;
		cursor: pointer;
	}

	.stop:hover {
		filter: drop-shadow(2px 5px 5px rgba(0, 0, 0, 0.15));
	}

	

</style>
@stop
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
		<div class="row">
			<div class="col-md-12 search_bar">
				<div class="row">
					<div class="col-12 col-sm-2 mt-2">
						<div class="form-group local-forms">
							<label for="from">From <span class="login-danger">*</span></label>
							<div class="input-group">
								<!-- <div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-plane-departure"></i></span>
								</div> -->
								<select name="from" id="from" class="form-control multi">
									<option value="">Departure City</option>
									@foreach($airports as $key=>$val)
										<option value="{{$val->id}}">{{$val->name}} ({{$val->code}})</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-2 mt-2">
						<div class="form-group local-forms">
							<label for="from">To <span class="login-danger">*</span></label>
							<div class="input-group">
								<!-- <div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa-sharp fa-solid fa-plane-arrival"></i></span>
								</div> -->
								<select name="to" id="to" class="form-control multi">
									<option value="">Destination City</option>
									@foreach($airports as $key=>$val)
										<option value="{{$val->id}}">{{$val->name}} ({{$val->code}})</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-2 mt-2">
						<div class="form-group local-forms">
							<label for="trip_date">Departure Date *</label>
							<div class="input-group datepicker-autoclose date datepicker navbar-date-picker">
								<span class="input-group-addon input-group-prepend border-right">
									<span class="icon-calendar input-group-text calendar-icon"></span>
								</span>
								<input type="text" class="form-control" name="departure_date" id="departure_date">
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-2 mt-2">
						<div class="form-group local-forms">
							<label for="trip_date">Return Date *</label>
							<div class="input-group datepicker-autoclose date datepicker navbar-date-picker">
								<span class="input-group-addon input-group-prepend border-right">
									<span class="icon-calendar input-group-text calendar-icon"></span>
								</span>
								<input type="text" class="form-control" name="return_date" id="return_date">
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-2 mt-2">
						<div class="form-group local-forms">
							<label for="trip_date">Travellers *</label>
							<div class="trav_engine">
								<input type="text" id="txtTotalTravelers" class="txt_Traveler form-control" name="travelers" @if(isset($post)) value="{{$post->infants + $post->adults + $post->childs}} Traveler(s)" @else value="1 @endif Traveler(s)" readonly="readonly" />
								<div class="trav_toggle open">
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
										<span class="trav_done">Done</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-2 mt-4">
						<button class="btn btn-danger btn-lg">Search Again</button>
					</div>
				</div>
			</div>
			<div class="col-md-12 filter_bar" style="margin-bottom:30px;">
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-1">
							<div class="row">
								<div class="col-12"><i class="menu-icon mdi ms-2 mdi-filter"></i></div>
								<div class="col-12"> Filters</div>
							</div>
						</div>
						<div class="col-12 col-sm-2 mt-4">
							<span>Stops: </span>
							<span class="stop">0 </span>
							<span class="stop">1 </span>
							<span class="stop">2 </span>
						</div>

						<div class="col-12 col-sm-3 mt-3">
							<div class="form-group">
								<select name="airline" id="airline" class="form-control multi">
									<option value="">Airline</option>
									@foreach($airline as $key=>$val)
										<option value="{{$val->id}}">{{$val->title}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-12 col-sm-2 mt-3">
							<div class="form-group">
								<select name="aircraft" id="aircraft" class="form-control multi">
									<option value="">Aircraft</option>
									@foreach($aircraft as $key=>$val)
										<option value="{{$val->id}}">{{$val->title}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-12 col-sm-2 mt-3">
							<div class="form-group">
								<select name="class" id="class" class="form-control multi">
									<option value="">Class</option>
									@foreach($class as $key=>$val)
										<option value="{{$val->id}}">{{$val->title}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-12 col-sm-2 ps-4">
							<button class="btn btn-danger btn-lg">Apply Filters</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="ticket3">
					<div class="ticket3__details">
						<h4 class="ticket3__title">Indigo Flights <i class="menu-icon icon mdi mdi-airplane text-danger me-2"></i></h4>
						<ul>
							<li style="float:left;" class="mt-2">
								<h2 class="flight_time mb-0">22:10</h2>
								<span class="city">Chennai</span>
							</li>
							<li class="departure_flight" style="float:left;"><i class="fa-solid fa-plane-departure ms-5 mt-3"></i></li>
							<li class="ms-5 me-2 d-flex">
								<div class="mt-2 ms-5">
									<h2 class="flight_time mb-0">06:10</h2>
									<span class="city">Delhi</span>
								</div>
							</li>
							
							<li class="city">6h 55m | 1 stop (GAU)</li>
						</ul>
					</div>
					<div class="ticket3__rip"></div>
					<div class="ticket3__price">
						<span class="heading"><del>8,999 rs</del></span>
						<span class="price">6,647 rs</span>
						<span class="discount">15% off</span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="ticket3">
					<div class="ticket3__details">
						<h4 class="ticket3__title">Indigo Flights <i class="menu-icon icon mdi mdi-airplane text-danger me-2"></i></h4>
						<ul>
							<li style="float:left;" class="mt-2">
								<h2 class="flight_time mb-0">22:10</h2>
								<span class="city">Chennai</span>
							</li>
							<li class="departure_flight" style="float:left;"><i class="fa-solid fa-plane-departure ms-5 mt-3"></i></li>
							<li class="ms-5 me-2 d-flex">
								<div class="mt-2 ms-5">
									<h2 class="flight_time mb-0">06:10</h2>
									<span class="city">Delhi</span>
								</div>
							</li>
							
							<li class="city">6h 55m | 1 stop (GAU)</li>
						</ul>
					</div>
					<div class="ticket3__rip"></div>
					<div class="ticket3__price">
						<span class="heading"><del>8,999 rs</del></span>
						<span class="price">6,647 rs</span>
						<span class="discount">15% off</span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="ticket3">
					<div class="ticket3__details">
						<h4 class="ticket3__title">Indigo Flights <i class="menu-icon icon mdi mdi-airplane text-danger me-2"></i></h4>
						<ul>
							<li style="float:left;" class="mt-2">
								<h2 class="flight_time mb-0">22:10</h2>
								<span class="city">Chennai</span>
							</li>
							<li class="departure_flight" style="float:left;"><i class="fa-solid fa-plane-departure ms-5 mt-3"></i></li>
							<li class="ms-5 me-2 d-flex">
								<div class="mt-2 ms-5">
									<h2 class="flight_time mb-0">06:10</h2>
									<span class="city">Delhi</span>
								</div>
							</li>
							
							<li class="city">6h 55m | 1 stop (GAU)</li>
						</ul>
					</div>
					<div class="ticket3__rip"></div>
					<div class="ticket3__price">
						<span class="heading"><del>8,999 rs</del></span>
						<span class="price">6,647 rs</span>
						<span class="discount">15% off</span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="ticket3">
					<div class="ticket3__details">
						<h4 class="ticket3__title">Indigo Flights <i class="menu-icon icon mdi mdi-airplane text-danger me-2"></i></h4>
						<ul>
							<li style="float:left;" class="mt-2">
								<h2 class="flight_time mb-0">22:10</h2>
								<span class="city">Chennai</span>
							</li>
							<li class="departure_flight" style="float:left;"><i class="fa-solid fa-plane-departure ms-5 mt-3"></i></li>
							<li class="ms-5 me-2 d-flex">
								<div class="mt-2 ms-5">
									<h2 class="flight_time mb-0">06:10</h2>
									<span class="city">Delhi</span>
								</div>
							</li>
							
							<li class="city">6h 55m | 1 stop (GAU)</li>
						</ul>
					</div>
					<div class="ticket3__rip"></div>
					<div class="ticket3__price">
						<span class="heading"><del>8,999 rs</del></span>
						<span class="price">6,647 rs</span>
						<span class="discount">15% off</span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="ticket3">
					<div class="ticket3__details">
						<h4 class="ticket3__title">Indigo Flights <i class="menu-icon icon mdi mdi-airplane text-danger me-2"></i></h4>
						<ul>
							<li style="float:left;" class="mt-2">
								<h2 class="flight_time mb-0">22:10</h2>
								<span class="city">Chennai</span>
							</li>
							<li class="departure_flight" style="float:left;"><i class="fa-solid fa-plane-departure ms-5 mt-3"></i></li>
							<li class="ms-5 me-2 d-flex">
								<div class="mt-2 ms-5">
									<h2 class="flight_time mb-0">06:10</h2>
									<span class="city">Delhi</span>
								</div>
							</li>
							
							<li class="city">6h 55m | 1 stop (GAU)</li>
						</ul>
					</div>
					<div class="ticket3__rip"></div>
					<div class="ticket3__price">
						<span class="heading"><del>8,999 rs</del></span>
						<span class="price">6,647 rs</span>
						<span class="discount">15% off</span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="ticket3">
					<div class="ticket3__details">
						<h4 class="ticket3__title">Indigo Flights <i class="menu-icon icon mdi mdi-airplane text-danger me-2"></i></h4>
						<ul>
							<li style="float:left;" class="mt-2">
								<h2 class="flight_time mb-0">22:10</h2>
								<span class="city">Chennai</span>
							</li>
							<li class="departure_flight" style="float:left;"><i class="fa-solid fa-plane-departure ms-5 mt-3"></i></li>
							<li class="ms-5 me-2 d-flex">
								<div class="mt-2 ms-5">
									<h2 class="flight_time mb-0">06:10</h2>
									<span class="city">Delhi</span>
								</div>
							</li>
							
							<li class="city">6h 55m | 1 stop (GAU)</li>
						</ul>
					</div>
					<div class="ticket3__rip"></div>
					<div class="ticket3__price">
						<span class="heading"><del>8,999 rs</del></span>
						<span class="price">6,647 rs</span>
						<span class="discount">15% off</span>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
    @endsection

    @section('scriptjs')
    <script src="{{asset('admin/js/formpickers.js')}}"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->

    <!-- <script src="{{asset('admin/js/formpickers.js')}}"></script> -->
    <script type="text/javascript">
              formHandler.initializeSimpleForm('submitForm', "{{ route('admin.fare_type') }}");


              var counter = 1;
                function addCity()
                {
                    $("#addCity").append(`
                        <div class="row" id="appendCity-${counter}">
                            <div class="col-6 col-sm-6 mt-2">
                                <div class="form-group local-forms mb-0">
                                    <label for="from">From *</label>
                                    <input type="text" class="form-control" id="from" name="from" type="text" aria-describedby="" placeholder="Eg. Jaipur">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 mt-2">
                                <div class="form-group local-forms mb-0">
                                    <label for="to">To * <span class="text-danger" style="margin-left: 88px;" onclick="removeCity(${counter})"><span class="closeCity"><i class="fa-solid fa-xmark"></i></span></span></label>
                                    <input type="text" class="form-control" id="to" name="to" type="text" aria-describedby="" placeholder="Eg. Delhi">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 mt-2">
                                <div class="form-group local-forms mb-0">
                                    <label for="trip_date">Departure Date *</label>
                                    <div class="input-group datepicker-autoclose date datepicker navbar-date-picker">
                                        <span class="input-group-addon input-group-prepend border-right">
                                            <span class="icon-calendar input-group-text calendar-icon"></span>
                                        </span>
                                        <input type="text" class="form-control" style="height:2rem;" name="departure_date" id="departure_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                    counter++;
                }

                function removeCity(id)
                {
                    $("#appendCity-"+id).remove();
                }

    </script>
@stop
