@extends('front.layouts.packages_header')
@section('title') Packages @endsection

@section('inlinecss')
<style>
  .carousel-control-prev {
    left: -45px;
  }

  .carousel-control-next{
    left: inherit;
    right:-37px;
  }

  .besend li {
    display: inline-block;
    width: 15%;
    font-size: 17px;
  }

  .savinimagscrow li {
    width: 15%;
  }

  .flhoactr li {
    display: inline-block;
    background-color: #fff;
    text-align: center;
    margin-top: 20px;
    margin-right: 5px;
    font-size: 16px;
    padding: 0px;
    width: 22%;
}

.carousel-indicators {
    position: absolute;
    right: -112px;
    bottom: -8px;
    left: -105px;
    z-index: 2;
    display: flex;
    justify-content: center;
    padding: 0;
    margin-right: 15%;
    margin-bottom: 1rem;
    margin-left: 15%;
    list-style: none;
}








</style>
@endsection

@section('container')

<!-- Slider -->
<section class="onclickhedre">
  <div  class="container">
    <div class="row">
      <div class="col-md-7">
        <h1 class="drkahopafr text-dark">{{$data->title}}</h1>
        <ul class="besend">
            <li class="bestseller p-1" style="width: 13%;">Best Seller</li>
            <li class="night p-1 ps-3">{{$data->nights}} Nights</li>
            <li class="days p-1 ps-3">{{$data->days}} Day's</li>
        </ul>
      </div>
      <div class="col-md-5">
        <ul class="peboen">
          <li>
          <!-- <p class="fiftetow">&#8377;52000</p> -->
          <h5 class="personper text-dark"><strong>&#8377;{{$data->price}}</strong> <sub style="font-size:13px; color:#666;">per person</sub></h5></li>
          <!-- <li><button type="submit" class="primary-button">Book Now</button></li> -->
          <li class="ms-3"><button type="submit" class="primary-buttontow" >Enquiry</button></li>
        </ul>
      </div>
    </div>
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="navbarnav">
              <ul class="phhoindetdabout">
                <a href="#Photos"><li class="active">Photos</li></a>
                <a href="#Itinerary"><li>Hotels & Transport</li></a>
                <a href="#Inclusions"><li>Inclusions</li></a>
                <a href="#t&c"><li>T & C</li></a>
                <a href="#Itinerary"><li>Detailed Itinerary</li></a>
                <a href="#AboutPlace"><li class="me-0">About The Place</li></a>
              </ul>
            </div>
          </div>
        </div>
  </div>
