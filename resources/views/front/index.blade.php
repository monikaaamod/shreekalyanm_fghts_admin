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

.blog-img p {
   overflow: hidden;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
           line-clamp: 2; 
   -webkit-box-orient: vertical;
}

.blog {
  background: linear-gradient(45deg, #fceabb, #fceabb);
}

.wedding-text {
  background-image: url('{{asset("front/images/cover.jpg")}}');
  background-size: 100% 100%;
    background-repeat: no-repeat;
}

.home_section{
    font-weight: 500;
    font-size: 13px;
    line-height: 22px !important;
    color: #3f3f3f;
}

.box h5 {
  text-shadow:0px 4px 4px #00000040;
}

.side-tex h2 {
  text-shadow:0px 4px 4px #00000040;
  color:#EE902C;
  font-size:22px;
}

.top-header {
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1030;
}

.videos {
  background: linear-gradient(45deg, #EE902C, #fff);
}


.heading {
    text-align: center;
    color: #454343;
    font-size: 30px;
    font-weight: 700;
    position: relative;
    margin-bottom: 70px;
    text-transform: uppercase;
    z-index: 999;
}
.white-heading{
    color: #ffffff;
}
.heading:after {
    content: ' ';
    position: absolute;
    top: 100%;
    left: 50%;
    height: 40px;
    width: 180px;
    border-radius: 4px;
    transform: translateX(-50%);
    background: url(img/heading-line.png);
    background-repeat: no-repeat;
    background-position: center;
}
.white-heading:after {
    background: url(https://i.ibb.co/d7tSD1R/heading-line-white.png);
    background-repeat: no-repeat;
    background-position: center;
}

.heading span {
    font-size: 18px;
    display: block;
    font-weight: 500;
}
.white-heading span {
    color: #ffffff;
}
/*-----Testimonial-------*/

.testimonial:after {
    position: absolute;
    top: -0 !important;
    left: 0;
    content: " ";
    background: url(img/testimonial.bg-top.png);
    background-size: 100% 100px;
    width: 100%;
    height: 100px;
    float: left;
    z-index: 99;
}

.testimonial {
    min-height: 375px;
    position: relative;
    background-image: linear-gradient(rgb(0 0 0 / 61%), rgb(0 0 0 / 64%) ), url('{{asset("front/images/Rectangle.png")}}');
    padding-top: 50px;
    padding-bottom: 50px;
    background-position: center;
        background-size: cover;
}
#testimonial4 .carousel-inner:hover{
  cursor: -moz-grab;
  cursor: -webkit-grab;
}
#testimonial4 .carousel-inner:active{
  cursor: -moz-grabbing;
  cursor: -webkit-grabbing;
}
#testimonial4 .carousel-inner .item{
  overflow: hidden;
}

.testimonial4_indicators .carousel-indicators{
  left: 0;
  margin: 0;
  width: 100%;
  font-size: 0;
  height: 20px;
  bottom: 15px;
  padding: 0 5px;
  cursor: e-resize;
  overflow-x: auto;
  overflow-y: hidden;
  position: absolute;
  text-align: center;
  white-space: nowrap;
}
.testimonial4_indicators .carousel-indicators li{
  padding: 0;
  width: 14px;
  height: 14px;
  border: none;
  text-indent: 0;
  margin: 2px 3px;
  cursor: pointer;
  display: inline-block;
  background: #ffffff;
  -webkit-border-radius: 100%;
  border-radius: 100%;
}
.testimonial4_indicators .carousel-indicators .active{
  padding: 0;
  width: 14px;
  height: 14px;
  border: none;
  margin: 2px 3px;
  background-color: #9dd3af;
  -webkit-border-radius: 100%;
  border-radius: 100%;
}
.testimonial4_indicators .carousel-indicators::-webkit-scrollbar{
  height: 3px;
}
.testimonial4_indicators .carousel-indicators::-webkit-scrollbar-thumb{
  background: #eeeeee;
  -webkit-border-radius: 0;
  border-radius: 0;
}

.testimonial4_control_button .carousel-control{
  top: 175px;
  opacity: 1;
  width: 40px;
  bottom: auto;
  height: 40px;
  font-size: 10px;
  cursor: pointer;
  font-weight: 700;
  overflow: hidden;
  line-height: 38px;
  text-shadow: none;
  text-align: center;
  position: absolute;
  background: transparent;
  border: 2px solid #ffffff;
  text-transform: uppercase;
  -webkit-border-radius: 100%;
  border-radius: 100%;
  -webkit-box-shadow: none;
  box-shadow: none;
  -webkit-transition: all 0.6s cubic-bezier(0.3,1,0,1);
  transition: all 0.6s cubic-bezier(0.3,1,0,1);
}
.testimonial4_control_button .carousel-control.left{
  left: 7%;
  top: 50%;
  right: auto;
}
.testimonial4_control_button .carousel-control.right{
  right: 7%;
  top: 50%;
  left: auto;
}
.testimonial4_control_button .carousel-control.left:hover,
.testimonial4_control_button .carousel-control.right:hover{
  color: #000;
  background: #fff;
  border: 2px solid #fff;
}

