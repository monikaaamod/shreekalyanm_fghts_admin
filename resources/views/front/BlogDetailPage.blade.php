@extends('front.layouts.app')
@section('inlinecss')
<style>
    .blog-img p {
   overflow: hidden;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
           line-clamp: 2; 
   -webkit-box-orient: vertical;
}
    .short {
   overflow: hidden;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
           line-clamp: 2; 
   -webkit-box-orient: vertical;
}

.may_img span {
    overflow: hidden;
    padding-left: 15px;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    line-clamp: 2;
    font-weight: 600;
    -webkit-box-orient: vertical;
}


.blog-card{
    position: relative;
    width: 100%;
    height: 200px;
    cursor: pointer;
    border-radius: 16px;
    box-shadow: 0 0 13px 0px rgba(0,0,0,.3);
    transition: .5s;
    overflow: hidden;
    margin: .85rem;
}
.blog-card:hover {
    height: 333px;
}

.blog-card img{
    width: 100%;
    border-radius: 16px;
    transition: .5s;
    height: 250px;
}
.blog-card:hover img{
    border-radius: 16px 16px 0 0;
}

.blog-card .blog-card-body{
    padding: .5rem .85rem 1rem;
    height: 0;
}

.blog-card .blog-card-body h6{
    margin: .5rem 0;
    font-size: .85rem;
    color: crimson;
    letter-spacing: 3px;
}

.blog-card .blog-card-body p{
    text-align: justify;
    font-size: .9rem;
    line-height: 25px;
}

.blog-card .blog-card-body div{
    text-align: right;
    width: 100%;
}

.blog-card .blog-card-body div a{
    position: relative;
    text-decoration: none;
    color: #526ffd;
    padding: .5rem;
    text-align: center;
    z-index: 999;
    font-size: .85rem;
}

.blog-card .blog-card-body div a::before{
    position: absolute;
    content: '';
    width: 13px;
    height: 13px;
    background: #526ffd;
    border-radius: 300px;
    left: -13px;
    top: 3px;
    z-index: -1;
    transition: .3s;
}

.blog-card .blog-card-body div a:hover{
    color: #fff;
}

.blog-card .blog-card-body div a:hover::before{
    width: 100%;
    height: 88%;
    left: 0;
}

.art_201 .art_wrtr .lazy {
    width: 50px;
    height: auto;
    margin: 0 6px 0 0;
    border-radius: 50%;
    float: left;
}

.art_201 .art_wrtr p {
    display: inline-block;
    margin: 6px 4px;
}
.art_201 .art_wrtr p .wrtr_nm {
    font: 13px/150% Roboto,sans-serif;
    display: block;
}

.art_201 .art_wrtr p .pbls_dt {
    font: 400 13px/150% Roboto,sans-serif;
    display: block;
}

.art_share {
    float: right;
    text-align: center;
    margin: 8px 0;
}

