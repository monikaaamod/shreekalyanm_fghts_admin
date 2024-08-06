@extends('admin.layouts.app')
@section('title')
{{$page_name}}
@stop
@section('stylecss')



@stop
@section('content')
  <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <!-- <div class="card card-table"> -->
                        <!-- <div class="card-body"> -->
                            <!-- <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="card-title card-title-dash">{{$page_title}}</h4>
                            </div> -->

                            <form action="{{$page_url}}" id="submitForm" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- Lead Content -->
                                        <div class="card" id="tourcontent">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <h4 class="card-title card-title-dash">{{$page_title}}</h4>
                                                </div>
                                                <!-- <div class="panel-title" style="font-size:15px;"><strong>General Information</strong></div> -->
                                                <div class="row mt-4">
                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group local-forms">
                                                            <label>Firm Name <span class="login-danger">*</span></label>
                                                            <input type="text" class="form-control" value="{{isset($post)?$post->firm_name:''}}" id="firm_name" name="firm_name" type="text" aria-describedby="" placeholder="Enter Firm Name">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group local-forms">
                                                            <label>Name <span class="login-danger">*</span></label>
                                                            <input type="text" class="form-control" value="{{isset($post)?$post->name:''}}" id="name" name="name" type="text" aria-describedby="" placeholder="Enter Name">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group local-forms">
                                                            <label>Last Name <span class="login-danger">*</span></label>
                                                            <input type="text" class="form-control" value="{{isset($post)?$post->last_name:''}}" id="last_name" name="last_name" type="text" aria-describedby="" placeholder="Enter Last Name">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group local-forms">
                                                            <label>Email <span class="login-danger">*</span></label>
                                                            <input type="text" class="form-control" value="{{isset($post)?$post->email:''}}" id="email" name="email" type="text" aria-describedby="" placeholder="Enter Email">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group local-forms">
                                                            <label>Mobile No. <span class="login-danger">*</span></label>
                                                            <input type="text" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)" class="form-control" value="{{isset($post)?$post->mobile:''}}" id="mobile" name="mobile" type="text" aria-describedby="" placeholder="Enter Mobile No">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group local-forms">
                                                            <label>GST <span class="login-danger">*</span></label>
                                                            <input type="text" onkeypress="return isNumberKey(event)" class="form-control" value="{{isset($post)?$post->gst:''}}" id="gst" name="gst" type="text" aria-describedby="" placeholder="Enter GST Number">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group local-forms">
                                                            <label>PAN <span class="login-danger">*</span></label>
                                                            <input type="text" maxlength="10" minlength="10" class="form-control" value="{{isset($post)?$post->pan:''}}" id="pan" name="pan" type="text" aria-describedby="" placeholder="Enter PAN Number">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-5">
                                                        <div class="form-group local-forms">
                                                            <div class="row m-0">
                                                                <div class="col-10">
                                                                <label>Logo <span class="login-danger">*</span></label>
                                                                    <input type="file" class="form-control" accept="image/png, image/jpeg" name="image" id="image" />
                                                                </div>

                                                                <div class="col-2">
                                                                    @if(isset($post))
                                                                    <img src="@if(isset($post)) @if($post->image){{asset($post->image)}}@else{{'https://pipdigz.co.uk/p3/img/placeholder-square.png'}}@endif @else{{'https://pipdigz.co.uk/p3/img/placeholder-square.png'}} @endif" style="height: 50px;"/>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-3">
                                                        <div class="form-group local-forms">
                                                            <label>Status <span class="login-danger">*</span></label>
                                                            <select name="status" id="status" class="form-control custom-select">
                                                                <option value="">Select</option>
                                                                <option @if(isset($post)) @if($post->status == 'Active') selected @endif @endif value="Active">Active</option>
                                                                <option @if(isset($post)) @if($post->status == 'Inactive') selected @endif @endif value="InActive">InActive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-title" style="font-size:15px;"><strong>Address Information</strong></div>
                                                <div class="row mt-4">
                                                    <div class="col-12 col-sm-4" id="InContry">
                                                        <div class="form-group local-forms">
                                                            <label>Country </label>
                                                            <select name="country" id="country" class="form-control custom-select multi">
                                                                <option value="">Select Country</option>
                                                                @foreach($country as $key=>$val)
                                                                    <option @if(isset($post)) @if($val->id == $post->country){{"selected"}} @endif @endif value="{{ $val->id }}">{{$val->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group local-forms">
                                                            <label>States </label>
                                                            <select name="state" id="state" class="form-control custom-select multi">
                                                                <option value="">Select State</option>
                                                                @foreach($state as $key=>$val)
                                                                    <option @if(isset($post)) @if($val->id == $post->state){{"selected"}} @endif @endif value="{{ $val->id }}">{{$val->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-4" id="cities">
                                                        <div class="form-group local-forms">
                                                            <label>City </label>
                                                            <select name="city" id="city" class="form-control custom-select multi">
                                                                <option value="">Select City</option>
                                                                @foreach($city as $key=>$val)
                                                                <option @if(isset($post)) @if($val->id == $post->city){{"selected"}} @endif @endif value="{{ $val->id }}">{{$val->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group local-forms">
                                                            <label>Pin Code <span class="login-danger">*</span></label>
                                                            <input type="text" minlength="6" maxlength="6" onkeypress="return isNumberKey(event)" class="form-control" value="{{isset($post)?$post->pincode:''}}" id="pincode" name="pincode" type="text" aria-describedby="" placeholder="Enter Pin Code">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6">   
                                                        <div class="form-group local-forms">
                                                            <label>Address <span class="login-danger">*</span></label>
                                                            <input type="text" class="form-control" value="{{isset($post)?$post->address:''}}" id="address" name="address" type="text" aria-describedby="" placeholder="Enter Address">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-12">
                                                        <div class="form-group local-forms">
                                                            <label>Terms and Conditions <span class="login-danger">*</span></label>
                                                            <textarea name="terms" id="terms" class="form-control">{{isset($post)?$post->terms:''}}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row row-sm">
                                                            <div class="col-md-9">
                                                            <button type="submit" id="submitButton" class="btn btn-primary float-right"
                                                                data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..."
                                                                data-rest-text="Submit">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <!-- </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scriptjs')
 
    <script type="text/javascript">
        $(function() {

            formHandler.initializeForm('submitForm', "{{ route('admin.agency') }}", 'terms');

        });
    </script>

<script>
    
        $(document).on('click','.deleteButton', function(){
            var con = confirm("Are you sure you want to delete this record?");
            if(con)
            {
                row = $(this).closest('tr');
                url = $(this).attr('data-url');
                var $this = $(this);
                buttonLoading('loading', $this);
                $.ajax({
                url: url,
                type: 'GET',
                success: function(data){
                    
                    successMsg('Create Setting', data.msg);

                    row.remove();
                    location.reload();
                }
                });
            }
        });




        
         $(document).on("change", "#country", function() {
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


        $(document).on("change", "#state", function() {
            var test = new Array();
            $("#state").each(function() {
                test.push($(this).val());
            });
            // alert(value);
            showStateCity(test);
        });

        function showStateCity(state_id) {
            // alert(test);
            $.ajax({
                'url': '{{ route('getAjaxData') }}',
                'type': 'GET',
                data: {
                    "_token": "{{ csrf_token() }}",
                    state_id: state_id
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

        // End get city

            


    </script>


@stop
