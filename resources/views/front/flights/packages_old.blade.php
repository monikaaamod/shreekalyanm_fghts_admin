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
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Packages</title>
  <!-- CSS Link -->
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <link rel="stylesheet" href="{{asset('front/css/packages.css')}}">
  <link rel="stylesheet" href="{{asset('front/css/custom.css')}}">


</head>
<body>
<header class="top-header">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-xl">

      @php
          $social_id = socialId();
      @endphp
        <!-- Logo -->
        <a class="navbar-brand logo" href="#">
          <a href="{{$social_id->youtube}}"><img src="{{asset('front/images/subscribe.png')}}" class="h-8" alt="..."></a>
          <div class="img-icon"> 
            <a href="{{$social_id->facebook}}"><img src="{{asset($social_id->facebook_icon)}}" alt=""></a>
            <a href="{{$social_id->insta}}"><img src="{{asset($social_id->instagram_icon)}}" alt=""></a>
            <a href="{{$social_id->twitter}}"><img src="{{asset($social_id->twitter_icon)}}" alt=""></a>
            <a href="{{$social_id->youtube}}"><img src="{{asset($social_id->youtube_icon)}}" alt=""></a>
          </div>
        </a>
        <!-- Navbar toggle -->
        <div class="logo_one">
          <a href="{{route('index')}}"><img src="{{asset('front/images/logo.png')}}" alt=""></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <!-- Nav -->
          <div class="navbar-nav mx-lg-auto logo_two">
            <a href="{{route('index')}}"><img src="{{asset('front/images/logo.png')}}" alt=""></a>
          </div>
          <!-- Right navigation -->
          @if(!auth()->user() || isset(auth()->user()->type) && auth()->user()->type !="customer")
            @if(!Session::has('vendor'))
              <div class="navbar-nav ms-lg-4 links">
                <a class="nav-item nav-link text-white" href="{{route('login')}}">Login <span>|</span></a>
                <a class="nav-item nav-link text-white" href="{{route('auth.register')}}">Signup <span>|</span></a>
                <a class="nav-item nav-link text-warning" href="{{route('login_page')}}">Are you a vender?</a>
                <hr>
                <div class="search-bar">
                  <input type="text">
                </div>
                <div class="search">
                  <div class="search-icon"></div>
                </div>
              </div>
            @else
              @if(auth()->user() && auth()->user()->type == "customer")
                <div class="navbar-nav ms-lg-4 links">
                  <a class="nav-item nav-link text-white" href="{{route('customer.dashboard',base64_encode(auth()->user()->id))}}">DashBoard </a>
                </div>
              @else
                @if(Session::has('vendor'))
                  <div class="navbar-nav ms-lg-4 links">
                    <a class="nav-item nav-link text-white" href="{{route('dashboard',base64_encode(Session::get('vendor_id')))}}">DashBoard </a>
                  </div>
                @endif
              @endif
            @endif
          @else
            @if(auth()->user() && auth()->user()->type == "customer")
              <div class="navbar-nav ms-lg-4 links">
                <a class="nav-item nav-link text-white" href="{{route('customer.dashboard',base64_encode(auth()->user()->id))}}">DashBoard </a>
              </div>
            @else
              @if(Session::has('vendor'))
                <div class="navbar-nav ms-lg-4 links">
                  <a class="nav-item nav-link text-white" href="{{route('dashboard',base64_encode(Session::get('vendor_id')))}}">DashBoard </a>
                </div>
              @endif
            @endif
          @endif

          <section class="menu_one">
            <div class="container">
              <div class="menu-bar">
                <ul>
                  <li @if(Route::currentRouteName() == 'index') class="active" @endif><a href="{{route('index')}}"> Home</a></li>
                  <li @if(Route::currentRouteName() == 'comingsoon') class="active" @endif><a href="{{route('comingsoon')}}" id="travel"> Travel Planning</a></li>
                  <li @if(Route::currentRouteName() == 'weddingvendors') class="active" @endif><a href="{{route('weddingvendors')}}" id="event"> Event Planning</a></li>
                  <li @if(Route::currentRouteName() == 'video') class="active" @endif><a href="{{route('video')}}"> Video</a></li>
                  <li @if(Route::currentRouteName() == 'blog') class="active" @endif><a href="{{route('blog')}}"> Inspirational Blogs</a></li>
                  {{-- <li><a href="{{route('dashboard')}}"> Event Planning</a></li> --}}
                </ul>
              </div>
            </div>
          </section>
          <!-- Action -->
            <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>

  <div class="bottom-header">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Travel Planning</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Event Planning</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Video</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Inspirational Blogs</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>

  <!-- header end  -->

  <section class="forampost">
    <div class="container">
      <div class="row">
        <form method="POST" action="" accept-charset="UTF-8" id="slider-search-form"><input name="_token" type="hidden" value="CmytnXj87TBwqVzmgsHPUGChj8TKDMyRCuJ7RzpU">
            <div class="row">
              <div class="col-sm-12 col-md-12">
                <a class="flighticon" href="#"><img class="FLIGHTS" src="{{asset('front/images/21314.png')}}">Tour plan</a>
                <h1 class="destination">International Honeymoon Destination</h1>
                <div class="slider-box2 ">
                <div class="form-group icon">
                  <label for="exampleInputEmail1" class="form-label">Form </label>
                    <input type="text" value="" name="keyword" class="form-control" placeholder="Enter City Or airport">
                  </div>
                  <a class="revasfor" href="#"><i class="fa-sharp fa-solid fa-repeat"></i>
                  </a>
                    <div class="form-group icon">
                  <label for="exampleInputEmail1" class="form-label">To</label>
                    <input type="text" value="" name="keyword" class="form-control" placeholder="Enter City Or airport">
                  </div>
                    <div class="form-group ">
                  <label for="exampleInputEmail1" class="form-label">Departure </label>
                    <input type="text" value="" name="keyword" class="form-control" placeholder="Tuesday">
                  </div>
                    <div class="form-group ">
                  <label for="exampleInputEmail1" class="form-label">Return</label>
                    <input type="text" value="" name="keyword" class="form-control" placeholder="Tuesday">
                  </div>
                    <div class="form-group ">
                  <label for="exampleInputEmail1" class="form-label">Travellers&Class</label>
                    <input type="text" value="" name="keyword" class="form-control" placeholder="Econcmy">
                  </div>
            <div class="flight-btn d-flex justify-content-end w-100">
              <button type="submit" class="primary-button "><!-- <i class="fa fa-search"></i> --> SEARCH FLIGHTS</button> 
            </div>
        </div>
        </div>
      </div>
    </form>
      </div>
    </div>
  </section>
  <section class="whitebackground">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 p-0">
                <div class="slidercrowjaldives">
                    <h1 class="packages">Popular Packages</h1>
                    <div class="owl-carousel">
                        @foreach ($packages->chunk(6) as $index => $packageChunk)
                            <div class="item">
                                <div class="row">
                                    @foreach ($packageChunk as $package)
                                        <div class="col-md-4">
                                            <div class="left-img">
                                                <img src="{{ asset($package->banner_image) }}">
                                            </div>
                                            <div class="right_cont">
                                                <div class="pack-box-tit">
                                                    <h4 class="package">{{ $package->title }}</h4>
                                                    <span class="nightday">{{$package->nights}} Nights/{{$package->days}} Days</span>
                                                </div>
                                                <div class="d-flex prc-book">
                                                    <h5><strong>&#8377;{{ $package->price }}</strong> per person*</h5>
                                                    <p><a class="booknow" href="#">Book Now</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  <section class="slaidersecnd">
    <div class="container">
      <div class="row">
        <div class="col-md-12 p-0">
          <div class="corsfadslider">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{asset('front/images/Banner.png')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('front/images/Banner2.png')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('front/images/Banner3.png')}}" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev carousel-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next carousel-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="bottom-wrap" style="background-image: url(images/bottom-banner.png);">
    <div class="container">
      <div class="row">
      <div class="col-sm-3">
        <div class="box-wrap">
          <div class="img-box">
            <img src="{{asset('front/images/search.png')}}" alt="Search">
          </div>
          <div class="box-tit">
            <h5>Main Text 01</h5>
          </div>
        </div>
      </div><div class="col-sm-3">
        <div class="box-wrap">
          <div class="img-box">
            <img src="{{asset('front/images/check.png')}}" alt="Search">
          </div>
          <div class="box-tit">
            <h5>Main Text 01</h5>
          </div>
        </div>
      </div><div class="col-sm-3">
        <div class="box-wrap">
          <div class="img-box">
            <img src="{{asset('front/images/rose.png')}}" alt="Search">
          </div>
          <div class="box-tit">
            <h5>Main Text 01</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="box-wrap">
          <div class="img-box">
            <img src="{{asset('front/images/heart.png')}}" alt="Search">
          </div>
          <div class="box-tit">
            <h5>Main Text 01</h5>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  
<!-- gradient -->
<section class="gradient">
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
</section>

<!-- footer -->
<footer class="footer">
  <div class="container-fluid">
    <div class="footer-footer">
      <div class="shree1">
        <a href="index.html"><img src="{{asset('front/images/logo.png')}}" alt=""></a>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="footer-links">
            <ul>
              <li>
                <a href="#">Home |</a>
                <a href="#">About Us |</a>
                <a href="#">Portfolio |</a>
                <a href="#">Travel Planning |</a>
                <a href="#">Event Planning |</a>
              </li>
              <li>
                <a href="#">Video |</a>
                <a href="#">Inspirational Blogs |</a>
                <a href="#">Contact |</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2">
          <div class="shree">
            <a href="index.html"><img src="{{asset('front/images/logo.png')}}" alt=""></a>
          </div>
        </div>
        <div class="col-md-5">
          <div class="gmails">
            <p><img src="{{asset('front/images/phone.png')}}" alt=""> +91- 99999 99999, +91- 88888 88888 <span> <img src="{{asset('front/images/gmail.png')}}" alt=""> info@shreekalyanam@gmail.com</span></p>
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
<script src="script.js"></script>
<script src="js/counter.js"></script>
<script src="js/app.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>


</body>
</html>

  