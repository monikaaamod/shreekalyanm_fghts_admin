@extends('front.layouts.app')
@section('inlinecss')

@section('container')
<!-- menu -->
<section class="menu">
  <div class="container">
    <div class="menu-bar">
      <ul>
        <li class="active"><a href="{{route('index')}}"> Home</a></li>
        <li><a href="{{route('comingsoon')}}"> Travel Planning</a></li>
        <li><a href="{{route('comingsoon')}}"> Event Planning</a></li>
        <li><a href="{{route('video')}}"> Video</a></li>
        <li><a href="{{route('blog')}}"> Inspirational Blogs</a></li>
        {{-- <li><a href="{{route('dashboard')}}"> Profile</a></li> --}}
      </ul>
    </div>
  </div>
</section>

<div style="justify-content: center;display: flex;">
<section class="customer mb-5 w-75">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="side_img">
          <img src="{{asset('front/images/Rectangle59.png')}}" alt="" style="height: 700px;border-radius: 10px;">
        </div>
      </div>
      <div class="col-md-6">
        <div class="register_first">
        <h1>{{$page_name}}</h1> 
        {{-- <div class="first_login">
            <a href="#">Login to your account</a>
          </div> --}}
          <form action="{{route('query')}}" method="post" id="submitForm">
            @csrf
            <div class="form-group">
              <label for="bride_name">Bride Name</label>
              <input type="text" class="form-control" id="bride_name" name="bride_name" placeholder="Please Enter Bride Name">
            </div>
            <div class="form-group">
              <label for="groom_name">Groom Name</label>
              <input type="text" class="form-control" id="groom_name" name="groom_name" placeholder="Please Enter Groom Name">
            </div>
            <div class="form-group">
              <label for="groom_name">Days of service</label>
              <input type="text" class="form-control" id="days" name="days" placeholder="Please Enter Days of service in Number">
            </div>
           {{-- <div class="form-group">
              <label for="contact_person">Contact Person</label>
              <select name="contact_person" id="contact_person" class="form-control">
                  <option value="">Select Contact</option>
                  <option value="contact1">contact1</option>
                  <option value="contact2">contact2</option>
                  <option value="contact3">contact3</option>
              </select>
            </div> --}}
            <div class="form-group">
              <label for="contact_number">Contact Person Name</label>
              <input type="text" class="form-control" id="contact_person" onkeypress="return isNumberKey(event)" minlength="10" maxlength="10" name="contact_person" placeholder="Please Enter Contact Number">
            </div>
            <div class="form-group">
              <label for="contact_number">Contact Number</label>
              <input type="text" class="form-control" id="contact_number" onkeypress="return isNumberKey(event)" minlength="10" maxlength="10" name="contact_number" placeholder="Please Enter Contact Number">
            </div>
            <div class="form-group">
              <label for="contact_email">Contact Email</label>
              <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Please Enter Email">
            </div>

            <div class="form-group">
              <label for="wedding_date">Date Of Wedding</label>
              <input type="date" class="form-control" id="wedding_date" name="wedding_date" placeholder="Please Enter Date Of Wedding">
            </div>
            <input type="hidden" name="customer_id" id="customer_id" value="{{auth()->user()->id}}">
            @if(isset($id))
            <input type="hidden" name="vendor_id" id="vendor_id" value="{{$id}}">
            @endif
            
            <div class="reset">
                <button type="submit" class="btn" id="submitButton">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

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
                          window.location.href = "{{route('thank_you')}}";
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

           var dtToday = new Date();
    
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
            
            var maxDate = year + '-' + month + '-' + day;

            // or instead:
            // var maxDate = dtToday.toISOString().substr(0, 10);

            // alert(maxDate);
            $('#wedding_date').attr('min', maxDate);

            // jQuery('#sdate').on('change', function(){
            //     var date = $(this).val();
            //     $('#edate').attr('min', date);  
            // });
           
        });
  </script>

@stop