<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- CSS Link -->
    <link rel="stylesheet" href="{{ asset('admin/css/snackbar.css') }}">
    <link rel="stylesheet" href="{{asset('/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/media/media.css')}}">
    @yield('inlinecss')
    <title>Shree Kalyanam</title>
  </head>
  <body>
<!-- header -->
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



