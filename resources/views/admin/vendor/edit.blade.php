@extends('admin.layouts.app')
@section('title')
Vendor
@stop
@section('stylecss')
<style>
.video {
    height: 204px;
    width: 222 px;

}

.box {
    display: block;

    max-width: 300px;

    height: 200px;

    margin: 10px;

    background-color: white;

    border-radius: 5px;

    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);

    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);

    overflow: hidden;
}

.upload-options {
    position: relative;

    height: 75px;

    background-color: #00a1ff;

    cursor: pointer;

    overflow: hidden;

    text-align: center;

    transition: background-color ease-in-out 150ms;
}

.upload-options:hover {
    background-color: #68bced;
}

.upload-options input {
    width: 0.1px;

    height: 0.1px;

    opacity: 0;

    overflow: hidden;

    position: absolute;

    z-index: -1;
}

.upload-options label {
    display: flex;

    align-items: center;

    width: 100%;

    height: 100%;

    font-weight: 400;

    text-overflow: ellipsis;

    white-space: nowrap;

    cursor: pointer;

    overflow: hidden;
}

.upload-options label::after {
    font-family: "Material Icons";

    position: absolute;

    font-size: 2.5rem;

    color: #e6e6e6;

    top: calc(50% - 2.5rem);

    left: calc(50% - 1.25rem);

    z-index: 0;
}

.ttl {
    align-self: auto;
    color: white;
    padding: 118px;
    font-size: 40px;
}

.upload-options label span {
    display: inline-block;

    width: 50%;

    height: 100%;

    text-overflow: ellipsis;

    white-space: nowrap;

    overflow: hidden;

    vertical-align: middle;

    text-align: center;
}

.upload-options label span:hover i.material-icons {
    color: lightgray;
}

.js--image-preview {
    height: 150px;

    width: 100%;

    position: relative;

    overflow: hidden;

    background-image: url("");

    background-color: white;

    background-position: center center;

    background-repeat: no-repeat;

    background-size: cover;
}

.js--image-preview::after {
    font-family: "Material Icons";

    position: relative;

    font-size: 4.5em;

    color: #e6e6e6;

    top: calc(50% - 3rem);

    left: calc(50% - 2.25rem);

    z-index: 0;
}

.js--image-preview.js--no-default::after {
    display: none;
}

.js--image-preview:nth-child(2) {
    background-image: url("http://bastianandre.at/giphy.gif");
}

i.material-icons {
    transition: color 100ms ease-in-out;

    font-size: 2.25em;

    line-height: 55px;

    color: white;

    display: block;
}


