<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('admin/css/snackbar.css') }}">
    <link rel="stylesheet" href="{{asset('/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/font-awesome.css')}}">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" /> -->
    <link rel="stylesheet" href="{{asset('/front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/media/media.css')}}">

    <style>
      .maindiv p {
   overflow: hidden;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
           line-clamp: 2; 
   -webkit-box-orient: vertical;
}
    </style>
</head>
<body>

<header class="top-header bg-dark">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark px-0 py-3">
        <div class="container-xl">
        <a class="navbar-brand logo" href="#">
        <a href="{{$social_id->youtube}}"><img src="{{asset('front/images/subscribe.png')}}" class="h-8" alt="..."></a>
          @php
            $social_id = socialId();
          @endphp
          <div class="img-icon"> 
          <a href="{{$social_id->facebook}}"><img src="{{asset($social_id->facebook_icon)}}" alt=""></a>
          <a href="{{$social_id->insta}}"><img src="{{asset($social_id->instagram_icon)}}" alt=""></a>
          <a href="{{$social_id->twitter}}"><img src="{{asset($social_id->twitter_icon)}}" alt=""></a>
          <a href="{{$social_id->youtube}}"><img src="{{asset($social_id->youtube_icon)}}" alt=""></a>
          </div>
        </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
          aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav mx-lg-auto">
            <img src="images/logo.png" alt="">
          </div>
          <div class="navbar-nav ms-lg-4 links button">
            <a class="nav-item nav-link text-white" href="{{route('front.vendorLogin')}}">Start selling</a>
            <a class="nav-item nav-link text-white login loginButton">Login</a> 
          </div>
          <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="display:none;" id="safdsaf" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>
@if(!Session::has('otp'))
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log In or Sign Up to Shree Kalyanam</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="submitForm" method="post" action="{{ route('otp.generate') }}" autocomplete="off"> {{csrf_field()}}
        <div class="modal-body">
        <input type="hidden" id="login_pag" name="login_pag" value="login_pag"/>  
          <input class="form-control me-2"type="text" id="mobileNumber" name="mobile_no" onkeypress="return isNumberKey(event)" minlength="10" maxlength="10" placeholder="Enter Mobile Number">
        </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submitButton">Generate OTP</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endif

<!-- Slider -->

<section class="sliderbackccimage">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="backcoler">
          <h2 style="color:#FFFFFF;">Log In or Sign Up to Shree Kalyanam</h2>
          
          
           <input style="width:24%;" class="form-control loginButton me-2"type="text" id="mobileNumber" name="mobile_no" onkeypress="return isNumberKey(event)" minlength="10" maxlength="10" placeholder="Enter Mobile Number">
           <button type="submit" class="loginButton" class="mt-3">Login</button>
          
        </div>
      </div>
    </div>
  </div>
</section>

     <section class="colfore">
       <div class="container">
         <div class="row">
          @foreach($team as $key=>$val)
           <div class="col-md-4">
             <div class="maindiv">
               <img class="colthere" src="{{asset($val->image)}}">
               {!! $val->description !!}
               <h6 class="namess">{{$val->title}}</h6>
               <p class="fromese">{{$val->post}}</p>
             </div>
           </div>
          @endforeach
            {{-- <div class="col-md-4">
             <div class="maindiv">
               <img class="colthere" src="{{asset('front/images/img13.png')}}">
               <p class="unknown">Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
               <h6 class="namess">govind Ram kumawat</h6>
               <p class="fromese">From jaipur</p>
             </div>
           </div>
            <div class="col-md-4">
             <div class="maindiv">
               <img class="colthere" src="{{asset('front/images/img13.png')}}">
               <p class="unknown">Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
               <h6 class="namess">govind Ram kumawat</h6>
               <p class="fromese">From jaipur</p>
             </div>
           </div> --}}
         </div>
       </div>
     </section>

      <section>
        <div class="container">
          <div class="divders">
            <div class="row">
            <div class="col-md-4">
              <div class="colfors">
                <h5>why sell onlline</h5>
              </div>
            </div>
            <div class="col-md-4">
              <div class="colfors">
                <h5>why sell onlline</h5>
              </div>
            </div>
            <div class="col-md-4">
              <div class="colfors">
                <h5>why sell onlline</h5>
              </div>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="colforseen">
              <p class="recently">Welcome back to our wedding vendor portal! Whether you're a talented photographer capturing beautiful moments, a skilled florist adding elegance to every event, or any other type of wedding professional, we're excited to have you here. This is your space to manage your bookings, showcase your portfolio, and connect with couples who are eagerly planning their special day.</p>
              <p class="recently">If you're new to our platform and looking to join our vibrant vendor community, we encourage you to hit the "Vendor Registration" button and start the journey of presenting your expertise to a wider audience. Our dedicated support team is here to assist you with any queries or concerns you may have. Feel free to reach out to us at [support email/phone number] for prompt assistance.</p>
              <p class="recently">We're thrilled to continue collaborating with you in creating magical wedding experiences!</p>
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