.testimonial4_header{
  top: 0;
  left: 0;
  bottom: 0;
  width: 550px;
  display: block;
  margin: 30px auto;
  text-align: center;
  position: relative;
}
.testimonial4_header h4{
  color: #ffffff;
  font-size: 30px;
  font-weight: 600;
  position: relative;
  letter-spacing: 1px;
  text-transform: uppercase;
}

.testimonial4_slide{
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 70%;
  margin: auto;
  padding: 20px;
  position: relative;
  text-align: center;
}
.testimonial4_slide img {
    top: 0;
    left: 0;
    right: 0;
    width: 136px;
    height: 136px;
    margin: auto;
    display: block;
    color: #f2f2f2;
    font-size: 18px;
    line-height: 46px;
    text-align: center;
    position: relative;
    border-radius: 50%;
    box-shadow: -6px 6px 6px rgba(0, 0, 0, 0.23);
    -moz-box-shadow: -6px 6px 6px rgba(0, 0, 0, 0.23);
    -o-box-shadow: -6px 6px 6px rgba(0, 0, 0, 0.23);
    -webkit-box-shadow: -6px 6px 6px rgba(0, 0, 0, 0.23);
}
.testimonial4_slide p {
    color: #ffffff;
    font-size: 20px;
    line-height: 1.4;
    margin: 40px 0 20px 0;
}
.testimonial4_slide h4 {
  color: #ffffff;
  font-size: 22px;
}

.testimonial .carousel {
	padding-bottom:50px;
}
.testimonial .carousel-control-next-icon, .testimonial .carousel-control-prev-icon {
    width: 35px;
    height: 35px;
}
/* ------testimonial  close-------*/






</style>
@endsection
@section('container')

