@extends('front.layouts.vendor_header') @section('stylecss')

<style>
    .disnone {
        display: none;
    }

    .banner_height{
      height:250px;
    }

    /* image model */


    
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
</style>
@endsection @section('content')

<!--  myprofiledit -->
<div class="topheadermanu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="myprofilea" href="#">My Profile</a>
                <a class="myprofileedite" href="#">Edit<i class="bi bi-pencil-fill"></i></a>
            </div>
        </div>
    </div>
</div>

<section class="fromesection form_slip" id="profile">
    <div class="container">
        <div class="backcolor">
            <form action="{{route('update_profile',$vendor->id)}}" id="submitForm" method="post" enctype="multipart/form-data">
              @csrf
                <div class="row">
                    <div class="col col-md-6">
                        <div id="business-name" class="disnone">The business name field is required</div>
                        <input type="text" class="form-control" id="business_name" value="{{isset($vendor)?$vendor->business_name:''}}" name="business_name" type="text" placeholder="Business Name" />
                    </div>
                    <div class="col col-md-6">
                        <div id="business-mobile" class="disnone">The business mobile no field is required</div>
                        <input
                            class="form-control"
                            id="business_number"
                            value="{{isset($vendor)?$vendor->business_number:''}}"
                            onkeypress="return isNumberKey(event)"
                            minlength="10"
                            maxlength="10"
                            name="business_number"
                            type="text"
                            placeholder="Business Mobile No."
                        />
                    </div>
                    <div class="col col-md-6">
                        <div id="business-email" class="disnone">The business email field is required</div>
                        <div id="business-email-valid" class="disnone">Please enter a correct email</div>
                        <input type="email" class="form-control" id="business_email" name="business_email" type="text" value="{{isset($vendor)?$vendor->business_email:''}}" placeholder="Enter Business Email" />
                    </div>
                    <div class="col col-md-6">
                        <input class="form-control" id="business_website" name="business_website" type="text" value="{{isset($vendor)?$vendor->business_website:''}}" placeholder="Enter Business Website" />
                    </div>
                    <div class="col col-md-6">
                        <div id="category-name" class="disnone">The category name field is required</div>
                        <p>
                            Selection of Category :
                            <select class="select" name="category_name" id="category_name">
                                <option value="">Select</option>
                                @foreach($category as $key=>$val)
                                <option @if(isset($vendor)) @if($vendor->category_name == $val->id) selected @endif @endif value="{{$val->id}}">{{$val->category_name}}</option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                    <div class="col col-md-6">
                        <div id="business-type" class="disnone">The business type field is required</div>
                        <p>
                            Type of Business :
                            <select class="select selectone" name="business_type" id="business_type">
                                <option value="">Select Business Type</option>
                                @foreach($business_type as $key=>$val)
                                <option value="{{$val->id}}">{{$val->title}}</option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                    <div class="col col-md-6">
                        <div id="city-name" class="disnone">The city name field is required</div>
                        <p>
                            Selection of City :
                            <select class="select selecttwo" name="city_name" id="city_name">
                                <option value="">Select</option>
                                @foreach($city as $val)
                                <option name="city_name" id="city_name" @if(isset($vendor)) @if($vendor->
                                    city_name == $val->city_names->city_name) selected @endif @endif value="{{$val->city_names->city_name}}">{{$val->city_names->city_name}}
                                </option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                    <div class="col col-md-6">
                        <div id="invalid-pincode" class="disnone">The pincode field is required</div>
                        <div class="row Pincode">
                            <!-- <label for="inputPin" class="col-sm-2 col-form-label"></label> -->
                            <div class="col-sm-10">
                                <input
                                    class="form-control"
                                    type="text"
                                    name="pincode"
                                    id="pincode"
                                    onkeypress="return isNumberKey(event)"
                                    minlength="6"
                                    maxlength="6"
                                    value="{{isset($vendor)?$vendor->pincode:''}}"
                                    placeholder="Enter Pincode "
                                />
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-12 the_business">
                        <div id="about-business" class="disnone">The about business field is required</div>
                        <label for="exampleFormControlTextarea1">About the Business :</label>
                        <textarea class="form-control" type="text" id="about_business" name="about_business" value="{{isset($vendor)?$vendor->about_business:''}}" row="3" placeholder="About the  Business">
                          {{isset($vendor)?$vendor->about_business:''}}
                        </textarea>
                    </div>
                    <div class="col col-md-12 the_business">
                        <div id="business-location" class="disnone">The business location field is required</div>
                        <label for="exampleFormControlTextarea1">Business Location :</label>
                        <textarea class="form-control" id="business_location" value="{{isset($vendor)?$vendor->business_location:''}}" name="business_location" type="text" row="3" placeholder="Business Location">
                            {{isset($vendor)?$vendor->business_location:''}}
                        </textarea>
                    </div>
                    <h2>Social Media Links :</h2>
                    <div class="col-md-12">
                        <div class="social">
                            <img src="{{asset('front/images/facebook.png')}}" alt="" />
                            <input type="text" class="form-control" value="{{isset($vendor)?$vendor->facebook:''}}" name="facebook" id="facebook" placeholder="@Facebook profile url" />
                        </div>
                        <div class="social">
                            <img src="{{asset('front/images/instagram.png')}}" alt="" />
                            <input type="text" class="form-control" value="{{isset($vendor)?$vendor->instagram:''}}" name="instagram" id="instagram" placeholder="@Instagram profile url" />
                        </div>
                        <div class="social">
                            <img src="{{asset('front/images/twitter.png')}}" alt="" />
                            <input type="text" class="form-control" value="{{isset($vendor)?$vendor->twitter:''}}" name="twitter" id="twitter" placeholder="@Twitter profile url" />
                        </div>
                        <div class="social">
                            <img src="{{asset('front/images/linkedin.png')}}" alt="" />
                            <input type="text" class="form-control" value="{{isset($vendor)?$vendor->linkedin:''}}" name="linkedin" id="linkedin" placeholder="@Linkedin profile url" />
                        </div>
                        <div class="social">
                            <img src="{{asset('front/images/youtube.png')}}" alt="" />
                            <input type="text" class="form-control" value="{{isset($vendor)?$vendor->youtube:''}}" name="youtube" id="youtube" placeholder="@Youtube profile url" />
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6"></div>
                    </div>
                </div>

                {{--
                <div class="twobutton">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <button class="Deletead">Delete</button>
                                <button class="edite">Edite</button>
                            </div>
                        </div>
                    </div>
                </div>
                --}}
                <section>
                    <div class="container mt-3">
                        <div class="backcolor">
                            <div class="profilebanner">
                                <div class="row">
                                    <div class="col-md-4">Choose profile :</div>
                                    <div class="col-md-4">Choose Profile banner :</div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="Gal">
                                            <li class="Uploadimages">
                                                <div class="Neon Neon-theme-dragdropbox">
                                                    <input
                                                        style="z-index: 999; opacity: 0; width: 100px; height: 66px; position: absolute; right: 0px; left: 0px; margin-right: auto; margin-left: auto;" accept="image/png, image/jpeg"
                                                        name="image"
                                                        id="image"
                                                        type="file"
                                                    />
                                                    <div class="Neon-input-dragDrop">
                                                        <div class="Neon-input-inner"><i class="fa-solid fa-arrow-up-from-bracket"></i></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="galimages"><img src="{{asset($vendor->image)}}" onclick='getImagePreview(this);' id="imgPreview" class="w-100 shadow-1-strong mb-4" alt="Boat on Calm Water" /></li>
                                        </ul>
                                    </div>
                                    
                                    <div class="col-md-8">
                                        <div class="drthup">
                                            <div class="Uploadima">
                                                <div class="Neon Neon-theme-dragdropbox">
                                                    <input
                                                        style="z-index: 999; opacity: 0; width: 100px; height: 66px; position: absolute; right: 0px; left: 0px; margin-right: auto; margin-left: auto;" accept="image/png, image/jpeg"
                                                        name="banner[]"
                                                        id="banner"
                                                        multiple="multiple"
                                                        type="file"
                                                    />
                                                    <div class="Neon-input-dragDrop">
                                                        <div class="Neon-input-inner"><i class="fa-solid fa-arrow-up-from-bracket"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach($vendor->banner_images as $key=>$val)
                                              <input type="hidden" name="idd[]" value="{{$val->id}}">
                                            @endforeach
                                            <div class="Uploadi" id="imgPreview2">
                                                @foreach($vendor->banner_images as $key=>$val)
                                                  <input type="hidden" name="idd[]" value="{{$val->id}}">
                                                <img src="{{asset($val->banner_images)}}" onclick='getImagePreview(this);' height="250px" class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
                                                
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="dateuplod">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <button class="Updatesb" type="submit" id="submitButton">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
          </form>
        </div>
    </div>
