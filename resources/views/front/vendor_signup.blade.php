<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('admin/css/snackbar.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>S K Vendor Registration Detail</title>
  <!-- CSS Link -->
  <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('front/css/style1.css')}}">
  <link rel="stylesheet" href="{{asset('front/css/upload_file.css')}}">
  <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">

  <style>
    #radio{
      position: relative;
      border: 2px solid #FD6DB2;
      border-radius: 2px;
      cursor: pointer;
      vertical-align: text-top;
      height: 20px;
      width: 20px;
      display: inline-table;
      padding: 0;
      -webkit-appearance: none;
      border-radius: 50%;
    }
    .showinvalid{
      display:block !important;
      color:red;
    }
    .disnone{
      display:none;
    }
    .banner-set{
      position: inherit !important;
      margin-top: 115px;
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

    .over{
      height: 440px;
      overflow: scroll;
    }

    .fu-btn {
        width: 70% !important;
        background-color: #e9e9e9;
        border: none;
        height: 150px;
        color: var(--vendor);
        font-size: 1em;
        font-weight: 500;
        line-height: 1.5;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 25px;
        transform: translateY(-50%);
    }

    .upload-plus {
        display: block;
        font-size: 2.5em;
        font-weight: normal;
    }

  </style>
</head>
<body>
  <header class="top-header bg-dark fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark px-0 py-3">
        <div class="container-xl">
          <a class="navbar-brand logo d-flex" href="#">
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
            <a href="{{route('index')}}"><img src="{{asset('front/images/logo.png')}}" alt=""></a>
            </div>
            {{-- <div class="navbar-nav ms-lg-4 links button">
              <a class="nav-item nav-link text-white" href="#" style="    display: flex;
                align-items: center;
                justify-content: center;">Start selling</a>
                          <a class="nav-item nav-link text-white login" href="#" style="    display: flex;
                align-items: center;
                justify-content: center;">Login</a>
            </div> --}}
            <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <!-- Slider -->
  <section class="slider banner-set">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators"></div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{asset('front/images/banner3.png')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{asset('front/images/banner3.png')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{asset('front/images/banner3.png')}}" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>
  </section>

  <section class="past_work">
    <div class="container">
      <h1 class="text-center">Vendor Registration</h1>
        <!-- Progressbar -->
        <div class="progressbar">
          <div class="progress" id="progress"></div>
          <div class="progress-step active" data-title="Personal Details"></div>
          <div class="progress-step" data-title="Business Detail"></div>
          <div class="progress-step" data-title="Bank Details"></div>
          <div class="progress-step" data-title="Services Offered"></div>
          <div class="progress-step" data-title="Past Work"></div>
          <div class="progress-step" data-title="Payment & Policy"></div>
        </div>
        
        <!-- steps -->
  <form action="{{route('front.vendor_register.store')}}" id="submitForm" enctype="multipart/form-data" method="post">
  @csrf

        <div class="form_slip">
          <div class="form-step active">
            <div class="row formone">
              <div class="col col-md-12">
                <div id="invalid-name" class="disnone">The name field is required</div>
                <input type="text" class="form-control w-50" id="register_name" value="{{isset($post)?$post->register_name:''}}" name="register_name" required type="text" placeholder="Name">
                </div>
                <div class="col col-md-12">
                <div id="invalid-email" class="disnone">The email field is required</div>
                <div id="invalid-email-valid" class="disnone">Please enter a correct email</div>
                <div id="uniqueStatus" class="text-danger"></div>
                <input class="form-control w-50" id="register_email" value="{{isset($post)?$post->register_email:''}}" name="register_email" type="email" placeholder="Email">
                </div>
                <div class="col col-md-12">
                <div id="invalid-mobile" class="disnone">The mobile no. field is required</div>
                <div id="invalid-mobile-valid" class="disnone">Please enter a correct mobile number</div>
                <input type="text" class="form-control w-50" id="register_mobile" name="register_mobile" type="text" onkeypress="return isNumberKey(event)" minlength="10" maxlength="10"  placeholder="Mobile No." value="{{$mobile}}" > 
                </div>
                <div class="col col-md-12">
                <div id="invalid-whatsapp" class="disnone">The whatsapp no. field is required</div>
                <div id="invalid-whatsapp-valid" class="disnone">Please enter a correct whatsapp number</div>
                <input class="form-control w-50" id="register_whatsapp_no" name="register_whatsapp_no" type="text" onkeypress="return isNumberKey(event)" minlength="10" maxlength="10" value="{{$mobile}}" placeholder="Whatsapp No.">
              </div>
                <div class="col col-md-12">
                <div id="invalid-gender" class="disnone">The Gender field is required</div>
                  <select name="register_gender" id="register_gender" class="form-control w-50">
                      <option value="">Select Gender</option>
                      <option @if(isset($post)) @if($post->register_gender == 'Male') selected @endif @endif value="Male">Male</option>
                      <option @if(isset($post)) @if($post->register_gender == 'Female') selected @endif @endif value="Female">Female</option>
                      <option @if(isset($post)) @if($post->register_gender == 'Other') selected @endif @endif value="Other">Other</option>
                  </select>
              </div>
              <div class="save_next">
              <a id="data1" class="btn with-50 data1 ml-auto btn-next btn-lg">Save & Next</a>
            </div>
            </div>
          </div>
        </div>


        <div class="form_slip">
          <div class="form-step">
            <div class="row formone">
              <div class="col col-md-6">
              <div id="business-name" class="disnone">The business name field is required</div>
              <input type="text" class="form-control" id="business_name" value="{{isset($post)?$post->business_name:''}}" name="business_name" type="text" placeholder="Business Name">
              </div>
              <div class="col col-md-6">
                <div id="business-mobile" class="disnone">The business mobile no field is required</div>
                <div id="invalid-business-mobile" class="disnone">Please enter a correct business number</div>
              <input class="form-control" id="business_number" value="{{$mobile}}" onkeypress="return isNumberKey(event)" minlength="10" maxlength="10" name="business_number" type="text" placeholder="Business Mobile No.">
              </div>
              <div class="col col-md-6">
                <div id="alternative-mobile" class="disnone">The Alternative Mobile no field is required</div>
                <div id="invalid-alternative-mobile" class="disnone">Please enter a correct Alternative Mobile no.</div>
              <input class="form-control" id="alternative_number" value="{{$mobile}}" onkeypress="return isNumberKey(event)" minlength="10" maxlength="10" name="alternative_number" type="text" placeholder="Alternative Mobile No.">
              </div>
              <div class="col col-md-6">
              <div id="business-email" class="disnone">The business email field is required</div>
                <div id="business-email-valid" class="disnone">Please enter a correct email</div>
                <div id="exist" class="text-danger"></div>
              <input type="email" class="form-control" id="business_email" name="business_email" type="text"  value="{{isset($post)?$post->business_email:''}}" placeholder="Enter Business Email">
              </div>
              <div class="col col-md-6">
              <input class="form-control" id="business_website" name="business_website" type="text"  value="{{isset($post)?$post->business_website:''}}" placeholder="Enter Business Website">
              </div>
              <div class="col col-md-6">
              <div id="category-name" class="disnone">The category name field is required</div>
                <p>Selection of Category :
                  <select class="select" name="category_name" id="category_name">
                  <option value="">Select</option>
                  @foreach($category as $key=>$val)
                  <option @if(isset($post)) @if($post->category_name == $val->id) selected @endif @endif value="{{$val->id}}">{{$val->category_name}}</option>

                  @endforeach
                  </select>
                </p>
              </div>
              
              <div class="col col-md-6">
                <div id="state-name" class="disnone">The State name field is required</div>
                <p>Selection of State :
                  <select class="select" name="state" id="state">
                    <option value="">Select</option>
                    @foreach($state as $val)
                    <option name="state" id="state" @if(isset($post)) @if($post->state  == $val->id) selected @endif @endif value="{{$val->id}}">{{$val->state_name}}</option>
                  @endforeach
                   
                  </select>
                </p>
              </div>
              <div class="col col-md-6">
                <div id="city-name" class="disnone">The city name field is required</div>
                <p>Selection of City :
                  <select class="select selecttwo" name="city_name" id="city_name">
                    <option value="">Select</option>
                    @foreach($city as $val)
                    <option name="city_name" id="city_name" @if(isset($post)) @if($post->city_name  == $val->city_names->city_name) selected @endif @endif value="{{$val->city_names->city_name}}">{{$val->city_names->city_name}}</option>
                  @endforeach
                   
                  </select>
                </p>
              </div>
              <div class="col col-md-6">
              <div id="business-type" class="disnone">The business type field is required</div>
                <p>Type of Business :
                  <select class="select selectone" name="business_type" id="business_type">
                  <option value="">Select Business Type</option>
                  @foreach($business_type as $key=>$val)
                  <option value="{{$val->id}}">{{$val->title}}</option>
                  @endforeach
                  </select>
                </p>
              </div>
              <div class="col col-md-6">
              <div id="invalid-pincode" class="disnone">The pincode field is required</div>
                <div class="row Pincode">
                  <label for="inputPin" class="col-sm-2 col-form-label">Pincode :</label>
                  <div class="col-sm-10">
                  <input class="form-control"
                    type="text" name="pincode" id="pincode" onkeypress="return isNumberKey(event)" minlength="6" maxlength="6" value="{{isset($post)?$post->pincode:''}}"
                    placeholder="Enter Pincode ">
                  </div>
                </div>
              </div>
              <label for="sd" class="col-sm-2 col-form-label">Select Your Location :</label>
              <div id="mapContainer" style="height: 400px;"></div>
              <div class="col col-md-12 the_business">
              <div id="about-business" class="disnone">The about business field is required</div>
                <label for="exampleFormControlTextarea1">About the Business :</label>
                <textarea class="form-control" type="text" id="about_business" name="about_business" value="{{isset($post)?$post->about_business:''}}" row="3"  placeholder="About the  Business">{{isset($post)?$post->about_business:''}}</textarea>
              </div>
              <div class="col col-md-12 the_business">
              <div id="business-location" class="disnone">The business location field is required</div>
                <label for="exampleFormControlTextarea1">Business Location :</label>
                <textarea class="form-control" id="business_location" value="{{isset($post)?$post->business_location:''}}" name="business_location" type="text" row="3" placeholder="Business Address">{{isset($post)?$post->business_address:''}}</textarea>
              </div>
              <div class="col col-md-6 mt-3">
                <div id="invalid-latitude" class="disnone">The Latitude field is required</div>
              <input class="form-control" id="latitude" onkeypress="return isNumberKey(event)" name="latitude" type="text" placeholder="Latitude">
              </div>
              <div class="col col-md-6 mt-3">
                <div id="invalid-longitude" class="disnone">The Longitude field is required</div>
                <input class="form-control" id="longitude" onkeypress="return isNumberKey(event)" name="longitude" type="text" placeholder="Longitude">
              </div>
              <h2>Social Media Links :</h2>
              <div class="col-md-12">
                <div class="social">
                  <img src="{{asset('front/images/facebook.png')}}" alt="">
                  <input type="text" class="form-control" value="{{isset($post)?$post->facebook:''}}" name="facebook" id="facebook" placeholder= "@Facebook profile url" >
                </div>
                <div class="social">
                  <img src="{{asset('front/images/instagram.png')}}" alt="">
                  <input type="text" class="form-control" value="{{isset($post)?$post->instagram:''}}" name="instagram" id="instagram" placeholder= "@Instagram profile url">
                </div>
                <div class="social">
                  <img src="{{asset('front/images/twitter.png')}}" alt="">
                  <input type="text" class="form-control" value="{{isset($post)?$post->twitter:''}}" name="twitter" id="twitter" placeholder= "@Twitter profile url">
                </div>
                <div class="social">
                  <img src="{{asset('front/images/linkedin.png')}}" alt="">
                  <input type="text" class="form-control" value="{{isset($post)?$post->linkedin:''}}" name="linkedin" id="linkedin" placeholder= "@Linkedin profile url">
                </div>
                <div class="social">
                  <img src="{{asset('front/images/youtube.png')}}" alt="">
                  <input type="text" class="form-control" value="{{isset($post)?$post->youtube:''}}" name="youtube" id="youtube" placeholder= "@Youtube profile url">
                </div>

              

              </div>
             
              <div class="col-md-4">
                <div id="invalid-image" class="disnone">The image field is required</div>
                  <div class="form-group">
                    <label for="">Choose profile Image :</label>
                    <div class="file-upload mt-5">
                    <button class="fu-btn mt-4" id="upload_profile"><span class="upload-plus">+</span>Add Photo</button>
                    <input type="file"  name="image" style="visibility: hidden;" accept="image/png, image/jpeg" id="image" class="form-control" />
                      {{-- <a class="btn-upload">
                        <input type="file"  name="image" id="image" class="form-control" />
                      </a> --}}
                  
                      <i class="fa fa-camera i-pic-upload">
                          <div class="col-md-5">
                              <div class="holder">
                                  <img id="imgPreview" src="{{ asset('notfound.png') }}" alt="" name="image" style="width: 165px;margin-top: -49px;height: 165px;border-radius: 50%;" />
                              </div>       
                          </div>
                      </i>
                      <i class="i-deselect"></i>
                      <input type="file" class="form-control d-none" id="s-pic">
                    </div>
                  </div>
                </div>
                <div class="col-md-8 ">
                <div id="invalid-banner" class="disnone">The banner image field is required</div>
                  <div class="form-group choose_banner">
                    <label for="">Choose banner Image  </label>
                    <div class="file-upload mt-5">
                    <button class="fu-btn mt-4" id="banner_upload"><span class="upload-plus">+</span>Add Photo</button>
                    <input type="file" class="form-control" data-id="imgPreview" accept="image/png, image/jpeg" name="banner[]" style="visibility: hidden;" id="banner" multiple>
                     
                    <i class="fa fa-camera i-pic-upload">
                      <div class="col-md-5">
                        <div class="holder">
                          <img id="imgPreview2" src="{{ asset('notfound.png') }}" alt="" style="width: 150px;margin-top: -35px;height: 165px;" />
                        </div>    
                      </div>
                    </i>
                    <div style="margin-top:6rem;color:red;width: 295px;">Banner Image Size (1920px X 1280px)</div>
                    
                      <i class="i-deselect"></i>
                      <input type="file" class="form-control d-none" id="s-pic">
                    </div>
                  </div>
                </div>
                <div class="preview_link">
               <p> <a class="btn" id="priview_data" style="float: inherit !important;">Preview Banner</a></p>
              </div>
            </div>
            <div class="row">
            <div class="col col-md-6 mt-5">
            <a href="#" class="btn btn-pre with-100 ml-auto predata1 btn-lg" style="float: inherit !important; ">Previous </a></p>
            </div>
            <div class="col col-md-6 mt-5">
            <a id="data2" class="btn btn-next data2 with-100 btn-lg ml-auto">Next </a></p>
            </div>
            </div>
          </div>
        </div>


        <div class="form-step">
    <div class="row">
        <div class="col col-md-6">
        <div id="pan-number" class="disnone">The pan number field is required</div>
          
            <input type="text" class="form-control" value="{{isset($post)?$post->pan_number:''}}" minlength="10" maxlength="10" name="pan_number" id="pan_number" placeholder="Pan Card Number" />
        </div>
        <div class="col col-md-6">
        <div id="gst-number" class="disnone">The gst number field is required</div>
            <input type="text" class="form-control" value="{{isset($post)?$post->gst_number:''}}" minlength="12" maxlength="12" name="gst_number" id="gst_number" placeholder="GST Number" />
        </div>
        <!-- Choose profile -->
        <div class="Choose_profile">
            <div class="row">
                <div class="col col-md-6">
                <div id="pan-card" class="disnone">The pan card field is required</div>
                    <div class="form-group">
                        <label for="">Pan Card Document</label>
                        
                        <div class="file-upload mt-5">
                            
                            <button class="fu-btn mt-4" id="upload_pan"><span class="upload-plus">+</span>Add Photo</button>
                                <input type="file" name="pan_card" accept="application/pdf,image/png, image/jpeg" style="visibility: hidden;" id="pan_card" class="form-control" />
                               
                            <i class="fa fa-camera i-pic-upload">
                                <div class="col-md-5">
                                    <div class="holder" id="holder-pan">
                                        <img id="imgPreview3" src="{{ asset('notfound.png') }}" alt="" name="pan_card" style="width: 150px;margin-top: -49px;height: 165px;" />
                                    </div>
                                </div>
                            </i>
                            <i class="i-deselect"></i>
                            <input type="file" class="form-control d-none" id="s-pic" />
                        </div>
                    </div>
                </div>
                <div class="col col-md-6">
                <div id="gst-doc" class="disnone">The gst document field is required</div>
                    <div class="form-group">
                        <label for="">GST Document</label>
                        <div class="file-upload mt-5">
                         
                            <button class="fu-btn mt-4" id="upload_gst"><span class="upload-plus">+</span>Add Photo</button>
                                <input type="file" name="gst_doc" style="visibility: hidden;" id="gst_doc" class="form-control" />
                                
                            <i class="fa fa-camera i-pic-upload">
                                <div class="col-md-5">
                                    <div class="holder">
                                        <img id="imgPreview4" src="{{ asset('notfound.png') }}" alt="" name="gst_doc" style="width: 150px;margin-top: -49px;height: 165px;" />
                                    </div>
                                </div>
                            </i>
                            <i class="i-deselect"></i>
                            <input type="file" class="form-control d-none" id="s-pic" />
                        </div>
                    </div>
                </div>
                <!-- Bank Details Start -->

                <div class="col col-md-6">
                  <div class="bank">
                      <div id="account-number" class="disnone">The account number field is required</div>
                        <h2>Bank Details</h2>
                        <input type="text" class="form-control" value="{{isset($post)?$post->account_number:''}}" onkeypress="return isNumberKey(event)" minlength="16" maxlength="16" name="account_number" id="account_number" placeholder="Enter Account Number" />
                        <div id="confirm-account" class="disnone">The confirm account number field is required</div>
                        <div id="confirm-account-valid" class="disnone">The confirm account number and account number not match</div>
                        <input type="text" class="form-control" value="{{isset($post)?$post->confirm_account:''}}" onkeypress="return isNumberKey(event)" minlength="16" maxlength="16" name="confirm_account" id="confirm_account" placeholder="Enter Confirm Account Number " />
                        <div id="bank-name" class="disnone">The bank name field is required</div>
                        <input type="text" class="form-control" value="{{isset($post)?$post->bank_name:''}}" name="bank_name" id="bank_name" placeholder="Bank Name" />
                        <div id="ifce-code" class="disnone">The ifce code field is required</div>
                        <input type="text" class="form-control" minlength="11" maxlength="11" name="ifce_code" id="ifce_code" placeholder="Enter IFSC Code" />
                    </div>
                </div>
                <!-- Bank Details End -->
                <div class="col col-md-6 core">
                <div id="cheque-valid" class="disnone">The Cancel Cheque Image is required</div>
                    <div class="form-group">
                        <label for="">Cancel Cheque Image</label>
                        <div class="file-upload mt-5">
                        
                            <button class="fu-btn mt-4" id="upload_cheque"><span class="upload-plus">+</span>Add Photo</button>
                                <input type="file" accept="image/png, image/jpeg" name="cheque" style="visibility: hidden;" id="cheque" class="form-control" />
                                
                            <i class="fa fa-camera i-pic-upload">
                                <div class="col-md-8">
                                    <div class="holder">
                                        <img id="imgPreview5" src="{{ asset('notfound.png') }}" alt="" name="gst_doc" style="width: 150px;margin-top: -49px;height: 165px;" />
                                    </div>
                                </div>
                            </i>
                            <i class="i-deselect"></i>
                            <input type="file" class="form-control d-none" id="s-pic" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="save_nextone">
            {{-- <p>Note: Maximum file size allowed is 200 KB, supported formats: .jpg, .jpeg, .png, .pdf.</p> --}}
        </div>

        <div class="col col-md-6 mt-5">
            <a href="#" class="btn btn-pre with-100 ml-auto btn-lg" style="float: inherit !important;">
                Previous
                
            </a>
        </div>
        <div class="col col-md-6 mt-5">
            <a id="data3" class="btn btn-next data3 with-100 ml-auto btn-lg">
                Next
                
            </a>
        </div>
    </div>
</div>

        <div class="form-step">
          <div class="Question">
            <div id="invalid-checkbox" class="disnone">The Services field is required</div>               
            <div id="unite_id">
                @foreach($service_offered as $val)
                  @if($val->types == "checkbox")
                    <h5 style="margin-left: 37px;">{{$val->title}}</h5>
                    <p><input type="checkbox" id="checkbox" style="margin-right: 16px;" name="checkbox[]" @if(isset($post))@if (in_array($val->id, explode(',', $post->checkbox))) checked @endif @endif value="{{$val->id}}"  >{!! $val->description !!}</p>
                  @endif
                @endforeach
                
                @foreach($service_offered as $val)
                  @if($val->types == "radio")
                    <h5 style="margin-left: 37px;">{{$val->title}}</h5>
                    <p><input type="radio" id="radio" style="margin-right: 16px;" name="radio" @if(isset($post))  {{ ($post->radio == $val->id ) ? 'checked' :'' }} @endif value="{{$val->id}}" >{!! $val->description !!}</p>
                  @endif
                @endforeach
            </div>

            <div class="row">
              <div class="col col-md-6 mt-5">
                <a href="#" class="btn btn-pre with-100 ml-auto btn-lg" style="float: inherit !important; ">Previous </a></p>
              </div>
              <div class="col col-md-6 mt-5">
                <a id="data4" class="btn btn-next data4 with-100 ml-auto btn-lg">Next </a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="form-step">
          <!-- Choose profile -->
          <div class="Choose_profile">
            <h2>Previous Work <span>(You Can Upload Max 6 Videos and 50 Images)</span></h2>
            <div class="row">
              <div class="col col-md-3">
              <div id="past-work" class="disnone">The images field is required</div>   
              <div id="max-image" style="width: 262px;" class="disnone">You Can Upload Only 50 Images.</div> 
                <div class="form-group">
                  <div class="file-upload file_upload_one">
                  <button class="fu-btn mt-4" id="upload_past_work" type="button"><span class="upload-plus">+</span>Add Photo</button>
                    <input type="file" class="form-control" style="visibility: hidden;" id="past_work" accept="image/png, image/jpeg" onchange="preview_image();" name="pastimage[]" multiple>
                    <input type="file" class="form-control d-none" id="s-pic">
                  </div>
                </div>
              </div>
              <div class="col col-md-9 mt-4">
                <div class="row" id="holder_past"  style="margin-left: 73px;">

                </div>    
              </div>
              <div class="col col-md-3 mb-5">
              <div id="past-work-video" class="disnone">The video field is required</div> 
              <div id="max-video" class="disnone">You Alredy Added Max Videos</div> 
                <div class="form-group">
                <label for="">Video</label>
                  <div class="file-upload mt-5">
                  <input type="hidden" name="video_category" id="video_category" value="{{$video_cat->category_name}}">
                    <button class="fu-btn mt-4" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="upload_past_video"><span class="upload-plus">+</span>Add Video</button>
                   
                    <!-- Modal -->
                      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel">Add Video</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <input type="text" name="title_vid[]" id="title_vid" placeholder="Enter Video Title" class="form-control mb-3">
                              <input type="text" name="past_videos" id="past_videos" placeholder="Enter You Tube Video Url" class="form-control mb-3">
                              <div class="local-forms">
                                <textarea class="ckeditor form-control mb-3" placeholder="Enter Video Description" name="des_vid[]" id="des_vid" cols="15" rows="5">{{isset($post)? $post->description : ''}}</textarea>
                              </div>
                              <div class="local-forms">
                                <input type="text" name="video_category" id="video_category" value="{{$video_cat->category_name}}" readonly>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="addNewvideo();" id="addvideo">Add</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End Model -->
                    <input type="file" class="form-control d-none" id="s-pic">
                  </div>
                </div>
              </div>
              <div class="col mt-5 col-md-9 mt-4 mb-5">
                <div class="row mt-5" id="holder_past_video" style="margin-left: 73px;">
                </div>    
              </div>
              
            </div>
          </div>
          <div class="row mt-5">
              <div class="col col-md-6 mt-5">
                <a href="#" class="btn btn-pre with-100 ml-auto btn-lg" style="float: inherit !important; ">Previous </a></p>
              </div>
              <div class="col col-md-6 mt-5">
                <a id="data5" class="btn btn-next data5 with-100 ml-auto btn-lg">Next</a></p>
              </div>
          </div>
        </div>
        <div class="form-step">
          <!-- Payment Policy Start -->
          <div class="row">
          <div class="col-12 mb-4">
          
              <h5 class="form-title">Payment Policy</h5>
          </div>
            {{--<div class="col-md-4">
            <div id="payment-title" class="disnone">The policy title field is required</div> 
            <input class="form-control" id="payment_title" value="{{isset($post)?$post->payment_title:''}}" name="payment_title[]" type="text" placeholder="Title">
            </div> --}}

            <div class="col-md-7">
            <div id="payment-des" class="disnone">The policy description field is required</div> 
            <textarea class="form-control" id="payment_des" value="{{isset($post)?$post->payment_des:''}}" name="payment_des[]" type="text" placeholder="Description"></textarea>
            </div>
          
            <div class="col-md-1">
            <button class="btn mt-2 btn-primary" type="button" onclick="addMoreData()"><i class="fa fa-plus"></i></button>
            </div>
          </div>
          <div class="appenddata1"></div>

          <div class="row">
          <div class="col-12 mb-4">
          
              <h5 class="form-title">Cancellation Policy</h5>
          </div>
            {{--<div class="col-md-4">
            <div id="payment-title" class="disnone">The policy title field is required</div> 
            <input class="form-control" id="payment_title" value="{{isset($post)?$post->payment_title:''}}" name="payment_title[]" type="text" placeholder="Title">
            </div> --}}

            <div class="col-md-7">
            <div id="cancellation-des" class="disnone">The cancellation description field is required</div> 
            <textarea class="form-control" id="cancellation_des" value="{{isset($post)?$post->payment_des:''}}" name="cancellation_des[]" type="text" placeholder="Description"></textarea>
            </div>
          
            <div class="col-md-1">
            <button class="btn mt-2 btn-primary" type="button" onclick="addMoreData2()"><i class="fa fa-plus"></i></button>
            </div>
          </div>
          <div class="appendCancellation"></div>

          <div class="row mt-5">
          <div class="col-12 mb-4">
              <h5 class="form-title">Terms & Conditions</h5>
          </div>
           {{-- <div class="col-md-4">
            <div id="term-title" class="disnone">The terms title field is required</div> 
            <input class="form-control" id="term_title" value="{{isset($post)?$post->term_title:''}}" name="term_title[]" type="text" placeholder="Title">
            </div>--}}

            <div class="col-md-7">
            <div id="term-des" class="disnone">The terms title field is required</div> 
            <textarea class="form-control" id="term_des" value="{{isset($post)?$post->term_des:''}}" name="term_des" type="text" placeholder="Description"></textarea>
            </div>
          
           {{-- <div class="col-md-1">
            <button class="btn mt-2 btn-primary" type="button" onclick="addMoreData1()"><i class="fa fa-plus"></i></button>
            </div> --}}
          </div>
          <div class="appenddata2"></div>
            <div class="next_save">
                <div class="Previous">
                  <a href="#" class="btn btn-pre btn-lg">Previous</a>
                  <input type="submit" id="submitform" value="Submit" class="btn save_nexttwo submit btn-lg">
                </div>
            </div> 
          </form>
          <!--  Payment Policy End -->
        </div>
    </div>
  </section>

  <section class="beer bg-dark" style="visibility: visible; animation-name: fadeIn; margin-top: 100px;">
    <div class="container">
      <div class="row">
        <!-- counter -->
        <div
          class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated"
          data-wow-duration="300ms" style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;">
          <img src="{{asset('front/images/search.png')}}" alt="">
          <span id="anim-number-pizza" class="counter-number"></span>
          <span class="timer counter alt-font appear" data-to="980" data-speed="7000">2800</span>
          <p class="counter-title">Ordered</p>
        </div>
        <!-- end counter -->
        <!-- counter -->
        <div
          class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated"
          data-wow-duration="600ms" style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;">
          <img src="{{asset('front/images/check.png')}}" alt="">
          <span class="timer counter alt-font appear" data-to="980" data-speed="7000">980</span>
          <span class="counter-title">Happy Clients</span>
        </div>
        <!-- end counter -->
        <!-- counter -->
        <div
          class="col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated"
          data-wow-duration="900ms" style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp;">
          <img src="{{asset('front/images/rose.png')}}" alt="">
          <span class="timer counter alt-font appear" data-to="810" data-speed="7000">810</span>
          <span class="counter-title">Projects Completed</span>
        </div>
        <!-- end counter -->
        <!-- counter -->
        <div class="col-md-3 col-sm-6 text-center counter-section wow fadeInUp animated" data-wow-duration="1200ms"
          style="visibility: visible; animation-duration: 1200ms; animation-name: fadeInUp;">
          
          <img src="{{asset('front/images/check.png')}}" alt="">
          <span class="timer counter alt-font appear" data-to="600" data-speed="7000">600</span>
          <span class="counter-title">Clients Served</span>
        </div>
        <!-- end counter -->
      </div>
    </div>
  </section>


<!-- footer -->
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
                <a href="{{route('choosecity')}}">Choosecity |</a> --}}
                <a href="{{route('weddingvendors')}}">Wedding vendors</a> 
                {{--<a href="{{route('dashboard')}}">Dashboard |</a>--}}
                {{-- <a href="{{route('choosecity')}}">Choosecity |</a> 
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
        <div class="col-md-5">
          <div class="gmails">
            <p><img src="{{asset('front/images/phone.png')}}" alt=""> +91- 99999 99999, +91- 88888 88888 <span> <img src="{{asset('front/images/gmail.png')}}" alt=""> info@shreekalyanam@gmail.com</span></p>
            <p><img src="images/location.png" alt="">  P2, Awadh Puri, Opposite Ram Mandir, Lalkothi, Jaipur, Rajasthan, 302001</p>
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
  <div class="copyright1">
    <p>2023 - All Right Reserved. | Shreekalyam</p>
  </div>
</section>


<div id="myModal" class="modal">
  <span class="close">X</span>
  <img class="modal-content" id="img01">
  <iframe class="modal-content" width="100%" height="100%" class="myVideo12" src="" id="video01"></iframe>
  <embed type="application/pdf" width="100%" height="100%" id="pdf01"/>
  
</div>








  <!-- JS Link -->
  
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
 
  <script src="{{ asset('admin/js/snackbar.js') }}" charset="utf-8"></script>
  <script src="{{asset('front/js/script.js')}}"></script>
  <script src="{{asset('front/js/counter.js')}}"></script>
  <script src="{{asset('front/js/app.js')}}" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<script>

  var count = 1;
  function addNewvideo()
  {
    if(count <= 6){

      var value = $('#past_videos').val();
      var title = $('#title_vid').val();
      var des = $('#des_vid').val();
      // alert(value);
      var id = '#past_work_video' + count;
      $(id).val(value);
      var video_image = getYouTubeThumbnail(value);
      var inputid = 'vidid' + count;
      $('#holder_past_video').append("<div class='col col-md-3'><input type='hidden' value='"+video_image+"' name='vid_image[]'> <img src='"+video_image+"' id='"+count+"' width='100%' onclick='getVideoPreview(this);' height='55%''><input type='hidden' name='is_image[]' class='is_image' value='"+value+"' id='"+inputid+"'> <input type='hidden' name='video_title[]' value='"+title+"'> <input type='hidden' name='video_des[]' value='"+des+"'></div>");
      count++
    
    }
    else{
      $('#max-video').addClass('showinvalid');
    }

    function getYouTubeThumbnail(url) {
          var videoId = url.match(/(?<=v=|\/embed\/|\/\d\/|\.be\/|\/embed\/|\/\d\/|\?v=|&v=|youtu.be\/|\/embed\/|\/\d\/|\?v=|&v=|\?vi=|&vi=|\/embed\/|\?feature=player_embedded&v=)[^#&?\/\s]+/);
          if (videoId != null) {
            return "https://img.youtube.com/vi/" + videoId[0] + "/hqdefault.jpg";
          }
          return '';
        }
  }


  $(function() {

                
                               
    $('#submitForm').submit(function() {

      var $this = $('#payment_policy');
      
      $('.is-invalid').removeClass('is-invalid state-invalid');
      $('.invalid-feedback').remove();
      $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
            url: $('#submitForm').attr('action'),
            type: "POST",
            processData: false, // Important!
            contentType: false,
            cache: false,
            data: new FormData($('#submitForm')[0]),
            success: function(data) {
              if (data.status) {
                successMsg('Create vendor', data.msg);
                    setTimeout(function() {
                      window.location.href = data.url;
                    }, 1000);

              } 
              else {
                $.each(data.errors, function(fieldName, field) {
                    
                });
                errorMsg('Create Vendor', data.msg);
              }
                // buttonLoading('reset', $this);

            },
            error: function() {
                errorMsg('Create Vendor',
                    'There has been an error, please alert us immediately');
                // buttonLoading('reset', $this);
            }

      });

      return false;
    });
  });




        $(document).ready(function() {
            $('#priview_data').click(function() {
              var adddata = $('#submitForm input[name="image"]')[0].files[0];
              var img = URL.createObjectURL($('#submitForm input[name="image"]')[0].files[0]);
              // alert(img);
              // var addbanner = $('#submitForm input[name="banner"]')[0].files[0];
              // alert($('#submitForm input[name="banner[]"]').files());
              var image = URL.createObjectURL($('#submitForm input[name="banner[]"]')[0].files[0]);
              var formData = $('#submitForm').serialize() + "&moredata=" + img + "&banner=" + image;
              // formData.push('image', $('#submitForm input[name="image"]')[0].files[0]);
              
              console.log(formData); 
              // formData += image;
                // alert(formData);
              $.ajax({
                url: '{{route("priview_data")}}', // Replace with the actual URL or endpoint
                type: 'POST', // Adjust the HTTP method if needed (e.g., GET, POST, etc.)
                data: formData,
                success: function(response) {
                  window.open(response, '_blank');
                },
                error: function(xhr, status, error) {
                  // Handle error cases
                  console.log(xhr.responseText);
                }
              });

            });
          });

      function isNumberKey(evt) {

      var charCode = (evt.which) ? evt.which : evt.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
      return true;
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
  
$("#image").change(function () {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    $("#imgPreview")
                        .attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

 
        $("#banner").change(function () {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    $("#imgPreview2")
                        .attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        $("#pan_card").change(function () {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                  var fileType = file.type.toLowerCase();
                  if (fileType === 'application/pdf') {
                    $('#holder-pan').html('<iframe class="modal-content" style="width: 150px;margin-top: -49px;height: 165px;" onclick="getVideoPreview(this);" id="pan-pdf" src="' + event.target.result + '"></iframe>');
                  }
                  else if (fileType === 'image/jpeg' || fileType === 'image/png') {
                    $('#holder-pan').html('<img id="imgPreview3" src="' + event.target.result + '" alt="" name="pan_card" onclick="getImagePreview(this);" style="width: 150px;margin-top: -49px;height: 165px;" />');
                  }
                };
                reader.readAsDataURL(file);
            }
        });

        $("#gst_doc").change(function () {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    $("#imgPreview4")
                        .attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        $("#cheque").change(function () {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    $("#imgPreview5")
                        .attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        function preview_image() 
        {
          var total_file=document.getElementById("past_work").files.length;
          $('#holder_past').html("");
          if(total_file >= 12){
          $('#holder_past').addClass("over");
          }
          if(total_file <= 50){
            for(var i=0;i<total_file;i++)
            {
              // alert(event.target.files[i]);
             
              $('#holder_past').append("<div class='col col-md-3'><img src='"+URL.createObjectURL(event.target.files[i])+"' id='"+i+"' width='100%' onclick='getImagePreview(this);' height='115px''></div>");
            }
          }
          else{
            $('#max-image').addClass('showinvalid');
          }
        }


        function getImagePreview(image)
        {
         
          // Get the modal
              var modal = document.getElementById('myModal');
            
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var modalImg = document.getElementById("img01");
            if(image.type == "application/pdf"){
              var modalImg = document.getElementById("pdf01");
            }
            else{
              var modalImg = document.getElementById("img01");
            }
            
            
              // alert(this.src);
                modal.style.display = "block";
                modalImg.src = image.src;
                modalImg.alt = image.alt;
              if(image.type == "application/pdf"){
                $('#video01').css('display','none');
                $('#img01').css('display','none');
                $('#pdf01').css('display','block');
              }
              else{
                $('#video01').css('display','none');
                $('#pdf01').css('display','none');
                $('#img01').css('display','block');
              }
            

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
        }

        function preview_video() 
        {
          var total_file=document.getElementById("past_work_video").files.length;
          for(var i=0;i<total_file;i++)
          {
            $('#holder_past_video').append("<div class='col col-md-3'><video width='400' controls style='width:100%;height: 90%;'><source src='"+URL.createObjectURL(event.target.files[i])+"' type='video/mp4'></video></div>");
          }
        }

        function getVideoPreview(video)
        {
          // Get the modal
              var modal = document.getElementById('myModal');
              if(video.id == "pan-pdf")
              {
                var vidsrc = video.src;
              }
              else
              {
                var id = '#vidid' + video.id;
                var vidsrc = $(id).val();
              }
            // alert(vidsrc);
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var modalImg = document.getElementById("video01");
            
            
              // alert(modalImg);
                modal.style.display = "block";
                modalImg.src = vidsrc;
                $('#img01').css('display','none');
                $('#pdf01').css('display','none');
                $('#video01').css('display','block');

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
        }


        $(document).on("change", "#category_name",function() {
            
                var value = $("#category_name").val();
    
                showType(value);
            });


        
                function showType(category_id){
                  var token = 'blwsehIdgb1SEYqrMgWNbYtxQWnMBEEuv4tdrVBa';
            // alert(category_id);
            $.ajax({
                'url': '{{route("get-service")}}',
                'type': 'GET',
                data: {"_token": "{{ csrf_token() }}",category_id:category_id},
                        success: function(data) {
                      //  alert(data);
                                $('#unite_id').html(data);
                                // $('#unite_id').html('');
                            },
                error: function(response){
                    // alert('Error');
                }
            });
        }


        
      

</script>

<script>
    var counter1 = 1;
        function addMoreData()
    {
    $(".appenddata1").append(`
    
      <div class="row mt-4" id="ROWID-${counter1}">
        <div class="col-md-7">
        <textarea class="form-control" id="payment_des" value="{{isset($post)?$post->payment_des:''}}" name="payment_des[]" type="text" placeholder="Description"></textarea>
        </div>
      
        <div class="col-md-1">
          <button type="button" onclick="removeData(${counter1})" class="btn btn-danger"> <i class="fa fa-trash"></i> </button>
        </div>
                  
      </div>
    
    
    `);
    
    counter1++;
    }

    function removeData(id)
    {
    $("#ROWID-"+id).remove();
    }
    </script>

<script>
    var counter1 = 1;
        function addMoreData2()
    {
    $(".appendCancellation").append(`
    
      <div class="row mt-4" id="ROWID-${counter1}">
      <div class="col-md-7">
            <textarea class="form-control" id="cancellation_des" value="{{isset($post)?$post->payment_des:''}}" name="cancellation_des[]" type="text" placeholder="Description"></textarea>
            </div>
      
        <div class="col-md-1">
          <button type="button" onclick="removeData2(${counter1})" class="btn btn-danger"> <i class="fa fa-trash"></i> </button>
        </div>
      </div>
    
    
    `);
    
    counter1++;
    }

    function removeData2(id)
    {
    $("#ROWID-"+id).remove();
    }

    // register_email

        const emailInput = document.getElementById('register_email');
        const uniqueStatus = document.getElementById('uniqueStatus');

        emailInput.addEventListener('input', async () => {
            const email = emailInput.value;

            if (email.trim() === '') {
                uniqueStatus.textContent = '';
                return;
            }
            try {
              // alert(email);
                const response = await checkEmailUniqueness(email);
                if (response.isUnique) {
                    uniqueStatus.textContent = '';
                } else {
                    uniqueStatus.textContent = 'Email is already taken';
                }
            } catch (error) {
                console.error('Error checking email uniqueness:', error);
                uniqueStatus.textContent = 'Error checking uniqueness';
            }
        });

        async function checkEmailUniqueness(email) {
            const response = await fetch('{{route("vendor/email")}}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ email })
            });
            return response.json();
        }

        // business_email

        const budiness_email = document.getElementById('business_email');
        const businessStatus = document.getElementById('exist');

        budiness_email.addEventListener('input', async () => {
            const email = budiness_email.value;

            if (email.trim() === '') {
                businessStatus.textContent = '';
                return;
            }
            try {
              // alert(email);
                const response = await checkBusinessEmail(email);
                if (response.isUnique) {
                    businessStatus.textContent = '';
                } else {
                    businessStatus.textContent = 'Email is already taken';
                }
            } catch (error) {
                console.error('Error checking email uniqueness:', error);
                businessStatus.textContent = 'Error checking uniqueness';
            }
        });

        async function checkBusinessEmail(business_email) {
            const response = await fetch('{{route("vendor/business")}}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ business_email })
            });
            return response.json();
        }

        $(document).on("change", "#state", function() {
            var value = $('#state').val();
            // alert(value);
            showDistrict(value);
        });

        function showDistrict(state) {
            $.ajax({
                'url': '{{ route("getCity") }}',
                'type': 'GET',
                data: {
                    "_token": "{{ csrf_token() }}",
                    state: state
                },
                success: function(data) {
                    $('#city_name').html(data);
                    // $('#unite_id').html('');
                },
                error: function(response) {
                    // alert('Error');
                }
            });
        }

    </script>


<script>
  function initMap() {
    const mapOptions = {
      center: { lat: 0, lng: 0 }, // Default center before obtaining user's location
      zoom: 12,
    };
  
    const map = new google.maps.Map(document.getElementById("mapContainer"), mapOptions);
  
    let clickedMarker = null; // To keep track of the clicked marker
  
    // Get user's current location
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        function (position) {
          const userLatLng = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
  
          // Update map center to user's location
          map.setCenter(userLatLng);
  
          // Add marker at user's location
          const userMarker = new google.maps.Marker({
            position: userLatLng,
            map: map,
            title: "Your Location", // Title for the marker
          });
  
          // Open an info window with the title when the marker is clicked
          const infoWindow = new google.maps.InfoWindow({
            content: userMarker.getTitle(),
          });
          
          userMarker.addListener("click", () => {
            infoWindow.open(map, userMarker);
          });
          
          // Listen for a click event on the map
          map.addListener("click", (event) => {
            // Remove the previous clicked marker if exists
            if (clickedMarker) {
              clickedMarker.setMap(null);
            }
            
            const clickedLatLng = {
              lat: event.latLng.lat(),
              lng: event.latLng.lng(),
            };
            $("#latitude").val(event.latLng.lat());
            $("#longitude").val(event.latLng.lng());
            // Perform reverse geocoding to get location name
            const geocoder = new google.maps.Geocoder();
            geocoder.geocode({ location: clickedLatLng }, (results, status) => {
              if (status === "OK" && results[0]) {
                const locationName = results[0].formatted_address;
                
                // Add a marker at the clicked location with location name as title
                clickedMarker = new google.maps.Marker({
                  position: clickedLatLng,
                  map: map,
                  title: locationName,
                });
                // alert(locationName);

                $("#business_location").val(locationName);

                
                // Open an info window with the location name
                const clickedInfoWindow = new google.maps.InfoWindow({
                  content: locationName,
                });
                
                clickedMarker.addListener("click", () => {
                  clickedInfoWindow.open(map, clickedMarker);
                });
              } else {
                console.error("Reverse geocoding failed:", status);
              }
            });
          });
        },
        function (error) {
          console.error("Error getting user location:", error);
        }
      );
    } else {
      console.error("Geolocation is not supported by this browser.");
    }
  }
  </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK5sW2dZQzfL4WMFyAHLLqz1D07rxufVs&callback=initMap" async defer></script>


{{-- <script>
    var counter1 = 1;
        function addMoreData1()
    {
    $(".appenddata2").append(`
    
      <div class="row mt-4" id="ROWID-${counter1}">
        <div class="col-md-4">
          <input class="form-control" id="term_title" value="{{isset($post)?$post->term_title:''}}" name="term_title[]" type="text" placeholder="Title">
        </div>

        <div class="col-md-7">
          <textarea class="form-control" id="term_des" value="{{isset($post)?$post->term_des:''}}" name="term_des[]" type="text" placeholder="Description"></textarea>
        </div>
      
        <div class="col-md-1">
          <button type="button" onclick="removeData1(${counter1})" class="btn btn-danger"> <i class="fa fa-trash"></i> </button>
        </div>
                  
      </div>
    
    
    `);
    
    counter1++;
    }

    function removeData1(id)
    {
    $("#ROWID-"+id).remove();
    }
    </script> --}}



