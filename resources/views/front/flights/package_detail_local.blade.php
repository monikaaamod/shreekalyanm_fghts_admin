@extends('front.layouts.packages_header')
@section('title') Packages @endsection

@section('inlinecss')
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
    font-size: 17px;
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

/* itinerary */

.itinerary .left-column {
    float: left;
    width: 130px;
    margin-left: 0%;
    padding-left: 0px;
}

aside {
    margin: 0;
    padding: 0;
    border: 0;
    font: inherit;
    font-size: 100%;
    vertical-align: baseline;
}

.itinerary .left-column ul {
    font: 1.07143em "Lato Bold";
    text-transform: uppercase;
}

.itinerary .left-column ul li:first-child {
    padding-top: 0;
}

.itinerary .left-column ul li {
    padding: 10px 0;
    width: 82px;
    border-right: 4px solid #ddd7d7;
}

.itinerary .left-column ul li a {
    display: block;
    padding: 8px 15px !important;
    color: #333;
    position: relative;
    margin-right: -3px;
}

.itinerary .left-column ul li a {
    padding: 6px 8px !important;
}

a {
    color: #333;
    font: normal 17px/normal "Lato Regular";
    cursor: pointer;
}

.itinerary .left-column ul li a:hover {
    background: #ea2330 !important;
    color: #fff !important;
}

.itinerary .left-column ul li {
    padding: 10px 0;
    width: 82px;
    border-right: 4px solid #ddd7d7;
}

.itinerary .left-column ul li a span {
    border-bottom: 2px dashed #ddd7d7;
}

.itinerary .left-column ul li a.active span {
    border-bottom: 0;
}

.itinerary .left-column ul li a .caret {
    position: absolute;
    right: -7px;
    border-width: 8px;
    border-left-color: #ddd7d7;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    -webkit-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out;
}

.itinerary .left-column ul li a:hover .caret, .itinerary .left-column ul li a.active .caret {
    border-left-color: #ea2330;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    -webkit-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out;
}

.caret.caret-right {
    border-left: 4px solid;
}

.caret.caret-right, .caret.caret-left {
    border-top: 4px solid transparent;
    border-bottom: 4px solid transparent;
}

.caret {
    display: inline-block;
    width: 0;
    height: 0;
    margin-left: 2px;
}

.itinerary .left-column ul li a.active {
    background: #ea2330 !important;
    color: #fff !important;
}

.itinerary .right-column {
    float: right;
    width: 87%;
    position: relative;
    padding-left: 25px;
}

.itinerary .location.my-accordion .acc-title {
    margin: 0;
}

.title.row.acc-title {
    width: 100%;
}

.itinerary .location .title {
    font: 1.21429em "Lato Bold";
}

.my-accordion .acc-title {
    cursor: pointer;
}

.first {
    background: #333;
    border: 1px solid #333;
    color: #fff;
    min-width: 150px;
    position: relative;
    padding-left: 40px;
    padding-right: 15px;
}

.first {
    padding: 6px 50px;
    float: left;
    display: inline-block;
    line-height: 20px;
    font-size:19px;
    font-family: "Lato Bold";
}

.itinerary .location .title .accord-btn {
    left: 10px;
    position: absolute;
    top: 15px;
}

.last {
    border: 1px solid #b5b3b3;
    color: #333;
    min-width: 200px;
    text-align: center;
    font-size: .85714em;
}

.last {
    padding: 6px 25px;
    float: left;
    display: inline-block;
    line-height: 20px;
    font-size:15px;
    font-family: "Lato Bold";
}

.itinerary .days h2 {
    padding: 8px 20px;
    background: #999;
    font: 1.07143em "Lato Bold";
    display: inline-block;
    margin: 10px 0 5px 0;
    color: #fff;
}

.itinerary .days .items-content {
    border: 1px solid #f5f4f4;
    width: 100%;
    background: #fcfbfb;
    height: 98px;
    position: relative;
    display: table;
    margin-bottom: 15px;
}

.itinerary .days .items-content .content.left {
    width: 150px;
    font-size: 1.14286em;
    padding: 0 20px;
}

.itinerary strong, .bold {
    font-family: "Lato Bold";
    font-weight: normal;
}

.itinerary .days .hotel .left small {
    margin-left: 48px;
    display: inline-block;
    font-weight: normal;
    margin-top: -10px;
    font-size: .78571em;
}

.itinerary .days .hotel .right {
    position: relative;
}