.art_201 .art_wrtr p a {
    color: #ca155b;
}
</style>
@endsection
@section('container')


    <!-- menu -->
    <section class="menu">
        <div class="container">
            <div class="menu-bar">
                <ul>
                <li><a href="{{route('index')}}"> Home</a></li>
                <li><a href="{{route('weddingvendors')}}"> Travel Planning</a></li>
                <li><a href="{{route('weddingvendors')}}"> Event Planning</a></li>
                <li><a href="{{route('video')}}"> Video</a></li>
                <li><a href="{{route('blog')}}"> Inspirational Blogs</a></li>
                {{-- <li><a href="{{route('dashboard')}}"> Profile</a></li> --}}
                </ul>
            </div>
        </div>
    </section>

    <!-- Slider -->
 

    <!-- blog detail page start -->
    <section class="bolg_detail">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3 mt-3" style="font: 600 44px/120% Roboto,sans-serif;">{{$data->title}}</div>
                <div class="col-md-12 mb-3 short" style="font-size: 20px;color: #595959;">{{$data->short_description}}</div>
                <hr>
                <div class="art_201 mb-3">
                    <div class="art_wrtr">
                        <img class="lazy" width="274" height="273" src="@if(isset($data->auther_image) && $data->auther_image != ''){{asset($data->auther_image)}}@else{{asset('front/images/profile.png')}}@endif"  alt="img">
                        <p><span class="wrtr_nm">By
                            <a href="/author/rishabh-naudiyal" title="Rishabh Naudiyal">
                                {{$data->created_by}}</a></span>
                        <span class="pbls_dt"><span>Last Updated: </span>
                            <time itemprop="">{{ \Carbon\Carbon::parse($data->updated_at)->format('d M Y') }}</time>
                        </span>
                        </p>
                        <div class="art_share">
                            <span id="shares"><a href="#">Share <img src="{{asset('front/images/share.png')}}" alt="" style="height: 20px;"></a></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <div class="privacy">
                        
                        <div class="headingone mb-5">
                            {{-- <div class="heading_date">
                                <h1><span><a href="#">Share <img src="{{asset('front/images/share.png')}}" alt=""></a></span></h1>
                            </div> --}}
                            @if($data->type=="image" || $data->type == "")
                            <img src="{{asset($data->image_video_url)}}" height="400px" alt="">
                            @else
                            <iframe width="300" height="250" src="{{$data->image_video_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            @endif
                            <h1>{{$data->title}}</h1>
                            <p>{{($data->updated_at)}}</p>
                            <p>{!!$data->full_description!!}</p> 
                        </div>
                       
                      
                        {{-- <div class="anmol">
                            <p>By anmol Sharma <span>share this post <img src="{{asset('front/images/share1.png')}}" alt=""></span></p>
                        </div> --}}
                        
                        <!-- Related Blog -->
                        <div class="Relat mb-5">
                            <div class="relative_one">
                                <h1>Latest Blog's</h1>
                            </div>
                            
                            <div class="row">
                           
                            @foreach($latestblog as $val)
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                <a href="{{route('blog_details', $val->slug)}}" style="text-decoration: none;">
                                  <div class="blog-img">
                                  @if($val->type == "image" || $val->type == "")  
                                    <img src="{{asset($val->image_video_url) }}" alt="">
                                @else
                               
                                <iframe width="300" height="250" src="{{$val->image_video_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                
                                @endif
                                    <p>{{($val->short_description)}}</p>         
                                  </div>
                                  </a>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                   {{-- <div class="relative_one">
                        <h1>relativ video</h1>
                    </div>
                    <div class="col-md-12 col-sm-6 col-xs-12">
                      <div class="more_blogs_one">
                        <div class="more-blogs1">
                          <iframe width="100%" height="100%" src="https://www.youtube.com/embed/pW0_R-K_XD0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                        <div class="may_img1">
                          <h5><b>Lorem ipsum dolor sit amet consectetur.</b></h5>
                          <p>Lorem ipsum dolor sit amet consectetur. Lorem<br> ipsum dolor sit amet consectetur.Lorem ipsum dolor sit amet consectetur.Lorem ipsum dolor sit<br> amet consectetur.</p>
                        </div>
                      </div>
                    </div>
                 
                     
                   
                    <div class="col-md-12 col-sm-6 col-xs-12">
                      <div class="more_blogs_one">
                        <div class="more-blogs1">
                          <iframe width="100%" height="100%" src="https://www.youtube.com/embed/pW0_R-K_XD0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                        <div class="may_img1">
                          <h5><b>Lorem ipsum dolor sit amet consectetur.</b></h5>
                          <p>Lorem ipsum dolor sit amet consectetur. Lorem<br> ipsum dolor sit amet consectetur.Lorem ipsum dolor sit amet consectetur.Lorem ipsum dolor sit<br> amet consectetur.</p>
                        </div>
                      </div>
                    </div> --}}
                   
                    {{-- <div class="relative_one">
                        <h1>Latest Video</h1>
                    </div>
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        
                      <div class="more_blogs_one">
                        <div class="more-blogs1">
                          <iframe width="100%" height="100%" src="{{$val->video_link}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                        <div class="may_img1">
                          <h5><b>{{($val->title)}}</b></h5>
                          <p><br>{{($val->short_description)}}</p>
                        </div>
                      </div>
                     
                    </div> --}}
                    
                     

                    <div class="relative_one">
                        <h1>YOU MAY ALSO LIKE</h1>
                    </div>
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <div class="row">
                            @foreach($arj as $key=>$val)
                            <div class="blog-card">
                                <a href="{{route('blog_details', $val->slug)}}">
                                <img src="{{asset($val->image_video_url)}}" alt="vitateach" />
                                <div class="blog-card-body">
                                    <h6>{{$val->title}}</h6>
                                    <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, sit? Nesciunt porro.adipisicing elit. Sed, sit? Nesciunt porro.</p> -->
                                </div>
                                </a>
                            </div>
                          @endforeach
                          </div>

                         
                      </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    
                </div>
            </div>
        </div>
    </section>
    <!-- blog detail page end -->


    <!-- Counter -->
    <section class="beer bg-dark" style="visibility: visible; animation-name: fadeIn;">
        <div class="container-fluid">
            <div class="row">
                <!-- counter -->
                <div class="col-6 col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated"
                    data-wow-duration="300ms"
                    style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;">
                    <!-- <i class="fa fa-beer medium-icon"></i> -->
                    <img src="{{asset('front/images/search.png')}}" alt="">
                    <span id="anim-number-pizza" class="counter-number"></span>
                    <span class="timer counter alt-font appear" data-to="980" data-speed="7000">2800</span>
                    <p class="counter-title">Main Text 01</p>
                </div>
                <!-- end counter -->
                <!-- counter -->
                <div class="col-6 col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated"
                    data-wow-duration="600ms"
                    style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;">
                    <!-- <i class="fa fa-heart medium-icon"></i> -->
                    <img src="{{asset('front/images/check.png')}}" alt="">
                    <span id="anim-number-pizza" class="counter-number"></span>
                    <span class="timer counter alt-font appear" data-to="980" data-speed="7000">980</span>
                    <p class="counter-title">Main Text 02</p>
                </div>
                <!-- end counter -->
                <!-- counter -->
                <div class="col-6 col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated dell"
                    data-wow-duration="900ms"
                    style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp;">
                    <!-- <i class="fa fa-anchor medium-icon"></i> -->
                    <img src="{{asset('front/images/rose.png')}}" alt="">
                    <span id="anim-number-pizza" class="counter-number"></span>
                    <span class="timer counter alt-font appear" data-to="980" data-speed="7000">810</span>
                    <p class="counter-title">Main Text 03</p>
                </div>
                <!-- end counter -->
                <!-- counter -->
                <div class="col-6 col-md-3 col-sm-6 text-center counter-section wow fadeInUp animated dell"
                    data-wow-duration="1200ms"
                    style="visibility: visible; animation-duration: 1200ms; animation-name: fadeInUp;">
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

    <!-- gradient -->
    <!-- <section class="gradient">
        <div class="container-fluid">
            <div class="footer-top">
                <a href="#">home <span>|</span></a>
                <a href="#">About us <span>|</span></a>
                <a href="#">Portfolio <span>|</span></a>
                <a href="#">Travel Planning <span>|</span></a>
                <a href="#">Event Planning <span>|</span></a>
                <a href="#">Video <span>|</span></a>
                <a href="#">Inspirational Blogs <span>|</span></a>
                <a href="#">Contact <span>|</span></a>
                <a href="#">home <span>|</span></a>
                <a href="#">About us <span>|</span></a>
                <a href="#">Portfolio <span>|</span></a>
                <a href="#">Travel Planning <span>|</span></a>
                <a href="#">Event Planning <span>|</span></a>
                <a href="#">Video <span>|</span></a>
                <a href="#">Inspirational Blogs <span>|</span></a>
                <a href="#">Contact <span>|</span></a>
                <a href="#">home <span>|</span></a>
                <a href="#">About us <span>|</span></a>
                <a href="#">Portfolio <span>|</span></a>
                <a href="#">Travel Planning <span>|</span></a>
                <a href="#">Event Planning <span>|</span></a>
                <a href="#">Video <span>|</span></a>
                <a href="#">Inspirational Blogs <span>|</span></a>
                <a href="#">Contact <span>|</span></a>
                <a href="#">home <span>|</span></a>
                <a href="#">About us <span>|</span></a>
                <a href="#">Portfolio <span>|</span></a>
                <a href="#">Travel Planning <span>|</span></a>
                <a href="#">Event Planning <span>|</span></a>
            </div>
        </div>
    </section> -->
    @endsection