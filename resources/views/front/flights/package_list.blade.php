@extends('front.layouts.packages_header')
 @section('title') Packages @endsection 

@section('inlinecss')
<style>
    .text {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 1; /* number of lines to show */
                line-clamp: 2; 
        -webkit-box-orient: vertical;
    }

    .primary-buttontow{
        background: #419623;
        width: auto;
        height: 40px;
        padding: 8px 8px;
        font-size: 1.125rem;
        color: #ffffff;
        font-weight: 700;
        text-align: center;
        text-decoration: none;
        border: 0px;
        border-radius: 5px;
        margin-top: 0px !important;
        }


    .modal-dialog {
        max-width: 1000px;
    }

    .modal-title{
    font-size: 27px;
    color:#000;
    }

    .enq {
    font-size:19px;
    text-align: center;
    }

    .select2-container {
    width:100% !important;
    }

    .select2-container .select2-selection--single{
    height:37px !important;
    }

    .select2-container--open .select2-dropdown--below {
    z-index: 100000 !important;
    }

    .trav_toggle.open {
        background: url('{{asset("front/images/down.png")}}') no-repeat right 8px;
        background-size: 20px;
    }
    .trav_toggle.close {
        background: url('{{asset("front/images/up.png")}}') no-repeat right 8px;
        background-size: 20px;
    }


    .details {
    position: relative;
        width: 100%;
        top: -96px;
        bottom: 0;
        background: rgba(0,0,0,0.5);
        text-align: center;
        color: #fff;
        padding: 0 5% 2%;
        height:96px;
    }



    .details .packageName {
        font: 1em "Lato Bold";
        padding: 15px 0 0px;
    }

    .details .nights {
        display: inline-block;
        border-radius: 20px;
        background: rgba(0,0,0,0.5);
        font-size: .85714em;
        padding: 5px 10px;
    }

    

</style>
@endsection
 @section('container')

