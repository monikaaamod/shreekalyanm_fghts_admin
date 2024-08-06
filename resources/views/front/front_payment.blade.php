<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('admin/css/snackbar.css')}}">
  <title>S K Vendor Registration Detail</title>
  <!-- CSS Link -->
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
  <!-- <link rel="stylesheet" href="{{asset('front/css/style1.css')}}"> -->
  <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
  <style>
    .showinvalid{
      display:block !important;
    }

    .amount{
      align-self: center;
      position: relative;
      left: 630px;
      color: #e93e78c4;
      font-size: 30px;
    }

    .promo {
    border: 1px solid #E1E1E1;
    border-radius: 5px;
    height: 100px;
    padding: 10px;
    background-color: #E1E1E1;
}
  </style>
</head>
<body>
  <header class="top-header bg-dark">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark px-0 py-3">
        <div class="container-xl">
          <a class="navbar-brand logo d-flex" href="#">
          <a href="{{$social_id->youtube}}"><img src="{{asset('front/images/subscribe.png')}}" class="h-8" alt="..."></a>
          @php
            $social_id = socialId();
          @endphp
          <div class="img-icon"> 
          <a href="{{$social_id->facebook}}"><img src="{{asset($social_id->facebook_icon)}}" alt=""></a>
          <a href="{{$social_id->insta}}"><img src="{{asset($social_id->instagram_icon)}}" alt=""></a>
          <a href="{{$social_id->twitter}}"><img src="{{asset($social_id->twitter_icon)}}" alt=""></a>
          <a href="{{$social_id->youtube}}"><img src="{{asset($social_id->youtube_icon)}}" alt=""></a>
          </div>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-lg-auto">
              <a href="{{route('index')}}"><img src="{{asset('front/images/logo.png')}}" alt=""></a>
            </div>
            <div class="navbar-nav ms-lg-4 links button">
              <a class="nav-item nav-link text-white" href="#" style="display: flex;align-items: center;justify-content: center;">Start selling</a>
              <a class="nav-item nav-link text-white login" href="#" style="display: flex;align-items: center;justify-content: center;">Login</a>
            </div>
            <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!-- Slider -->
  <section class="slider">
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
  </section>

  <!-- "Secure your place by submitting
  one-time registration payment." -->
  <section class="Secure">
    <form action="{{ route('vendor.cashfree',base64_encode($id)) }}" id="paymentForm">
      @csrf
      <div class="container">
          <div class="place">
              <h1 class="p-3 d-flex">Secure your place by submitting<br> one-time registration payment. <span class="amount">₹{{$registration_fee->amount}}</span></h1>
          </div> 
          
          <div class="delivery">
              <p>Select Payment Mode</p>
          </div> 
          <div class="payment_card">
              <div class="form-check">
                  <div class="fault d-flex">
                    <label class="form-check-label" for="payment_method">
                        <img src="{{asset('front/images/cashfree.png')}}" style="width: 90px; margin-top: -12px;" alt="">
                        Cashfree Payments
                      </label>
                      <input class="" type="radio" style="margin-left: 0px;align-self: center;position: relative;left: 775px;" name="payment_method" required id="payment_method">
                  </div>
                  <div id="payment-method" class="invalid-feedback">The Payment Method field is required</div> 
              </div>
              {{-- <div class="form-check">
                  <div class="fault">
                      <img src="{{asset('front/images/logos_paypal.png')}}" alt="" style="margin-top: 12px;">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                      <label class="form-check-label" for="flexRadioDefault2" style="margin-top: -30px;">
                          PayPal
                      </label>
                  </div>
              </div>
              <div class="form-check">
                  <div class="fault">
                      <img src="{{asset('front/images/google-logo.png')}}" alt="" style="margin-top: 12px;">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                      <label class="form-check-label" for="flexRadioDefault3" style="margin-top: -30px;">
                          Google Pay
                      </label>
                  </div>
              </div>
              <div class="form-check">
                  <div class="fault">
                      <img src="{{asset('front/images/qr-code.png')}}" alt="" style="margin-top: 12px;">
                      <input class="form-check-input" type="radio" name="payment_method" value="" id="flexRadioDefault4">
                      <label class="form-check-label" for="flexRadioDefault4" style="margin-top: -30px;">
                          UPI
                      </label>
                  </div>
              </div> --}}
              <div class="form-check" style="margin-top:2rem;">
                <div class="promo">
                  <div class="row">
                    <div class="col-md-6">
                      <label class="form-check-label" for="flexRadioDefault4" style="margin-top: -30px;">
                          Do You Have Promo Code?
                      </label>
                        <input class="form-control" style="width: 75%;height: 50px;" type="text" name="payment_method" value="" id="flexRadioDefault4">
                    </div>
                    <div class="col-md-6">
                      <button class="btn btn-lg mt-4" type="submit" id="paymentButton" style="background-color: #ff6599d1; color:#FFFFFF;"> Apply</button>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div style="display: flex;justify-content: center;">
            <button class="btn btn-lg mt-5" type="submit" id="paymentButton" style="background-color: #ff6599d1; color:#FFFFFF;"> Make Payment</button>
          </div>
    </form>
  </section>

  <section class="beer bg-dark" style="visibility: visible; animation-name: fadeIn; margin-top: 100px;">
    <div class="container">
      <div class="row">
        <!-- counter -->
        <div
          class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated"
          data-wow-duration="300ms" style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;">
          <!-- <i class="fa fa-beer medium-icon"></i> -->
          <img src="{{asset('front/images/search.png')}}" alt="">
          <span id="anim-number-pizza" class="counter-number"></span>
          <span class="timer counter alt-font appear" data-to="980" data-speed="7000">2800</span>
          <p class="counter-title">Ordered</p>
        </div>
        <!-- end counter -->
        <!-- counter -->
        <div
          class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated"
          data-wow-duration="600ms" style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;">
          <!-- <i class="fa fa-heart medium-icon"></i> -->
          <img src="{{asset('front/images/check.png')}}" alt="">
          <span class="timer counter alt-font appear" data-to="980" data-speed="7000">980</span>
          <span class="counter-title">Happy Clients</span>
        </div>
        <!-- end counter -->
        <!-- counter -->
        <div
          class="col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated"
          data-wow-duration="900ms" style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp;">
          <!-- <i class="fa fa-anchor medium-icon"></i> -->
          <img src="{{asset('front/images/rose.png')}}" alt="">
          <span class="timer counter alt-font appear" data-to="810" data-speed="7000">810</span>
          <span class="counter-title">Projects Completed</span>
        </div>
        <!-- end counter -->
        <!-- counter -->
        <div class="col-md-3 col-sm-6 text-center counter-section wow fadeInUp animated" data-wow-duration="1200ms"
          style="visibility: visible; animation-duration: 1200ms; animation-name: fadeInUp;">
          <!-- <i class="fa fa-user medium-icon"></i> -->
          <img src="{{asset('front/images/check.png')}}" alt="">
          <span class="timer counter alt-font appear" data-to="600" data-speed="7000">600</span>
          <span class="counter-title">Clients Served</span>
        </div>
        <!-- end counter -->
      </div>
    </div>
  </section>

  <!-- footer -->
