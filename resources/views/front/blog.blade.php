@extends('front.layouts.app')
@section('inlinecss')
<style>
    .blog-img p {
   overflow: hidden;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
           line-clamp: 2; 
   -webkit-box-orient: vertical;
}

    .blog-img h2 {
   overflow: hidden;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
           line-clamp: 2; 
   -webkit-box-orient: vertical;
}

.mode span {
   overflow: hidden;
   margin-bottom:0px;
   font-weight: 600;
   display: -webkit-box;
   -webkit-line-clamp: 1; /* number of lines to show */
           line-clamp: 2; 
   -webkit-box-orient: vertical;
}

.may_img p {
   overflow: hidden;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
           line-clamp: 2; 
   -webkit-box-orient: vertical;
}
  .may_img span {
   overflow: hidden;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
           line-clamp: 2; 
   -webkit-box-orient: vertical;
}

.mode p {
   overflow: hidden;
   margin-bottom:0px;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
           line-clamp: 2; 
   -webkit-box-orient: vertical;
}

</style>

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
{{--
<!-- Slider -->
<section class="slider">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('front/images/banner2.png')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{asset('front/images/banner2.png')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{asset('front/images/banner2.png')}}" class="d-block w-100" alt="...">
      </div>
    </div>
  </div>
</section>
--}}
{{-- @if(isset($important_blog) && count($important_blog) > 0)
<div class="more_blog">
  <div class="blog-all">
   <p>Blog's</p>
    <hr>
  </div>  
  <div class="container">
    <div class="row">
      @foreach($important_blog as $key=>$val)
      @if($key == 0)

        <div class="col-md-7 col-sm-7 col-xs-12">
          <div class="more-blogs-img">
            <a href="{{route('videodetail',base64_encode($val->id))}}" style="text-decoration:none; color:#000000;">
            <img src="{{asset($val->image_video_url)}}" alt="">
            <div class="mode">
              <span class="mb-2">{{$val->title}}</span>
             <p>{!!$val->short_description!!}</p>
            </div>
            </a>
          </div>
        </div>
        @endif
        @endforeach
        <div class="col-md-5 col-sm-5 col-xs-12">
          <div class="row">
            @foreach($important_blog as $key=>$val)
              @if($key < 4)
                @if($key != 0)
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <a href="{{route('videodetail',base64_encode($val->id))}}" style="text-decoration:none; color:#000000;">
                  <div class="more-blogs row">
                    <div class="more-blogs1 col-md-4" style="padding:0;">
                      <img src="{{asset($val->image_video_url)}}" alt="">
                    </div>
                    <div class="may_img col-md-8">
                       <!-- <h5>May 25, 2023  |  10:00 AM IST</h5>  -->
                      <span>{{$val->title}}</span>
                      <p>{!!$val->short_description!!}</p>
                    </div>
                  </div>
                </a>
                </div>
                @endif
              @endif
            @endforeach
          </div>
        </div>
    </div>
  </div>
</div> 
@endif --}}


<!--More blog -->
<section class="blog all_for">
  <div class="container">
    <div class="col-md-12 col-sm-6 col-xs-12">
      <div class="more-blogs-all">
        <p>Blog's </p>
        <hr>
      </div>
      <div class="row">
      @php
        $i = 0;
        $j = 0;
      @endphp
      @foreach($blog as $key=>$val)

      @php
        if($i == 5 && $j == 0 || $i == 10)
        {
          $class = "col-md-6 mb-3";
          $i = 0;
          $j = 1;
        }
        else{
          $class = "col-md-3 mb-3";
          $i++;
        }
      @endphp
        
        <div class="{{$class}}">
        <a href="{{route('blog_details', $val->slug)}}" style="text-decoration: none;">
          <div class="blog-img">
          @if($val->type == "image" || $val->type == "")  
            <img src="{{asset($val->image_video_url) }}" alt="">
        @else
       
        <iframe width="300" height="250" src="{{$val->image_video_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        
        @endif
            <p>{{($val->short_description)}}</p>     
            <div class="row">
              <div class="col-md-6" style="padding: 0px 0px 8px 24px;">{{$val->blog_category->category_name}}</div>
              <div class="col-md-6" style="display: flex;padding: 0px 24px 8px 0px;justify-content: end;">{{ \Carbon\Carbon::parse($val->created_at)->format('d-M') }}</div>
            </div>
          </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
    <div class="all_see">
      <a href="#">See all</a>
    </div>
  </div>
</section>

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
            <!-- end counter -->
        </div>
    </div>
</section>
 
@endsection

<!-- footer -->

