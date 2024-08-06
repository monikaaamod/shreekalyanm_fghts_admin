@extends('front.layouts.app')
@section('inlinecss')
<style>
    .videos-grid-video p {
   overflow: hidden;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
           line-clamp: 2; 
   -webkit-box-orient: vertical;
}

.vid_des p {
  padding:1rem;
}



</style>
@endsection

@section('container')

<!-- menu -->
<section class="menu">
  <div class="container">
    <div class="menu-bar">
      <ul>
        <li @if(Route::currentRouteName() == 'index') class="active" @endif><a href="{{route('index')}}"> Home</a></li>
        <li @if(Route::currentRouteName() == 'comingsoon') class="active" @endif><a href="{{route('comingsoon')}}"> Travel Planning</a></li>
        <li @if(Route::currentRouteName() == 'comingsoon') class="active" @endif><a href="{{route('comingsoon')}}"> Event Planning</a></li>
        <li @if(Route::currentRouteName() == 'video') class="active" @endif><a href="{{route('video')}}"> Video</a></li>
        <li @if(Route::currentRouteName() == 'blog') class="active" @endif><a href="{{route('blog')}}"> Inspirational Blogs</a></li>
      {{-- <li><a href="{{route('dashboard')}}"> Profile</a></li> --}}
      </ul>
    </div>
  </div>
</section>

<!-- Banner Video Start -->
<section class="banner_video">
    <div class="container">
        <div class="videos-grid-video video-grid vid_des">
            <iframe width="100%" height="100%" src="{{$data->pastimage}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <h1 class="ms-3" style="position: relative;"> {{$data->title}} <span style="position: absolute;right: 10px;"><a href="#" style="color:#FD6DB2;">Share<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M352 224c53 0 96-43 96-96s-43-96-96-96s-96 43-96 96c0 4 .2 8 .7 11.9l-94.1 47C145.4 170.2 121.9 160 96 160c-53 0-96 43-96 96s43 96 96 96c25.9 0 49.4-10.2 66.6-26.9l94.1 47c-.5 3.9-.7 7.8-.7 11.9c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-25.9 0-49.4 10.2-66.6 26.9l-94.1-47c.5-3.9 .7-7.8 .7-11.9s-.2-8-.7-11.9l94.1-47C302.6 213.8 326.1 224 352 224z"/></svg></a></span></h1>
            {!!$data->description!!}
          </div>
    </div>
</section>

<!-- Banner Video End -->


<!-- More Video Section Start-->
<section class="more_video_section more_video_section1">
  <div class="container">
    <h1>More video</h1>
    <div class="row">
      @foreach($video as $key=>$row)
         <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="videos-grid-video videos-blog">
              <a href="{{route('vendor_videodetail',base64_encode($row->id))}}" style="text-decoration:none; color:blue"> <img width="100%" height="65%" src="{{$row->thumbnail}}" alt="" srcset="" >
                <!-- <iframe width="100%" height="100%" src="{{$row->video_url}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
                <p class="p-3">{{$row->title}}</p>
                <!--<p class="text-limit">{!!$row->description!!}</p>-->
              </a>
              </div>
            </div>
      @endforeach
    </div>
  </div>
</section>
<!-- More Video Section End-->

<!-- Counter -->
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
        </div>
    </div>
</section>
@endsection