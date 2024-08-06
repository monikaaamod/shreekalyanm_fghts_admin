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

<!-- Coming Soon Start -->
<div class="wrapper">
    <main class="content">
      <h1>We’re Coming Soon</h1>
      <div class="countdown">
        <div class="countdown__days">
          <div class="number"></div>
          <span class>Days</span>
        </div>
  
        <div class="countdown__hours">
          <div class="number"></div>
          <span class>Hours</span>
        </div>
  
        <div class="countdown__minutes">
          <div class="number"></div>
          <span class>Minutes</span>
        </div>
  
        <div class="countdown__seconds">
          <div class="number"></div>
          <span class>Seconds</span>
        </div>
      </div>
      <p>Subscribe & get notified!</p>
  
      <form action="">
        <input id="form-email" name="form-email" type="email" placeholder="Enter Your email"/>
        <input type="submit" value="Notify me"/>
      </form>
    </main>
  </div>
  
  <script>
    (() => {
    // Specify the deadline date
    const deadlineDate = new Date('June 30, 2023 23:59:59').getTime();
    
    // Cache all countdown boxes into consts
    const countdownDays = document.querySelector('.countdown__days .number');
    const countdownHours= document.querySelector('.countdown__hours .number');
    const countdownMinutes= document.querySelector('.countdown__minutes .number');
    const countdownSeconds= document.querySelector('.countdown__seconds .number');

    // Update the count down every 1 second (1000 milliseconds)
    setInterval(() => {    
        // Get current date and time
        const currentDate = new Date().getTime();

        // Calculate the distance between current date and time and the deadline date and time
        const distance = deadlineDate - currentDate;

        // Calculations the data for remaining days, hours, minutes and seconds
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Insert the result data into individual countdown boxes
        countdownDays.innerHTML = days;
        countdownHours.innerHTML = hours;
        countdownMinutes.innerHTML = minutes;
        countdownSeconds.innerHTML = seconds;
    }, 1000);
    })();
  </script>
<!-- Coming Soon End -->

@endsection