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
   margin-top:10px;
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


@if(isset($important_video) && count($important_video) >= 0)
<div class="more_blog">
  <div class="blog-all">
   <p>Video's</p>
    <hr>
  </div>  
  <div class="container">
    <div class="row">
      @foreach($important_video as $key=>$val)
      @if($key == 0)

        <div class="col-md-7 col-sm-7 col-xs-12">
          <div class="more-blogs-img">
            <a href="{{route('videodetail',base64_encode($val->id))}}" style="text-decoration:none; color:#000000;">
            <img src="{{$val->video_thumbnail}}" alt="">
            <div class="mode">
              <span class="mb-5" style="font-weight: 600;">{{$val->title}}</span>
              {!!$val->description!!} 
            </div>
            </a>
          </div>
        </div>
        @endif
        @endforeach
        <div class="col-md-5 col-sm-5 col-xs-12">
          <div class="row">
            @foreach($important_video as $key=>$val)
              @if($key < 4)
                @if($key != 0)
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <a href="{{route('videodetail',base64_encode($val->id))}}" style="text-decoration:none; color:#000000;">
                  <div class="more-blogs row">
                    <div class="more-blogs1 col-md-4" style="padding:0;">
                      <img src="{{$val->video_thumbnail}}" alt="">
                    </div>
                    <div class="may_img col-md-8">
                      {{-- <h5>May 25, 2023  |  10:00 AM IST</h5> --}}
                      <span>{{$val->title}}</span>
                      {!!$val->description!!}
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
@endif




<!-- video section -->
<section class="mt-5">
  <div class="more_blog">
    <div class="blog-all">
      <p>More video's</p>
      <hr>
    </div>
    <div class="container">
      <div class="more_blog1">
        <div class="row">
          @foreach($video as $key=>$row)
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="videos-grid-video videos-blog pb-1">
              <a href="{{route('videodetail',base64_encode($row->id))}}" style="text-decoration:none; color:blue"> <img width="100%" height="65%" class="pb-2" src="{{$row->video_thumbnail}}" alt="" srcset="" >
                <!-- <iframe width="100%" height="100%" src="{{$row->video_url}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
                <p>{{$row->title}}</p>
                <!--<p class="text-limit">{!!$row->description!!}</p>-->
              </a>
              </div>
            </div>
          @endforeach
          @foreach($vendor_video as $key=>$row)
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="videos-grid-video videos-blog pb-1">
              <a href="{{route('vendor_videodetail',base64_encode($row->id))}}" style="text-decoration:none; color:blue"> <img width="100%" height="65%" class="pb-2" src="{{$row->thumbnail}}" alt="" srcset="" >
                <p>{{$row->title}}</p>
              </a>
              </div>
            </div>
          @endforeach
          {{-- <div class="col-md-6 col-sm-6 col-xs-12">
            @foreach($videolatest as $k => $v)
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="more_blogs_one">
                <div class="more-blogs1">
                  <img src="{{asset($v->video_thumbnail)}}" width="100%" height="100%" alt="">
                  <!-- <iframe width="100%" height="100%" src="https://www.youtube.com/embed/pW0_R-K_XD0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
                </div>
                <div class="may_img1">
                  <h5><b><a href="{{route('videodetail',base64_encode($row->id))}}" style="text-decoration:none; color:black">{{$v->title}}</a></b></h5>
                  <p>{{$v->description}}</p>
                </div>
              </div>
            </div>
           @endforeach
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</section>

<!-- More Video Section Start-->

{{-- <section class="more_video_section">
  <div class="container">
    <div class="row">
    @foreach($video as $key => $val)
      <div class="col-md-4 col-sm-6 col-xs-12 mb-5">
        <div class="videos-grid-video videos-blog video_more">
        <img src="{{asset($val->video_thumbnail)}}" width="100%" height="100%" alt="">
          <h5><a href="{{route('videodetail',base64_encode($row->id))}}" style="text-decoration:none; color:black">{{$val->title}}</a></h5>
          <p>{{$val->description}}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section> --}}
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
            <!-- end counter -->
        </div>
    </div>
</section>

@endsection