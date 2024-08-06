@extends('front.layouts.vendor_header')
@section('stylecss')
<style>
  .star-rating {
  font-size: 0; /* Remove extra space between inline-block elements */
}

.table-responsive{
  min-height: 150px;
}

.backupdate{
  min-height: 190px;
}

.sliders .carousel-item {
    height: 500px;
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
  background-image: url('{{asset("front/images/star.png")}}'); /* Use your image paths */
}

section.backupdate {
  background-color:#ffffff;
}
.profile-card{
  display: flex;
  flex-direction: column;
  align-items: center;
  max-width: 400px;
  width: 100%;
  border-radius: 25px;
  padding: 30px;
  border: 1px solid #ffffff40;
  box-shadow: 0 5px 20px rgba(0,0,0,0.4);
}
.image{
  position: relative;
  height: 150px;
  width: 150px;
}
.image .profile-pic{
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 50%;
  box-shadow: 0 5px 20px rgba(0,0,0,0.4);
}
.data{
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 15px;
}
.data h2{
  font-size: 33px;
  font-weight: 600;
}
span{
  font-size: 18px;
}
.row-profile{
  display: flex;
  align-items: center;
  margin-top: 30px;
}
.row-profile .info{
  text-align: center;
  padding: 0 20px;
}

.panel-group .panel {
    border-radius: 0;
    box-shadow: none;
    border-color: #EEEEEE;
  }

  .panel-default > .panel-heading {
    padding: 0;
    border-radius: 0;
    color: #212121;
    background-color: #FAFAFA;
    border-color: #EEEEEE;
  }

  .panel-title {
    font-size: 20px;
  }

  .panel-title > a {
    display: block;
    padding: 15px;
    text-decoration: none;
  }

  .more-less {
    float: right;
    color: #212121;
  }

  .panel-default > .panel-heading + .panel-collapse > .panel-body {
    border-top-color: #EEEEEE;
  }

  .relative_one h1 {
    font: 600 20px/100% Roboto,sans-serif;
    color: #000;
    border-bottom: 2px solid #000;
    margin: 0 0 16px 0;
    padding: 0 0 6px 0;
    text-transform: uppercase;
    text-align: left;
}

.img-icon img {
  margin-right: 30px;
}

/* Reviews */

ul {
  list-style-type: none;
}
.usr_img img {
  user-select: none !important;
  list-style-type: none;
}

/* START */
.container__feed {
  display: flex;
  align-items: center;
  padding: 20px;
}
.feedbacks {
  display: flex;
  gap: 20px;
}

.feed_box {
  position: relative;
  width: 48%;
  border-radius: 15px;
  padding: 15px 20px;
  box-shadow: 0 0 10px #00000028;
  z-index: 999;
  background-color: #fff;
  overflow: hidden;
}

.feed_box .user_icon img {
  position: absolute;
  width: 45%;
  min-width: 150px;
  top: 15px;
  right: -15px;
  z-index: -1;
}

.feed__hed {
  display: flex;
  align-items: center;
  z-index: 99 !important;
}

.feed__hed .usr_img {
    width: 60px;
    height: 57px;
    padding: 6px;
    border-radius: 50px;
    box-shadow: 0 0 5px #00000033;
    display: flex;
    justify-content: center;
    align-items: center;
}

.feed__hed .usr_img img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
}

.feed__hed h1 {
  margin-left: 10px;
  font-size: 2.2rem;
}

.container__users_info {
  display: flex;
  flex-direction: column;
}

.feed_txt {
  position: relative;
  margin-top: 12px;
}