.itinerary .days .items-content .content {
    vertical-align: middle;
    display: table-cell;
    color: #555;
}

.content {
    line-height: 1.2;
}

.itinerary .days .hotel .right .name {
    margin-right: 2%;
    width: 80%;
}

.itinerary .days .hotel .right figure, .itinerary .days .hotel .right>div {
    float: left;
}

.itinerary .days .items-content .content.left {
    width: 150px;
    font-size: 1.14286em;
    padding: 0 20px;
}

.itinerary .days .items-content .content {
    vertical-align: middle;
    display: table-cell;
    color: #555;
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
            <li class="bestseller p-1" style="width: 13%;">Best Seller</li>
            <li class="night p-1 ps-3">{{$data->nights}} Nights</li>
            <li class="days p-1 ps-3">{{$data->days}} Day's</li>
        </ul>
      </div>
      <div class="col-md-5">
        <ul class="peboen">
          <li>
          <!-- <p class="fiftetow">&#8377;52000</p> -->
          <div style="font-size: 14px; margin-bottom:-5px;">Starting From</div>
          <h5 class="personper text-dark" style="font-size: 26px;"><strong>&#8377;{{$data->price}}</strong> <!--<sub style="font-size:13px; color:#666;">per person</sub> --></h5></li>
          <!-- <li><button type="submit" class="primary-button">Book Now</button></li> -->
          <li class="ms-3 mt-2 me-5"><button type="submit" class="primary-buttontow" >Enquiry</button></li>
        </ul>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-12">
        <div class="navbarnav">
          <ul class="phhoindetdabout">
            <a href="#Photos"><li class="active">Photos</li></a>
            <a href="#Itinerary"><li>Detailed Itinerary</li></a>
            <a href="#Inclusions"><li>Inclusions</li></a>
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
                <div class="col-md-9 pt-3">
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

                    <div class="my-scroller col-md-8">
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

  <section class="container itinerary clearfix ng-scope" id="itinerary">
    <div class="container-fluid">
      <h1 class="overviews">Package Itinerary</h1>
      <div class="right-column tab-content">
        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-link">
          <div class="title row acc-title">
              <div class="first ng-binding" style="width: 155px;">
                  <span class="accord-btn"> <span></span><span class="vertical"></span></span> Jaipur
              </div>
              <div class="last" style="width: 205px;">
                <span ng-repeat="dayNumVal in sortedDayArry track by $index" class="ng-scope">
                  <span data-ng-if="$first" class="ng-binding ng-scope">From: DAY-1&nbsp;</span>
                </span>
                <span ng-repeat="dayNumVal in sortedDayArry track by $index" class="ng-scope">
                  <span data-ng-if="$last &amp;&amp; $last!=$first" class="ng-binding ng-scope">to DAY-2</span>
                </span>
              </div>
          </div>

          <div class="days acc-content ng-scope">
              <h2>DAY-<span class="dayVal ng-binding">1</span></h2>
              <div class="items-content hotel ng-scope" ng-init="hotelData = createHotelItenaryJson(dayIten.accomodationRef,cityValData.dayNumVsComponents)" ng-if="packageAccomodation!=null">
                  <div class="right ng-scope" data-ng-if="hotelData">
                    <div class="name">
                        <img class="ms-2 mt-2 rounded" src="{{asset('uploads/stay_plan/itinerary_01697450766.jpg')}}" height="80px" width="90px" alt="">
                          <a href="#" style="color: #000;position: relative;top: -18px;" class="ng-binding ng-scope pevtsNone ms-2">Hotel The Livin, Jaipur</a>
                          <div class="showHotelIcon">
                              
                          </div>
                      </div>
                  </div>
              </div>
              @foreach($data->inclusion_name as $key=>$val)
                <div class="items-content sight sightSeeing ng-scope">
                    <img class="ms-2 mt-2 rounded" src="{{asset($val->image)}}" height="50px" width="60px" alt="">
                    <a href="#" style="color: #000;position: relative;top: 0px;" class="ng-binding ng-scope pevtsNone ms-3">{{$val->title}}</a>
                </div>
              @endforeach
          </div>
        </div>

        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-link">
          <div class="title row acc-title">
              <div class="first ng-binding" style="width: 155px;">
                  <span class="accord-btn"> <span></span><span class="vertical"></span></span> Jaipur
              </div>
              <div class="last" style="width: 205px;">
                <span ng-repeat="dayNumVal in sortedDayArry track by $index" class="ng-scope">
                  <span data-ng-if="$first" class="ng-binding ng-scope">From: DAY-1&nbsp;</span>
                </span>
                <span ng-repeat="dayNumVal in sortedDayArry track by $index" class="ng-scope">
                  <span data-ng-if="$last &amp;&amp; $last!=$first" class="ng-binding ng-scope">to DAY-2</span>
                </span>
              </div>
          </div>

          <div class="days acc-content ng-scope">
              <h2>DAY-<span class="dayVal ng-binding">1</span></h2>
              <div class="items-content hotel ng-scope" ng-init="hotelData = createHotelItenaryJson(dayIten.accomodationRef,cityValData.dayNumVsComponents)" ng-if="packageAccomodation!=null">
                  <div class="right ng-scope" data-ng-if="hotelData">
                    <div class="name">
                        <img class="ms-2 mt-2 rounded" src="{{asset('uploads/stay_plan/itinerary_01697450766.jpg')}}" height="80px" width="90px" alt="">
                          <a href="#" style="color: #000;position: relative;top: -18px;" class="ng-binding ng-scope pevtsNone ms-2">Hotel The Livin, Jaipur</a>
                          <div class="showHotelIcon">
                              
                          </div>
                      </div>
                  </div>
              </div>
              @foreach($data->inclusion_name as $key=>$val)
                <div class="items-content sight sightSeeing ng-scope">
                    <img class="ms-2 mt-2 rounded" src="{{asset($val->image)}}" height="50px" width="60px" alt="">
                    <a href="#" style="color: #000;position: relative;top: 0px;" class="ng-binding ng-scope pevtsNone ms-3">{{$val->title}}</a>
                </div>
              @endforeach
          </div>
        </div>

        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-link">
          <div class="title row acc-title">
              <div class="first ng-binding" style="width: 155px;">
                  <span class="accord-btn"> <span></span><span class="vertical"></span></span> Jaipur
              </div>
              <div class="last" style="width: 205px;">
                <span ng-repeat="dayNumVal in sortedDayArry track by $index" class="ng-scope">
                  <span data-ng-if="$first" class="ng-binding ng-scope">From: DAY-1&nbsp;</span>
                </span>
                <span ng-repeat="dayNumVal in sortedDayArry track by $index" class="ng-scope">
                  <span data-ng-if="$last &amp;&amp; $last!=$first" class="ng-binding ng-scope">to DAY-2</span>
                </span>
              </div>
          </div>

          <div class="days acc-content ng-scope">
              <h2>DAY-<span class="dayVal ng-binding">1</span></h2>
              <div class="items-content hotel ng-scope" ng-init="hotelData = createHotelItenaryJson(dayIten.accomodationRef,cityValData.dayNumVsComponents)" ng-if="packageAccomodation!=null">
                  <div class="right ng-scope" data-ng-if="hotelData">
                    <div class="name">
                        <img class="ms-2 mt-2 rounded" src="{{asset('uploads/stay_plan/itinerary_01697450766.jpg')}}" height="80px" width="90px" alt="">
                          <a href="#" style="color: #000;position: relative;top: -18px;" class="ng-binding ng-scope pevtsNone ms-2">Hotel The Livin, Jaipur</a>
                          <div class="showHotelIcon">
                              
                          </div>
                      </div>
                  </div>
              </div>
              @foreach($data->inclusion_name as $key=>$val)
                <div class="items-content sight sightSeeing ng-scope">
                    <img class="ms-2 mt-2 rounded" src="{{asset($val->image)}}" height="50px" width="60px" alt="">
                    <a href="#" style="color: #000;position: relative;top: 0px;" class="ng-binding ng-scope pevtsNone ms-3">{{$val->title}}</a>
                </div>
              @endforeach
          </div>
        </div>
      </div>
      <aside class="left-column hidden-md" style="top: 125px;">
        <ul class="dayItenaryList nav-tabs" role="tablist">
            <!-- ngRepeat: i in dayRange -->
            <li class="dayWrapper-1 nav-item w-100" role="presentation">
                <a class="nav-link active" id="tab1-link" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true"> <span class="day-1">Day-1</span><i class="caret caret-right"></i> </a>
            </li>
            <!-- end ngRepeat: i in dayRange -->
            <li class="dayWrapper-2 nav-item w-100" role="presentation">
                <a class="nav-link" id="tab2-link" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"> <span class="day-2">Day-2</span><i class="caret caret-right"></i> </a>
            </li>
            <!-- end ngRepeat: i in dayRange -->
            <li class="dayWrapper-3 nav-item w-100" role="presentation">
                <a class="nav-link" id="tab3-link" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"> <span class="day-3">Day-3</span><i class="caret caret-right"></i> </a>
            </li>
            <!-- end ngRepeat: i in dayRange -->
            <li class="dayWrapper-4 nav-item w-100" role="presentation">
                <a class="nav-link" id="tab4-link" data-bs-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"> <span class="day-4">Day-4</span><i class="caret caret-right"></i> </a>
            </li>
            <!-- end ngRepeat: i in dayRange -->
            <li class="dayWrapper-5 nav-item w-100" role="presentation">
                <a class="nav-link" id="tab5-link" data-bs-toggle="tab" href="#tab5" role="tab" aria-controls="tab5" aria-selected="false"> <span class="day-5">Day-5</span><i class="caret caret-right"></i> </a>
            </li>
            <!-- end ngRepeat: i in dayRange -->
            <li class="dayWrapper-6 nav-item w-100" role="presentation">
                <a class="nav-link" id="tab6-link" data-bs-toggle="tab" href="#tab6" role="tab" aria-controls="tab6" aria-selected="false"> <span class="day-6">Day-6</span><i class="caret caret-right"></i> </a>
            </li>
            <!-- end ngRepeat: i in dayRange -->
            <li class="dayWrapper-7 nav-item w-100" role="presentation">
                <a class="nav-link" id="tab7-link" data-bs-toggle="tab" href="#tab7" role="tab" aria-controls="tab7" aria-selected="false"> <span class="day-7">Day-7</span><i class="caret caret-right"></i> </a>
            </li>
            <!-- end ngRepeat: i in dayRange -->
            <li class="dayWrapper-8 nav-item w-100" role="presentation">
                <a class="nav-link" id="tab8-link" data-bs-toggle="tab" href="#tab8" role="tab" aria-controls="tab8" aria-selected="false"> <span class="day-8">Day-8</span><i class="caret caret-right"></i> </a>
            </li>
            <!-- end ngRepeat: i in dayRange -->
            <li class="dayWrapper-9 nav-item w-100" role="presentation">
                <a class="nav-link" id="tab9-link" data-bs-toggle="tab" href="#tab9" role="tab" aria-controls="tab9" aria-selected="false"> <span class="day-9">Day-9</span><i class="caret caret-right"></i> </a>
            </li>
            <!-- end ngRepeat: i in dayRange -->
        </ul>
    </aside>
    </div>
  </section>


  {{-- <section class="tabesboot" id="Itinerary">
    <div class="container-fluid">
      <h1 class="overviews">Package Itinerary</h1>
      <main>
        <div class="wrap">
            <div class="x-timeline" data-scroll="true">

              @foreach($data->itineraries as $key=>$val)
                <div class="x-timeline-item">
                  <div class="x-timeline-item_content">
                    <div class="x-timeline-item_content-inner">
                    <div class="card bg-light-subtle mt-4">
                      <img src="{{asset($val->image)}}" class="card-img-top" alt="..." />
                      <div class="card-body">
                        <div class="text-section">
                          <h5 class="card-title fw-bold">{{$val->title}}</h5>
                          <p class="card-text" style="line-height: 1.3;">{{$val->description}}</p>
                        </div>
                        <div class="cta-section">
                          <div class="text-dark" style="font-size: 19px;font-weight: 600;">{{$val->city_name->name}}</div>
                          <!-- <a href="#" class="btn btn-dark">Buy Now</a> -->
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div class="x-timeline-item_marker"><div class="x-timeline-item_marker-inner">Day {{$key + 1}}</div></div>
                  <div class="x-timeline-item_meta"></div>
                </div>
              @endforeach

                <span class="x-timeline_line"><span class="x-timeline_line-active"></span></span>
            </div>
        </div>
      </main>
    </div>
</section> --}}

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
       <div class="topbootamborder mb-5" style="padding: 0px 0px 50px 100px;">
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

      <section >
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
     
@endsection

@section('scriptjs')
  <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
  <script src="https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js"></script>
  <script>

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
    });;


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


      $(document).ready(function() {
          $('.navbar-toggler').click(function() {
              $('body').addClass('header-active');
          });
          $('#btnremove').click(function() {
              $('body').removeClass('header-active');
          });
      });



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
    window.addEventListener('load', updateIndicatorsVisibility);
    window.addEventListener('resize', updateIndicatorsVisibility);

  </script>

@stop