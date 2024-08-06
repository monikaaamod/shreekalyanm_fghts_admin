@extends('front.layouts.app')
@section('inlinecss')

@section('container')



<style>
   .nav-pills .nav-link.active {
    background: #EE902C !important;
    height: 43px;
    width: 310px !important;
    border-radius: 5px;
    text-align: left;
    color: #fff !important;
    padding: 10px !important;
}
.nav-pills .nav-link {
  background: #F6F6F6;
    height: 43px;
    width: 310px !important;
    text-align: left;
    padding: 10px !important;
    margin: 5px 0px;
}
  </style>

  <!-- menu -->
<section class="menu">
  <div class="container">
    <div class="menu-bar">
      <ul>
      <li class="active"><a href="{{route('index')}}"> Home</a></li>
      <li><a href="{{route('comingsoon')}}"> Travel Planning</a></li>
      <li><a href="{{route('comingsoon')}}"> Event Planning</a></li>
      <li><a href="{{route('video')}}"> Video</a></li>
      <li><a href="{{route('blog')}}"> Inspirational Blogs</a></li>
      <li><a href="{{route('customer.dashboard',base64_encode($customer->user_id))}}"> Profile</a></li>
      <li><a href="{{route('admin.logout')}}"> Logout</a></li>
      </ul>
    </div>
  </div>
</section>