.feed_txt::before {
  position: absolute;
  content: "";
  z-index: 99;
  bottom: -1px;
  left: 0;
  width: 100%;
  height: 20px;
  background: linear-gradient(180deg, transparent, #ffffff);
}

.feed_txt summary {
  width: 100%;
  height: 100px;
  overflow-y: scroll;
  padding-bottom: 10px;
}

.feed_txt summary::-webkit-scrollbar {
  display: none !important;
}

.feed_foot {
  margin-top: 14px;
  display: flex;
  justify-content: space-between;
}

.feed_foot a {
  padding: 9px 20px;
  border-radius: 5px;
  text-decoration: none;
  color: #000;
  background: #ffd181;
}

.feed_foot a:hover {
  padding: 9px 20px;
  border-radius: 5px;
  text-decoration: none;
  color: #000;
  background: #ffd999;
}

/* MEDIA */
@media (max-width: 800px) {
  .feedbacks {
    display: flex;
    flex-direction: column;
  }
  .feed_box {
    position: relative;
    width: 100%;
    max-width: 100%;
  }
}
@media (max-width: 450px) {
  .feed__hed h1 {
    font-size: 1.4em;
  }
}
</style>
@endsection
@section('content')

  <!-- Slider -->
  {{-- <section class="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators"></div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{asset('front/images/banner3.png')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{asset('front/images/banner3.png')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{asset('front/images/banner3.png')}}" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>
  </section> --}}

 <section class="desbor">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="desbordes"><h4><span class="lowtext">Your</span> Deshboard <span class="su">.</span> <span class="lowtext">Today</span>       </h4></div>
         <ul class="tabes tabes_dash">
           <li class="new_lead"><h5>{{$leads}}</h5><h6>New Leads</h6></li>
           <li class="processed"><h5>{{$process_count}}</h5><h6>Processed</h6></li>
           <li class="sales"><h5>0</h5><h6>Sales</h6></li>
           <li class="complete"><h5>0</h5><h6>Complete</h6></li>
           <li class="wallet"><h5>{{$wallet_count}}</h5><h6>My Wallet</h6></li>
           {{-- <a href="{{route('vendor_gallery',base64_encode($vendor->id))}}"><li><h5>30</h5><h6>Work Upload</h6></li></a> --}}
         </ul>
       </div>
     </div>
   </div>
 </section>
 
 <section class="backupdate" id="dash">
   <div class="container">
     <div class="row">
      <div class="col-md-5">
        <div class="relative_one">
            <h1>My Profile</h1>
        </div>
        <div class="profile-card">
          <div class="image">
            <img src="{{asset($vendor->image)}}" alt="" class="profile-pic">
          </div>
          <div class="data">
            <h2>{{$vendor->business_name}}</h2>
            <span>{{$vendor->category->category_name}}</span>
            <span>{{$vendor->business_email}}</span>
            <span>{{$vendor->business_number}}</span>
          </div>
          <div class="row-profile">
            <div class="info">
              <h3>Leads</h3>
              <span>{{$leads}}</span>
            </div>
            <div class="info">
              <h3>Processed</h3>
              <span>{{$process_count}}</span>
            </div>
            <div class="info">
              <h3>Wallet</h3>
              <span>{{$total}}</span>
            </div>
          </div>
          <div class="img-icon mt-3">
            <a href="{{$vendor->facebook}}" target="_blank">
              <img src="{{asset('front/images/facebook.png')}}" style="height: auto;" alt="">
            </a>
            <a href="{{$vendor->instagram}}" target="_blank">
              <img src="{{asset('front/images/instagram.png')}}" style="height: auto;" alt="">
            </a>
            <a href="{{$vendor->twitter}}" target="_blank">
              <img src="{{asset('front/images/twitter.png')}}" style="height: auto;" alt="">
            </a>
            <a href="{{$vendor->linkedin}}" target="_blank">
              <img src="{{asset('front/images/youtube.png')}}" style="height: auto;" alt="">
            </a>
          </div>
        </div>
       </div>

      <div class="col-md-7">
        <div class="relative_one">
            <h1>Review's</h1>
        </div>
        @if(isset($reviews) && $reviews_count > 0)
        <div class="container__feed container" id="reviews">
          <div class="feedbacks row">
            @foreach($reviews as $review)
              <div class="feed_box col-md-6">
                <ul class="feed__hed" style="padding-left:0;">
                    <li class="usr_img"><img src="@if(isset($review->image) && $review->image != ''){{asset($review->image)}}@else {{ asset('front/images/profile.png') }}@endif" width="40px"></li>
                    <li>
                        <h3 class="ms-3">{{$review->name}}</h3>
                        <div class="star-rating ms-3">
                          @for($i = 1; $i <= 5; $i++)
                            @if($i <= $review->ratings)
                            <span class="star filled"></span>
                            @else
                            <span class="star"></span>
                            @endif
                          @endfor
                        </div>
                    </li>
                </ul>
                <div class="feed_txt">
                    <summary>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis suscipit rerum inventore facere amet quibusdam consequuntur sint pariatur fugit nemo ipsum in tempore nam minus a quidem nulla, ullam numquam repudiandae, porro ea quia. Impedit laudantium voluptatum similique quibusdam. Earum id facere consequatur itaque deleniti impedit labore nesciunt ab. Ratione.
                    </summary>
                </div>
                <ul class="feed_foot">
                    <li>{{ \Carbon\Carbon::parse($review->created_at)->format('d M Y') }}</li>
                    <!-- <li><a href="#">Ko'rish</a></li> -->
                </ul>
              </div>
            @endforeach
            
          </div>
        </div>
        @endif
      </div>
      {{-- 
        <div class="col-md-6"> 
          <img class="fullimages" src="{{asset('front/images/banner9.png')}}">
        </div> 
      --}}
     </div>
   </div>
 </section>    
 
 
 <section class="tables display_none" id="lead">
  <div class="container">
    <div class="row">
      <div class="table-responsive">
        <table class="table">
          <div class="">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Email Id</th>
              <th scope="col">Phone No.</th>
              <th scope="col">Date of Weddings</th>
              <th scope="col">Days of services</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($query as $key=>$val)
              <tr>
                <td>{{$val->contact_person}}</td>
                <td>{{$val->cross_email}}</td>
                <td>{{$val->cross_phone}}</td>
                <td>{{$val->wedding_date}}</td>
                <td>{{$val->service_days}} Days</td>
                <td>
                  <button data-url="{{route('lead_process',base64_encode($val->id))}}" id="processed" class="btn btn-sm">Processed</button>
                </td>
              </tr>
            @endforeach
        </tbody>
      </div>
      </table>
    </div>
  </div>
</div>
</section>

<section class="tables display_none" id="process">
  <div class="container">
    <div class="row">
      <div class="table-responsive">
        <table class="table">
          <div class="">
          <thead>
            <tr>
             <th scope="col">Name</th>
             <th scope="col">Email Id</th>
             <th scope="col">Phone No.</th>
             <th scope="col">Date of Weddings</th>
             <th scope="col">Days of services</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($process) && $process != "")
              @foreach($process as $key=>$val)
              <tr>
              <td>{{$val->contact_person}}</td>
                <td>{{$val->contact_email}}</td>
                <td>{{$val->contact_number}}</td>
                <td>{{$val->wedding_date}}</td>
                <td>{{$val->service_days}} Days</td>
              @endforeach
            @endif
        </tbody>
      </div>
      </table>
    </div>
  </div>
</div>
</section> 

 <section class="backupdate display_none" id="sal">
 <div class="container">
     <div class="row">
       <div class="col-md-12">
        0 Sales
       </div>
     </div>
   </div>
 </section>    

 <section class="backupdate display_none" id="com">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        0 Complete
       </div>
     </div>
   </div>
 </section>

 <div class="container display_none" id="payment_policy">
    <div class="pulvinar">
      <div class="row">
        <div class="col-md-12">
          @foreach($vendor->pp as $key=>$val)
          <h5 class="paymentpolice"><i class="bi bi-check2-circle"></i>Payment Policy</h5>
          <p class="Bibendum">{{$val->description}}</p>
          @endforeach
          @foreach($vendor->cancellation as $key=>$val)
          <h5 class="paymentpolice"><i class="bi bi-check2-circle"></i>Cancellation</h5>
          <p class="Bibendum">{{$val->description}}</p>
          @endforeach
          <h5 class="paymentpolice"><i class="bi bi-check2-circle"></i>Terms & Conditions</h5>
          <p class="Bibendum">{{$vendor->terms_condi}}</p>
        </div>
      </div>
    </div>
  </div>

  <section class="display_none mb-4" id="review">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mattis">
          <div class="nadates"><h5 class="names">Ramesh Kumar</h5><h6 class="dates">27 May 2023,  12:30 PM</h6>
            <p class="aliquam">
              Lorem ipsum dolor sit amet consectetur. Nisl porta aliquam aliquam gravida eleifend. Vel mattis consectetur at viverra. At cras semper sit orci mattis mattis in in. Duis tincidunt id eu amet morbi. Lorem ipsum dolor sit amet consectetur. Nisl porta aliquam aliquam gravida eleifend. Vel mattis consectetur at viverra. At cras semper sit orci mattis mattis in in. Duis tincidunt id eu amet morbi. Lorem ipsum dolor sit amet consectetur. Nisl porta aliquam aliquam gravida eleifend. Vel mattis consectetur at viverra. At cras semper sit orci mattis mattis in in. Duis tincidunt id eu amet morbi. 
            </p>  
            {{-- <div class="towanc"><a class="reply" href="#"><i class="bi bi-reply"></i>Reply</a>
              <a class="edita" href="#"><i class="bi bi-pencil-fill"></i>Edit</a>
            </div> --}}
           </div>
        </div>
         <div class="mattis">
          <div class="nadates"><h5 class="names">Ramesh Kumar</h5><h6 class="dates">27 May 2023,  12:30 PM</h6>
            <p class="aliquam">
              Lorem ipsum dolor sit amet consectetur. Nisl porta aliquam aliquam gravida eleifend. Vel mattis consectetur at viverra. At cras semper sit orci mattis mattis in in. Duis tincidunt id eu amet morbi. Lorem ipsum dolor sit amet consectetur. Nisl porta aliquam aliquam gravida eleifend. Vel mattis consectetur at viverra. At cras semper sit orci mattis mattis in in. Duis tincidunt id eu amet morbi. Lorem ipsum dolor sit amet consectetur. Nisl porta aliquam aliquam gravida eleifend. Vel mattis consectetur at viverra. At cras semper sit orci mattis mattis in in. Duis tincidunt id eu amet morbi. </p>  
           </div>
        </div>
         <div class="mattis">
          <div class="nadates"><h5 class="names">Ramesh Kumar</h5><h6 class="dates">27 May 2023,  12:30 PM</h6>
            <p class="aliquam">
              Lorem ipsum dolor sit amet consectetur. Nisl porta aliquam aliquam gravida eleifend. Vel mattis consectetur at viverra. At cras semper sit orci mattis mattis in in. Duis tincidunt id eu amet morbi. Lorem ipsum dolor sit amet consectetur. Nisl porta aliquam aliquam gravida eleifend. Vel mattis consectetur at viverra. At cras semper sit orci mattis mattis in in. Duis tincidunt id eu amet morbi. Lorem ipsum dolor sit amet consectetur. Nisl porta aliquam aliquam gravida eleifend. Vel mattis consectetur at viverra. At cras semper sit orci mattis mattis in in. Duis tincidunt id eu amet morbi. 
            </p>  
           </div>
        </div>
         <div class="mattis">
          <div class="nadates"><h5 class="names">Ramesh Kumar</h5><h6 class="dates">27 May 2023,  12:30 PM</h6>
            <p class="aliquam">
              Lorem ipsum dolor sit amet consectetur. Nisl porta aliquam aliquam gravida eleifend. Vel mattis consectetur at viverra. At cras semper sit orci mattis mattis in in. Duis tincidunt id eu amet morbi. Lorem ipsum dolor sit amet consectetur. Nisl porta aliquam aliquam gravida eleifend. Vel mattis consectetur at viverra. At cras semper sit orci mattis mattis in in. Duis tincidunt id eu amet morbi. Lorem ipsum dolor sit amet consectetur. Nisl porta aliquam aliquam gravida eleifend. Vel mattis consectetur at viverra. At cras semper sit orci mattis mattis in in. Duis tincidunt id eu amet morbi. 
            </p>  
           </div>
        </div>
      </div>
    </div>
  </div>
</section>


 <section class="backupdate display_none" id="my_wallet">
  <div class="container">
    <div class="tab-pane">
      <div class="wallat">
        <div class="cash">
          <div class="wallat_cash">
            <p><img src="{{asset('front/images/Promo-Cash.png')}}" alt=""> wallat cash <span>₹ @if($total && $total != "") {{$total}} @else 0 @endif</span></p>
          </div>
        </div>
        <div class="tab-content accordion" id="myTabContent">
          <div class="tab-pane fade show active accordion-item" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <h2 class="accordion-header d-lg-none" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Wallat</button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show  d-lg-block" aria-labelledby="headingOne" data-bs-parent="#myTabContent">
              <div class="accordion-body">
                <table class="table table-striped mb-4">
                  <thead>
                    <tr>
                      <th scope="col">Description</th>
                      <th scope="col">Credit</th>
                      <th scope="col">Balance</th>
                      <th scope="col">Transaction Date</th>
                      <!-- <th scope="col">Acrion</th> -->
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($wallet as $key=>$row)
                    <tr>
                      <td scope="row">{{$row->title}}</th>
                      <td style="color:#85ff00eb;">+{{$row->order_amount}}</td>
                      <td style="color:#EE902C;">@if($total && $total != "") {{$total}} @else 0 @endif</td>
                      <th scope="row" style="color: #8C8C8C;">{{$row->created_at}}</th>
                      {{-- <td>
                        <a href="{{route('vendor.invoice', base64_encode($row->id))}}" class="show btn btn-primary btn-sm">Invovce</a>
                      </td> --}}
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                <div class="general">
                  <h1>General Term & Conditions </h1>
                  <p>{{$vendor->terms_condi}}</p> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@if($vendor->banner_images && count($vendor->banner_images) > 0)
  <section class="sliders" id="sliders" style="margin-bottom:5rem;">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    @foreach($vendor->banner_images as $key=>$val)
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" @if($key == 0) class="active" @endif aria-current="true" aria-label="Slide 1"></button>
    @endforeach
    
  </div>
  <div class="carousel-inner">
    @foreach($vendor->banner_images as $key=>$val)
      <div class="carousel-item @if($key == 0) active @endif">
        <img src="{{asset($val->banner_images)}}" class="d-block w-100" alt="...">
      </div>
    @endforeach
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  </section>
@endif
{{--
<section class="helpb">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        
      </div>
      <div class="col-md-4">
        <button>HELP<i class="fa-solid fa-question"></i></button>
      </div>
    </div>
  </div>
</section>
--}}


@endsection
@section('scriptjs')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script>
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>
  <script>
    $(".review").click(function() {

      $("#dashboard").removeClass('active');
      $("#sliders").addClass('display_none');
      $(".review").addClass('active');
      $("#review").removeClass('display_none');
      $(".wallet").removeClass('active');
      $(".processed").removeClass('active');
      $(".sales").removeClass('active');
      $(".complete").removeClass('active');
      $(".payment").removeClass('active');
      $("#payment_policy").addClass('display_none');
      $("#process").addClass('display_none');
      $("#my_wallet").addClass('display_none');
      $("#sal").addClass('display_none');
      $("#com").addClass('display_none');
      $("#dash").addClass('display_none');

    });
    $(".new_lead").click(function() {

      $("#dashboard").removeClass('active');
      $("#sliders").addClass('display_none');
      $(".new_lead").addClass('active');
      $("#lead").removeClass('display_none');
      $(".wallet").removeClass('active');
      $(".processed").removeClass('active');
      $(".sales").removeClass('active');
      $(".complete").removeClass('active');
      $(".payment").removeClass('active');
      $(".review").removeClass('active');
      $("#review").addClass('display_none');
      $("#payment_policy").addClass('display_none');
      $("#process").addClass('display_none');
      $("#my_wallet").addClass('display_none');
      $("#sal").addClass('display_none');
      $("#com").addClass('display_none');
      $("#dash").addClass('display_none');

    });

    $(".payment").click(function() {

      $("#dashboard").removeClass('active');
      $("#sliders").addClass('display_none');
      $(".payment").addClass('active');
      $("#payment_policy").removeClass('display_none');
      $(".wallet").removeClass('active');
      $(".processed").removeClass('active');
      $(".sales").removeClass('active');
      $(".complete").removeClass('active');
      $(".review").removeClass('active');
      $("#review").addClass('display_none');
      $("#process").addClass('display_none');
      $("#my_wallet").addClass('display_none');
      $("#sal").addClass('display_none');
      $("#com").addClass('display_none');
      $("#dash").addClass('display_none');

    });


    $(".processed").click(function() {

      $("#dashboard").removeClass('active');
      $("#sliders").addClass('display_none');
      $(".processed").addClass('active');
      $("#process").removeClass('display_none');
      $(".new_lead").removeClass('active');
      $(".sales").removeClass('active');
      $(".complete").removeClass('active');
      $(".wallet").removeClass('active');
      $(".payment").removeClass('active');
      $(".review").removeClass('active');
      $("#review").addClass('display_none');
      $("#payment_policy").addClass('display_none');
      $("#my_wallet").addClass('display_none');
      $("#lead").addClass('display_none');
      $("#sal").addClass('display_none');
      $("#com").addClass('display_none');
      $("#dash").addClass('display_none');

    });

    $(".sales").click(function() {

      $("#dashboard").removeClass('active');
      $("#sliders").addClass('display_none');
      $(".sales").addClass('active');
      $("#sal").removeClass('display_none');
      $(".processed").removeClass('active');
      $(".new_lead").removeClass('active');
      $(".complete").removeClass('active');
      $(".wallet").removeClass('active');
      $(".payment").removeClass('active');
      $(".review").removeClass('active');
      $("#review").addClass('display_none');
      $("#payment_policy").addClass('display_none');
      $("#my_wallet").addClass('display_none');
      $("#process").addClass('display_none');
      $("#lead").addClass('display_none');
      $("#com").addClass('display_none');
      $("#dash").addClass('display_none');

    });

    $(".complete").click(function() {

      $("#dashboard").removeClass('active');
      $("#sliders").addClass('display_none');
      $(".complete").addClass('active');
      $("#com").removeClass('display_none');
      $(".processed").removeClass('active');
      $(".sales").removeClass('active');
      $(".new_lead").removeClass('active');
      $(".wallet").removeClass('active');
      $(".payment").removeClass('active');
      $(".review").removeClass('active');
      $("#review").addClass('display_none');
      $("#payment_policy").addClass('display_none');
      $("#my_wallet").addClass('display_none');
      $("#process").addClass('display_none');
      $("#sal").addClass('display_none');
      $("#lead").addClass('display_none');
      $("#dash").addClass('display_none');

    });


    $(".wallet").click(function() {

      $("#dashboard").removeClass('active');
      $("#sliders").addClass('display_none');
      $(".wallet").addClass('active');
      $("#my_wallet").removeClass('display_none');
      $(".processed").removeClass('active');
      $(".sales").removeClass('active');
      $(".new_lead").removeClass('active');
      $(".complete").removeClass('active');
      $(".payment").removeClass('active');
      $(".review").removeClass('active');
      $("#review").addClass('display_none');
      $("#payment_policy").addClass('display_none');
      $("#com").addClass('display_none');
      $("#process").addClass('display_none');
      $("#sal").addClass('display_none');
      $("#lead").addClass('display_none');
      $("#dash").addClass('display_none');

    });

    $(document).on('click','#processed', function(){
      var con = confirm("Are you sure you want to Processed?");
      if(con){
        row = $(this).closest('tr');
        url = $(this).attr('data-url');
        var $this = $(this);
        buttonLoading('loading', $this);
        $.ajax({
            url: url,
            type: 'GET',
              success: function(data){
                  successMsg('processed', data.msg);
                  setTimeout(function() {
                    location.reload();
                  }, 1000);
              row.remove();
              }
        });
      }
    });
  </script>
@stop