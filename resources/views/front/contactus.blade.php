@extends('front.layouts.app')
@section('inlinecss')
<script src="https://kit.fontawesome.com/c32adfdcda.js" crossorigin="anonymous"></script>
<style>
  .container_con {
  width: 100vw;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: sans-serif;
}

.card_con {
  background-color: #ddd;
  padding: 1rem;
  border-radius: 5px;
  border: 1px solid #bbb;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 2rem;
}

.left {
  width: 25vw;
  overflow: hidden;
  border-radius: 5px;
}

.left img {
  width: inherit;
  object-fit: cover;
}

.right .contact {
  display: flex;
  gap: 1rem;
  margin-right: 1rem;
}

.form, .address {
  display: flex;
  flex-direction: column;
  padding: 1rem 0 0;
}

.form input, textarea {
  width: 100%;
  outline: none;
  background: none;
  border: none;
  border-bottom: 2px solid #000;
  padding: 10px 0;
  margin: 5px 0;
}

.usersubmit input {
  background-color: #f25;
  color: white;
  font-weight: bold;
  border-radius: 5px;
  border: none;
  width: min-content;
  padding: 15px;
  margin-bottom: 0;
  cursor: pointer;
  transition: 0.3s;
}

.usersubmit input:hover {
  background-color: #f45;
}

.address {
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

h4 {
  margin-bottom: 5px;
}

@media screen and (max-width: 700px) {
  .card_con {
    flex-direction: column;
  }
  
  .left {
    width: 60vw;
    height: 40vh;
  }
}

@media screen and (max-width: 350px) {
  .container_con {
    overflow: hidden;
  }
  .left {
    height: 20vh;
  }
  .contact {
    flex-direction: column;
  }
}


.contact-info-item {
  display: flex;
  margin-bottom: 30px;
  width:375px;
}

.contact-info-icon {
  height: 71px;
  width: 184px;
  background-color: #fff;
  text-align: center;
  border-radius: 50%;
}

.contact-info-icon i {
  font-size: 30px;
  line-height: 70px;
}

.contact-info-content {
  margin-left: 20px;
}

.contact-info-content h4 {
  color: #1da9c0;
  font-size: 1.4em;
  margin-bottom: 5px;
}

.contact-info-content p {
  color: #000;
  font-size: 1em;
}

.right h2 {
  justify-content: center;
  display: flex;
  margin-bottom: 20px;
  font-size:28px;
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

<div class="container_con">
  <div class="card_con">
    <div class="left">
      <img src="{{asset('front/images/img10.png')}}">
    </div>
    <div class="right">
      <h2>Contact Us</h2>
      <div class="contact">
        <div class="contact-info">
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-home"></i>
            </div>
            <div class="contact-info-content">
              <h4>Address</h4>
              <p>{{$data->address}}</p>
            </div>
          </div>
          
          <div class="contact-info-item">
            <div class="contact-info-icon" style="height:70px;width:70px;">
              <i class="fas fa-phone"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Phone</h4>
              <p>{{$data->mobile}}</p>
            </div>
          </div>
          
          <div class="contact-info-item">
            <div class="contact-info-icon" style="height:70px;width:70px;">
              <i class="fas fa-envelope"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Email</h4>
             <p>{{$data->email}}</p>
            </div>
          </div>
          @php
            $social_id = socialId();
          @endphp
            <div class="contact-info-item img-icon ms-5">
              <a href="{{$social_id->facebook}}"><img src="{{asset($social_id->facebook_icon)}}" alt=""></a>
              <a href="{{$social_id->insta}}"><img src="{{asset($social_id->instagram_icon)}}" alt=""></a>
              <a href="{{$social_id->twitter}}"><img src="{{asset($social_id->twitter_icon)}}" alt=""></a>
              <a href="{{$social_id->youtube}}"><img src="{{asset($social_id->youtube_icon)}}" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@section('inlinejs')

@stop