input[type=checkbox] {
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

input[type=checkbox]:hover {
    opacity: 1;
}

input[type=checkbox]:checked {
    background-color: #FD6DB2;
    opacity: 1;
}

input[type=checkbox]:before {
    content: '';
    position: absolute;
    right: 50%;
    top: 50%;
    width: 4px;
    height: 10px;
    border: solid #FFF;
    border-width: 0 2px 2px 0;
    margin: -1px -1px 0 -1px;
    transform: rotate(45deg) translate(-50%, -50%);
    z-index: 2;
}

input[type=radio] {
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

input[type=radio]:hover {
    opacity: 1;
}

input[type=radio]:checked {
    background-color: #FD6DB2;
    opacity: 1;
}

input[type=radio]:before {
    content: '';
    position: absolute;
    right: 50%;
    top: 50%;
    width: 4px;
    height: 10px;
    border: solid #FFF;
    border-width: 0 2px 2px 0;
    margin: -1px -1px 0 -1px;
    transform: rotate(45deg) translate(-50%, -50%);
    z-index: 2;
}
</style>
@stop

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <ul class="nav nav-tabs nav-tabs-solid
                                    nav-tabs-rounded nav-justified">
                            <li class="nav-item "><a id="vendor_register" class="btnstep9 nav-link tab1 active"
                                    href="#solid-rounded-justified-tab6" data-bs-toggle="tab">Personal Details</a></li>
                            <li class="nav-item "><a id="business" class="btnstep1 nav-link tab1"
                                    href="#solid-rounded-justified-tab1" data-bs-toggle="tab">Business Details</a></li>
                            <li class="nav-item "><a id="document" class="btnstep2 nav-link tab2  "
                                    href="#solid-rounded-justified-tab2" data-bs-toggle="tab">Documents
                                    Details</a></li>
                            <li class="nav-item"><a id="service" class="btnstep3 nav-link"
                                    href="#solid-rounded-justified-tab3" data-bs-toggle="tab">Service Offered</a>
                            </li>
                            <li class="nav-item"><a id="past_work" class="btnstep4 nav-link"
                                    href="#solid-rounded-justified-tab4" data-bs-toggle="tab">Past Work</a>
                            </li>
                            <li class="nav-item"><a id="payment" class="nav-link  btnstep6"
                                    href="#solid-rounded-justified-tab5" data-bs-toggle="tab">Payment & Cancellation
                                    Policy</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <form action="{{$data['page_url']}}" id="submitForm" enctype="multipart/form-data"
                                method="post">
                                @csrf

                                <div class="tab-pane show active" id="step6">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title">Personal Details</h5>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group local-forms">
                                                    <label>Name <span class="login-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        value="{{isset($post)?$post->register_name:''}}"
                                                        name="register_name" id="register_name" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group local-forms">
                                                    <label for="">Email</label>
                                                    <input class="form-control" type="email" name="register_email"
                                                        id="register_email"
                                                        value="{{isset($post)?$post->register_email:''}}" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group local-forms">
                                                    <label for="">Phone Number</label>
                                                    <input class="form-control" type="text" name="register_mobile"
                                                        id="register_mobile" onkeypress="return isNumberKey(event)"
                                                        minlength="10" maxlength="10"
                                                        value="{{isset($post)?$post->register_mobile:''}}" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group local-forms">
                                                    <label for="">Whatsapp Number</label>
                                                    <input class="form-control" type="text" name="register_whatsapp_no"
                                                        id="register_whatsapp_no" onkeypress="return isNumberKey(event)"
                                                        minlength="10" maxlength="10"
                                                        value="{{isset($post)?$post->register_whatsapp_no:''}}" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group local-forms">
                                                    <label>Gender <span class="login-danger">*</span></label>
                                                    <select name="register_gender" id="register_gender"
                                                        class="form-control custom-select">
                                                        <option>Select</option>
                                                        <option @if(isset($post)) @if($post->register_gender == 'Male')
                                                            selected @endif @endif value="Male">Male</option>
                                                        <option @if(isset($post)) @if($post->register_gender ==
                                                            'Female') selected @endif @endif value="Female">Female
                                                        </option>
                                                        <option @if(isset($post)) @if($post->register_gender == 'Other')
                                                            selected @endif @endif value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="col-12 col-sm-5">
                    <div class="form-group local-forms">
                        <label>Status <span class="login-danger">*</span></label>
                        <select name="status" id="status" class="form-control custom-select">
                            <option>Select</option>
                            <option @if(isset($post)) @if($post->status == 'New') selected @endif @endif value="New">New</option>
                            <option @if(isset($post)) @if($post->status == 'Pending') selected @endif @endif value="Pending">Pending</option>
                            <option @if(isset($post)) @if($post->status == 'Confirm') selected @endif @endif value="Confirm">Confirm</option>
                            <option @if(isset($post)) @if($post->status == 'Completed') selected @endif @endif value="Completed">Completed</option>
                        </select>
                    </div>
                </div> --}}
                                        </div>

                                        <div class="card-footer"></div>
                                        <div class="col-2">
                                            <button type="button" id="btnstep10"
                                                class="btn btn-primary btn-block next2">Next</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane show active" id="step1">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title">Business Details</h5>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Business Name <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="business_name"
                                                    value="{{isset($post)?$post->business_name:''}}"
                                                    name="business_name" type="text" placeholder="Business Name" />
                                            </div>
                                        </div>


                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Business Email <span class="login-danger">*</span></label>
                                                <input type="email" class="form-control" id="business_email"
                                                    name="business_email" type="text"
                                                    value="{{isset($post)?$post->business_email:''}}"
                                                    placeholder="Enter Business Email" />
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Business Website <span class="login-danger"></span></label>
                                                <input class="form-control" id="business_website"
                                                    name="business_website" type="text"
                                                    value="{{isset($post)?$post->business_website:''}}"
                                                    placeholder="Enter Business Website" />
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <div class="input-group prefix">
                                                    <span class="input-group-addon">+91</span>

                                                    <input class="form-control" type="text" name="business_number"
                                                        id="business_number" onkeypress="return isNumberKey(event)"
                                                        minlength="10" maxlength="10"
                                                        value="{{isset($post)?$post->business_number:''}}"
                                                        placeholder="Enter Business Contact Number"
                                                        style="width: 100%;" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <div class="input-group prefix">
                                                    <span class="input-group-addon">+91</span>
                                                    <input class="form-control" type="text" name="alternative_number"
                                                        id="alternative_number" onkeypress="return isNumberKey(event)"
                                                        minlength="10" maxlength="10"
                                                        value="{{isset($post)?$post->alternative_number:''}}"
                                                        placeholder="Enter Alternative Contact Number"
                                                        style="width: 100%;" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Select Category Name <span class="login-danger"></span></label>
                                                <select name="category_name" id="category_name"
                                                    class="form-control custom-select">
                                                    <option>Select</option>
                                                    @foreach($data['category'] as $key=>$val)
                                                    <option @if(isset($post)) @if($post->category_name == $val->id)
                                                        selected @endif @endif
                                                        value="{{$val->id}}">{{$val->category_name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        {{--
            <div class="col-12 col-sm-4">
                <div class="form-group local-forms">
                    <label>Select Subategory Name <span class="login-danger"></span></label>
                    <select name="subcategory_name" id="subcategory_name" class="form-control custom-select">
                        <option>Select</option>
                        @foreach($subcategory as $key=>$val)

                        <option @if(isset($post)) @if($post->subcategory_name == $val->subcategory_name) selected @endif @endif value="{{$val->subcategory_name}}">{{$val->subcategory_name}}
                                        </option>

                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                --}}

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Type Business<span class="login-danger"></span></label>
                                        <select name="type_business" id="type_business"
                                            class="form-control custom-select">
                                            <option value="">Select</option>
                                            @foreach($data['business_type'] as $key=>$val)
                                            <option @if(isset($post)) @if($post->business_type == $val->id) selected
                                                @endif @endif value="{{$val->id}}">{{$val->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>About the Business <span class="login-danger"></span></label>
                                        <textarea class="form-control" type="text" id="about_business"
                                            name="about_business" value="{{isset($post)?$post->about_business:''}}"
                                            placeholder="About the  Business">
                        {{isset($post)?$post->about_business:''}}
                    </textarea>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Pincode </label>
                                        <input class="form-control" type="text" name="pincode" id="pincode"
                                            onkeypress="return isNumberKey(event)" minlength="6" maxlength="6"
                                            value="{{isset($post)?$post->pincode:''}}" placeholder="Enter Pincode " />
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>State <span class="login-danger"></span></label>
                                        <select name="state" id="state" class="form-control custom-select">
                                            <option value="">Select</option>

                                            @foreach($data['state'] as $val)
                                            <option @if(isset($post)) @if($post->state == $val->id) selected @endif
                                                @endif value="{{$val->id}}">{{$val->state_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>City <span class="login-danger"></span></label>
                                        <select class="form-control custom-select" name="city_name" id="city_name">
                                            <option>Select</option>

                                            @foreach($data['city'] as $val)
                                            <option @if(isset($post)) @if($post->city_name ==
                                                $val->city_names->city_name) selected @endif @endif
                                                value="{{$val->city_names->city_name}}">{{$val->city_names->city_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Business Location <span class="login-danger"></span></label>
                                        <input class="form-control" id="business_location"
                                            value="{{isset($post)?$post->business_location:''}}"
                                            name="business_location" type="text" placeholder="Business Location" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Latitude <span class="login-danger"></span></label>
                                        <input class="form-control" id="latitude"
                                            value="{{isset($post)?$post->latitude:''}}" name="latitude" type="text"
                                            placeholder="Business Location" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Longitude <span class="login-danger"></span></label>
                                        <input class="form-control" id="longitude"
                                            value="{{isset($post)?$post->longitude:''}}" name="longitude" type="text"
                                            placeholder="Business Location" />
                                    </div>
                                </div>



                                {{--
            <div class="col-12 col-sm-4">
                <label>Mode of Payment Accept</label>

                <input type="radio" name="mode_payment" id="upi" @if(isset($post)) @if($post->mode_payment == 'Upi') checked @endif @endif value="Upi" >

                <label for="upi">Upi</label>

                <input type="radio" name="mode_payment" id="net_banking" @if(isset($post)) @if($post->mode_payment == 'Net_banking') checked @endif @endif value="Net_banking">
                <label for="mode_payment">Net Banking</label>
            </div>
            --}}




                                <div class="col-12 col-sm-5">
                                    <div class="form-group local-forms">
                                        <label>Choose Profile </label>
                                        <div class="row">
                                            <div class="col-10">
                                                <input type="file" class="form-control" accept="image/png, image/jpeg"
                                                    name="image" id="image" />
                                            </div>

                                            <div class="col-2">
                                                @if(isset($post))

                                                <input type="hidden" name="logo" id="logo"
                                                    value="{{isset($post)?$post->image:''}}" />
                                                <img src="@if(isset($post)) @if($post->image){{asset($post->image)}}@else{{'https://pipdigz.co.uk/p3/img/placeholder-square.png'}}@endif @else{{'https://pipdigz.co.uk/p3/img/placeholder-square.png'}} @endif"
                                                    style="height: 50px;" />
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-5">
                                    <div class="form-group local-forms">
                                        <label>Banner Image <span class="login-danger">Size (1920px X
                                                1280px)</span></label>
                                        <div class="row">
                                            <div class="col-10">
                                                <input type="file" class="form-control" accept="image/png, image/jpeg"
                                                    name="banner[]" id="banner" multiple />
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12">
                                    <label>Banner Image's</label>
                                    <div class="row">
                                        @if(isset($post))
                                        @foreach($post->banner_images as $banner_images)
                                        <div class="col-2">
                                            <input type="hidden" name="banners[]" value="{{$banner_images->id}}" />
                                            <a href="{{asset($banner_images->banner_images)}}" target="_blank"><img
                                                    src="@if(isset($post)) @if($banner_images->banner_images){{asset($banner_images->banner_images)}}@endif @endif"
                                                    style="height: 50px;" /></a>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>

                                <!-- <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Verification<span class="login-danger">*</span></label>
                                    <select name="account_status" id="account_status" class="form-control custom-select">
                                        <option >Select</option>
                                        <option @if(isset($post)) @if($post->account_status == 'Verified') selected @endif @endif value="Verified">Verified</option>
                                        <option @if(isset($post)) @if($post->account_status == 'Unverified') selected @endif @endif value="Unverified">Unverified</option>
                                    </select>
                                </div>
                            </div>  -->
                        </div>

                        <div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group local-forms">
                                    <h5 class="form-title">Social Media Links</h5>

                                    <div class="table">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group local-forms">
                                                <label class="form-title">Facebook</label>

                                                <input type="text" class="form-control"
                                                    value="{{isset($post)?$post->facebook:''}}" name="facebook"
                                                    id="facebook" />
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group local-forms">
                                                <label>Instagram<span class="login-danger"></span></label>
                                                <input type="text" class="form-control"
                                                    value="{{isset($post)?$post->instagram:''}}" name="instagram"
                                                    id="instagram" />
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group local-forms">
                                                <label>Twitter<span class="login-danger"></span></label>
                                                <input type="text" class="form-control"
                                                    value="{{isset($post)?$post->twitter:''}}" name="twitter"
                                                    id="twitter" />
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group local-forms">
                                                <label>Linkedin<span class="login-danger"></span></label>
                                                <input type="text" class="form-control"
                                                    value="{{isset($post)?$post->linkedin:''}}" name="linkedin"
                                                    id="linkedin" />
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group local-forms">
                                                <label>Youtube<span class="login-danger"></span></label>
                                                <input type="text" class="form-control"
                                                    value="{{isset($post)?$post->youtube:''}}" name="youtube"
                                                    id="youtube" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer"></div>
                        <div class="col-2" oneclick>
                            <button type="button" class="btn btn-primary btn-block next2 btnstep2">Next</button>
                        </div>
                    </div>

                    <div id="step2" style="display: none;">
                        <div class="tab-pane" id="solid-rounded-justified-tab2">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title">Document Details</h5>
                                </div>

                                <!-- <div class="col-12 col-sm-8">
                            <div class="form-group local-forms">
                                <label>Aadhar Card  </label>
                                <div class="row">
                                    <div class="col-10">
                                        <input type="file" class="form-control" name="aadhar_card" id="aadhar_card" accept="application/pdf,application/vnd.ms-excel">
                                    </div>

                                    <div class="col-2">
                                    @if(isset($post))
                                    <input type="hidden" name="id" value="{{$post->id}}">
                                    <input type="hidden" name="aadhar_card" id="aadhar_card" value="{{isset($post)?$post->aadhar_card:''}}">
                                 
                                    <a href="{{asset($post->aadhar_card)}}">View Document</a>
                                  
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div> -->

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Pan Card Number<span class="login-danger">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{isset($post)?$post->pan_number:''}}" minlength="10" maxlength="10"
                                            name="pan_number" id="pan_number" />
                                    </div>
                                </div>

                                <div class="col-12 col-sm-7">
                                    <div class="form-group local-forms">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label class="form-label" for="exampleInputEmail3">Pan Card Image<span
                                                        class="required">*</span></label>
                                                <input type="file" name="pan_card" id="pan_card" class="form-control" />
                                            </div>
                                            @if(isset($post))
                                            <div class="col-md-5">
                                                <div class="holder">
                                                    <a href="{{ asset($post->pan_card)}}" class="btn btn-primary btn-sm"
                                                        target="_blank">
                                                        PAN Card Document
                                                    </a>
                                                </div>
                                            </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label> GSIT Number<span class="login-danger">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{isset($post)?$post->gst_number:''}}" minlength="10" maxlength="10"
                                            name="gst_number" id="gst_number" />
                                    </div>
                                </div>

                                <div class="col-12 col-sm-7">
                                    <div class="form-group local-forms">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label class="form-label" for="exampleInputEmail3">GSIT Card Image<span
                                                        class="required">*</span></label>
                                                <input type="file" name="gst_doc" id="gst_doc" class="form-control" />
                                            </div>
                                            @if(isset($post))
                                            <div class="col-md-5">
                                                <div class="holder">
                                                    <img src="@if(isset($post)) @if($post->gst_doc){{asset($post->gst_doc)}}@endif  @endif"
                                                        style="height: 50px;" />
                                                </div>
                                            </div>
                                            @endif


                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-7">
                                    <div class="form-group local-forms">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label class="form-label" for="exampleInputEmail3">Cheque Image<span
                                                        class="required">*</span></label>
                                                <input type="file" name="cheque" accept="image/png, image/jpeg"
                                                    id="cheque" class="form-control" />
                                            </div>
                                            @if(isset($post))
                                            <div class="col-md-5">
                                                <div class="holder">
                                                    <img src="@if(isset($post)) @if($post->cheque){{asset($post->cheque)}}@endif  @endif"
                                                        style="height: 50px;" />
                                                </div>
                                            </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group local-forms bank">
                                            <h5 class="form-title">Bank Details</h5>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">

                                                    <div class="col-12 col-sm-8">
                                                        <div class="form-group local-forms">
                                                            <label>Account Number<span
                                                                    class="login-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                value="{{isset($post)?$post->account_number:''}}"
                                                                onkeypress="return isNumberKey(event)" minlength="10"
                                                                maxlength="10" name="account_number"
                                                                id="account_number" />
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-8">
                                                        <div class="form-group local-forms">
                                                            <label>Confirm Account Number<span
                                                                    class="login-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                value="{{isset($post)?$post->confirm_account:''}}"
                                                                onkeypress="return isNumberKey(event)" minlength="10"
                                                                maxlength="10" name="confirm_account"
                                                                id="confirm_account" />
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-8">
                                                        <div class="form-group local-forms">
                                                            <label>Name Of Bank<span
                                                                    class="login-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                value="{{isset($post)?$post->bank_name:''}}"
                                                                name="bank_name" id="bank_name" />
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-8">
                                                        <div class="form-group local-forms">
                                                            <label>IFCE Code<span class="login-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                value="{{isset($post)?$post->ifce_code:''}}"
                                                                minlength="11" maxlength="11" name="ifce_code"
                                                                id="ifce_code" />
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- <div class="col-12 col-sm-6">
                                    <h5 style="margin-bottom: 20px;">Bank Details 2</h5>
                                    <div class="col-12 col-sm-8">
                                        <div class="form-group local-forms">
                                            <label>Account Number<span class="login-danger">*</span></label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                value="{{isset($post)?$post->account_number:''}}"
                                                onkeypress="return isNumberKey(event)"
                                                minlength="10"
                                                maxlength="10"
                                                name="account_number"
                                                id="account_number"
                                                />
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-8">
                                            <div class="form-group local-forms">
                                                <label>Confirm Account Number<span class="login-danger">*</span></label>
                                                <input type="text" class="form-control"
                                                    value="{{isset($post)?$post->confirm_account:''}}"
                                                    onkeypress="return isNumberKey(event)" minlength="10" maxlength="10"
                                                    name="confirm_account" id="confirm_account" />
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-8">
                                            <div class="form-group local-forms">
                                                <label>Name Of Bank<span class="login-danger">*</span></label>
                                                <input type="text" class="form-control"
                                                    value="{{isset($post)?$post->bank_name:''}}" name="bank_name"
                                                    id="bank_name" />
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-8">
                                            <div class="form-group local-forms">
                                                <label>IFCE Code<span class="login-danger">*</span></label>
                                                <input type="text" class="form-control"
                                                    value="{{isset($post)?$post->ifce_code:''}}" minlength="11"
                                                    maxlength="11" name="ifce_code" id="ifce_code" />
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-2">
                        <button type="button" id="btnstep1" class="btn btn-primary btn-block">Previous</button>
                    </div>
                    <div class="card-footer"></div>

                    <div class="col-2">
                        <button type="button" class="btn btn-primary btn-block next2 btnstep3">Next</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="step3" style="display: none;">
            <div class="tab-pane" id="solid-rounded-justified-tab3">
                <div class="row">
                    <div class="col-12">
                        <h5 class="form-title">Services Offered</h5>
                    </div>
                    <div>
                        <div class="col-12 col-sm-8">
                            <div class="form-group local-forms">
                                @foreach($service as $key=>$val)
                                @foreach($data['service_offered'] as $sd=>$cv)
                                @if($sd == $val->service_id)
                                @if($val->service->types == "radio")
                                <div>
                                    <h5>{{$val->service->title}}</h5>
                                </div>
                                <div class="p-3">

                                    <div><input type="radio" class="form-check-input" name="radio{{$sd}}"
                                            @if(in_array($val->service->option1, $cv)) checked @endif class="radio
                                        me-2">{{$val->service->option1}}</div>
                                    <div><input type="radio" class="form-check-input" name="radio{{$sd}}"
                                            @if(in_array($val->service->option2, $cv)) checked @endif class="radio
                                        me-2">{{$val->service->option2}}</div>
                                    @if(isset($val->service->option3) && $val->service->option3 !="")
                                    <div><input type="radio" class="form-check-input" name="radio{{$sd}}"
                                            @if(in_array($val->service->option3, $cv)) checked @endif class="radio
                                        me-2">{{$val->service->option3}}</div>
                                    @endif
                                    @if(isset($val->service->option4) && $val->service->option4 !="")
                                    <div><input type="radio" class="form-check-input" name="radio{{$sd}}"
                                            @if(in_array($val->service->option4, $cv)) checked @endif class="radio
                                        me-2">{{$val->service->option4}}</div>
                                    @endif
                                </div>
                                @endif
                                @if($val->service->types == "checkbox")
                                <div>
                                    <h5>{{$val->service->title}}</h5>
                                </div>
                                <div class="p-3">
                                    <div><input type="radio" @if(in_array($val->service->option1, $cv)) checked @endif
                                        class="radio me-2">{{$val->service->option1}}</div>
                                    <div><input type="radio" @if(in_array($val->service->option2, $cv)) checked @endif
                                        class="radio me-2">{{$val->service->option2}}</div>
                                    @if(isset($val->service->option3) && $val->service->option3 !="")
                                    <div><input type="radio" @if(in_array($val->service->option3, $cv)) checked @endif
                                        class="radio me-2">{{$val->service->option3}}</div>
                                    @endif
                                    @if(isset($val->service->option4) && $val->service->option4 !="")
                                    <div><input type="radio" @if(in_array($val->service->option4, $cv)) checked @endif
                                        class="radio me-2">{{$val->service->option4}}</div>
                                    @endif
                                </div>

                                @endif
                                @if($val->service->types == "paragraph")
                                <div>
                                    <h5>{{$val->service->title}}</h5>
                                </div>
                                <p>{{$val->service->description}}</p>
                                @endif
                                @endif

                                @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                .next2 {
                    margin-left: 501%;
                    position: relative;
                    bottom: 70px;
                }
                </style>
                <div>
                    <div class="col-2">
                        <button type="button" id="btnstep5" class="btn btn-primary btn-block">Previous</button>
                    </div>
                    <div class="card-footer"></div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-block next2 btnstep4">Next</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="step4" style="display: none;">
            <div class="tab-pane" id="solid-rounded-justified-tab4">
                <div class="row">
                    <div class="col-12">
                        <h5 class="form-title">Past Work</h5>
                        <label>Images</label>
                    </div>
                    @if(isset($post))
                    @foreach($post->past_work as $image)
                    @if($image->is_image == 1)

                    <div class="col-12 col-md-2">
                        <input type="checkbox" @if($image->image_status == 1) checked @endif class="banner"
                        style="margin: 10px;vertical-align: top;" value="{{$image->id}}" name="past_image[]"
                        id="past_image">
                        <a href="{{ asset($image->pastimage)}}" class="mt-2" target="_blank">
                            <img src="{{ asset($image->pastimage)}}"
                                style="height: 100px; width: 100px;border-radius: 50%;margin-top: 10px;">
                        </a>
                    </div>
                    @endif
                    @endforeach
                    @else

                    <div class="col-12 col-md-3 col-sm-8">
                        <div class="box">
                            {{--
                    <div><i class="fa fa-plus"></i></div>
                    --}}
                            <div class="js--image-preview js--image-preview-data011" style="background-image: url();">
                            </div>
                            <div class="upload-options">
                                <label>
                                    <input type="file" accept="image/png, image/jpeg" name="pastimage[]"
                                        onchange="initImageUpload(this)" data-id="011" class="image-upload"
                                        accept="image/*" value="image work1" />
                                    <p class="ttl">+</p>
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-md-3 col-sm-8">
                        <div class="box">
                            <div class="js--image-preview js--image-preview-data012" style="background-image: url();">
                            </div>
                            <div class="upload-options">
                                <label>
                                    <input type="file" name="pastimage[]" onchange="initImageUpload(this)" data-id="012"
                                        class="image-upload" accept="image/*" />
                                    <p class="ttl">+</p>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 col-sm-8">
                        <div class="box">
                            <div class="js--image-preview js--image-preview-data013" style="background-image: url();">
                            </div>
                            <div class="upload-options">
                                <label>
                                    <input type="file" accept="image/png, image/jpeg" name="pastimage[]"
                                        onchange="initImageUpload(this)" data-id="013" class="image-upload"
                                        accept="image/*" />
                                    <p class="ttl">+</p>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 col-sm-8">
                        <div class="box">
                            <div class="js--image-preview js--image-preview-data014" style="background-image: url();">
                            </div>
                            <div class="upload-options">
                                <label>
                                    <input type="file" accept="image/png, image/jpeg" name="pastimage[]"
                                        onchange="initImageUpload(this)" data-id="014" class="image-upload"
                                        accept="image/*" />
                                    <p class="ttl">+</p>
                                </label>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <style>
                .video {
                    height: 204px;
                    width: 222 px;
                }
                </style>

                <div class="row">
                    <div class="col-12 mt-3 mb-3">
                        <label>Videos</label>
                    </div>
                    @foreach($post->past_work as $video)
                    @if($video->is_image == 0)

                    <input type="hidden" name="video_id[]" value="{{$video->id}}">
                    <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                            <label>Video Category <span class="login-danger"></span></label>
                            <select class="form-control custom-select" id="video_category" name="video_category">
                                <option>Select</option>

                                @foreach($data['video_cat'] as $val)
                                <option @if(isset($video)) @if($video->category == $val->category_name) selected @endif
                                    @endif value="{{$val->category_name}}">{{$val->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-sm-4" style="display: flex;justify-content: end;">
                        <button type="button" data-url="{{route('video.delete', base64_encode($video->id))}}"
                            style="height: 35px;" class="btn btn-danger deleteButton"> <i
                                class="fas fa-trash fa-sm"></i> </button>
                    </div>
                    <div class="col-12 col-md-6 col-sm-4">
                        <div class="form-group local-forms">
                            <label>Title <span class="login-danger">*</span></label>
                            <input type="text" class="form-control" value="{{ isset($video) ? $video->title : '' }}"
                                id="video_title" name="video_title[]" type="text" aria-describedby=""
                                placeholder="Enter Title">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-sm-4">
                        <div class="form-group local-forms">
                            <label>Video Url <span class="login-danger">*</span></label>
                            <input type="text" class="form-control" value="{{isset($video)? $video->pastimage:''}}"
                                id="video_url0" name="video_url[]" aria-describedby="" placeholder="Enter Youtube Url">
                        </div>
                    </div>


                    <div class="col-12 col-sm-8">
                        <div class="form-group local-forms">
                            <div class="row">
                                <div class="col-6">
                                    <input type="button" class="btn btn-success" onclick="addNewvideo(this);" id="0"
                                        value="Generate thumbnail">
                                    <input type="hidden" name="thumbnail[]" id="thumbnail0" @if(isset($video))
                                        value="{{$video->thumbnail}}" @endif>
                                </div>

                                <div class="col-2">
                                    <a href="{{$video->pastimage}}" target="_blank"><img id="thumb0" @if(isset($video))
                                            @if($video->thumbnail) src="{{$video->thumbnail}}" @endif @endif
                                        style="height: 125px;width: 125px;" /></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-sm-4">
                        <div class="form-group local-forms">
                            <label>Description <span class="login-danger">*</span></label>
                            <!-- <input type="text" class="form-control"value="" id="desc" name="desc" aria-describedby="" placeholder="Enter Youtube Url"> -->
                            <textarea class="ckeditor form-control" name="video_description[]" id="video_description"
                                cols="30" rows="10">{{isset($video)? $video->description : ''}}</textarea>
                        </div>
                    </div>

                    <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                            <label>Status <span class="login-danger">*</span></label>
                            <select name="video_status[]" id="video_status" class="form-control custom-select">
                                <option>Select</option>
                                <option @if(isset($video)) @if($video->image_status == 1) selected @endif @endif
                                    value="1">Active</option>
                                <option @if(isset($video)) @if($video->image_status == 0) selected @endif @endif
                                    value="0">InActive</option>
                            </select>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                {{--
<div class="col-12 col-sm-8">
    <div class="form-group local-forms">
        <label>Video </label>

        <div class="row">
            <div class="col-10">
                <input type="file" class="form-control" name="is_image[]" id="is_image" multiple />
            </div>

            <div class="col-2">
                @if(isset($post)) @foreach($post->past_work as $videos) @if($videos->is_image == 0)
                <input type="hidden" name="video_id[]" value="{{$videos->id}}" />
                <input type="hidden" name="video[]" id="video" value="{{isset($post)?$videos->pastimage:''}}" />
                <video class="video" controls>
                    <source src="@if(isset($post)) @if($videos->pastimage){{asset($videos->pastimage)}}@endif @endif"
                        style="height: 50px;" />
                </video>
                @endif @endforeach @endif
            </div>
        </div>

        --}}

        <div class="col-2">
            <button type="button" id="btnstep7" class="btn btn-primary btn-block">Previous</button>
        </div>
        <div class="card-footer"></div>

        <div class="col-2">
            <button type="button" class="btn btn-primary btn-block next2 btnstep6">Next</button>
        </div>
    </div>
</div>


<div id="step5" style="display: none;">
    <div class="tab-pane" id="solid-rounded-justified-tab5">
        <div class="row">
            <div class="col-12">
                <h5 class="form-title">Payment Policy</h5>
            </div>
            {{-- <div class="col-md-4">
                    <label class="col-form-label pt-0" for="title_payment">Title</label>
                    <input class="form-control" id="title_payment" name="title_payment[]" type="text" placeholder="Enter Title" />
                </div> --}}
            @foreach($post->pp as $val)
            <input type="hidden" name="payment_id[]" value="{{$val->id}}">
            <div class="col-md-7">
                <label class="col-form-label pt-0" for="description0">Description</label>
                <textarea class="form-control" id="description_payment" name="description_payment[]"
                    placeholder="Enter Description">{{$val->description}}</textarea>
            </div>
            <div class="col-md-1" style="padding: 15px;">
                <button class="btn mt-2 btn-danger deleteButton"
                    data-url="{{route('payment.delete', base64_encode($val->id))}}" type="button"><i
                        class="fas fa-trash fa-sm"></i></button>
            </div>
            @endforeach

        </div>


        <div class="row">
            <div class="col-12">
                <h5 class="form-title">Cancellation Policy</h5>
            </div>
            {{-- <div class="col-md-4">
                    <label class="col-form-label pt-0" for="title_payment">Title</label>
                    <input class="form-control" id="title_payment" name="title_payment[]" type="text" placeholder="Enter Title" />
                </div> --}}
            @foreach($post->cancellation as $val)
            <input type="hidden" name="cancellation_id[]" value="{{$val->id}}">
            <div class="col-md-7">
                <label class="col-form-label pt-0" for="cancellation_des">Description</label>
                <textarea class="form-control" id="cancellation_des" name="cancellation_des[]"
                    placeholder="Enter Description">{{$val->description}}</textarea>
            </div>
            <div class="col-md-1" style="padding: 15px;">
                <button class="btn mt-2 btn-danger deleteButton"
                    data-url="{{route('payment.delete', base64_encode($val->id))}}" type="button"><i
                        class="fas fa-trash fa-sm"></i></button>
            </div>
            @endforeach
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <h5 class="form-title">Terms & Conditions</h5>
        </div>
        {{-- <div class="col-md-4">
                <label class="col-form-label pt-0" for="title0">Title</label>
                <input class="form-control" id="term_title" name="term_title[]" type="text" placeholder="Enter Title" />
            </div> --}}

        <div class="col-md-7 mb-3">
            <label class="col-form-label pt-0" for="description0">Description</label>
            <textarea class="form-control ckeditor" id="term_description" name="term_description[]" type="text"
                placeholder="Enter Description">{{$post->terms_condi}}</textarea>
        </div>

        {{-- <div class="col-md-1">
                <button class="btn mt-2 btn-primary" type="button" onclick="addMoreRow()"><i class="fa fa-plus"></i></button>
            </div> --}}
        <div class="copies-row"></div>
        <div>
            <div class="col-2">
                <button type="button" id="btnstep8" class="btn btn-primary btn-block">Previous</button>
            </div>

            <div class="card-footer"></div>

            <div class="col-2">
                <button class="btn btn-primary btn-block next2" id="submitForm" type="submit">Submit</button>
            </div>
        </div>
    </div>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

@section('scriptjs')
<script>
function initImageUpload(box) {

    let uploadField = $(box).prop("files")[0];

    let currentid = $(box).attr('data-id');

    checkType(uploadField, currentid);

}

function checkType(file, currentid) {

    let imageType = /image.*/;

    if (!file.type.match(imageType)) {

        throw 'Datei ist kein Bild';

    } else if (!file) {

        throw 'Kein Bild gew채hlt';

    } else {

        previewImage(file, currentid);

    }

}

function previewImage(file, currentid) {

    let thumb = $('.js--image-preview-data' + currentid);

    console.log(thumb);

    reader = new FileReader();

    reader.onload = function() {

        $('.js--image-preview-data' + currentid).css('background-image', 'url(' + reader.result + ')');

    }

    reader.readAsDataURL(file);

    $('.js--image-preview-data' + currentid).addClass('js--no-default');

}

function preview_video(box) {
    // alert(box);
    let uploadField = $(box).prop("files")[0]
    let currentid = $(box).attr('data-id');
    // alert(currentid);
    var url = URL.createObjectURL(uploadField);

    $('.js--image-preview-data' + currentid).html(
        "<video controls style='width:100% !important;height: 150px;'><source src='" + url +
        "' type='video/mp4'></video>");

}
</script>



<script type="text/javascript">
function isNumberKey(evt) {

    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}



$(document).ready(function() {
    // Select2 Multiple
    $('.service_name').select2({
        placeholder: "Select",
        allowClear: true
    });

});

$(document).ready(function() {
    $("#step5").css('display', 'none');
    $("#step4").css('display', 'none');
    $("#step3").css('display', 'none');
    $("#step6").css('display', 'block');
    $("#step2").css('display', 'none');
    $("#step1").css('display', 'none');
});



$(".btnstep1").click(function() {
    $("#step1").css('display', 'block');
    $("#step2").css('display', 'none');
    $("#step3").css('display', 'none');
    $("#step6").css('display', 'none');
    $("#step4").css('display', 'none');
    $("#step5").css('display', 'none');
    $("#business").addClass('active');
    // $("#business").removeClass('active');
});
$(".btnstep2").click(function() {
    $("#step2").css('display', 'block');
    $("#step1").css('display', 'none');
    $("#step3").css('display', 'none');
    $("#step6").css('display', 'none');
    $("#step4").css('display', 'none');
    $("#step5").css('display', 'none');
    $("#document").addClass('active');
    $("#business").removeClass('active');
});
$("#btnstep1").click(function() {
    $("#step2").css('display', 'none');
    $("#step1").css('display', 'block');
    $("#business").addClass('active');
    $("#document").removeClass('active');
});
$(".btnstep3").click(function() {
    $("#step3").css('display', 'block');
    $("#step1").css('display', 'none');
    $("#step4").css('display', 'none');
    $("#step5").css('display', 'none');
    $("#step6").css('display', 'none');
    $("#step2").css('display', 'none');
    $("#service").addClass('active');
    $("#document").removeClass('active');
});
$("#btnstep5").click(function() {
    $("#step3").css('display', 'none');
    $("#step2").css('display', 'block');
    $("#step1").css('display', 'none');
    $("#document").addClass('active');
    $("#service").removeClass('active');
});
$(".btnstep4").click(function() {
    $("#step4").css('display', 'block');
    $("#step1").css('display', 'none');
    $("#step2").css('display', 'none');
    $("#step3").css('display', 'none');
    $("#step6").css('display', 'none');
    $("#step5").css('display', 'none');
    $("#past_work").addClass('active');
    $("#service").removeClass('active');
});
$("#btnstep7").click(function() {
    $("#step4").css('display', 'none');
    $("#step3").css('display', 'block');
    $("#step2").css('display', 'none');
    $("#service").addClass('active');
    $("#past_work").removeClass('active');
});
$(".btnstep6").click(function() {
    $("#step5").css('display', 'block');
    $("#step4").css('display', 'none');
    $("#step3").css('display', 'none');
    $("#step6").css('display', 'none');
    $("#step2").css('display', 'none');
    $("#step1").css('display', 'none');
    $("#payment").addClass('active');
    $("#past_work").removeClass('active');
});
$("#btnstep8").click(function() {
    $("#step5").css('display', 'none');
    $("#step4").css('display', 'block');
    $("#step3").css('display', 'none');
    $("#past_work").addClass('active');
    $("#payment").removeClass('active');
});
$("#btnstep10").click(function() {
    $("#step5").css('display', 'none');
    $("#step1").css('display', 'block');
    $("#step3").css('display', 'none');
    $("#step4").css('display', 'none');
    $("#step2").css('display', 'none');
    $("#step6").css('display', 'none');
    $("#business").addClass('active');
    $("#vendor_register").removeClass('active');
});
$(".btnstep9").click(function() {
    $("#step5").css('display', 'none');
    $("#step4").css('display', 'none');
    $("#step3").css('display', 'none');
    $("#step6").css('display', 'block');
    $("#step2").css('display', 'none');
    $("#step1").css('display', 'none');
    $("#vendor_register").addClass('active');
    $("#business").removeClass('active');
});


//     $(function () {
// 	//adding a new class on button element
//     $('button.step1').on('click',function () {
//         $('button.step1').addClass('active');   
//     });
// });


//     $(document).ready(function(){
//     $("button").click(function(){
//         $("h5").addClass("active");
//     });
// });

$(function() {



    $('#submitForm').submit(function() {

        for (instance in CKEDITOR.instances)
            CKEDITOR.instances[instance].updateElement();
        var $this = $('#payment_policy');
        buttonLoading('loading', $this);
        $('.is-invalid').removeClass('is-invalid state-invalid');
        $('.invalid-feedback').remove();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
                '_method': 'patch'
            },
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
                        window.location.href = "{{ route('admin.vendor')}}";
                    }, 1000);


                } else {
                    $.each(data.errors, function(fieldName, field) {
                        $.each(field, function(index, msg) {
                            $('#' + fieldName).addClass(
                                'is-invalid state-invalid');
                            errorDiv = $('#' + fieldName).parent('div');
                            errorDiv.append(
                                '<div class="invalid-feedback">' +
                                msg + '</div>');
                        });
                    });
                    errorMsg('Create Vendor', 'Input Error');
                }
                buttonLoading('reset', $this);

            },
            error: function() {
                errorMsg('Create Vendor',
                    'There has been an error, please alert us immediately');
                buttonLoading('reset', $this);
            }

        });

        return false;
    });
});

$(document).on("change", "#category_name", function() {
    // alert();
    var value = $('#category_name').val();
    // alert(value);
    showBoard(value);
});

function showBoard(sub_cat) {
    // alert(test);
    $.ajax({
        'url': '{{route("get_sub_cat")}}',
        'type': 'GET',
        data: {
            "_token": "{{ csrf_token() }}",
            sub_cat: sub_cat
        },
        success: function(data) {
            $('#subcategory_name').html(data);
            // $('#unite_id').html('');
        },
        error: function(response) {
            // alert('Error');
        }
    });
}
</script>


<script>
$("#image").change(function() {
    const file = this.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function(event) {
            $("#imgPreview")
                .attr("src", event.target.result);
        };
        reader.readAsDataURL(file);
    }
});