</section>
<section class="savinimagscrow" id="Photos">
    <div class="container">
        <div class="topbootamborder">
            <div class="row">
                <div class="col-md-8 pt-3">
                    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-mdb-ride="carousel">
                        <div class="carousel-inner mb-5">
                            @foreach($data->gallery_images as $key=>$val)
                            <div class="carousel-item @if($key == 0) active @endif">
                                <img class="dblokimages" src="{{asset($val->images)}}" class="d-block w-100" alt="..." />
                            </div>
                            @endforeach
                        </div>
                        <!-- Slides -->

                        <!-- Controls -->
                        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <!-- Controls -->

                        <!-- Thumbnails -->

                        <div class="carousel-indicators" style="margin-bottom: -20px;">
                            @foreach($data->gallery_images as $key=>$val) 
                          <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="{{$key}}" @if($key == 0) class="active" @endif aria-current="true"
                            aria-label="Slide 1" style="width: 200px;opacity: inherit;">
                            <img class="d-block w-100 rounded" height="75px" src="{{asset($val->images)}}" />
                          </button>
                            @endforeach
                        </div>
                    </div>
                </div>
                    <div class="col-md-4 col-sm-6 pt-3">
                      <div class="properly">
                        <img class="recommend" src="images/Agra.png" />
                        <h1 class="modulesis">Customizable Tour</h1>
                        <p class="indimpnd">You can also import individual SCSS modules. location directly to your project and import in the same way as CSS files.</p>
                        <img class="recommend" src="images/Agra.png" />
                        <h1 class="modulesis">Pay &Hold</h1>
                        <p class="indimpnd">
                            You can also import individual SCSS modules. To do it properly, we recommend to copy them from the node_modules/mdb-ui-kit/src/scsscopy them from the location directly to your project and import in the same way
                            project and import in the same way as CSS files.
                        </p>
                        <ul class="flhoactr">
                            <li><i class="fa-brands fa-accessible-icon"></i>0 Flight</li>
                            <li><i class="fa-brands fa-accessible-icon"></i>4 Hotels</li>
                            <li><i class="fa-brands fa-accessible-icon"></i>8 Activites</li>
                            <li><i class="fa-brands fa-accessible-icon"></i>5 Transfers</li>
                        </ul>
                      </div>
                    </div>

                    <div class="my-scroller col-md-8">
                      <ul class="inline my-listview no-bdr no-pad prop-block p-0" >
                        @if(isset($data->inclusion_name) && $data->inclusion_name[0] != '')
                        <li class="info-block hidden-md ng-scope" data-ng-controller="inclusionsController" style="width:50%;" data-ng-if="holidayData.packageInclusionTypes != null &amp;&amp; holidayData.packageInclusionTypes.length > 0">
                            <h3 class="customTitle">Inclusions</h3>
                            <ul class="flhoactr">
                              @foreach($data->inclusion_name as $key=>$val)
                                <li class="ng-scope">
                                <img src="{{asset($val->image)}}" height="35px" width="35px" />
                                  <div>{{$val->title}}</div>
                                  
                                </li>
                              @endforeach
                            </ul>
                        </li>
                        @endif
                        @if(isset($data->theme_name) && $data->theme_name[0] != '')
                        <li class="info-block ng-scope" style="width:49%;">
                            <h3 class="customTitle" style="margin-left: 30px !important;">Themes</h3>
                            <ul class="flhoactr" id="packageThemes" style="margin-left: 30px;">
                              @foreach($data->theme_name as $key=>$val)
                                <li>
                                  <img src="{{asset($val->image)}}" height="20px" />
                                  <div>{{$val->title}}</div>
                                </li>
                              @endforeach
                            </ul>
                        </li>
                        @endif
                      </ul>
                    </div>

            </div>
        </div>
    </div>
