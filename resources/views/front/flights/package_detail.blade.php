@extends('front.layouts.packages_header')
@section('title') Packages @endsection

@section('inlinecss')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
  .carousel-control-prev {
    left: -45px;
  }

  .carousel-control-next{
    left: inherit;
    right:-37px;
  }

  .besend li {
    display: inline-block;
    width: 15%;
    font-size: 15px;
  }

  .savinimagscrow li {
    width: 15%;
  }

  .flhoactr li {
    display: inline-block;
    background-color: #fff;
    text-align: center;
    margin-top: 20px;
    margin-right: 5px;
    font-size: 16px;
    padding: 0px;
    width: 22%;
}

.carousel-indicators {
    position: absolute;
    right: -112px;
    bottom: -8px;
    left: -105px;
    z-index: 2;
    display: flex;
    justify-content: center;
    padding: 0;
    margin-right: 15%;
    margin-bottom: 1rem;
    margin-left: 15%;
    list-style: none;
}

p {
    font-family: "Lato Bold" !important;
}



.card {
  max-width: 441px;
  flex-direction: row;
  background-color: #fcfcfd;
  border: 0;
  box-shadow: 0 7px 7px rgba(0, 0, 0, 0.18);
  margin: 3em auto;
}

.card.card.bg-light-subtle .card-title {
    color: black;
    font-size: 15px;
    font-weight: 600 !important;
}

.card img {
  max-width: 25%;
  margin: auto;
  padding: 0.5em;
  border-radius: 0.7em;
  height:90px;
}
.card-body {
  display: flex;
  justify-content: space-between;
}
.text-section {
  max-width: 100%;
}

.cta-section {
  max-width: 40%;
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  justify-content: space-between;
}

.cta-section .btn {
  padding: 0.3em 0.5em;
  /* color: #696969; */
}

.card.bg-light-subtle .cta-section .btn {
  background-color: #898989;
  border-color: #898989;
}

@media screen and (max-width: 475px) {
  .card {
    font-size: 0.9em;
  }
}

.card-text {
  max-height: 100px; /* Adjust the height as needed */
  overflow: hidden;
  overflow-y: auto;
  font-size: 13px;
    height: 70px;
}

.flickity-button {
  display:none !important;
}

.container-fluid{
  padding:0 45px 0 45px;
}

.properly li {
  margin: 5px 0;
  font-size: 14px;
  line-height: 1;
  font-family: "Lato Bold";
  margin-left: 14px;
}

.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
  color: #ee902c !important;
    border-bottom: 2px solid !important;
    border-color: #666;
    border:none;
}

.star {
  display: inline-block;
  width: 30px;
  height: 30px;
  background-image: url('{{asset("front/images/empty_star.png")}}'); /* Use your image paths */
  background-size: cover;
  cursor: pointer;
}

.star.filled {
  background-image: url('{{asset("front/images/filled-star.png")}}'); /* Use your image paths */
}

.star-rating {
  display: flex;
  position: relative;
  top: -45px;
  left: 93px;
}


.modal-dialog {
    max-width: 1000px;
}

.modal-title{
  font-size: 27px;
  color:#000;
}

.enq {
  font-size:19px;
  text-align: center;
}

.select2-container {
  width:100% !important;
}

.select2-container .select2-selection--single{
  height:37px !important;
}

.select2-container--open .select2-dropdown--below {
  z-index: 100000 !important;
}

.trav_toggle.open {
    background: url('{{asset("front/images/down.png")}}') no-repeat right 8px;
    background-size: 20px;
}
.trav_toggle.close {
    background: url('{{asset("front/images/up.png")}}') no-repeat right 8px;
    background-size: 20px;
}

.enquiry_img{
    min-height: 340px;
    max-height: 340px;
}

.details {
  position: relative;
    width: 100%;
    top: -96px;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    text-align: center;
    color: #fff;
    padding: 0 5% 2%;
    height:96px;
}



.details .packageName {
    font: 1em "Lato Bold";
    padding: 15px 0 0px;
}

.details .nights {
    display: inline-block;
    border-radius: 20px;
    background: rgba(0,0,0,0.5);
    font-size: .85714em;
    padding: 5px 10px;
}

