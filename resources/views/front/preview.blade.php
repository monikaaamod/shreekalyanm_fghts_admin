
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/font-awesome.css')}}">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" /> -->
    <link rel="stylesheet" href="{{asset('/front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/media/media.css')}}">
    
  
<style>
  .card .card-body::after {
    background: url({{$image}});
    background-size: cover;
  }
</style>


  <!-- Slider -->
  <section class="slider">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" style="height:65%">
          <img src="{{$banner}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{asset('front/images/banner1.png')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{asset('front/images/banner1.png')}}" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>

    <div class="anjli">
      <div class="container">
        <div class="row">
          <div class="col col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="inner">
                    </div>
                </div>
            </div>
            </div>
          <div class="col col-md-5">
            <div class="makeover-text">
              <h2>{{$data}}</h2>
              <p><img src="{{asset('front/images/Group80.png')}}" alt=""> {{$name}} <span><img src="{{asset('front/images/Vector@2x.png')}}" alt=""> {{$address}}, {{$city}}</span></p>
              <!-- <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><style>svg{fill:#ee902c}</style><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg> -->
              <!-- <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><style>svg{fill:#ee902c}</style><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg> -->
              <!-- <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><style>svg{fill:#ee902c}</style><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg> -->
              <!-- <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><style>svg{fill:#ee902c}</style><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg> -->
              <!-- <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><style>svg{fill:#ee902c}</style><path d="M341.5 13.5C337.5 5.2 329.1 0 319.9 0s-17.6 5.2-21.6 13.5L229.7 154.8 76.5 177.5c-9 1.3-16.5 7.6-19.3 16.3s-.5 18.1 5.9 24.5L174.2 328.4 148 483.9c-1.5 9 2.2 18.1 9.7 23.5s17.3 6 25.3 1.7l137-73.2 137 73.2c8.1 4.3 17.9 3.7 25.3-1.7s11.2-14.5 9.7-23.5L465.6 328.4 576.8 218.2c6.5-6.4 8.7-15.9 5.9-24.5s-10.3-14.9-19.3-16.3L410.1 154.8 341.5 13.5zM320 384.7V79.1l52.5 108.1c3.5 7.1 10.2 12.1 18.1 13.3l118.3 17.5L423 303c-5.5 5.5-8.1 13.3-6.8 21l20.2 119.6L331.2 387.5c-3.5-1.9-7.4-2.8-11.2-2.8z"/></svg> -->
              <!-- <a href="#">125 Review</a> -->
            </div>
          </div>
          
          <!-- <div class="Send Sendone">
            <a href="#">Send Query</a>
          </div> -->
        </div>
      </div>
    </div>
  </section>