<footer class="footer">
  <div class="container-fluid">
    <div class="footer-footer">
      <div class="shree1">
        <a href="{{route('index')}}"><img src="{{asset('front/images/logo.png')}}" alt=""></a>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="footer-links">
            <ul>
              <li>
              <a href="{{route('index')}}">Home |</a>
                <a href="{{route('aboutus')}}">About Us |</a>
                <a href="{{route('video')}}">Video |</a>
                <a href="{{route('blog')}}">Inspirational Blogs |</a>
                <a href="{{route('comingsoon')}}">Travel Planning |</a>
                <a href="{{route('comingsoon')}}">Event Planning |</a>
                <a href="{{route('checkout')}}">Checkout |</a>
                <a href="{{route('choosecity')}}">Choosecity |</a>
                <a href="{{route('weddingvendors')}}">Wedding vendors |</a>
               {{-- <a href="{{route('dashboard')}}">Dashboard |</a> --}}
                <a href="#">Portfolio |</a>
                <a href="#">Contact |</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2">
          <div class="shree">
            <a href="{{route('index')}}"><img src="{{asset('front/images/logo.png')}}" alt=""></a>
          </div>
        </div>
        <div class="col-md-5">
          <div class="gmails">
            <p><img src="{{asset('front/images/phone.png')}}" alt=""> +91- 99999 99999, +91- 88888 88888 <span> <img src="images/gmail.png" alt=""> info@shreekalyanam@gmail.com</span></p>
            <p><img src="{{asset('front/images/location.png')}}" alt="">  P2, Awadh Puri, Opposite Ram Mandir, Lalkothi, Jaipur, Rajasthan, 302001</p>
          </div>
          <div class="gmails1">
            <p><img src="{{asset('front/images/phone.png')}}" alt=""> +91- 99999 99999, +91- 88888 88888</p>
            <p><img src="{{asset('front/images/gmail.png')}}" alt=""> info@shreekalyanam@gmail.com</p>
            <p><img src="{{asset('front/images/location.png')}}" alt=""> P2, Awadh Puri, Opposite Ram Mandir, <span>Lalkothi, Jaipur, Rajasthan, 302001</span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- footer-bottom -->
<section class="footer-bottom">
  <div class="copyright">
    <marquee behavior="alternate" direction="left">
      <p>2023 - All Right Reserved. | Shreekalyam</p>
    </marquee>
  </div>
  <div class="copyright1">
    <p>2023 - All Right Reserved. | Shreekalyam</p>
  </div>
</section>

  <!-- JS Link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="{{asset('front/js/script.js')}}"></script>
  <script src="{{asset('admin/js/snackbar.js')}}" charset="utf-8"></script>
  <script src="{{asset('front/js/counter.js')}}"></script>
  <script src="{{asset('front/js/app.js')}}" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
</body>
</html>



    
