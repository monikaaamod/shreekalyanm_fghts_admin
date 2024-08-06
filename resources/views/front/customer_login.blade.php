@extends('front.layouts.app')
@section('inlinecss')

@section('container')

<section class="customer mb-4">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="side_img">
          <img src="{{asset('front/images/Side-img.png')}}" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="register_first">
          <h1>Login</h1>
          <div class="first_login">
            <a href="#">Login to your account</a>
          </div>
          <form action="{{route('login_store')}}" method="post" id="submitForm">
            @csrf
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            {{-- <div class="reset_password">
                <a href="#">Reset Password?</a>
            </div> --}}
            <div class="reset">
                <button type="submit" class="btn" id="submitButton">Submit</button>
            </div>
            <div class="slip_sign">
                <p>Don’t have an account? <a href="{{route('auth.register')}}">Sign Up</a></p>
            </div>
          </form>
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

@endsection

@section('inlinejs')

  <script>
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
  </script>

@stop