@extends('front.layouts.app')
@section('inlinecss')

@section('container')
<!-- menu -->

<section class="menu">
  <div class="container">
    <div class="menu-bar">
      <ul>
      <li class="active"><a href="{{route('index')}}"> Home</a></li>
      <li><a href="{{route('video')}}"> Video</a></li>
      <li><a href="{{route('blog')}}"> Inspirational Blogs</a></li>
      <li><a href="{{route('comingsoon')}}"> Travel Planning</a></li>
      <li><a href="{{route('comingsoon')}}"> Event Planning</a></li>
      {{-- <li><a href="{{route('dashboard')}}"> Profile</a></li> --}}
      </ul>
    </div>
  </div>
</section>


<!-- Cheackout Start -->
<section class="Cheackout">
    <div class="container">
        <div class="row">
            <div class="kout">
                <h1>Cheackout</h1>
                <hr>
            </div>
            <div class="col-md-6">
                <!-- Delivery address -->
                <div class="delivery">
                    <p>Delivery address</p>
                </div>
                <div class="home_office">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="home_name">
                                <h2>home</h2>
                                <div class="home_text">
                                    <h1>Name: Surya Kant Balawar</h1>
                                    <p>Email Id: Suryabalawar@yahoo.com</p>
                                    <p>Delivery Address:</p>
                                    <p>Main Market, Near C Scheme, Jaipur- 302001 </p>
                                    <img src="{{asset('front/images/mobile-check.png')}}" alt="">
                                    <div class="edit_delete">
                                        <a href="#">edit</a>
                                        <a href="#">delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="home_name">
                                <h2>Office</h2>
                                <div class="home_text">
                                    <h1>Name: Surya Kant Balawar</h1>
                                    <p>Email Id: Suryabalawar@yahoo.com</p>
                                    <p>Delivery Address:</p>
                                    <p>Main Market, Near C Scheme, Jaipur- 302001 </p>
                                    <img src="{{asset('front/images/mobile-check.png')}}" alt="">
                                    <div class="edit_delete">
                                        <a href="#">edit</a>
                                        <a href="#">delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="delivery">
                    <p>Select payment Mode</p>
                </div>
                <div class="payment_card">
                    <div class="form-check">
                        <div class="fault">
                            <img src="{{asset('front/images/visa-logo.png')}}" alt="">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Credit Card
                            </label>
                        </div>
                      </div>
                      <div class="form-check">
                        <div class="fault">
                            <img src="{{asset('front/images/logos_paypal.png')}}" alt="">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                PayPal
                            </label>
                        </div>
                      </div>
                      <div class="form-check">
                        <div class="fault">
                            <img src="{{asset('front/images/google-logo.png')}}" alt="">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                            <label class="form-check-label" for="flexRadioDefault3">
                                Google Pay
                            </label>
                        </div>
                      </div>
                      <div class="form-check">
                        <div class="fault">
                            <img src="{{asset('front/images/qr-code.png')}}" alt="">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                            <label class="form-check-label" for="flexRadioDefault4">
                                UPI
                            </label>
                        </div>
                      </div>
                </div>
                <!-- Do you have a promo code ? -->
                <div class="promo_code">
                    <form>
                        <label for="exampleInputName1" class="form-label">Do you have a promo code ?</label>
                        <input type="text" class="form-control" id="exampleInputName1">
                        <button type="submit" class="btn">Submit</button>
                      </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="delivery">
                    <p>Order Summery</p>
                </div>
                <div class="service_box">
                    <div class="service_name">
                        <h1>Service Name 1 <span>Rs. 1500</span></h1>
                        <p>Rs. 1500 X 1</p>
                    </div>
                    <div class="service_name">
                        <h1>Service Name 1 <span>Rs. 1500</span></h1>
                        <p>Rs. 1500 X 1</p>
                    </div>
                </div>
                <div class="service_item">
                    <div class="item_total">
                        <h1>Service Name 1 <span>Rs. 1500</span></h1>
                        <p>Charge 1 <span>Rs. 50</span></p>
                        <p>Charge 2 <span>Rs. 450</span></p>
                        <p>Discount (Coupon Code) <span>Rs. -500</span></p>
                        <p>Add on Service charge <span>Rs. 4500</span></p>
                    </div>
                </div>
                <!-- Book Now -->
                <div class="book_now">
                    <button type="submit" class="btn"><a href="#">Book Now</a></button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Cheackout End -->

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

<!-- footer -->