<section class="forampost">
    <div class="container">
        <form method="POST" action="" accept-charset="UTF-8" id="slider-search-form">
            <input name="_token" type="hidden" value="CmytnXj87TBwqVzmgsHPUGChj8TKDMyRCuJ7RzpU" />
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <!-- <a class="flighticon" href="#"><img class="FLIGHTS" src="{{asset('front/images/21314.png')}}" />Tour plan</a> -->
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="destination d-flex">International Honeymoon Destination</h1>
                        </div>
                        <div class="col-md-6 d-flex" style="justify-content: end;">
                            <button type="button" class="primary-buttontow" data-bs-toggle="modal" data-bs-target="#GenralEnquiryModal" >General Enquiry</button>
                        </div>
                    </div>

                    <div class="slider-box2">
                        <div class="form-group icon">
                            <label for="exampleInputEmail1" class="form-label">Form </label>
                            <input type="text" value="" name="keyword" class="form-control" placeholder="Enter City Or airport" />
                        </div>
                        <a class="revasfor" href="#"><i class="fa-sharp fa-solid fa-repeat"></i> </a>
                        <div class="form-group icon">
                            <label for="exampleInputEmail1" class="form-label">To</label>
                            <input type="text" value="" name="keyword" class="form-control" placeholder="Enter City Or airport" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Departure </label>
                            <input type="text" value="" name="keyword" class="form-control" placeholder="Tuesday" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Return</label>
                            <input type="text" value="" name="keyword" class="form-control" placeholder="Tuesday" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Travellers&Class</label>
                            <input type="text" value="" name="keyword" class="form-control" placeholder="Econcmy" />
                        </div>
                        <div class="flight-btn d-flex justify-content-end w-100">
                            <button type="submit" class="primary-button">
                                <!-- <i class="fa fa-search"></i> -->
                                SEARCH FLIGHTS
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<section class="Dreamykahon mb-5">
    <div class="container">
        <div class="row">
            @foreach($packages as $key=>$val)
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3">
                <div class="formpackge">
                    <a href="{{route('packages_detail',base64_encode($val->id))}}"><img src="{{asset($val->banner_image)}}" height="215px" width="100%" /></a>
                    <a class="besepa" href="{{route('packages_detail',base64_encode($val->id))}}">Best Selling Package</a>
                    <div class="mancard">
                        <a href="{{route('packages_detail',base64_encode($val->id))}}">
                            <h5 class="Drkahopafr text-dark text">{{$val->title}}</h5>
                        </a>
                        <ul class="ulGulmarg mb-1">
                            @foreach($val->stay_plan as $cv=>$cd)
                                <li>
                                    <h6><span class="anone">N{{$cd->nights}}</span>{{$cd->city_name->name}}</h6>
                                </li>
                            @endforeach 
                        </ul>
                        <ul class="flhoactr mb-1">
                            @foreach($val->inclusions_name as $ss=>$dd)
                                @if($dd != "")
                                <li>
                                    <img src="{{asset($dd->image)}}" height="20px" />
                                    <div>{{$dd->title}}</div>
                                </li>
                                @endif
                            @endforeach 
                        </ul>

                        @php
                            $formattedNumber = number_format($val->price, 0, '.', ',');
                        @endphp
                        <div class="package-prc d-flex">
                            <div class="prc-left pt-4">
                                <h5 class="personper" style="font-size: 16px; width: 150px;"><strong>&#8377;{{$formattedNumber}}</strong> per person</h5>
                            </div>
                            <div class="book-btn">
                                <button type="submit" class="primary-button">Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

    <!-- General Enquiry Modal -->
    <div class="modal fade" id="GenralEnquiryModal" tabindex="-1" aria-labelledby="GenralEnquiryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Get the Best Holiday Planned As You Want!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('package_enquiry')}}" method="post" id="submitForm">
                  @csrf
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                              <div class="row" style="display: flex;justify-content: center;">
                                <div class="col-md-8 mb-2">
                                  <p class="enq">Enter your contact details and package details we will plan the best holiday suiting all your requirements.</p>
                                </div>
                              </div>

                                <!-- <div class="col-md-12 mt-2">
                                    <div class="form-group local-forms">
                                        <input type="text" class="form-control" id="title" name="title" type="text" aria-describedby="" placeholder="Enter Enquiry Title" />
                                    </div>
                                </div> -->

                                <div class="col-md-6 mt-4">
                                    <div class="form-group local-forms">
                                      <input type="text" class="form-control" id="name" name="name" type="text" aria-describedby="" placeholder="Enter Contact Person Name" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group local-forms">
                                        <input type="text" class="form-control" id="last_name" name="last_name" type="text" aria-describedby="" placeholder="Enter Last Name" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group local-forms">
                                        <input type="text" class="form-control" id="mobile_no" name="mobile_no" type="text" aria-describedby="" placeholder="Enter Mobile No." />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group local-forms">
                                        <input type="email" class="form-control" id="email" name="email" type="text" aria-describedby="" placeholder="Enter Email" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group local-forms">
                                        <!-- <label>Travel Date </label> -->
                                        <input type="date" class="form-control" title="Expected Date of Travel" name="travel_date" id="travel_date" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4 pe-0">
                                  <div class="trav_engine">
                                      <input type="text" id="txtTotalTravelers" class="txt_Traveler" name="travelers" @if(isset($post)) value="{{$post->infants + $post->adults + $post->childs}} Traveler(s)" @else value="1 @endif Traveler(s)" readonly="readonly"/>
                                      <div class="trav_toggle open">
                                          <a href="#" style="font-size: 0;">Open</a>
                                      </div>
                                      <div class="trav_form" style="display: none;">
                                          <div class="trav_item">
                                              <div class="trav_inner1">
                                                  Adults
                                                  <span>12+ yrs</span>
                                              </div>
                                              <div class="trav_inner2">
                                                  <a href="javascript:void(0)" class="minus" onclick="javascript:process(-1)">-</a>
                                                  <input type="text" value="{{isset($post)?$post->adults:'1'}}" id="ddlAdult" name="adults" class="txt_trav" readonly="readonly" onkeypress="return false;" />
                                                  <a href="javascript:void(0)" class="plus" onclick="javascript:process(1)">+</a>
                                              </div>
                                          </div>
                                          <div class="trav_item">
                                              <div class="trav_inner1">
                                                  Children
                                                  <span>2 - 11 yrs</span>
                                              </div>
                                              <div class="trav_inner2">
                                                  <a href="javascript:void(0)" class="minus" onclick="javascript:process2(-1)">-</a>
                                                  <input type="text" value="{{isset($post)?$post->childs:'0'}}" id="ddlChild" name="childs" class="txt_trav" readonly="readonly" onkeypress="return false;" />
                                                  <a href="javascript:void(0)" class="plus" onclick="javascript:process2(1)">+</a>
                                              </div>
                                          </div>
                                          <div class="trav_item">
                                              <div class="trav_inner1">
                                                  Infants
                                                  <span>under 2 yrs</span>
                                              </div>
                                              <div class="trav_inner2">
                                                  <a href="javascript:void(0)" class="minus" onclick="javascript:process3(-1)">-</a>
                                                  <input type="text" value="{{isset($post)?$post->infants:'0'}}" id="ddlInfant" name="infants" class="txt_trav" readonly="readonly" onkeypress="return false;" />
                                                  <a href="javascript:void(0)" class="plus" onclick="javascript:process3(1)">+</a>
                                              </div>
                                          </div>
                                          <div class="trav_item p-0">
                                              <span class="trav_done">Done</span>
                                          </div>
                                      </div>
                                  </div>
                                </div>

                                <div class="col-12 col-sm-4 mt-4">
                                    <div class="form-group local-forms">
                                        <label>No. of Nights </label>
                                        <input type="number" onkeyup="convertToDays(this)" class="form-control" value="{{isset($post)?$post->nights:''}}" name="nights" id="nights" placeholder="Ex: 3">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mt-4">
                                    <div class="form-group local-forms">
                                        <label>No. of Days </label>
                                        <input type="number" class="form-control" value="{{isset($post)?$post->days:''}}" name="days" id="days" readonly>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mt-4">
                                    <div class="form-group local-forms">
                                        <label>Package Type </label>
                                        <select name="type" id="type" class="form-control custom-select multi">
                                            <option value="">Select</option>
                                            <option @if(isset($post)) @if($post->package_type == "Domestic") selected @endif @endif value="Domestic">Domestic</option>
                                            <option @if(isset($post)) @if($post->package_type == "International") selected @endif @endif value="International">International</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mt-4" id="InContry">
                                    <div class="form-group local-forms">
                                        <label>Country </label>
                                        <select name="country[]" id="country" multiple class="form-control custom-select multi">
                                            <option value="">Select</option>
                                            @foreach($country as $key=>$val)
                                                <option @if(isset($post)) @if(in_array($val->id, explode(',', $post->country))){{"selected"}} @endif @endif value="{{ $val->id }}">{{$val->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mt-4" @if(isset($post) && $post->state != '') id="dom" @else id="domState" @endif>
                                    <div class="form-group local-forms">
                                        <label>States </label>
                                        <select name="state[]" id="state" multiple class="form-control custom-select multi">
                                            <option value="">Select</option>
                                            @foreach($state as $key=>$val)
                                                <option @if(isset($post)) @if(in_array($val->id, explode(',', $post->state))){{"selected"}} @endif @endif value="{{ $val->id }}">{{$val->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mt-4" id="cities">
                                    <div class="form-group local-forms">
                                        <label>City </label>
                                        <select name="city[]" id="city" class="form-control custom-select multi" multiple>
                                            <option value="">Select</option>
                                              @foreach($city as $key=>$val)
                                              <option @if(isset($post)) @if(in_array($val->id, explode(',', $post->city))){{"selected"}} @endif @endif value="{{ $val->id }}">{{$val->name}}</option>
                                              @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <div class="form-group local-forms">
                                        <textarea name="package_des" class="form-control" id="package_des" placeholder="Enter About Package"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="submit" id="submitButton" class="btn1 btn-primary" style="background-color:#0a53be; color:#FFF;">Submit</button>
                  </div>
                </form>
            </div>
        </div>
    </div>

@endsection @section('scriptjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>

<script>
    $(document).ready(function () {
        $(".navbar-toggler").click(function () {
            $("body").addClass("header-active");
        });
        $("#btnremove").click(function () {
            $("body").removeClass("header-active");
        });
    });


    $(document).ready(function() {
            $("#domState").hide();
            $(document).on("change", "#type", function() {
                var val = $("#type").val();

                if(val == 'Domestic'){
                    $("#domState").show();
                    $("#country").html('<option value="1">India</option>');
                }
                else{
                    $("#domState").hide();
                    var alldata = "ds";
                    $.ajax({
                        'url': '{{ route('getAjaxData') }}',
                        'type': 'GET',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            alldata: alldata
                        },
                        success: function(data) {
                            // alert(data);
                            $('#country').html(data);
                        },
                        error: function(response) {
                            // alert('Error');
                        }
                    });
                }
            });
        });

        function convertToDays(TextObj) {
            var val = TextObj.value;
            val++;

            $("[name='days']").val(val);
        }


        $(document).on("change", "#country", function() {
          // alert();
            var test = new Array();
            $("#country").each(function() {
                test.push($(this).val());
            });
            // alert(test);
            showCity(test);
        });

        function showCity(country) {
            // alert(country);
            $.ajax({
                'url': '{{ route('getAjaxData') }}',
                'type': 'GET',
                data: {
                    "_token": "{{ csrf_token() }}",
                    country: country
                },
                success: function(data) {
                    $('#city').html(data);
                    // $('#unite_id').html('');
                },
                error: function(response) {
                    // alert('Error');
                }
            });
        }

        $(document).ready(function () {
            if ($("div.trav_toggle").length > 0) {
                $("div.trav_toggle").click(function () {
                    if ($(this).hasClass("open")) {
                        $(this).removeClass("open");
                        $(this).addClass("close");
                        $(this).next().slideDown(100);
                        return false;
                    } else {
                        $(this).removeClass("close");
                        $(this).addClass("open");
                        $(this).next().slideUp(100);
                        return false;
                    }
                });
            }
            $(".trav_done").click(function () {
                if ($("div.trav_toggle").hasClass("close")) {
                    $("div.trav_toggle").removeClass("close");
                    $("div.trav_toggle").addClass("open");
                    $("div.trav_toggle").next().slideUp(100);
                }
            }); 
        });


        function process(v) {
            var Adult = parseInt(document.getElementById("ddlAdult").value);
            var Child = parseInt(document.getElementById("ddlChild").value);
            var Infant = parseInt(document.getElementById("ddlInfant").value);
            Adult += v;
            var total = Adult + Child;
            // if (total <= 9 && Adult >= 1) {
                document.getElementById("ddlAdult").value = Adult;
                if (Infant > Adult) {
                    document.getElementById("ddlInfant").value = Adult;
                }
                var TotTravelers = Adult + Child + Infant;
                document.getElementById("txtTotalTravelers").value = (TotTravelers + " Traveler(s)");
            // }
        }


        function process2(s) {
            // alert(s);
            var Adult = parseInt(document.getElementById("ddlAdult").value);
            var Child = parseInt(document.getElementById("ddlChild").value);
            var Infant = parseInt(document.getElementById("ddlInfant").value);
            Child += s;
            var total = Adult + Child;
            // if (total <= 9 && Child >= 0) {
                document.getElementById("ddlChild").value = Child;
                var TotTravelers = Adult + Child + Infant;
                document.getElementById("txtTotalTravelers").value = (TotTravelers + " Traveler(s)");
            // }
        }


        function process3(sh) {
            var Adult = parseInt(document.getElementById("ddlAdult").value);
            var Infant = parseInt(document.getElementById("ddlInfant").value);
            var Child = parseInt(document.getElementById("ddlChild").value);
            Infant += sh;
            // if (Infant <= Adult && Infant >= 0) {
                document.getElementById("ddlInfant").value = Infant;
                var TotTravelers = Adult + Child + Infant;
                document.getElementById("txtTotalTravelers").value = (TotTravelers + " Traveler(s)");
            // }
        }


        $(function () {
           $('#submitForm').submit(function(){
            // alert();
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
                      $("#exampleModal").modal("hide");
                        successMsg('Send Enquiry', data.msg);
                        $('#submitForm')[0].reset();
                        Swal.fire(
                          'Thank You!',
                          'Your Enquiry Subbmitted Successfully!',
                          'success'
                        );
                        setTimeout(function() {
                          location.reload();
                                }, 3000);
                        
                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Send Enquiry', data.msg);
                    }
                    buttonLoading('reset', $this);
                },
                error: function() {
                    errorMsg('Send Enquiry', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }
            });
            return false;
           });

           
        });
</script>
@stop