@extends('front.layouts.packages_header')
@section('title') Packages @endsection
@section('inlinecss')
<style>
.carousel-cell {
    width: 100%;
    height: 384px;
    margin-right: 8px;
    background: #fff;
    border-radius: 5px;
    /* counter-increment: carousel-cell; */
}
</style>
@endsection
@section('container')
  <section class="forampost">
    <div class="container">
      <div class="row">
        <form method="POST" action="" accept-charset="UTF-8" id="slider-search-form"><input name="_token" type="hidden" value="CmytnXj87TBwqVzmgsHPUGChj8TKDMyRCuJ7RzpU">
            <div class="row">
              <div class="col-sm-12 col-md-12">
                <a class="flighticon" href="#"><img class="FLIGHTS" src="{{asset('front/images/21314.png')}}">Tour plan</a>
                <h1 class="destination">International Honeymoon Destination</h1>
                <div class="slider-box2 ">
                <div class="form-group icon">
                  <label for="exampleInputEmail1" class="form-label">Form </label>
                    <input type="text" value="" name="keyword" class="form-control" placeholder="Enter City Or airport">
                  </div>
                  <a class="revasfor" href="#"><i class="fa-sharp fa-solid fa-repeat"></i>
                  </a>
                    <div class="form-group icon">
                  <label for="exampleInputEmail1" class="form-label">To</label>
                    <input type="text" value="" name="keyword" class="form-control" placeholder="Enter City Or airport">
                  </div>
                    <div class="form-group ">
                  <label for="exampleInputEmail1" class="form-label">Departure </label>
                    <input type="text" value="" name="keyword" class="form-control" placeholder="Tuesday">
                  </div>
                    <div class="form-group ">
                  <label for="exampleInputEmail1" class="form-label">Return</label>
                    <input type="text" value="" name="keyword" class="form-control" placeholder="Tuesday">
                  </div>
                    <div class="form-group ">
                  <label for="exampleInputEmail1" class="form-label">Travellers&Class</label>
                    <input type="text" value="" name="keyword" class="form-control" placeholder="Econcmy">
                  </div>
            <div class="flight-btn d-flex justify-content-end w-100">
              <button type="submit" class="primary-button "><!-- <i class="fa fa-search"></i> --> SEARCH FLIGHTS</button> 
            </div>
        </div>
        </div>
      </div>
    </form>
      </div>
    </div>
  </section>
  <section class="whitebackground">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 p-0">
          <div class="slidercrowjaldives">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <h1 class="packages">Popular Packages</h1>
              <div class="carousel carousel-main" data-flickity='{"pageDots": false }'>
                @foreach ($packages->chunk(6) as $index => $packageChunk)
                  <div class="carousel-cell {{ $index === 0 ? 'active' : '' }}">
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <ul class="slidercrowjal">
                          <div class="row" style="width: 1400px !important;">
                            @foreach ($packageChunk as $package)
                              <div class="col-md-4">
                                <li>
                                  <div class="left-img">
                                      <a href="{{route('packages_detail',base64_encode($package->id))}}"><img src="{{ asset($package->banner_image) }}"></a>
                                  </div>
                                  <div class="right_cont">
                                    <div class="pack-box-tit">
                                      <a href="{{route('packages_detail',base64_encode($package->id))}}" class="text-dark"><h4 class="package">{{ $package->title }}</h4></a>
                                      <span class="nightday">{{$package->nights}} Nights/{{$package->days}} Days</span>
                                    </div>
                                    <div class="d-flex prc-book">
                                        <h5><strong>&#8377;{{ $package->price }}</strong> per person*</h5>
                                        <p><a class="booknow" href="{{route('packages_detail',base64_encode($package->id))}}">Details</a></p>
                                    </div>
                                  </div>
                                </li>
                              </div>
                            @endforeach
                          </div>
                        </ul>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
  <section class="slaidersecnd">
    <div class="container">
      <div class="row">
        <div class="col-md-12 p-0">
          <div class="corsfadslider">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{asset('front/images/Banner.png')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('front/images/Banner2.png')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('front/images/Banner3.png')}}" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev carousel-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next carousel-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection
  