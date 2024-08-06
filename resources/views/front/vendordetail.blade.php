@extends('front.layouts.app')
@section('inlinecss')
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<link rel="stylesheet" href="{{asset('/front/css/style1.css')}}">
<style>
  

  .ul_pay,
li {
  padding: 0;
  margin: 0;
  list-style: none;
}

#pills-policy:hover {
  overflow-x: hidden;
}

.ul_pay {
  margin: 2em 0;
}

.li_pay {
  margin: 1em;
  margin-left: 3em;
}

.li_pay:before {
  content: '\f006';
  font-family: 'FontAwesome';
  float: left;
  margin-left: -1.5em;
  color: #0074D9;
}

.star-rating {
  font-size: 0; /* Remove extra space between inline-block elements */
}

.star {
  display: inline-block;
  width: 30px;
  height: 30px;
  background-image: url('{{asset("front/images/empty_star.png")}}'); /* Use your image paths */
  background-size: cover;
  cursor: pointer;
}

.star.filled {
  background-image: url('{{asset("front/images/star.png")}}'); /* Use your image paths */
}

/* model */

    
.modal {
    display: none;
    position: fixed;
    z-index: 10000;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.7);
}

.modal-content {
  top:-39px;
}
#caption,
.modal-content {
    margin: auto;
    display: block;
    width: 100%;
    height:100%;
    max-width: 1200px;
}
#caption {
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}
#caption,
.modal-content {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}
@-webkit-keyframes zoom {
    from {
        -webkit-transform: scale(0);
    }
    to {
        -webkit-transform: scale(1);
    }
}
@-moz-keyframes zoom {
    from {
        -moz-transform: scale(0);
    }
    to {
        -moz-transform: scale(1);
    }
}
@-o-keyframes zoom {
    from {
        -o-transform: scale(0);
    }
    to {
        -o-transform: scale(1);
    }
}
@-ms-keyframes zoom {
    from {
        -ms-transform: scale(0);
    }
    to {
        -ms-transform: scale(1);
    }
}
@keyframes zoom {
    from {
        transform: scale(0);
    }
    to {
        transform: scale(1);
    }
}
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: 300;
}
.close:focus,
.close:hover {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}
@media only screen and (max-width: 700px) {
    .modal-content {
        width: 100%;
    }
}

/* End model */

/* Reviews */

ul {
  list-style-type: none;
}
.usr_img img {
  user-select: none !important;
  list-style-type: none;
}

/* START */
.container__feed {
  display: flex;
  align-items: center;
  padding: 20px;
}
.feedbacks {
  display: flex;
  gap: 20px;
}