<!-- Dashboard Start -->
<section class="Dashboard Dashboard1">
    <div class="container">
        <div class="Dash">
            <h1>Dashboard</h1>
            <hr>
        </div>
        <div class="Transactions">
          <div class="d-flex align-items-start border-bottom">
            <div class="nav flex-column nav-pills border-end" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">My Profile</button>
              <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">My Order</button>
              <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">My Wallet</button>
              <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">My Transactions</button>
              {{-- <button class="nav-link" id="v-pills-settings-tab1" data-bs-toggle="pill" data-bs-target="#v-pills-settings1" type="button" role="tab" aria-controls="v-pills-settings1" aria-selected="false">My wishlist</button> --}}
            </div>
            <div class="tab-content content_show" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="wishlist ">
                <form method="post" action="{{route('customer.profile',base64_encode($customer->id))}}" enctype="multipart/form-data" id="submitForm">
                  @csrf
                  <div class="row">
                    <div class="uploadimg">
                        <div class="circle">
                            <img class="profile_pic upload-button" src="@if($customer->image != ''){{asset($customer->image)}}@else{{asset('front/images/main1.png')}}@endif">
                        </div>
                        <div class="p-image">
                            <i class="fa fa-camera upload-button"></i>
                            <input class="file-upload" type="file" name="image" accept="image/*"/>
                        </div>
                    </div>
                  </div>
                  
                    <div class="row first_name">
                      <div class="col-md-6">
                      <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="@if($customer->name != ''){{$customer->name}}@endif" placeholder="Entre your Name" >
                      </div>
                      <div class="col-md-6">
                      <label for="name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="@if($customer->last_name != ''){{$customer->last_name}}@endif" placeholder="Entre your Name" >
                      </div>
                      <div class="col-md-6">
                      <label for="email">Email</label>
                        <input type="Email" class="form-control" id="email" name="email" value="@if($customer->email != ''){{$customer->email}}@endif" placeholder="Enter your Email ID" >
                      </div>
                      <div class="col-md-6">
                      <label for="mobile">Mobile No.</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" value="@if($customer->mobile != ''){{$customer->mobile}}@endif" placeholder="Enter your Mobile Number" >
                      </div>
                       <div class="col-md-6">
                      <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="@if($customer->address != ''){{$customer->address}}@endif" placeholder="Entre your Address" >
                      </div>
                      
                      <div class="col-auto Save_btn">
                        <button type="submit" class="btn" id="submitButton">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"><h1>My Order</h1></div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <div class="wallat">
                  <div class="cash">
                    <div class="wallat_cash">
                      <p><img src="{{asset('front/images/Wallat-Cash.png')}}" alt=""> wallat cash <span>₹{{$wallet_amount}}</span></p>
                    </div>
                    <div class="wallat_cash">
                      <p><img src="{{asset('front/images/Promo-Cash.png')}}" alt=""> Promo cash <span>₹{{$promo_amount}}</span></p>
                    </div>
                  </div>
                  <ul class="nav nav-tabs d-none d-lg-flex mt-3" id="myTab" role="tablist">
                    <li class="nav-item the_first" role="presentation">
                      <button class="active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Wallet</button>
                    </li>
                    <li class="nav-item the_second" role="presentation">
                      <button class="" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Promo</button>
                    </li>
                  </ul>
                  <div class="tab-content accordion" id="myTabContent">
                    <div class="tab-pane fade show active accordion-item" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                      <h2 class="accordion-header d-lg-none" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Wallat</button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show  d-lg-block" aria-labelledby="headingOne" data-bs-parent="#myTabContent">
                        <div class="accordion-body">
                          <table class="table table-striped mb-5">
                            <thead>
                              <tr>
                                <th scope="col">Description</th>
                                <th scope="col">Type</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Transaction Date</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if(isset($customer->wallet) && $customer->wallet->count() > 0)
                                @foreach($customer->wallet as $key=>$val)
                                  <tr>
                                    <th scope="row">{{$val->title}}</th>
                                    <td>+{{$val->order_amount}}</td>
                                    <td>{{$wallet_amount}}</td>
                                    <td>{{$val->created_at}}</td>
                                  </tr>
                                @endforeach
                              @endif
                              
                            </tbody>
                          </table>
                          {{--
                          <div class="more_view">
                            <a href="#">View More</a>
                          </div>
                          <div class="transaction_Logs">
                            <h1>Transaction Logs</h1>
                            <div class="promotion">
                              <h1>promotion <span>12 May 2023</span></h1>
                              <p>credited to mycoin <span>+200</span></p>
                            </div>
                            <div class="promotion">
                              <h1>promotion <span>12 May 2023</span></h1>
                              <p>credited to mycoin <span>+200</span></p>
                            </div>
                            <div class="promotion">
                              <h1>promotion <span>12 May 2023</span></h1>
                              <p>credited to mycoin <span>+200</span></p>
                            </div>
                          </div>
                          <div class="more_view more_view1">
                            <a href="#">View More</a>
                          </div> --}}
                          <div class="general">
                            <h1>General Term & Conditions <span><button onclick="myFunction()" id="myBtn">Read more</button></span></h1>
                            <p>1. This document is an electronic record in terms of Information Technology Act, 2000 and rules there under as applicable and the amended provisions pertaining to electronic records in various statutes as amended by the Information Technology Act, 2000. This electronic record is generated by a computer system and does not require any physical or digital signatures.</p>
                            <p>2. This document is published in accordance with the provisions of Rule 3 (1) of the Information Technology (Intermediaries guidelines) Rules, 2011 that require publishing the rules and regulations, privacy policy and Terms of Use for access or usage of careers.myntra.com, life.myntra.com & blog.myntra.com website.</p>
                            
                            <p><span id="dots"></span><span id="more">3. erisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.<br>
                              4. The use of any product, service or feature (the “Materials”) available through careers.myntra.com, life.myntra.com & blog.myntra.com (hereinafter referred to as “Website”) is owned by Myntra Designs Private Limited, a company incorporated under the Companies Act, 1956 with its registered office at 3rd floor, AKR Tech Park, 7th Mile, Krishna Reddy Industrial Area, Kudlu Gate, Bangalore-560068, Karnataka, India (hereinafter referred to as “Myntra”).<br>
                              5. For the purpose of these Terms of Use, wherever the context so requires “You” or “User” shall mean any natural or legal person who visits or uses the Website. Myntra allows the User to surf the Website without registering on the Website. The term “We”, “Us”, “Our” shall mean Myntra Designs Private Limited.</span></p>
                          <script>
                          function myFunction() {
                            var dots = document.getElementById("dots");
                            var moreText = document.getElementById("more");
                            var btnText = document.getElementById("myBtn");

                            if (dots.style.display === "none") {
                              dots.style.display = "inline";
                              btnText.innerHTML = "Read more"; 
                              moreText.style.display = "none";
                            } else {
                              dots.style.display = "none";
                              btnText.innerHTML = "Read less"; 
                              moreText.style.display = "inline";
                            }
                          }
                          </script>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade accordion-item" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                      <h2 class="accordion-header d-lg-none" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Promo
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse d-lg-block" aria-labelledby="headingTwo" data-bs-parent="#myTabContent">
                        <div class="accordion-body">
                          <div class="accordion-body">
                            <table class="table table-striped mb-5">
                            <thead>
                              <tr>
                                <th scope="col">Description</th>
                                <th scope="col">Type</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Transaction Date</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if(isset($customer->promo) && $customer->promo->count() > 0)
                                @foreach($customer->promo as $key=>$val)
                                  <tr>
                                    <th scope="row">{{$val->title}}</th>
                                    <td>+{{$val->order_amount}}</td>
                                    <td>{{$promo_amount}}</td>
                                    <td>{{$val->created_at}}</td>
                                  </tr>
                                @endforeach
                              @endif
                              </tbody>
                            </table>
                            {{--
                            <div class="more_view">
                              <a href="#">View More</a>
                            </div>
                            <div class="transaction_Logs">
                              <h1>Transaction Logs</h1>
                              <div class="promotion">
                                <h1>promotion <span>12 May 2023</span></h1>
                                <p>credited to mycoin <span>+200</span></p>
                              </div>
                              <div class="promotion">
                                <h1>promotion <span>12 May 2023</span></h1>
                                <p>credited to mycoin <span>+200</span></p>
                              </div>
                              <div class="promotion">
                                <h1>promotion <span>12 May 2023</span></h1>
                                <p>credited to mycoin <span>+200</span></p>
                              </div>
                            </div>
                            <div class="more_view more_view1">
                              <a href="#">View More</a>
                            </div> --}}
                            <div class="general">
                              <h1>General Term & Conditions <span><button onclick="myFunction()" id="myBtn">Read more</button></span></h1>
                              <p>1. This document is an electronic record in terms of Information Technology Act, 2000 and rules there under as applicable and the amended provisions pertaining to electronic records in various statutes as amended by the Information Technology Act, 2000. This electronic record is generated by a computer system and does not require any physical or digital signatures.</p>
                              <p>2. This document is published in accordance with the provisions of Rule 3 (1) of the Information Technology (Intermediaries guidelines) Rules, 2011 that require publishing the rules and regulations, privacy policy and Terms of Use for access or usage of careers.myntra.com, life.myntra.com & blog.myntra.com website.</p>
                              
                              <p><span id="dots"></span><span id="more">3. erisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.<br>
                                4. The use of any product, service or feature (the “Materials”) available through careers.myntra.com, life.myntra.com & blog.myntra.com (hereinafter referred to as “Website”) is owned by Myntra Designs Private Limited, a company incorporated under the Companies Act, 1956 with its registered office at 3rd floor, AKR Tech Park, 7th Mile, Krishna Reddy Industrial Area, Kudlu Gate, Bangalore-560068, Karnataka, India (hereinafter referred to as “Myntra”).<br>
                                5. For the purpose of these Terms of Use, wherever the context so requires “You” or “User” shall mean any natural or legal person who visits or uses the Website. Myntra allows the User to surf the Website without registering on the Website. The term “We”, “Us”, “Our” shall mean Myntra Designs Private Limited.</span></p>
                            <script>
                            function myFunction() {
                              var dots = document.getElementById("dots");
                              var moreText = document.getElementById("more");
                              var btnText = document.getElementById("myBtn");
  
                              if (dots.style.display === "none") {
                                dots.style.display = "inline";
                                btnText.innerHTML = "Read more"; 
                                moreText.style.display = "none";
                              } else {
                                dots.style.display = "none";
                                btnText.innerHTML = "Read less"; 
                                moreText.style.display = "inline";
                              }
                            }
                            </script>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="wedding_service">
                  <div class="service_date">
                    <h3>Wedding Service</h3>
                    <h2>Transaction ID: <span>21512 1541451</span></h2>
                    <h2>Date :  <span>25 May 2023</span> <span class="invoice">Download Invoice <img src="{{asset('front/images/download-pdf 1.png')}}" alt=""></span></h2>
                  </div>
                  <div class="service_date">
                    <h3>Wedding Service</h3>
                    <h2>Transaction ID: <span>21512 1541451</span></h2>
                    <h2>Date :  <span>25 May 2023</span> <span class="invoice">Download Invoice <img src="{{asset('front/images/download-pdf 1.png')}}" alt=""></span></h2>
                  </div>
                  <div class="service_date">
                    <h3>Wedding Service</h3>
                    <h2>Transaction ID: <span>21512 1541451</span></h2>
                    <h2>Date :  <span>25 May 2023</span> <span class="invoice">Download Invoice <img src="{{asset('front/images/download-pdf 1.png')}}" alt=""></span></h2>
                  </div>
                  <div class="service_date">
                    <h3>Wedding Service</h3>
                    <h2>Transaction ID: <span>21512 1541451</span></h2>
                    <h2>Date :  <span>25 May 2023</span> <span class="invoice">Download Invoice <img src="{{asset('front/images/download-pdf 1.png')}}" alt=""></span></h2>
                  </div>
                </div>
              </div>
              {{-- <div class="tab-pane fade" id="v-pills-settings1" role="tabpanel" aria-labelledby="v-pills-settings-tab1"><h1>My wishlist</h1></div> --}}
            </div>
          </div>
        </div>
    </div>
