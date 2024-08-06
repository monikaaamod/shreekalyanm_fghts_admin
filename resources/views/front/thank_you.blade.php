
<html>
    <link rel="stylesheet" href="{{asset('/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/media/media.css')}}">
<style>
  html {
  height: 100%;
}
.body12 {
  background: #fff;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 70%;
  font-family:'Helvetica', sans-serif;
  font-size:16px;
}

.top-header{
    z-index: 5;
    position: relative;
}

h1 {
    font-size: 1.8rem; 
}

#particles-js {
    position: absolute;
    height: 100vh;
    z-index: 1;
    width: 100%;
}
.thank-you-container {
    margin: 0 auto;
    max-width: 638px;
    padding: 0 4em;
    z-index: 2;
}
.thank-you-box {
    background: #fd6db247;
    color: #000;
    padding: 1em 0.5em;
    border-radius: 5px;
    text-align: center;
}
.return-black {
   margin: 20px 0;
   text-align: center;
   width: 100%;
   float: left;
  color: black;
}
</style>
  <body>

  <header class="top-header">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-xl">
        <!-- Logo -->
        <a class="navbar-brand logo" href="#">
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
          @if(!auth()->user() || isset(auth()->user()->type) && auth()->user()->type !="customer" && !Session::has('vendor'))
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

          <section class="menu_one">
            <div class="container">
              <div class="menu-bar">
                <ul>
                <li @if(Route::currentRouteName() == 'index') class="active" @endif><a href="{{route('index')}}"> Home</a></li>
                <li @if(Route::currentRouteName() == 'comingsoon') class="active" @endif><a href="{{route('comingsoon')}}"> Travel Planning</a></li>
                <li @if(Route::currentRouteName() == 'comingsoon') class="active" @endif><a href="{{route('comingsoon')}}"> Event Planning</a></li>
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
<section class="body12">
  <div id="particles-js"></div>
<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

<div class="thank-you-container">
<div class="thank-you-box">
  <h1>Thank you!</h1>
  <p class="lead">For Your Enquiry</p>
  <p>Your Enquiry has been submitted successfully. We will contact you shortly.</p>
  {{-- <p class="signature">♥️ Allison Skinner</p> --}}
  <p><img src="{{asset('front/images/logo.png')}}" style="width: 30%;" alt="ShreeKalyanam" srcset=""></p>
</div>
{{-- <a class="return-black" href="#">Return to Website</a> --}}
</div>
</section>

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
                {{-- <a href="{{route('checkout')}}">Checkout |</a>
                <a href="{{route('choosecity')}}">Choosecity |</a>
                <a href="{{route('weddingvendors')}}">Wedding vendors |</a> --}}
                {{--<a href="{{route('dashboard')}}">Dashboard |</a>--}}
                {{-- <a href="{{route('choosecity')}}">Choosecity |</a> 
                <a href="{{route('vendor_dashboard_table')}}">Choosecity |</a>
                <a href="{{route('vendor_gallery')}}">Choosecity |</a> --}}
                <a href="#">Portfolio |</a>
                {{-- <a href="#">Contact |</a> --}}
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
            <p><img src="{{asset('front/images/phone.png')}}" alt=""> +91- 99999 99999, +91- 88888 88888 <span> <img src="{{asset('front/images/gmail.png')}}" alt=""> info@shreekalyanam@gmail.com</span></p>
            <p><img src="images/location.png" alt="">  P2, Awadh Puri, Opposite Ram Mandir, Lalkothi, Jaipur, Rajasthan, 302001</p>
          </div>
          <div class="gmails1">
            <p><img src="{{asset('front/images/phone.png')}}" alt=""> +91- 99999 99999, +91- 88888 88888</p>
            <p><img src="{{asset('front/images/gmail.pn')}}g" alt=""> info@shreekalyanam@gmail.com</p>
            <p><img src="{{asset('front/images/location.png')}}" alt=""> P2, Awadh Puri, Opposite Ram Mandir, <span>Lalkothi, Jaipur, Rajasthan, 302001</span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
</body>
  <html>


  <script>
    particlesJS('particles-js',

{
  "particles": {
    "number": {
      "value": 100,
      "density": {
        "enable": true,
        "value_area": 1299.3805191013182
      }
    },
    "color": {
      "value": ["#5D47BA","#FFDBFF","#FB5435","#E00A30","#04CEF9", "#EE902C","#000"]
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 1,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 20,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": false,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 6,
      "direction": "top",
      "random": false,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "repulse"
      },
      "onclick": {
        "enable": true,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
}

);
  </script>