$("#pan_card").change(function() {
    const file = this.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function(event) {
            $("#imgPreview2")
                .attr("src", event.target.result);
        };
        reader.readAsDataURL(file);
    }
});

$("#gst_doc").change(function() {
    const file = this.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function(event) {
            $("#imgPreview3")
                .attr("src", event.target.result);
        };
        reader.readAsDataURL(file);
    }
});

$("#cheque").change(function() {
    const file = this.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function(event) {
            $("#imgPreview4")
                .attr("src", event.target.result);
        };
        reader.readAsDataURL(file);
    }
});
</script>

<script>
var counter1 = 1;

function addMoreData() {
    $(".appenddata1").append(`
    
    <div class="row" id="ROWID-${counter1}">
        

        <div class="col-md-7">
            <label class="col-form-label pt-0" for="description_payment">Description</label>
            <textarea class="form-control" id="description_payment" name="description_payment[]"  placeholder="Enter Description"></textarea>
        </div>   
        <div class="col-md-1" style=" padding: 15px;">
            
        <button type="button" onclick="removeData(${counter1})" class="btn btn-danger"> <i class="fa fa-trash"></i> </button>
        </div>
                
    </div>
    
    
    `);

    counter1++;
}

function removeData(id) {
    $("#ROWID-" + id).remove();
}
</script>

