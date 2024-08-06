@extends('front.layouts.app')
@section('inlinecss')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
.panel-group .panel {
    border-radius: 0;
    box-shadow: none;
    border-color: #EEEEEE;
  }

  .panel-default > .panel-heading {
    padding: 0;
    border-radius: 0;
    color: #212121;
    background-color: #FAFAFA;
    border-color: #EEEEEE;
  }

  .panel-title {
    font-size: 20px;
  }
  
  .panel-title > a {
    display: block;
    padding: 20px;
    background: #fff;
    border-radius: 4px;
    position: relative;
    text-decoration: none;
    color:#000;
    font-size:20px;
    font-weight: 600;
  }

  .more-less {
    float: right;
    color: #212121;
    font-size: 31px;
    font-style: normal;
    
  }

  .panel-default > .panel-heading + .panel-collapse > .panel-body {
    color:#000;
    padding: 20px;
    background: #fff;
    border-radius: 4px;
    position: relative;
  }
  body {
    background-color: #f5f6f7 !important;
}

.faq_hr{
    width: 27%;
    justify-self: center;
    margin-top:12px;
    height:2px !important;
}

.custom-glyphicon::before {
    font-family: 'Glyphicons Halflings';
    content: "\e080"; /* Unicode for the glyphicon-plus icon */
}
</style>
@endsection
@section('container')

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
        <div class="carousel-item active">
          <img src="{{asset('front/images/FAQ-banner.jpg')}}" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>
</section>
<!-- about_us start -->

<section id="faq" class="faq mb-5">
  <div class="container">
    <div style="text-align:center;" class="mb-5">
      <h2 style="color: #ee902c;display: grid;">Frequently Asked Questions
    <hr class="faq_hr"></h2>
    </div>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          @foreach($faq as $key=>$val)
            <div class="panel panel-default mb-3">
              <div class="panel-heading" role="tab" id="heading{{$key}}">
                <h4 class="panel-title" style="margin-bottom:0;">
                  <a role="button" style="text-decoration: none;" data-toggle="collapse" @if($key > 0) class="collapsed" @endif data-parent="#accordion" href="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                  <i class="more-less">+</i>
                  <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                    {{$val->title}}
                  </a>
                </h4>
              </div>
              <div id="collapse{{$key}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$key}}">
                <div class="panel-body ps-3">
                    {!!$val->description!!}
                </div>
              </div>
            </div>
          @endforeach
        </div>

  </div>
</section><!-- End Frequently Asked Questions Section -->

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script>
    function toggleIcon(e) {
        var icon = $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .text();
        if (icon === '+') {
            $(e.target).prev('.panel-heading').find(".more-less").text('-');
        } else {
            $(e.target).prev('.panel-heading').find(".more-less").text('+');
        }
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>
@stop