</section>

  <section class="viewesover">
    <div class="container">
      <div class="topbootamborder">
        <div class="row">
        <div class="col-md-12">
          <h1 class="overviews">Overview</h1>
          <p class="importsperagarf">You can also import individual SCSS modules. To do it properly, we recommend to copy them from the node_modules/mdb-ui-kit/src/scss location directly to your project and import in the same way as CSS files You can also import individual SCSS modules. To do it properly, we recommend to copy them from the node_modules/mdb-ui-kit/src/scss location directly to your project and import in the same way as CSS files.You can also import individual SCSS modules. To do it properly, we recommend to copy them from the node_modules/mdb-ui-kit/src/scss location directly to your project and import in the same way as CSS files.</p>
        </div>
      </div>
      </div>
    </div>
  </section>

  <section class="tabesboot" id="Itinerary">
    <div class="container">
        <div class="topbootamborder">
            <div class="row">
                <div class="col-md-12">
                    <div class="prd-dtl">
                        <ul class="nav nav-tabs mb-3" id="myTab0" role="tablist">
                          @foreach($data->itineraries as $key=>$val)
                            <li class="nav-item" role="presentation">
                              <button class="nav-link @if($key == 0)active @endif" style="border-radius:inherit;" id="itineraries-tab{{$key}}" data-mdb-toggle="tab" data-mdb-target="#itineraries{{$key}}" type="button" role="tab" aria-controls="itineraries{{$key}}" @if($key == 0) aria-selected="true" @endif>
                                  Day-{{$key + 1}}
                              </button>
                            </li>
                          @endforeach
                        </ul>
                        <div class="tab-content" id="myTabContent0">
                          @foreach($data->itineraries as $key=>$val)
                            <div class="tab-pane itineraries fade @if($key == 0)show active @endif" id="itineraries{{$key}}" role="tabpanel" aria-labelledby="itineraries-tab{{$key}}">
                                <ul class="kafromday">
                                    <li>{{$val->city_name->name}}</li>
                                    <li class="forday">Day-{{$key + 1}}</li>
                                </ul>
                                <!-- <a class="buoott" href="#"></a> -->
                                <div class="borderoptiona">
                                    <ul class="flnedeoption">
                                      <li class="ones">
                                          <div class="aroopalnimages"><img src="{{asset($val->image)}}" /></div>
                                      </li>

                                      <li class="tows w-25">
                                          <h4>{{$val->title}}</h4>
                                          <!-- <h6>Optional</h6> -->
                                      </li>

                                      <li class="fors flight-info w-50">
                                          <span class="textlaft">{{$val->description}} </span>
                                      </li>
                                    </ul>
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

    {{-- <section class="clanders">
      <div class="container">
        <div class="row">
          <div class="topbootamborder">
            <div class="col-md-12">
              <img src="images/clander.jpg">
            </div>
          </div>
        </div>
      </div>
    </section> --}}
    <section class="dummyipsum" id="Inclusions">
      <div class="container">
       <div class="topbootamborder">
          <div class="row">
          <div class="col-md-6">
            <h1>Inclusions</h1>
            <ul>
              @foreach($data->includes as $key=>$val)
                <li><i class="fa-solid fa-check"></i> {{$val->title}}</li>
              @endforeach
            </ul>
          </div>
          <div class="col-md-6">
            <h1>Exlclusinos</h1>
            <ul>
              @foreach($data->excludes as $key=>$val)
                <li><i class="fa-solid fa-check"></i> {{$val->title}}</li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="divdercolsixe">
            <div class="row">
          <div class="col-md-6">
            <h1> Payment Police</h1>
            <ul>
              @foreach($data->payment_policy as $key=>$val)
                <li><i class="fa-solid fa-check"></i> {{$val->title}}</li>
              @endforeach
            </ul>
          </div>
          <div class="col-md-6">
            <h1>Cancellation Police</h1>
            <ul>
              @foreach($data->cancellation as $key=>$val)
                <li><i class="fa-solid fa-check"></i> {{$val->title}}</li>
              @endforeach
            </ul>
          </div>
        </div>
       </div>
        </div>
      </div>
    </section>
      <section class="typesetting" id="t&c">
        <div class="container">
          <div class="topbootamborder">
              <div class="row">
            <div class="col-md-12">
              <h1 class="tercondion">Terms & Conditions</h1>
              <p class="scrambled">{!!$data->terms!!}</p>
            </div>
          </div>
          </div>
        </div>
      </section>
       <section class="typesetting" id="AboutPlace">
        <div class="container">
          <div class="topbootamborder">
              <div class="row">
              <div class="col-md-3">
                <img src="{{asset($data->banner_image)}}">
              </div>
              <div class="col-md-9">
                <h1 class="tercondion">About Place</h1>
                <p class="scrambled">{!!$data->description!!}</p>
              </div>
            </div>
            </div>
          </div>
        </section>
     
@endsection

@section('scriptjs')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


  <script>
      $(document).ready(function() {
          $('.navbar-toggler').click(function() {
              $('body').addClass('header-active');
          });
          $('#btnremove').click(function() {
              $('body').removeClass('header-active');
          });
      });



      function updateIndicatorsVisibility() {
        const indicatorsContainer = document.querySelector('.carousel-indicators-container');
        const indicators = document.querySelector('.carousel-indicators');
        const nextButton = document.getElementById('next-indicators');

        // Check if the total number of indicators exceeds the visible count (e.g., 6)
        const visibleCount = 6; // Adjust this value as needed
        const indicatorsCount = indicators.childElementCount;

        if (indicatorsCount > visibleCount) {
            nextButton.classList.remove('d-none');
        } else {
            nextButton.classList.add('d-none');
        }
    }

    // Call the function when the page loads and when the window is resized
    window.addEventListener('load', updateIndicatorsVisibility);
    window.addEventListener('resize', updateIndicatorsVisibility);

    
    </script>
    
@stop