<script>
var counter1 = 1;

function addMoreData2() {
    $(".appenddata12").append(`
    
    <div class="row" id="ROWID-${counter1}">
        

    <div class="col-md-7">
                    <label class="col-form-label pt-0" for="cancellation_des">Description</label>
                    <textarea class="form-control" id="cancellation_des" name="cancellation_des[]" placeholder="Enter Description"></textarea>
                </div>  
        <div class="col-md-1" style=" padding: 15px;">
            
        <button type="button" onclick="removeData2(${counter1})" class="btn btn-danger"> <i class="fa fa-trash"></i> </button>
        </div>
                
    </div>
    
    
    `);

    counter1++;
}

function removeData2(id) {
    $("#ROWID-" + id).remove();
}
</script>

<script>
function addNewvideo(id) {
    var val = "#video_url" + id.id;
    var thumb = "#thumb" + id.id;
    var thumbnail = "#thumbnail" + id.id;
    // alert(val);
    // alert(thumb);
    // alert(thumbnail);
    var value = $(val).val();



    var video_image = getYouTubeThumbnail(value);
    // alert(video_image);
    $(thumb).attr("src", video_image);
    $(thumbnail).val(video_image);

    // $('#getThumb').append('<input type="hidden" name="thumbnail" value="'+video_image+'">');



    function getYouTubeThumbnail(url) {
        var videoId = url.match(
            /(?<=v=|\/embed\/|\/\d\/|\.be\/|\/embed\/|\/\d\/|\?v=|&v=|youtu.be\/|\/embed\/|\/\d\/|\?v=|&v=|\?vi=|&vi=|\/embed\/|\?feature=player_embedded&v=)[^#&?\/\s]+/
            );
        //   alert(videoId);
        if (videoId != null) {
            return "https://img.youtube.com/vi/" + videoId[0] + "/hqdefault.jpg";
        }
        return '';
    }

}



// function removeRow(counter){

//     $(".copies-row .copiesrow"+counter).remove();
// }



$(document).on("change", "#category_name", function() {

    var value = $("#category_name").val();

    showType(value);
});




function showType(category_id) {
    // alert(category_id);
    $.ajax({
        'url': '{{route("get-service")}}',
        'type': 'GET',
        data: {
            "_token": "{{ csrf_token() }}",
            category_id: category_id
        },
        success: function(data) {
            // alert(data);
            $('#unite_id').html(data);
            // $('#unite_id').html('');
        },
        error: function(response) {
            // alert('Error');
        }
    });
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

// delete button
$(document).on('click', '.deleteButton', function() {
    var con = confirm("Are you sure you want to delete this record?");
    if (con) {
        row = $(this).closest('tr');
        url = $(this).attr('data-url');
        var $this = $(this);
        buttonLoading('loading', $this);
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data) {

                successMsg('Create Setting', data.msg);


                row.remove();
                location.reload();
            }
        });
    }
});
</script>


@stop