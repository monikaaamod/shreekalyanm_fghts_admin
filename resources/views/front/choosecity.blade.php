@extends('front.layouts.app') 
@section('inlinecss') 
@section('container')
<!-- menu -->
<section class="menu">
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

<!-- Slider -->
<section class="slider">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="@if(isset($category)) @if($category->banner_image != ''){{asset($category->banner_image)}}@else{{asset('front/images/banner8.png')}}@endif @endif" class="d-block w-100" style="height:500px;" alt="...">
            </div>
        </div>
    </div>
</section>

<!-- choose city start -->
<section class="city-section">
    <div class="container">
        <div class="Cities_header">
            <hr/>
            <div class="see_all see_all_one">
                <p>Top Popular Cities <a id="ShowCity" style="cursor: pointer;">See all</a></p>
                <hr>
            </div>
            <nav>
                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    @foreach($city as $key=>$city)
                        <button class="nav-link zoom @if($key > 7)cities @endif" type="submit" style="border-color: white !important;" role="tab" aria-selected="true">
                            <a href="{{route('vendor',['id'=>base64_encode($city->id),'category'=>base64_encode($category->id)])}}">
                            <img src="{{asset($city->city_image)}}" alt="" /><br/>
                                <span>{{$city->city_names->city_name}}</span>
                            </a>
                        </button>
                    @endforeach
                </div>
            </nav>
            <hr/>
        </div>
    </div>
</section>
<!-- choose city end -->

<!-- counter -->
<section class="beer bg-dark" style="visibility: visible; animation-name: fadeIn;">
    <div class="container-fluid">
        <div class="row">
            <!-- counter -->
            <div
                class="col-6 col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated"
                data-wow-duration="300ms"
                style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;"
            >
                <!-- <i class="fa fa-beer medium-icon"></i> -->
                <img src="{{asset('front/images/search.png')}}" alt="" />
                <span id="anim-number-pizza" class="counter-number"></span>
                <span class="timer counter alt-font appear" data-to="980" data-speed="7000">2800</span>
                <p class="counter-title">Main Text 01</p>
            </div>
            <!-- end counter -->
            <!-- counter -->
            <div
                class="col-6 col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated"
                data-wow-duration="600ms"
                style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;"
            >
                <!-- <i class="fa fa-heart medium-icon"></i> -->
                <img src="{{asset('front/images/check.png')}}" alt="" />
                <span id="anim-number-pizza" class="counter-number"></span>
                <span class="timer counter alt-font appear" data-to="980" data-speed="7000">980</span>
                <p class="counter-title">Main Text 02</p>
            </div>
            <!-- end counter -->
            <!-- counter -->
            <div
                class="col-6 col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated dell"
                data-wow-duration="900ms"
                style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp;"
            >
                <!-- <i class="fa fa-anchor medium-icon"></i> -->
                <img src="{{asset('front/images/rose.png')}}" alt="" />
                <span id="anim-number-pizza" class="counter-number"></span>
                <span class="timer counter alt-font appear" data-to="980" data-speed="7000">810</span>
                <p class="counter-title">Main Text 03</p>
            </div>
            <!-- end counter -->
            <!-- counter -->
            <div class="col-6 col-md-3 col-sm-6 text-center counter-section wow fadeInUp animated dell" data-wow-duration="1200ms" style="visibility: visible; animation-duration: 1200ms; animation-name: fadeInUp;">
                <!-- <i class="fa fa-user medium-icon"></i> -->
                <img src="{{asset('front/images/check.png')}}" alt="" />
                <span id="anim-number-pizza" class="counter-number"></span>
                <span class="timer counter alt-font appear" data-to="980" data-speed="7000">600</span>
                <p class="counter-title">Main Text 04</p>
            </div>
            <!-- end counter -->
        </div>
    </div>
</section>

@endsection

@section('inlinejs')
<script>
    $(document).ready(function(){
        $('.cities').hide();
        $('#ShowCity').click(function () {
            if ($('.cities').is(':hidden')) {
                $('.cities').show();
            } else {
                $('.cities').hide();
            }
        }); 
    });
</script>
@stop