<footer class="footer">
  <div class="container-fluid">
    <div class="footer-footer">
      <div class="shree1">
        <a href="{{route('index')}}"><img src="{{asset('front/images/logo.png')}}" alt=""></a>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="footer-links">
            <ul>
              <li>
              <a href="{{route('index')}}">Home |</a>
                <a href="{{route('aboutus')}}">About Us |</a>
                <a href="{{route('video')}}">Video |</a>
                <a href="{{route('blog')}}">Inspirational Blogs |</a>
                <a href="{{route('weddingvendors')}}">Travel Planning |</a>
                <a href="{{route('weddingvendors')}}">Event Planning |</a>
                {{-- <a href="{{route('checkout')}}">Checkout |</a>
                <a href="{{route('choosecity')}}">Choosecity |</a>--}}
                <a href="{{route('weddingvendors')}}">Wedding vendors |</a> 
                <a href="{{route('faqs')}}">Faqs |</a> 
                <a href="{{route('privacy_policy')}}">Privacy Policy</a> 
                {{--<a href="{{route('dashboard')}}">Dashboard |</a>
                 <a href="{{route('choosecity')}}">Choosecity |</a> 
                <a href="{{route('vendor_dashboard_table')}}">Choosecity |</a>
                <a href="{{route('vendor_gallery')}}">Choosecity |</a> --}}
                {{-- <a href="#">Portfolio |</a>
                 <a href="#">Contact |</a> --}}
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2">
          <div class="shree">
            <a href="{{route('index')}}"><img src="{{asset('front/images/logo.png')}}" alt=""></a>
          </div>
        </div>
        @php
            $contact_detail = getContactDetails();
        @endphp
        <div class="col-md-5">
          <div class="gmails">
            <p><img src="{{asset('front/images/phone.png')}}" alt=""> +91- {{$contact_detail->mobile}} <span> <img src="{{asset('front/images/gmail.png')}}" alt=""> {{$contact_detail->email}}</span></p>
            <p><img src="images/location.png" alt="">  {{$contact_detail->address}}</p>
          </div>
          <div class="gmails1">
            <p><img src="{{asset('front/images/phone.png')}}" alt=""> +91- 99999 99999, +91- 88888 88888</p>
            <p><img src="{{asset('front/images/gmail.pn')}}g" alt=""> info@shreekalyanam@gmail.com</p>
            <p><img src="{{asset('front/images/location.png')}}" alt=""> P2, Awadh Puri, Opposite Ram Mandir, <span>Lalkothi, Jaipur, Rajasthan, 302001</span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- footer-bottom -->
<section class="footer-bottom">
  <div class="copyright">
    <marquee behavior="alternate" direction="left">
    <p>2023 - All Right Reserved. | Shreekalyam</p>
    </marquee>
  </div>
  <!-- <div class="copyright1">
    <p>2023 - All Right Reserved. | Shreekalyam</p>
  </div> -->
</section>

{{-- #ffcd97 --}}
@if(Session::has('otp'))
<div class="modal fade" 
     id="myModal" 
     tabindex="-1" 
     aria-labelledby="exampleModalLabel" 
     aria-hidden="true"
     >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verify Your OTP</h5>
        {{-- <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button> --}}
      </div>
      <form id="submitForm" class="digit-group" action="{{ route('otpsubmit') }}"> 
          @csrf
      <div class="modal-body">
        <h2>OTP Sent To @if(isset($mobile))<span><u>{{$mobile}}</u></span> @endif</h2> 
        <input type="hidden" id="mobile" name="mobile" @if(isset($mobile)) value="{{$mobile}}" @endif/>    
        <input type="text" style="width: 60%;" id="mobileNumber" class="form-control text-center" onkeypress="return isNumberKey(event)" name="otp" maxlength="4" placeholder=" ----"/>
      </div>
      <div class="modal-footer">
      <a @if(isset($mobile)) href="{{route('otp.generate',base64_encode($mobile),base64_encode(1))}}" @endif><button type="button" class="btn btn-secondary" >Resend OTP</button></a>
        <button type="submit" id="submitButton" class="btn btn-primary">Verify OTP</button>
      </form>
      </div>
    </div>
  </div>
</div>
@endif


<script
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>
  <script src="{{asset('admin/js/snackbar.js')}}" charset="utf-8"></script>
  @if(Session::has('otp'))
<script>
// snackbar

$(document).ready(function(){
    $("#myModal").modal('show');
});
</script>
@endif
<script>

function isNumberKey(evt) {

var charCode = (evt.which) ? evt.which : evt.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
return true;
}

function buttonLoading(processType, ele) {
            if (processType == 'loading') {
                ele.html(ele.attr('data-loading-text'));
                ele.attr('disabled', true);
            } else {
                ele.html(ele.attr('data-rest-text'));
                ele.attr('disabled', false);
            }
        }

        function successMsg(heading, message, html = "") {

            Snackbar.show({
                text: message,
                backgroundColor: '#232323',
                width: '475px',
                pos: 'bottom-right'
            });

        }

        function errorMsg(heading, message) {
            Snackbar.show({
                text: message,
                backgroundColor: '#930000',
                width: '475px',
                pos: 'bottom-right'
            });
        }
 

                // snackbar
                               
  $(function () {
           $('#submitForm').submit(function(){
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
                          // alert(data.url);
                          window.location.href = data.url;
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

        $(".loginButton").click(function() {
          $("#safdsaf").click();
        });

</script>