<!-- menu -->
<section class="menu mt-5">
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
      @foreach($banner as $key=>$row)
        <div class="carousel-item @if($key == 0) active @endif">
          <img src="{{asset($row->image)}}" class="d-block w-100" alt="...">
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- TEXT -->
  <section class="wedding-text">  
    <div class="container" style="margin-top:135px;">
      <div class="">
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="box">
              <h5>About Us on Shree kalyanam</h5>
              <p class="home_section" style="line-height: 28px !important;">Planning a wedding is an exciting journey, but it can also be overwhelming with numerous details to consider and decisions to make. Enter Shreekalyanam , your ultimate destination for a seamless and comprehensive wedding planning experience. Our innovative application is designed to cater to all your wedding needs, ensuring that your special day is nothing short of magical.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="box dolor_one">
              <h5>Real Weddings on Shree kalyanam</h5>
              <p class="home_section">Embark on a journey through heartfelt moments and captivating narratives as we showcase unforgettable weddings that encapsulate the essence of love, commitment, and togetherness. From breathtaking ceremonies to heartwarming celebrations, these real stories will inspire and remind us all of the beauty and power of love. Join us in celebrating these extraordinary couples and their unique paths to happily ever after, exclusively on ShreeKalyanam.</p>
              <a href="{{route('weddingvendors')}}"><button class="btn">Visit Us</button></a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="Event-Planning">
              <div class="row">
                <div class="col-md-12 col-sm-6 col-lg-12">
                  <div class="side-tex">
                  <h2 style="display: flex;justify-content: center;">Bride</h2>
                    <p class="home_section">Discover the bride's inspiring journey, her cherished dreams, and the essence of her uniqueness as she steps into a new chapter of love and life.</p>
                    <a href="{{route('weddingvendors')}}"><button class="btn">Visit Us</button></a>
                  </div>
                </div>
                <div class="col-md-12 col-sm-6 col-lg-12">
                  <div class="side-tex">
                  <h2 style="display: flex;justify-content: center;">Groom</h2>
                    <p class="home_section">Explore the groom's remarkable journey, his aspirations, and the distinct qualities that define him as he embraces a new adventure of love and togetherness.</p>
                    <a href="{{route('weddingvendors')}}"><button class="btn">Visit Us</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
        </div>
      </div>
    </div>
  </section>

  <!-- may_help -->
  <section class="may_help">
    <div class="container">
      <div class="help_you">
          <div class="colum5">
            <div class="feature">
              <h1>May I Help You<h1>
            </div>
          </div>
          <div class="colum5">
            <div class="feature active">
              <a href="{{route('weddingvendors')}}">Feature Weddings</a>
            </div>
          </div>
          <div class="colum5">
            <div class="feature">
              <a href="{{route('weddingvendors')}}">Feature Weddings</a>
            </div>
          </div>
          <div class="colum5">
            <div class="feature">
              <a href="{{route('weddingvendors')}}">Feature Weddings</a>
            </div>
          </div>
          <div class="colum5">
            <div class="feature">
              <a href="{{route('weddingvendors')}}">Feature Weddings</a>
            </div>
          </div>
      </div>
    </div>
  </section>

  <section class="may_help_you feature-box">
    <div class="container">
      <div class="help_you">
        <div class="feature">
          <h1>May I Help You</h1>
        </div>
        
        <div class="row">
          <div class="col-6 col-sm-6 col-md-3">
           
              <a href="#">Feature Weddings</a>
          
          </div>
          <div class="col-6 col-sm-6 col-md-3">
              <a href="#">Feature Weddings</a>
          </div>
          <div class="col-6 col-sm-6 col-md-3">
           
              <a href="#">Feature Weddings</a>
         
          </div>
          <div class="col-6 col-sm-6 col-md-3">
            
              <a href="#">Feature Weddings</a>
           
          </div>
        </div>
        <!-- <div class="feature1">
          <a href="#">Feature Weddings</a>
        </div>
        <div class="feature1">
          <a href="#">Feature Weddings</a>
        </div>
        <div class="feature1">
          <a href="#">Feature Weddings</a>
        </div>
        <div class="feature1">
          <a href="#">Feature Weddings</a>
        </div> -->
      </div>
    </div>
  </section>

  <!-- whom -->
  <section class="whom all_for">
    <div class="container">
      <div class="see_all see_all_one">
        <p>Whom are you looking for? <a href="{{route('weddingvendors')}}">See all</a></p>
        <hr>
      </div>
      <div class="see_all see_all_for">
        <p>Whom are you looking for?</p>
        <hr>
      </div>
      
      @foreach($category as $val)
      <div class="box">
        <a href="{{route('choosecity', base64_encode($val->id))}}"><img src="{{asset($val->image)}}" alt=""></a>
          <p>{{($val->category_name)}}</p>
      </div>
      @endforeach
      
     
    </div>
  </section>
  <div class="all_see1">
    <a href="#">See all</a>
  </div>

  <!-- videos -->
  <section class="videos all_for">
    <div class="container">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="see_all see_all_one">
          <p>Videos <a href="{{route('video')}}">See all</a></p>
          <hr>
        </div>
        <div class="see_all see_all_for">
          <p>Videos</p>
          <hr>
        </div>
        <div class="row">
          @foreach($video as $key=>$row)
          <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="videos-grid-video videos-blog">
              <a href="{{route('videodetail',base64_encode($row->id))}}" style="text-decoration:none; color:blue"> <img width="100%" height="65%" src="{{$row->video_thumbnail}}" alt="" srcset="" >
                <!-- <iframe width="100%" height="100%" src="{{$row->video_url}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
                <p class="m-3">{{$row->title}}</p>
                <!--<p class="text-limit">{!!$row->description!!}</p>-->
              </a>
              </div>
            </div>
          @endforeach
          
        </div>
      </div>
      <div class="all_see">
        <a href="#">See all</a>
      </div>
    </div>
  </section>

  <!-- blog -->
  <section class="blog all_for mt-5 mb-5">
    <div class="container">
      <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="see_all see_all_one">
          <p>Blog <a href="{{route('blog')}}" style="color:black">See all</a></p>
          <hr>
        </div>
        <div class="see_all see_all_for">
          <p>Blog</p>
          <hr>
        </div>
        <div class="row">
        @php
          $i = 0;
          $j = 0;
        @endphp
        @foreach($blog as $key=>$val)
        @php
        if($i == 5 && $j == 0 || $i == 6)
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
    

  
    <section class="testimonial text-center mb-5">
        <div class="container">
            <div class="heading white-heading">
                Testimonial
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                @foreach($testi as $key=>$val)
                  <div class="carousel-item @if($key == 0) active @endif">
                    <div class="testimonial4_slide">
                      <img src="{{asset($val->image)}}" class="img-circle img-responsive" />
                      {!!$val->description!!}
                      <h4>{{$val->name}}</h4>
                    </div>
                  </div>
                @endforeach
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
        </div>
    </section>

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
