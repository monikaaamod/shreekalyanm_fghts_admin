@extends('front.layouts.app')
@section('inlinecss')
<style>
h1{
    font-size: 28px;
    font-family: 'Poppins', sans-serif;
}

.owl-carousel .owl-item img {
    display: block;
    width: 50% !important;
}

.owl-carousel .owl-item {
    width: 200px !important;
}   
</style>
@endsection
@section('container')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

<!-- menu Start -->
<section class="menu menu_about">
  <div class="container">
    <div class="menu-bar">
      <ul>
      <li @if(Route::currentRouteName() == 'index') class="active" @endif><a href="{{route('index')}}"> Home</a></li>
      <li @if(Route::currentRouteName() == 'comingsoon') class="active" @endif><a href="{{route('comingsoon')}}" id="travel"> Travel Planning</a></li>
      <li @if(Route::currentRouteName() == 'weddingvendors') class="active" @endif><a href="{{route('weddingvendors')}}" id="event"> Event Planning</a></li>
      <li @if(Route::currentRouteName() == 'video') class="active" @endif><a href="{{route('video')}}"> Video</a></li>
      <li @if(Route::currentRouteName() == 'blog') class="active" @endif><a href="{{route('blog')}}"> Inspirational Blogs</a></li>
      {{-- <li><a href="{{route('dashboard')}}"> Profile</a></li> --}}
      </ul>
    </div>
  </div>
</section>
<!-- menu End -->

<!-- about_us start -->
<section class="slider">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        @foreach($about->banner as $key=>$val)
        <div class="carousel-item @if($key == 0) active @endif">
          <img src="{{asset($val->banner_images)}}" class="d-block w-100" style="height:300px;" alt="...">
        </div>
        @endforeach
      </div>
    </div>
</section>
<!-- about_us start -->

<section class="slider mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="display: flex;justify-content: center;">
                <h1>{{$about->title }}</h1>
            </div>
        </div>
        
    </div>
</section>

<!-- Our Story Start -->
<section class="story">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-5">
                    <div class="stor">
                        <h1>About Us <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ee902c}</style><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></h1>
                        <div class="mission_img">
                            <img src="{{asset($about->vision_image)}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="story_text">
                        {!! $about->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our Story End -->

<!-- Mission-Vision -->
<section class="Mission-Vision">
    <div class="container">
        <div class="Mission_page">
            <div class="Mission">
                <div class="row">
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="missin_text">
                            <h1>Mission</h1>
                            {!! $about->mission !!}
                        </div>
                        <div class="missin_text">
                            <h1>Vision</h1>
                            {!! $about->vision !!}
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                        <div class="mission_img">
                            <img src="{{asset($about->mission_image)}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="Vision">
                <div class="row">
                    <div class="col-md-7 col-sm-6 col-xs-12">
                        <div class="mission_img">
                            <img src="{{asset($about->vision_image)}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="missin_text">
                            <h1>Vision</h1>
                            {!! $about->vision !!}
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!-- Mission-Vision -->

<!-- Our Team -->
<section class="our_team">
    <div class="container">
        <hr>
        <div class="manager1">
            <div class="row">
                <div class="team_heading">
                    <h1>Our Team</h1>
                </div>
                @foreach($team as $key=>$val)
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="manager">
                        <img src="{{asset($val->image)}}" height="290px" alt="">
                        <div class="team_manager">
                            <h1>{{$val->title}}</h1>
                            <p>{{$val->post}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
        <hr>
    </div>
</section>
<!-- Our Team -->

<!-- Populer Section Strat -->
<section class="populer_section">
    <div class="container">
        <div class="team_heading artist">
            <h1>Populer section on shreekalyanam.com</h1>
        </div>
        <div class="row owl-carousel">
            @foreach($category as $key=>$val)
            <div class="box item">
                <a href="{{route('choosecity', base64_encode($val->id))}}" style="display: flex;justify-content: center;"><img src="{{asset($val->image)}}" height="120px" alt=""></a>
                <p style="display: flex;justify-content: center;">{{($val->category_name)}}</p>
            </div>
            @endforeach
           {{-- <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="manager">
                    <img src="{{asset('front/images/Weddingdecor.png')}}" alt="">
                    <div class="team_manager">
                        <h1>Wedding decor</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="manager">
                    <img src="{{asset('front/images/Photographer.png')}}" alt="">
                    <div class="team_manager">
                        <h1>Photographer</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="manager">
                    <img src="{{asset('front/images/FlowerDecor.png')}}" alt="">
                    <div class="team_manager">
                        <h1>Flower Decor</h1>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!-- Populer Section End -->

<!-- counter Start-->
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
<!-- counter End -->

@endsection

@section('inlinejs')
<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        dots:false,
        nav:true,
        autoplay:true,   
        smartSpeed: 3000, 
        autoplayTimeout:7000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    })
</script>
@stop