.text {
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 2; /* number of lines to show */
          line-clamp: 2; 
  -webkit-box-orient: vertical;
}

</style>
@endsection

@section('container')

<!-- Slider -->
<section class="onclickhedre">
  <div  class="container-fluid">
    <div class="row">
      <div class="col-md-7">
        <h1 class="drkahopafr text-dark text">{{$data->title}}</h1>
        <ul class="besend">
            <li class="bestseller p-1" style="width: 11%;">Best Seller</li>
            <li class="night ps-3">{{$data->nights}} Nights</li>
            <li class="days ps-3">{{$data->days}} Day's</li>
        </ul>
      </div>
      <div class="col-md-5">
        <ul class="peboen">
          <li>
          <!-- <p class="fiftetow">&#8377;52000</p> -->
          <div style="font-size: 14px; margin-bottom:-5px;">Starting From</div>
          @php
            $formattedNumber = number_format($data->price, 0, '.', ',');
          @endphp
          <h5 class="personper text-dark" style="font-size: 26px;"><strong>&#8377;{{$formattedNumber}}</strong> <!--<sub style="font-size:13px; color:#666;">per person</sub> --></h5></li>
          <!-- <li><button type="submit" class="primary-button">Book Now</button></li> -->
          <li class="ms-3 mt-2 me-5"><button type="button" class="primary-buttontow" data-bs-toggle="modal" data-bs-target="#exampleModal" >Enquiry</button></li>
        </ul>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-12">
        <div class="navbarnav">
          <ul class="phhoindetdabout">
            <a href="#Photos"><li class="active">Photos</li></a>
            <a href="#Itinerary"><li>Hotels & Transport</li></a>
            <a href="#Inclusions"><li>Inclusions</li></a>
            <a href="#detailedItinerary"><li>Detailed Itinerary</li></a>
            <a href="#termsCondi"><li>T & C</li></a>
            <a href="#AboutPlace"><li class="me-0">About The Place</li></a>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="savinimagscrow" id="Photos">
    <div class="container-fluid">
        <div class="topbootamborder mb-4">
            <div class="row">
                <div class="col-md-9">
                <div class="carousel carousel-main" data-flickity='{"pageDots": false, "autoPlay": 4000, "pauseAutoPlayOnHover": true, "wrapAround": true }'>
                  @foreach($data->gallery_images as $key=>$val)
                    <div class="carousel-cell"><img class="rounded" src="{{asset($val->images)}}" width="100%" height="100%" /></div>
                  @endforeach
                </div>

                <div class="carousel carousel-nav" data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
                  @foreach($data->gallery_images as $key=>$val)
                    <div class="carousel-cell"><img class="rounded" src="{{asset($val->images)}}" width="100%" height="100%" /></div>
                  @endforeach
                </div>
                </div>
                    <div class="col-md-3 col-sm-6 pt-3">
                      <div class="properly">
                        @if(isset($data->customize) && $data->customize != "")
                          <img class="recommend mt-1 me-1" src="{{asset('front/images/Customizable.png')}}" width="50px" />
                          <h1 class="modulesis text-dark">Customizable Tour</h1>
                          <p class="indimpnd">{!!$data->customize!!}</p>
                          <hr>
                        @endif
                        @if(isset($data->pay_hold) && $data->pay_hold != "")
                          <img class="recommend mt-1 mb-2 me-1" src="{{asset('front/images/pay_hold.png')}}" width="50px" />
                          <h1 class="modulesis text-dark">Pay & Hold</h1>
                          <p class="indimpnd">
                              {!!$data->pay_hold!!}
                          </p>
                          <hr>
                        @endif

                        <img class="recommend mb-2 me-2 ms-2" style="width: 10%;" src="{{asset('front/images/night.png')}}" width="50px" />
                        <h1 class="modulesis text-dark">Stay Plan</h1>

                        <ul class="p-0 mt-3">
                          @foreach($data->stay_plan as $key=>$val)
                            <li class="w-100">{{$val->city_name->name}} - {{$val->nights}} Nights</li>
                          @endforeach
                        </ul>

                        <!-- <ul class="flhoactr">
                            <li><i class="fa-brands fa-accessible-icon"></i>0 Flight</li>
                            <li><i class="fa-brands fa-accessible-icon"></i>4 Hotels</li>
                            <li><i class="fa-brands fa-accessible-icon"></i>8 Activites</li>
                            <li><i class="fa-brands fa-accessible-icon"></i>5 Transfers</li>
                        </ul> -->
                      </div>
                    </div>

                    <div class="my-scroller col-md-9">
                      <ul class="inline my-listview no-bdr no-pad prop-block p-0" >
                        @if(isset($data->inclusion_name) && $data->inclusion_name[0] != '')
                        <li class="info-block hidden-md ng-scope" data-ng-controller="inclusionsController" style="width:50%;" data-ng-if="holidayData.packageInclusionTypes != null &amp;&amp; holidayData.packageInclusionTypes.length > 0">
                            <h3 class="customTitle">Inclusions</h3>
                            <ul class="flhoactr">
                              @foreach($data->inclusion_name as $key=>$val)
                                <li class="ng-scope">
                                <img src="{{asset($val->image)}}" height="35px" width="35px" />
                                  <div>{{$val->title}}</div>
                                  
                                </li>
                              @endforeach
                            </ul>
                        </li>
                        @endif
                        @if(isset($data->theme_name) && $data->theme_name[0] != '')
                        <li class="info-block ng-scope" style="width:49%;">
                            <h3 class="customTitle" style="margin-left: 30px !important;">Themes</h3>
                            <ul class="flhoactr" id="packageThemes" style="margin-left: 30px;">
                              @foreach($data->theme_name as $key=>$val)
                                <li>
                                  <img src="{{asset($val->image)}}" height="20px" />
                                  <div>{{$val->title}}</div>
                                </li>
                              @endforeach
                            </ul>
                        </li>
                        @endif
                      </ul>
                    </div>

            </div>
        </div>
    </div>