.feed_box {
  position: relative;
  width: 48%;
  border-radius: 15px;
  padding: 15px 20px;
  box-shadow: 0 0 10px #00000028;
  z-index: 999;
  background-color: #fff;
  overflow: hidden;
}
.feed_box .user_icon img {
  position: absolute;
  width: 45%;
  min-width: 150px;
  top: 15px;
  right: -15px;
  z-index: -1;
}
.feed__hed {
  display: flex;
  align-items: center;
  z-index: 99 !important;
}
.feed__hed .usr_img {
    width: 60px;
    height: 57px;
    padding: 6px;
    border-radius: 50px;
    box-shadow: 0 0 5px #00000033;
    display: flex;
    justify-content: center;
    align-items: center;
}
.feed__hed .usr_img img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
}
.feed__hed h1 {
  margin-left: 10px;
  font-size: 2.2rem;
}
.container__users_info {
  display: flex;
  flex-direction: column;
}
.feed_txt {
  position: relative;
  margin-top: 12px;
}
.feed_txt::before {
  position: absolute;
  content: "";
  z-index: 99;
  bottom: -1px;
  left: 0;
  width: 100%;
  height: 20px;
  background: linear-gradient(180deg, transparent, #ffffff);
}
.feed_txt summary {
  width: 100%;
  height: 100px;
  overflow-y: scroll;
  padding-bottom: 10px;
}
.feed_txt summary::-webkit-scrollbar {
  display: none !important;
}
.feed_foot {
  margin-top: 14px;
  display: flex;
  justify-content: space-between;
}
.feed_foot a {
  padding: 9px 20px;
  border-radius: 5px;
  text-decoration: none;
  color: #000;
  background: #ffd181;
}
.feed_foot a:hover {
  padding: 9px 20px;
  border-radius: 5px;
  text-decoration: none;
  color: #000;
  background: #ffd999;
}

/* MEDIA */
@media (max-width: 800px) {
  .feedbacks {
    display: flex;
    flex-direction: column;
  }
  .feed_box {
    position: relative;
    width: 100%;
    max-width: 100%;
  }
}
@media (max-width: 450px) {
  .feed__hed h1 {
    font-size: 1.4em;
  }
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

  <!-- Slider -->
  <section class="slider">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        @if(isset($vendor->banner_images) && $vendor->banner_images->count() > 0)
        @foreach($vendor->banner_images as $key=>$image)
        <div class="carousel-item @if($key == 0) active @endif">
          <img src="@if($image->image_status != 0){{asset($image->banner_images)}}@else{{asset('front/images/Rectangle101.png')}}@endif" class="d-block w-100" style="height:500px;" alt="...">
        </div>
        @endforeach
        @else
            <div class="carousel-item active">
              <img src="{{asset($vendor->category->banner_image)}}" class="d-block w-100" style="height:500px;" alt="...">
            </div>
        @endif
      </div>
    </div>
    @if(isset($vendor->image) && $vendor->image != "")
      <style>
        .card .card-body::after {
          background: url('{{ asset($vendor->image) }}');
          background-size: cover;
        }
      </style>
    @else
      <style>
        .card .card-body::after {
          background: url('{{ asset("front/images/profile.png") }}');
          background-size: cover;
        }
      </style>
    @endif

    <div class="anjli">
      <div class="container">
        <div class="row">
          <div class="col col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="inner">
                    </div>
                </div>
            </div>
            </div>
          <div class="col col-md-5">
            <div class="makeover-text">
              <h2 style="margin:0;">{{$vendor->register_name}}</h2>
              <p style="margin:0;"><img src="{{asset('front/images/Group80.png')}}" alt=""> {{$category->category_name}}  <span><img src="{{asset('front/images/Vector@2x.png')}}" alt=""> {{$vendor->business_location}}, {{$vendor->city_name}}</span></p>
              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ee902c}</style><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ee902c}</style><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ee902c}</style><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ee902c}</style><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ee902c}</style><path d="M341.5 13.5C337.5 5.2 329.1 0 319.9 0s-17.6 5.2-21.6 13.5L229.7 154.8 76.5 177.5c-9 1.3-16.5 7.6-19.3 16.3s-.5 18.1 5.9 24.5L174.2 328.4 148 483.9c-1.5 9 2.2 18.1 9.7 23.5s17.3 6 25.3 1.7l137-73.2 137 73.2c8.1 4.3 17.9 3.7 25.3-1.7s11.2-14.5 9.7-23.5L465.6 328.4 576.8 218.2c6.5-6.4 8.7-15.9 5.9-24.5s-10.3-14.9-19.3-16.3L410.1 154.8 341.5 13.5zM320 384.7V79.1l52.5 108.1c3.5 7.1 10.2 12.1 18.1 13.3l118.3 17.5L423 303c-5.5 5.5-8.1 13.3-6.8 21l20.2 119.6L331.2 387.5c-3.5-1.9-7.4-2.8-11.2-2.8z"/></svg>
              <a href="#">{{$reviews_count}} Review</a>
            </div>
          </div>
          <div class="col col-md-3">
            <div class="icon-img">
              <a href="{{$vendor->facebook}}" target="_blank"><img src="{{asset('front./images/facebook.png')}}" alt=""></a>
              <a href="{{$vendor->instagram}}" target="_blank"><img src="{{asset('front./images/instagram.png')}}" alt=""></a>
              <a href="{{$vendor->twitter}}" target="_blank"><img src="{{asset('front./images/twitter.png')}}" alt=""></a>
              <a href="{{$vendor->youtube}}" target="_blank"><img src="{{asset('front./images/youtube.png')}}" alt=""></a>
            </div>
            <div class="mt-5 ms-3">
              <a class="Send" href="{{route('enquiry',base64_encode($vendor->id))}}">Send Query</a>
              <a class="Send" @if(Auth::user() && Auth::user()->type == "customer") type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" @else href="{{route('login',base64_encode('sd'))}}" @endif>Add Review</a>
              @if(Auth::user() && Auth::user()->type == "customer")
                @if(Session::has('previous_url'))
                  {{session()->forget('previous_url')}}
                @endif

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Review</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="{{route('add_review')}}" method="post" enctype="multipart/form-data" id="submitForm">
                        @csrf
                        <div class="modal-body">
                          <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                          <input type="hidden" name="vendor_id" id="vendor_id" value="{{$vendor->id}}">
                          
                          <input type="hidden" name="ratings" id="ratings" >
                          <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" value="{{auth()->user()->name}}">
                          </div>
                          <div class="mb-3">
                            <label for="image">Image</label>
                            <input type="file" accept="image/png, image/jpeg" class="form-control" name="image" id="image">
                          </div>
                          <div>
                              <label for="stars" style="font-size:1rem;">Add Rating's</label>
                            </div>
                          <div class="star-rating mb-3">
                            <span class="star" onclick="fillStar(1)"></span>
                            <span class="star" onclick="fillStar(2)"></span>
                            <span class="star" onclick="fillStar(3)"></span>
                            <span class="star" onclick="fillStar(4)"></span>
                            <span class="star" onclick="fillStar(5)"></span>
                          </div>

                          <div class="local-forms">
                            <textarea class="ckeditor form-control mb-3" placeholder="Enter Feedback" name="feedback" id="feedback" cols="15" rows="5">{{isset($post)? $post->description : ''}}</textarea>
                          </div>
                        </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="submitButton">Add</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Model -->
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- About -->
  <section class="about">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="nav nav-pills mb-3 slip-pad quality" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">About</button>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" type="button" href="#photo's">Photos</a>
            </li>
            <li class="nav-item quality1" role="presentation">
              <a class="nav-link" type="button" href="#video's">Video</a>
            </li>
           {{--  <li class="nav-item quality2" role="presentation">
              <button class="nav-link" id="pills-review-tab" data-bs-toggle="pill" data-bs-target="#pills-review" type="button" role="tab" aria-controls="pills-review" aria-selected="true">Review</button>
            </li> --}}
            <li class="nav-item quality3" role="presentation">
              <a class="nav-link faqs_one" id="pills-offer-tab" type="button" href="#faq's">FAQ`s</a>
            </li>
            <li class="nav-item quality3" role="presentation">
              <a class="nav-link faqs_one" type="button" href="#payment_policy">Payment Policy</a>
            </li>
            <li class="nav-item quality3" role="presentation">
              <a class="nav-link faqs_one" type="button" href="#reviews">Review's</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="about-anjli">
                <h2>About {{$vendor->business_name}}</h2>
                <p>{{$vendor->about_business}}</p>
              </div>
              @if($vendor->past_image_approved->count() > 0)
              <div class="gallery" id="photo's">
                <div class="gallery-container">
                  <div class="tz-gallery">
                    <div class="about-anjli">
                      <h2>Photos</h2>
                    </div>
                    <div class="row">
                      @foreach($vendor->past_work as $work)
                        @if($work->image_status == 1)
                          @if($work->is_image == 1)
                          <div class="col-6 col-sm-6 col-md-3">
                            <a class="lightbox">
                              <img src="{{asset($work->pastimage)}}" onclick="getImagePreview(this);" id="{{$work->id}}" style="height: 200px;" alt="Bridge">
                            </a>
                          </div>
                          @endif
                        @endif
                      @endforeach
                    </div>
                  </div>
                 <div class="images_seeAll">
                  <a href="#">See All</a>
                 </div>
                </div>
              </div>
              @endif
              @if($vendor->past_video_approved->count() > 0)

              <div class="wedding-video mt-5" id="video's">
                <div class="">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="about-anjli">
                      <h2>video</h2>
                    </div>
                    <div class="row">
                    @foreach($vendor->past_work as $work)
                    @if($work->image_status == 1)
                      @if($work->is_image == 0)
                      <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="videos-grid-video videosone">
                        <!-- <video controls width="100%" height="100%"><source src='{{asset($work->pastimage)}}' type='video/mp4'></video> -->
                          <!-- <iframe width="100%" height="100%" class="myVideo12" src="{{asset($work->pastimage)}}" ></iframe> -->
                          <img src='{{asset($work->thumbnail)}}' id='{{$work->id}}' width='100%' onclick='getVideoPreview(this);' height='100%'>
                          <input type="hidden" id="vid{{$work->id}}" value="{{asset($work->pastimage)}}">
                        
                        </div>
                      </div>
                      @endif
                      @endif
                    @endforeach
                     
                    </div>
                    <div class="images_seeAll videos_seeAll">
                      <a href="#">See All</a>
                     </div>
                  </div>
                </div>
              </div>
              @endif
              <div class="Address">
                <div class="about-anjli">
                  <h2>Address</h2>
                  <input type="hidden" name="" id="location" value="{{$vendor->business_location}}">
                  <input type="hidden" name="" id="latitude" value="{{$vendor->latitude}}">
                  <input type="hidden" name="" id="longitude" value="{{$vendor->longitude}}">
                </div>
                <div id="mapContainer" style="height: 400px;"></div>
              </div> 

              <div class="FAQS mt-5" id="faq's">
                <div class="about-anjli">
                  <h2>Service Offered</h2>
                </div>
                @foreach($service as $key=>$val)
                  @foreach($data as $sd=>$cv)
                    @if($sd == $val->service_id)
                      @if($val->service->types == "radio")
                        <div>
                            <h5>{{$val->service->title}}</h5>
                        </div>
                        <div class="p-3">
                          <div>
                            <input type="radio" class="form-check-input me-2" name="radio{{$sd}}" @if(in_array($val->service->option1, $cv)) checked @endif class="radio me-2">{{$val->service->option1}}
                          </div>
                          <div>
                            <input type="radio" class="form-check-input me-2" name="radio{{$sd}}" @if(in_array($val->service->option2, $cv)) checked @endif class="radio me-2">{{$val->service->option2}}
                          </div>
                          @if(isset($val->service->option3) && $val->service->option3 !="")
                            <div>
                              <input type="radio" class="form-check-input me-2" name="radio{{$sd}}" @if(in_array($val->service->option3, $cv)) checked @endif class="radio me-2">{{$val->service->option3}}
                            </div>
                          @endif
                          @if(isset($val->service->option4) && $val->service->option4 !="")
                          <div>
                            <input type="radio" class="form-check-input me-2" name="radio{{$sd}}" @if(in_array($val->service->option4, $cv)) checked @endif class="radio me-2">{{$val->service->option4}}
                          </div>
                          @endif
                        </div>
                      @endif
                      @if($val->service->types == "checkbox")
                        <div>
                            <h5>{{$val->service->title}}</h5>
                        </div>
                        <div class="p-3">
                            <div><input type="radio" @if(in_array($val->service->option1, $cv)) checked @endif class="radio me-2">{{$val->service->option1}}</div>
                            <div><input type="radio" @if(in_array($val->service->option2, $cv)) checked @endif class="radio me-2">{{$val->service->option2}}</div>
                            @if(isset($val->service->option3) && $val->service->option3 !="")
                                <div><input type="radio" @if(in_array($val->service->option3, $cv)) checked @endif class="radio me-2">{{$val->service->option3}}</div>
                            @endif
                            @if(isset($val->service->option4) && $val->service->option4 !="")
                            <div><input type="radio" @if(in_array($val->service->option4, $cv)) checked @endif class="radio me-2">{{$val->service->option4}}</div>
                            @endif
                        </div>
                      @endif
                      @if($val->service->types == "paragraph")
                        <div>
                        <h5>{{$val->service->title}}</h5>
                        </div>
                        <p>{{$val->service->description}}</p>
                      @endif
                    @endif
                  @endforeach
                @endforeach
            </div>
            <div class="FAQS mt-5" id="payment_policy">
              <div class="row">
                <div class="col-md-6">
                  <div class="about-anjli">
                    <h2>Payment Policy</h2>
                  </div>
                  <ul class="ul_pay">
                    @foreach($vendor->pp as $key=>$data)
                      <li class="li_pay">
                        {!!$data->description!!}
                      </li>
                      @endforeach
                  </ul>
                </div>
                @if(isset($vendor->cancellation) && count($vendor->cancellation) > 0)
                  <div class="col-md-6">
                      <div class="about-anjli">
                        <h2>Cancellation Policy</h2>
                      </div>
                    <ul class="ul_pay">
                      @foreach($vendor->cancellation as $key=>$data)
                        <li class="li_pay">
                        {!!$data->description!!}
                        </li>
                        @endforeach
                    </ul>
                  </div>
                @endif
                @if(isset($vendor->terms_condi) && $vendor->terms_condi != "")
                <div class="col-md-12">
                  <div class="about-anjli">
                    <h2>Terms & Conditions</h2>
                  </div>
                  <p>{{$vendor->terms_condi}}</p>
                </div>
                @endif
              </div>
            </div>
              <!-- FAQ’s -->
              <!-- Review’s -->
              
              @if(isset($reviews) && $reviews_count > 0)
                <div class="container__feed FAQS container" id="reviews">
                  <div class="feedbacks row">
                    <div class="col-md-12 about-anjli">
                      <h2>Review's</h2>
                    </div>
                    @foreach($reviews as $review)
                      <div class="feed_box col-md-6">
                        <ul class="feed__hed" style="padding-left:0;">
                            <li class="usr_img"><img src="@if(isset($review->image) && $review->image != ''){{asset($review->image)}}@else {{ asset('front/images/profile.png') }}@endif" width="40px"></li>
                            <li>
                                <h3 class="ms-3">{{$review->name}}</h3>
                                <div class="star-rating ms-3">
                                  @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->ratings)
                                    <span class="star filled"></span>
                                    @else
                                    <span class="star"></span>
                                    @endif
                                  @endfor
                                </div>
                            </li>
                        </ul>
                        <div class="feed_txt">
                            <summary>
                              Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis suscipit rerum inventore facere amet quibusdam consequuntur sint pariatur fugit nemo ipsum in tempore nam minus a quidem nulla, ullam numquam repudiandae, porro ea quia. Impedit laudantium voluptatum similique quibusdam. Earum id facere consequatur itaque deleniti impedit labore nesciunt ab. Ratione.
                            </summary>
                        </div>
                        <ul class="feed_foot">
                            <li>{{ \Carbon\Carbon::parse($review->created_at)->format('d M Y') }}</li>
                        </ul>
                      </div>
                    @endforeach
                  </div>
                </div>
              @endif
              
            </div>
            {{-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div class="gallery">
                <div class="gallery-container">
                  <div class="tz-gallery">
                    <div class="about-anjli">
                      <h2>Photos</h2>
                    </div>
                    <div class="row">
                    @foreach($vendor->past_work as $work)
                    @if($work->image_status == 1)
                      @if($work->is_image == 1)
                      <div class="col-6 col-sm-6 col-md-3">
                        <img src="{{asset($work->pastimage)}}" onclick='getImagePreview(this);' style="height: 200px;" alt="Bridge">
                      </div>
                      @endif
                      @endif
                    @endforeach
                     
                    </div>
                  </div>
                  <div class="images_seeAll videos_seeAll">
                    <a href="#">See All</a>
                   </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
              <div class="wedding-video">
                <div class="">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="about-anjli">
                      <h2>video</h2>
                    </div>
                    <div class="row">
                    @foreach($vendor->past_work as $work)
                    @if($work->image_status == 1)
                      @if($work->is_image == 0)
                      <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="videos-grid-video videosone">
                          <!-- <video controls width="100%" height="100%"><source src='{{asset($work->pastimage)}}' type='video/mp4'></video> -->
                          <!-- <iframe width="100%" height="100%" class="myVideo" src="{{asset($work->pastimage)}}" frameborder="0" allow="encrypted-media" allowfullscreen></iframe> -->
                          <img src='{{asset($work->thumbnail)}}' id='{{$work->id}}' width='100%' onclick='getVideoPreview(this);' height='100%'>
                          <input type="hidden" id="vid{{$key}}" value="{{asset($work->pastimage)}}">
                          
                        </div>
                      </div>
                      @endif
                      @endif
                    @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            
                 
            <div class="tab-pane fade" id="pills-offer" role="tabpanel" aria-labelledby="pills-offer-tab">
              <div class="about-anjli">
                <h2>Service Offered</h2>
              </div>
              @foreach($service as $key=>$val)
                @foreach($data as $sd=>$cv)
                  @if($sd == $val->service_id)
                    @if($val->service->types == "radio")
                      <div>
                          <h5>{{$val->service->title}}</h5>
                      </div>
                      <div class="p-3">                    
                      <div><input type="radio" name="radio{{$sd}}" @if(in_array($val->service->option1, $cv)) checked @endif class="radio me-2">{{$val->service->option1}}</div>
                          <div><input type="radio" name="radio{{$sd}}" @if(in_array($val->service->option2, $cv)) checked @endif class="radio me-2">{{$val->service->option2}}</div>
                          @if(isset($val->service->option3) && $val->service->option3 !="")
                              <div><input type="radio" name="radio{{$sd}}" @if(in_array($val->service->option3, $cv)) checked @endif class="radio me-2">{{$val->service->option3}}</div>
                          @endif
                          @if(isset($val->service->option4) && $val->service->option4 !="")
                          <div><input type="radio" name="radio{{$sd}}" @if(in_array($val->service->option4, $cv)) checked @endif class="radio me-2">{{$val->service->option4}}</div>
                          @endif
                      </div>
                    @endif
                    @if($val->service->types == "checkbox")
                      <div>
                          <h5>{{$val->service->title}}</h5>
                      </div>
                      <div class="p-3">
                          <div><input type="radio" @if(in_array($val->service->option1, $cv)) checked @endif class="radio me-2">{{$val->service->option1}}</div>
                          <div><input type="radio" @if(in_array($val->service->option2, $cv)) checked @endif class="radio me-2">{{$val->service->option2}}</div>
                          @if(isset($val->service->option3) && $val->service->option3 !="")
                              <div><input type="radio" @if(in_array($val->service->option3, $cv)) checked @endif class="radio me-2">{{$val->service->option3}}</div>
                          @endif
                          @if(isset($val->service->option4) && $val->service->option4 !="")
                          <div><input type="radio" @if(in_array($val->service->option4, $cv)) checked @endif class="radio me-2">{{$val->service->option4}}</div>
                          @endif
                      </div>
                    @endif
                    @if($val->service->types == "paragraph")
                      <div>
                        <h5>{{$val->service->title}}</h5>
                      </div>
                      <p>{{$val->service->description}}</p>
                    @endif
                  @endif
                @endforeach
              @endforeach
            </div>
            <div class="tab-pane fade" style="height: 600px;" id="pills-policy" role="tabpanel" aria-labelledby="pills-offer-tab">
              <div class="row">
                  <div class="col-md-6">
                    <div class="about-anjli">
                      <h2>Payment Policy</h2>
                    </div>
                    <ul class="ul_pay">
                      @foreach($vendor->pp as $key=>$data)
                        <li class="li_pay">
                          {!!$data->description!!}
                        </li>
                        @endforeach
                    </ul>
                  </div>
                @if(isset($vendor->cancellation) && count($vendor->cancellation) > 0)
                  <div class="col-md-6">
                      <div class="about-anjli">
                        <h2>Cancellation Policy</h2>
                      </div>
                    <ul class="ul_pay">
                      @foreach($vendor->cancellation as $key=>$data)
                        <li class="li_pay">
                        {!!$data->description!!}
                        </li>
                        @endforeach
                    </ul>
                  </div>
                @endif
                <div class="col-md-12">
                  <div class="about-anjli">
                    <h2>Terms & Conditions</h2>
                  </div>
                  <p>{{$vendor->terms_condi}}</p>
                </div>
              </div>
            </div>--}}
          </div>
        </div>
        <div class="col-md-4">
          <!-- Similar Vendors -->
          <div class="Similar-vendors">
            <ul class="nav nav-pills mb-3 slip-pad similar" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <P>Similar Vendors</P>
                <!-- <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Similar Vendors</button> -->
              </li>
            </ul>
            @foreach($related as $key=>$row)
            <div class="fern-makeover">
              <img src="@if($row->image_status != 0){{asset($row->image)}}@else{{asset('front/images/profile.png')}}@endif" style="width: 110px;height: 77px;" alt="">
              <div class="goldex">
                  <h2>{{$row->register_name}}</h2>
                  <p>{{$row->business_location}}, {{$row->city_name}}</p>
                <div class="review-star">
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ee902c}</style><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ee902c}</style><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ee902c}</style><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ee902c}</style><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ee902c}</style><path d="M341.5 13.5C337.5 5.2 329.1 0 319.9 0s-17.6 5.2-21.6 13.5L229.7 154.8 76.5 177.5c-9 1.3-16.5 7.6-19.3 16.3s-.5 18.1 5.9 24.5L174.2 328.4 148 483.9c-1.5 9 2.2 18.1 9.7 23.5s17.3 6 25.3 1.7l137-73.2 137 73.2c8.1 4.3 17.9 3.7 25.3-1.7s11.2-14.5 9.7-23.5L465.6 328.4 576.8 218.2c6.5-6.4 8.7-15.9 5.9-24.5s-10.3-14.9-19.3-16.3L410.1 154.8 341.5 13.5zM320 384.7V79.1l52.5 108.1c3.5 7.1 10.2 12.1 18.1 13.3l118.3 17.5L423 303c-5.5 5.5-8.1 13.3-6.8 21l20.2 119.6L331.2 387.5c-3.5-1.9-7.4-2.8-11.2-2.8z"/></svg>
                  <span>{{$row->review->count()}} Review</span>
                </div>
              </div>
            </div>
            <hr>
            @endforeach
            
            {{-- <div class="side-img">
              <img src="{{asset('front/images/Rectangle60.png')}}" alt="">
              <img src="{{asset('front/images/Rectangle59.png')}}" alt="">
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="beer bg-dark" style="visibility: visible; animation-name: fadeIn;">
    <div class="container-fluid">
        <div class="row">
            <!-- counter -->
            <div class="col-6 col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="300ms" style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;">
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


<div id="myModal" class="modal">
  <span class="close">X</span>
  <img class="modal-content" id="img01">
  <iframe class="modal-content" width="100%" height="100%" class="myVideo12" src="" id="video01"></iframe>
  
</div>
@endsection

@section('inlinejs')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

function fillStar(starNumber) {
  // Loop through each star and toggle the 'filled' class based on the star number
  for (let i = 1; i <= 5; i++) {
    
    const star = document.querySelector(`.star:nth-child(${i})`);
    $('#ratings').val(starNumber);
    if (i <= starNumber) {
      star.classList.add('filled');
    } else {
      star.classList.remove('filled');
    }
  }
}


$(function () {
           $('#submitForm').submit(function(){
            // alert();
            var $this = $('#submitButton');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();
            $.ajax({
                url: $('#submitForm').attr('action'),
                type: "POST",
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#submitForm')[0]),
                success: function(data) {
                    if(data.status){
                        
                        successMsg('Create Banner', data.msg);
                        $('#submitForm')[0].reset();
                        setTimeout(function() {
                          Swal.fire(
                            'Thank You!',
                            'Your Feedback Successfully Sent!'
                           
                          )
                                }, 1000);
                        
                    }else{
                        $.each(data.errors, function(fieldName, field){
                          // alert(data.msg);
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create Banner', data.msg);
                    }
                    buttonLoading('reset', $this);
                },
                error: function() {
                    errorMsg('Create Banner', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }
            });
            return false;
           });
           
        });




  function initMap() {
    var lat = parseFloat($('#latitude').val());
    var long = parseFloat($('#longitude').val());
   
    const mapOptions = {
      center: { lat: lat, lng: long },
      zoom: 15,
    };
    
    const map = new google.maps.Map(document.getElementById("mapContainer"), mapOptions);
    
  // Get user's current location
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      function (position) {
        const userLatLng = {
          lat: lat,
          lng: long,
        };

        // Update map center to user's location
        map.setCenter(userLatLng);
        var loc_title = $('#location').val();
        // Add marker at user's location
        const userMarker = new google.maps.Marker({
          position: userLatLng,
          map: map,
          title: loc_title,
        });
      },
      function (error) {
        console.error("Error getting user location:", error);
      }
    );
  } else {
    console.error("Geolocation is not supported by this browser.");
  }
}
  </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK5sW2dZQzfL4WMFyAHLLqz1D07rxufVs&callback=initMap" async defer></script>



<script>

    function getImagePreview(image)
    {
      // Get the modal
          var modal = document.getElementById('myModal');
        
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var modalImg = document.getElementById("img01");
        
        
          // alert(this.src);
            modal.style.display = "block";
            modalImg.src = image.src;
            modalImg.alt = image.alt;

            $('#video01').css('display','none');
                $('#img01').css('display','block');
        

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    }


    function getVideoPreview(video)
        {
          // Get the modal
              var modal = document.getElementById('myModal');
              var id = '#vid' + video.id;
            var vidsrc = $(id).val();

            // alert(vidsrc);
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var modalImg = document.getElementById("video01");
            
            
              // alert(modalImg);
                modal.style.display = "block";
                modalImg.src = vidsrc;
                $('#img01').css('display','none');
                $('#video01').css('display','block');
                // modalImg.alt = video.alt;
            

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
        }

</script>

@stop
