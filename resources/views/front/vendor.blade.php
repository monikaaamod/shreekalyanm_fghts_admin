@extends('front.layouts.app')
@section('inlinecss')

@section('container')
<!-- menu -->
<section class="menu">
  <div class="container">
    <div class="menu-bar">
      <ul>
      <li class="active"><a href="{{route('index')}}"> Home</a></li>
      <li><a href="{{route('comingsoon')}}"> Travel Planning</a></li>
      <li><a href="{{route('comingsoon')}}"> Event Planning</a></li>
      <li><a href="{{route('video')}}"> Video</a></li>
      <li><a href="{{route('blog')}}"> Inspirational Blogs</a></li>
      </ul>
    </div>
  </div>
</section>

  <!-- Slider -->
  <section class="slider">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="@if($city->city_image != ''){{asset($city->city_image)}}@else{{asset('front/images/Jaipur.png')}}@endif" class="d-block w-100" style="height:500px;" alt="...">
        </div>
        <!-- <div class="carousel-item">
          <img src="{{asset('front/images/Banner.png')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{asset('front/images/Banner.png')}}" class="d-block w-100" alt="...">
        </div> -->
      </div>
    </div>
  </section>
  
  <section class="Makeup">
    <div class="container">
      <h2 class="">{{$category->category_name}}  in {{$city->city_names->city_name}}</h2>
      <div class="makeup_bridal">
        <h2>Bridal Makeup & Hair</h2>
        <p> in Jaipur</p>
      </div>
    <div id="counter">
      @foreach($service as $row)
        <div class="item">
          <h1 class="count" data-number="518" ></h1>
          <h3 class="text">{{$row->service_name}}</h3>
        </div>
      @endforeach
      <!-- <div class="item">
        <h1 class="count" data-number="12" ></h1>
        <h3 class="text">Bridal Mackup</h3>
      </div>
      <div class="item">
        <h1 class="count" data-number="25" ></h1>
        <h3 class="text">Bridal Mackup</h3>
      </div> -->
    </div>
    </div>
  </section>

  <!-- images - section -->
  <section class="images_section">
    <div class="container">
      <div class="row">
        @foreach($vendor as $key=>$val)
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="picsum">
            <div class="glam">
              <a href="{{route('vendordetail',base64_encode($val->id))}}" class="text-decoration-none"><h2>{{$val->register_name}} <div style="display: flex;justify-content: end;margin-top: -35px;"><img src="{{asset('front/images/Group-63.png')}}" alt=""></div></h2></a>
              <h4>{{$val->business_name}}</h4>
              <p>{{$val->business_location}}, {{$val->city_name}} {{-- <span><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i><i class="fa fa-star-half" aria-hidden="true"></i> 105 Review</span> --}}</p>
            </div>
            <div class="productImage">
              <a href="{{route('vendordetail',base64_encode($val->id))}}">
                
                <img id="largeImage{{$key}}" src="@if(isset($val->past_work_one) && $val->past_work_one->image_status != 0){{asset($val->past_work_one->pastimage)}}@else{{asset('front/images/mark.png')}}@endif" alt="Default Image">
              </a>
            </div>
            <div id="thumbs{{$key}}">
              @foreach($val->past_work as $cv=>$work)
                @if($work->image_status == 1)
                  @if($work->is_image == 1 && $cv <= 3)
                    <img src="{{asset($work->pastimage)}}" class="showpast" data-id="{{$key}}" alt="Past Work" style="height: 50px;width: 50px;" />
                  @endif
                @endif
              @endforeach
             {{-- <img src="https://picsum.photos/id/2/500/500" alt="2nd image" />
              <img src="https://picsum.photos/id/3/500/500" alt="3rd image" />
              <img src="https://picsum.photos/id/4/500/500" alt="4th image" />
              <img src="https://picsum.photos/id/5/500/500" alt="5th image" />--}}
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="Similar">
    <div class="container">
      <h1 class="text-center">Similar Category</h1>
      <div class="cc owl-carousel owl-theme">
        @if(isset($cat) && $cat != "")
        <div class="row">
          @foreach($cat as $key=>$val)
          <div class="col-md-3" style="display: flex;justify-content: center;">
            <div class="box">
              <a href="{{route('choosecity', base64_encode($val->id))}}"><img src="{{asset($val->image)}}" alt=""></a>
                <p>{{($val->category_name)}}</p>
            </div>
          </div>
          @endforeach
        </div>
        @endif
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


  <!-- JS Link -->
  
  <script>
      $('.cc.owl-carousel').owlCarousel({
          loop:true,
          margin:10,
          items: 4,
          nav:true,
          autoplay: false,
          autoplayTimeout: 1100,
          dots:false,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:3
              },
              1000:{
                  items:4
              }
          }
      })
  </script>

  
 
  