</section>

  <section class="viewesover">
    <div class="container-fluid">
      <div class="topbootamborder mb-4">
        <div class="row">
        <div class="col-md-12">
          <h1 class="overviews">Overview</h1>
          <p class="importsperagarf">{!!$data->description!!}</p>
        </div>
      </div>
      </div>
    </div>
  </section>

  <section class="itinerary clearfix" id="Itinerary">
  <div class="container-fluid">
      <h1 class="overviews">Package Itinerary</h1>
      <div class="right-column">
        @foreach($itineraries as $key=>$val)
          <div class="tab-content @if($key != 0) d-none @endif" id="tab{{$key}}">
            <div class="title row acc-title">
                <div class="first ng-binding" style="width: 155px;">
                    <span class="accord-btn"> <span></span><span class="vertical"></span></span> {{$val->city_name->name}}
                </div>
                <div class="last" style="width: 205px;">
                  <span ng-repeat="dayNumVal in sortedDayArry track by $index" class="ng-scope">
                    <span data-ng-if="$first" class="ng-binding ng-scope">From: DAY-{{$key + 1}}&nbsp;</span>
                  </span>
                  <span ng-repeat="dayNumVal in sortedDayArry track by $index" class="ng-scope">
                    <span data-ng-if="$last &amp;&amp; $last!=$first" class="ng-binding ng-scope">to DAY-{{$key + 2}}</span>
                  </span>
                </div>
            </div>

            <div class="days acc-content ng-scope">
                <h2>DAY-<span class="dayVal ng-binding">{{$key + 1}}</span></h2>
                <div class="items-content hotel ng-scope" ng-init="hotelData = createHotelItenaryJson(dayIten.accomodationRef,cityValData.dayNumVsComponents)" ng-if="packageAccomodation!=null">
                    <div class="right ng-scope" data-ng-if="hotelData">
                      @if($val->hotel != "")
                      <div class="name">
                          <img class="ms-2 mt-2 rounded" src="{{asset($val->image)}}" height="80px" width="90px" alt="">
                            <a href="#" style="color: #000;position: relative;top: -18px;" class="ng-binding ng-scope pevtsNone ms-2">{{$val->hotel}}</a>
                            <div class="star-rating ms-3">
                              @for($i = 1; $i <= 5; $i++)
                                @if($i <= $val->ratings)
                                <span class="star filled"></span>
                                @else
                                <span class="star"></span>
                                @endif
                              @endfor
                            </div>
                      </div>
                      @endif
                  </div>
                </div>
                @foreach($val->inclusions_name as $cv=>$cd)
                  @if($cd != "")
                  <div class="items-content sight sightSeeing ng-scope">
                      <img class="ms-3 mt-4 rounded" src="{{asset($cd->image)}}" height="50px" width="60px" alt="">
                      <a href="#" style="color: #000;position: relative;top: 0px;" class="ng-binding ng-scope pevtsNone ms-3">{{$cd->title}}</a>
                  </div>
                  @endif
                @endforeach
            </div>
          </div>
        @endforeach
      </div>
      <aside class="left-column hidden-md" style="top: 125px;">
        <ul class="dayItenaryList">
          @foreach($itineraries as $key=>$val)
            <li class="dayWrapper-1 w-100">
                <a class="tab-label @if($key === 0) active @endif" onclick="showTab({{$key}})" id="{{$key}}"> <span class="day-1">Day-{{$key + 1}}</span><i class="caret caret-right"></i> </a>
            </li>
          @endforeach
            
        </ul>
    </aside>
    </div>