</section>

<div class="container display_none" id="payment_policy">
    <div class="pulvinar">
      <div class="row">
        <div class="col-md-12">
          @foreach($vendor->pp as $key=>$val)
          <h5 class="paymentpolice"><i class="bi bi-check2-circle"></i>Payment Policy</h5>
          <p class="Bibendum">{{$val->description}}</p>
          @endforeach
          @foreach($vendor->cancellation as $key=>$val)
          <h5 class="paymentpolice"><i class="bi bi-check2-circle"></i>Cancellation</h5>
          <p class="Bibendum">{{$val->description}}</p>
          @endforeach
          <h5 class="paymentpolice"><i class="bi bi-check2-circle"></i>Terms & Conditions</h5>
          <p class="Bibendum">{{$vendor->terms_condi}}</p>
        </div>
      </div>
    </div>
  </div>

<div id="myModal" class="modal">
  <span class="close">X</span>
  <img class="modal-content" id="img01">
</div>
                

@endsection @section('scriptjs')

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<script>


    $("#image").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $("#imgPreview").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('banner').addEventListener('change', function(e) {
      const files = e.target.files;
    const previewContainer = document.getElementById('imgPreview2');
    
    // Clear the previous previews
    previewContainer.innerHTML = '';

    // Loop through the selected files
    for (const file of files) {
      // Check if the file is an image
      if (file.type.startsWith('image/')) {
        const reader = new FileReader();

        // Read the file as a URL
        reader.readAsDataURL(file);

        // When the file is loaded, create a preview image
        reader.onload = function(e) {
          const img = document.createElement('img');
          img.src = e.target.result;
          img.classList.add('preview-image', 'w-100', 'shadow-1-strong', 'rounded', 'mb-4','banner_height');
          // img.appendChild('height', '250px');
          previewContainer.appendChild(img);
        }
      }
    }
  });

  function getImagePreview(image)
    {
      
      // Get the modal
          var modal = document.getElementById('myModal');
        
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var modalImg = document.getElementById("img01");
        
        
        
            modal.style.display = "block";
            modalImg.src = image.src;
            modalImg.alt = image.alt;
                // $('#img01').css('display','block');
        
                
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // alert(span);
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    }

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
                        
                        successMsg('Vendor Update', data.msg);
                        $('#submitForm')[0].reset();
                        setTimeout(function() {
                          // alert(data.url);
                          location.reload();
                                }, 1000);
                        
                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Vendor Update', data.msg);
                    }
                    buttonLoading('reset', $this);
                },
                error: function() {
                    errorMsg('Vendor Update', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }
            });
            return false;
           });
           
        });

        $(".profile").click(function() {

            $(".profile").addClass('active');
            $("#profile").removeClass('display_none');
            $(".policy").removeClass('active');
            $("#payment_policy").addClass('display_none');
           
        });

        $(".policy").click(function() {

            $(".policy").addClass('active');
            $("#payment_policy").removeClass('display_none');
            $(".profile").removeClass('active');
            $("#profile").addClass('display_none');
           
        });
</script>
@stop
       
