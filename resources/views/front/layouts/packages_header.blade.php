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
  <!-- MDB -->
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('admin/css/snackbar.css') }}">

  <!-- flights search -->
  
  		<!-- Favicon -->
      <link rel="icon" href="{{ asset('front/assets/images/favicon.png')}}" sizes="16x16">
		<!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/bootstrap.min.css')}}" />
		<!-- icon -->
		<link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/fontawsome.min.css')}}" />
		<!-- Owl-Slider -->
		<link rel="stylesheet" href="{{ asset('front/assets/css/owl.carousel.min.css')}}" />
		<link rel="stylesheet" href="{{ asset('front/assets/css/owl.theme.default.min.css')}}" />
		<!--  Fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"rel="stylesheet">
		<!--  My_Styles -->
		<link rel="stylesheet"type="text/css" href="{{ asset('front/assets/css/style.css')}}" />
		<link rel="stylesheet"type="text/css" href="{{ asset('front/assets/css/responsive.css')}}" />

  <title>
    @yield('title')
  </title>
  <!-- CSS Link -->
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <!-- <link rel="stylesheet" href="{{asset('front/css/packages.css')}}"> -->
  <link rel="stylesheet" href="{{asset('front/css/custom.css')}}">

  @yield('inlinecss')

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
            <a href="{{$social_id->facebook}}"><img src="{{web_url().'/'.$social_id->facebook_icon}}" alt=""></a>
            <a href="{{$social_id->insta}}"><img src="{{web_url().'/'.$social_id->instagram_icon}}" alt=""></a>
            <a href="{{$social_id->twitter}}"><img src="{{web_url().'/'.$social_id->twitter_icon}}" alt=""></a>
            <a href="{{$social_id->youtube}}"><img src="{{web_url().'/'.$social_id->youtube_icon}}" alt=""></a>
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
                <a class="nav-item nav-link text-white" href="">Login <span>|</span></a>
                <a class="nav-item nav-link text-white" href="">Signup <span>|</span></a>
                <a class="nav-item nav-link text-warning" href="">Are you a vender?</a>
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
      <nav class="navbar navbar-expand-lg p-0">
        <div class="container-fluid p-0">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('index')}}">Home</a>
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

  @yield('container')


<!-- <div class="bottom-wrap" style="background-image: url(images/bottom-banner.png);">
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
  </div> -->
  
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

<!-- footer -->
<footer class="footer">
  <div class="container-fluid">
    <div class="footer-footer">
      <!-- <div class="shree1">
        <a href="index.html"><img src="{{asset('front/images/logo.png')}}" alt=""></a>
      </div> -->
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="{{asset('admin/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="{{asset('front/js/counter.js')}}"></script>
<script src="{{asset('front/js/app.js')}}" defer></script>
<script src="{{ asset('admin/js/snackbar.js') }}" charset="utf-8"></script>
<script type="text/javascript" src="{{asset('front/assets/js/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('front/assets/js/script.js')}}"></script>
<script>
  $(".multi").select2();

    function buttonLoading(processType, ele) {
        if (processType == 'loading') {
            ele.html(ele.attr('data-loading-text'));
            ele.attr('disabled', true);
        } else {
            ele.html(ele.attr('data-rest-text'));
            ele.attr('disabled', false);
        }
    }

    function successMsg(heading, message, html = "") {

        Snackbar.show({
            text: message,
            backgroundColor: '#232323',
            width: '475px',
            pos: 'bottom-right'
        });

    }

    function errorMsg(heading, message) {
        Snackbar.show({
            text: message,
            backgroundColor: '#930000',
            width: '475px',
            pos: 'bottom-right'
        });
    }
</script>

@yield('scriptjs')
</body>
</html>