</section>
<!-- Dashboard End -->

  <!-- counter -->
  <section class="beer bg-dark" style="visibility: visible; animation-name: fadeIn;">
    <div class="container-fluid">
        <div class="row">
            <!-- counter -->
            <div class="col-6 col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="300ms" style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;">
                <!-- <i class="fa fa-beer medium-icon"></i> -->
                <img src="{{asset('front/images/search.png')}}" alt="">
                <span id="anim-number-pizza" class="counter-number"></span>
                <span class="timer counter alt-font appear" data-to="980" data-speed="7000">2800</span>
                <p class="counter-title">Main Text 01</p>
            </div>
            <!-- end counter -->
            <!-- counter -->
            <div class="col-6 col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="600ms" style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;">
                <!-- <i class="fa fa-heart medium-icon"></i> -->
                <img src="{{asset('front/images/check.png')}}" alt="">
                <span id="anim-number-pizza" class="counter-number"></span>
                <span class="timer counter alt-font appear" data-to="980" data-speed="7000">980</span>
                <p class="counter-title">Main Text 02</p>
            </div>
            <!-- end counter -->
            <!-- counter -->
            <div class="col-6 col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated dell" data-wow-duration="900ms" style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp;">
                <!-- <i class="fa fa-anchor medium-icon"></i> -->
                <img src="{{asset('front/images/rose.png')}}" alt="">
                <span id="anim-number-pizza" class="counter-number"></span>
                <span class="timer counter alt-font appear" data-to="980" data-speed="7000">810</span>
                <p class="counter-title">Main Text 03</p>
            </div>
            <!-- end counter -->
            <!-- counter -->
            <div class="col-6 col-md-3 col-sm-6 text-center counter-section wow fadeInUp animated dell" data-wow-duration="1200ms" style="visibility: visible; animation-duration: 1200ms; animation-name: fadeInUp;">
                <!-- <i class="fa fa-user medium-icon"></i> -->
                <img src="{{asset('front/images/check.png')}}" alt="">
                <span id="anim-number-pizza" class="counter-number"></span>
                <span class="timer counter alt-font appear" data-to="980" data-speed="7000">600</span>
                <p class="counter-title">Main Text 04</p>
            </div>
            <!-- end counter -->
        </div>
    </div>
  </section>
  