</section>

    {{-- <section class="clanders">
      <div class="container-fluid">
        <div class="row">
          <div class="topbootamborder ">
            <div class="col-md-12">
              <img src="images/clander.jpg">
            </div>
          </div>
        </div>
      </div>
    </section> --}}
    <hr>
    <section class="dummyipsum" id="Inclusions">
      <div class="container-fluid">
       <div class="topbootamborder mb-3" style="padding: 0px 0px 0px 100px;">
          <div class="row">
          <div class="col-md-6">
            <h1>Inclusions</h1>
            <ul>
              @foreach($data->includes as $key=>$val)
                <li><i class="fa-solid fa-check"></i> {{$val->title}}</li>
              @endforeach
            </ul>
          </div>
          <div class="col-md-6">
            <h1>Exlclusinos</h1>
            <ul>
              @foreach($data->excludes as $key=>$val)
                <li><i class="fa-solid fa-check"></i> {{$val->title}}</li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="divdercolsixe">
            <div class="row">
          <div class="col-md-6">
            <h1> Payment Police</h1>
            <ul>
              @foreach($data->payment_policy as $key=>$val)
                <li><i class="fa-solid fa-check"></i> {{$val->title}}</li>
              @endforeach
            </ul>
          </div>
          <div class="col-md-6">
            <h1>Cancellation Police</h1>
            <ul>
              @foreach($data->cancellation as $key=>$val)
                <li><i class="fa-solid fa-check"></i> {{$val->title}}</li>
              @endforeach
            </ul>
          </div>
        </div>
       </div>
        </div>
      </div>
    </section>

    <section class="viewesover" id="detailedItinerary">
      <div class="container-fluid">
        <div class="topbootamborder mb-3" style="padding: 0px 0px 0px 0px;">
          <div class="row">
          <div class="col-md-12">
            <h1 class="overviews mb-4">Detailed Day Wise Itinerary</h1>
            @foreach($itineraries as $key=>$val)
              <div class="mb-5">
                <h2 class="overviews text-dark" style="font-size:21px;">Day {{$key + 1}} - {{$val->title}}</h2>
                <p class="importsperagarf">{{$val->description}}</p>
              </div>
            @endforeach
          </div>
        </div>
        </div>
      </div>
    </section>



    <section class="typesetting" id="termsCondi">
        <div class="container-fluid">
          <div class="topbootamborder mb-4">
              <div class="row">
            <div class="col-md-12">
              <h1 class="tercondion">Terms & Conditions</h1>
              <p class="scrambled">{!!$data->terms!!}</p>
            </div>
          </div>
          </div>
        </div>
      </section>


      <section id="AboutPlace">
        <div class="container-fluid">
          <ul class="nav nav-tabs border-0 mb-3" id="stayPlanTabs" role="tablist">
              @foreach($data->stay_plan as $key => $val)
                <li class="nav-item" role="presentation">
                    <a class="nav-link @if($key === 0) active @endif" id="tab{{$key}}-link" data-bs-toggle="tab" href="#tab{{$key}}" role="tab" aria-controls="tab{{$key}}" aria-selected="@if($key === 0) true @else false @endif">{{$val->city_name->name}}</a>
                </li>
              @endforeach
          </ul>
          <div class="tab-content" id="stayPlanTabContent">
              @foreach($data->stay_plan as $key => $val)
                  <div class="tab-pane fade @if($key === 0) show active @endif" id="tab{{$key}}" role="tabpanel" aria-labelledby="tab{{$key}}-link">
                      <section class="typesetting">
                          <div class="container-fluid">
                              <div class="topbootamborder mb-5">
                                  <div class="row">
                                      <div class="col-md-2">
                                          <img src="{{asset($val->image)}}">
                                      </div>
                                      <div class="col-md-9">
                                          <p class="scrambled">{{$val->description}}</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </section>
                  </div>
              @endforeach
          </div>
      </div>
    </section>

    <!-- Enquiry Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Get the Best Holiday Planned by Experts!</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{route('package_enquiry')}}" method="post" id="submitForm">
                @csrf
                <div class="modal-body">
                  <div class="row">
                      <div class="col-md-8">
                          <div class="row">
                              <div class="col-md-12 mb-2">
                                <p class="enq">Enter your contact details and we will plan the best holiday suiting all your requirements.</p>
                                <input type="hidden" name="package_id" id="package_id" value="{{$data->id}}">
                              </div>

                              <div class="col-md-12 mt-2">
                                  <div class="form-group local-forms">
                                      <input type="text" class="form-control" id="title" name="title" type="text" aria-describedby="" value="{{$data->title}}" placeholder="Enter Enquiry Title" />
                                  </div>
                              </div>

                              <div class="col-md-6 mt-4">
                                  <div class="form-group local-forms">
                                      <input type="text" class="form-control" id="name" name="name" type="text" aria-describedby="" placeholder="Enter Contact Person Name" />
                                  </div>
                              </div>

                              <div class="col-md-6 mt-4">
                                  <div class="form-group local-forms">
                                      <input type="text" class="form-control" id="last_name" name="last_name" type="text" aria-describedby="" placeholder="Enter Last Name" />
                                  </div>
                              </div>

                              <div class="col-md-6 mt-4">
                                  <div class="form-group local-forms">
                                      <input type="text" class="form-control" id="mobile_no" name="mobile_no" type="text" aria-describedby="" placeholder="Enter Mobile No." />
                                  </div>
                              </div>

                              <div class="col-md-6 mt-4">
                                  <div class="form-group local-forms">
                                      <input type="email" class="form-control" id="email" name="email" type="text" aria-describedby="" placeholder="Enter Email" />
                                  </div>
                              </div>

                              <!-- <div class="col-md-6 mt-4">
                                  <div class="form-group local-forms">
                                      <select name="city" id="city" class="form-control multi">
                                          <option value=""> Your City</option>
                                          @foreach($city as $key=>$val)
                                          <option value="{{$val->id}}">{{$val->name}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div> -->

                              <div class="col-md-6 mt-4">
                                  <div class="form-group local-forms">
                                      <!-- <label>Travel Date </label> -->
                                      <input type="date" class="form-control" title="Expected Date of Travel" name="travel_date" id="travel_date" />
                                  </div>
                              </div>

                              <div class="col-md-6 mt-4 pe-0">
                                <div class="trav_engine">
                                    <input type="text" id="txtTotalTravelers" class="txt_Traveler" name="travelers" @if(isset($post)) value="{{$post->infants + $post->adults + $post->childs}} Traveler(s)" @else value="1 @endif Traveler(s)" readonly="readonly"/>
                                    <div class="trav_toggle open">
                                        <a href="#" style="font-size: 0;">Open</a>
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
                                        <div class="trav_item p-0">
                                            <span class="trav_done">Done</span>
                                        </div>
                                    </div>
                                </div>
                              </div>

                              <div class="col-md-6 mt-4">
                              <input type="text" class="form-control" id="country" value="{{$data->country_data}}" name="country" type="text" aria-describedby="" readonly />
                              </div>
                              <div class="col-md-6 mt-4">
                              <input type="text" class="form-control" id="city" name="city" value="{{$data->city_data}}" type="text" aria-describedby="" readonly />
                              </div>

                              <div class="col-md-12 mt-4">
                                  <div class="form-group local-forms">
                                      <textarea name="package_des" class="form-control" id="package_des" placeholder="Enter About Package"></textarea>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4 mt-5">
                        <img src="{{asset($data->banner_image)}}" class="enquiry_img rounded" alt="">
                        <div style="" class="details ng-scope">
                            <h3 class="packageName ng-binding text">{{$data->title}}</h3>
                            <div class="nights ng-binding">{{$data->nights}} NIGHTS</div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                  <button type="submit" id="submitButton" class="btn1 btn-primary" style="background-color:#0a53be; color:#FFF;">Submit</button>
                </div>
              </form>
          </div>
      </div>
    </div>



     
@endsection

@section('scriptjs')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>


        $(document).ready(function() {
            $("#domState").hide();
            $(document).on("change", "#type", function() {
              alert();
                var val = $("#type").val();

                if(val == 'Domestic'){
                    $("#domState").show();
                    $("#country").html('<option value="1">India</option>');
                }
                else{
                    $("#domState").hide();
                    var alldata = "ds";
                    $.ajax({
                        'url': '{{ route('getAjaxData') }}',
                        'type': 'GET',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            alldata: alldata
                        },
                        success: function(data) {
                            // alert(data);
                            $('#country').html(data);
                        },
                        error: function(response) {
                            // alert('Error');
                        }
                    });
                }
            });
        });

    window.addEventListener("scroll", function() {
      var header = document.querySelector(".onclickhedre");
      if (window.pageYOffset > 1) { // You can adjust the pixel value as needed
        header.classList.add("sticky");
      } else {
        header.classList.remove("sticky");
      }
    });

    $(document).ready(function() {
      $(window).scroll(function() {
        // Iterate through each section's ID.
        $('.phhoindetdabout a').each(function() {
          var sectionId = $(this).attr('href');
          var sectionTop = $(sectionId).offset().top;
          var windowHeight = $(window).height();
          
          // Check if the section is in the viewport.
          if ($(window).scrollTop() >= sectionTop - windowHeight / 2) {
            // Remove the "active" class from all list items in the menu.
            $('.phhoindetdabout li').removeClass('active');
            // Add the "active" class to the current section's list item.
            $(this).find('li').addClass('active');
          } else {
            // If it's not in view, remove the "active" class from the current section's list item.
            $(this).find('li').removeClass('active');
          }
        });
      });
    });


    gsap.registerPlugin(ScrollTrigger);

    const timeLineItems = gsap.utils.toArray('.x-timeline[data-scroll="true"] .x-timeline-item_marker-inner');

    timeLineItems.forEach((timeLineItem,i) => {

      ScrollTrigger.create({
        trigger: timeLineItem,
        id: i+1,
        start: 'top 450px',
        end: () => `+=${timeLineItem.clientHeight}`,
        toggleActions: 'play none none none',
        onEnter() {
          timeLineItem.classList.add('x-timeline-item_marker-inner-active');
        },
        onEnterBack() {
          timeLineItem.classList.remove('x-timeline-item_marker-inner-active');
        }, 
        //toggleClass: 'x-timeline-item_marker-inner-active'
        //markers: true
      });

    });

        function convertToDays(TextObj) {
            var val = TextObj.value;
            val++;

            $("[name='days']").val(val);
        }


      $(document).ready(function() {
          $('.navbar-toggler').click(function() {
              $('body').addClass('header-active');
          });
          $('#btnremove').click(function() {
              $('body').removeClass('header-active');
          });
      });


            function showTab(id){
                var tabId = id;
                // alert('#tab' + tabId);
                // Hide all tab contents
                $('.tab-content').addClass('d-none');
                
                // Remove the 'active' class from all tab labels
                $('.tab-label').removeClass('active');
                
                // Show the selected tab content
                $('#tab' + tabId).removeClass('d-none');
                
                // Add the 'active' class to the clicked tab label
                $('#' + tabId).addClass('active');
            }

       



    //   function updateIndicatorsVisibility() {
    //     const indicatorsContainer = document.querySelector('.carousel-indicators-container');
    //     const indicators = document.querySelector('.carousel-indicators');
    //     const nextButton = document.getElementById('next-indicators');

    //     // Check if the total number of indicators exceeds the visible count (e.g., 6)
    //     const visibleCount = 6; // Adjust this value as needed
    //     const indicatorsCount = indicators.childElementCount;

    //     if (indicatorsCount > visibleCount) {
    //         nextButton.classList.remove('d-none');
    //     } else {
    //         nextButton.classList.add('d-none');
    //     }
    // }

    // Call the function when the page loads and when the window is resized
    // window.addEventListener('load', updateIndicatorsVisibility);
    // window.addEventListener('resize', updateIndicatorsVisibility);



    // pax js

    $(document).ready(function () {
        if ($("div.trav_toggle").length > 0) {
            $("div.trav_toggle").click(function () {
                if ($(this).hasClass("open")) {
                    $(this).removeClass("open");
                    $(this).addClass("close");
                    $(this).next().slideDown(100);
                    return false;
                } else {
                    $(this).removeClass("close");
                    $(this).addClass("open");
                    $(this).next().slideUp(100);
                    return false;
                }
            });
        }
        $(".trav_done").click(function () {
            if ($("div.trav_toggle").hasClass("close")) {
                $("div.trav_toggle").removeClass("close");
                $("div.trav_toggle").addClass("open");
                $("div.trav_toggle").next().slideUp(100);
            }
        }); 
    });





    function process(v) {
        var Adult = parseInt(document.getElementById("ddlAdult").value);
        var Child = parseInt(document.getElementById("ddlChild").value);
        var Infant = parseInt(document.getElementById("ddlInfant").value);
        Adult += v;
        var total = Adult + Child;
        // if (total <= 9 && Adult >= 1) {
            document.getElementById("ddlAdult").value = Adult;
            if (Infant > Adult) {
                document.getElementById("ddlInfant").value = Adult;
            }
            var TotTravelers = Adult + Child + Infant;
            document.getElementById("txtTotalTravelers").value = (TotTravelers + " Traveler(s)");
        // }
    }


        function process2(s) {
            // alert(s);
            var Adult = parseInt(document.getElementById("ddlAdult").value);
            var Child = parseInt(document.getElementById("ddlChild").value);
            var Infant = parseInt(document.getElementById("ddlInfant").value);
            Child += s;
            var total = Adult + Child;
            // if (total <= 9 && Child >= 0) {
                document.getElementById("ddlChild").value = Child;
                var TotTravelers = Adult + Child + Infant;
                document.getElementById("txtTotalTravelers").value = (TotTravelers + " Traveler(s)");
            // }
        }


        function process3(sh) {
            var Adult = parseInt(document.getElementById("ddlAdult").value);
            var Infant = parseInt(document.getElementById("ddlInfant").value);
            var Child = parseInt(document.getElementById("ddlChild").value);
            Infant += sh;
            // if (Infant <= Adult && Infant >= 0) {
                document.getElementById("ddlInfant").value = Infant;
                var TotTravelers = Adult + Child + Infant;
                document.getElementById("txtTotalTravelers").value = (TotTravelers + " Traveler(s)");
            // }
        }


        $(function () {
           $('#submitForm').submit(function(){
            // alert();
            var $this = $('#submitButton');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();
            $.ajax({
                url: $('#submitForm').attr('action'),
                type: "POST",
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#submitForm')[0]),
                success: function(data) {
                    if(data.status){
                      $("#exampleModal").modal("hide");
                        successMsg('Send Enquiry', data.msg);
                        $('#submitForm')[0].reset();
                        Swal.fire(
                          'Thank You!',
                          'Your Enquiry Subbmitted Successfully!',
                          'success'
                        );
                        setTimeout(function() {
                          location.reload();
                                }, 3000);
                        
                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Send Enquiry', data.msg);
                    }
                    buttonLoading('reset', $this);
                },
                error: function() {
                    errorMsg('Send Enquiry', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }
            });
            return false;
           });

           var dtToday = new Date();
    
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
            
            var maxDate = year + '-' + month + '-' + day;

            $('#travel_date').attr('min', maxDate);

            
        });


  </script>

@stop