<!-- gradient -->
<!-- <section class="gradient">
  <div class="container-fluid">
    <div class="footer-top">
      <a href="#">home <span>|</span></a>
      <a href="#">About us <span>|</span></a>
      <a href="#">Portfolio <span>|</span></a>
      <a href="#">Travel Planning <span>|</span></a>
      <a href="#">Event Planning <span>|</span></a>
      <a href="#">Video <span>|</span></a>
      <a href="#">Inspirational Blogs <span>|</span></a>
      <a href="#">Contact <span>|</span></a>
      <a href="#">home <span>|</span></a>
      <a href="#">About us <span>|</span></a>
      <a href="#">Portfolio <span>|</span></a>
      <a href="#">Travel Planning <span>|</span></a>
      <a href="#">Event Planning <span>|</span></a>
      <a href="#">Video <span>|</span></a>
      <a href="#">Inspirational Blogs <span>|</span></a>
      <a href="#">Contact <span>|</span></a>
      <a href="#">home <span>|</span></a>
      <a href="#">About us <span>|</span></a>
      <a href="#">Portfolio <span>|</span></a>
      <a href="#">Travel Planning <span>|</span></a>
      <a href="#">Event Planning <span>|</span></a>
      <a href="#">Video <span>|</span></a>
      <a href="#">Inspirational Blogs <span>|</span></a>
      <a href="#">Contact <span>|</span></a>
      <a href="#">home <span>|</span></a>
      <a href="#">About us <span>|</span></a>
      <a href="#">Portfolio <span>|</span></a>
      <a href="#">Travel Planning <span>|</span></a>
      <a href="#">Event Planning <span>|</span></a>
      </div>
  </div>
</section> -->
@endsection

@section('inlinejs')

  <script>
    $(function () {
           $('#submitForm').submit(function(){
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
                        
                        successMsg('Create Banner', data.msg);
                        $('#submitForm')[0].reset();
                        setTimeout(function() {
                          // alert(data.url);
                          window.location.href = "{{route('customer.dashboard',base64_encode($customer->user_id))}}";
                                }, 1000);
                        
                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create Banner', data.msg);
                    }
                    buttonLoading('reset', $this);
                },
                error: function() {
                    errorMsg('Create Banner', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }
            });
            return false;
           });
           
        });
  </script>

@stop   