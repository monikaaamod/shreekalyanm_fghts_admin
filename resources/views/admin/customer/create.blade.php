@extends('admin.layouts.app')
@section('title')
Customer
@stop
@section('stylecss')
@stop
@section('content')
 <!-- partial -->
 <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="card-title card-title-dash">{{$newdata['page_title']}}</h4>
                            </div>
                                <form id="submitForm" class="form-horizontal" method="post" action="{{ $newdata['url'] }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">

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
                                            <label>Mobile No <span class="login-danger">*</span></label>
                                            <input type="text" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)" class="form-control" value="{{isset($post)?$post->mobile:''}}" id="mobile" name="mobile" type="text" aria-describedby="" placeholder="Enter Mobile No">
                                        </div>
                                    </div>

                                    
                                    {{-- <div class="col-12 col-sm-4">
                                        <div class="form-group
                                            local-forms">
                                            <label>Gender <span class="login-danger">*</span></label>
                                            <select class="form-control" name="gender" id="gender">
                                                <option>Select Gender</option>
                                                <option @if(isset($post)) @if($post->gender == 'Female') selected @endif @endif value="Female">Female</option>
                                                <option @if(isset($post)) @if($post->gender == 'Male') selected @endif @endif value="Male">Male</option>
                                            </select>
                                        </div>
                                    </div> --}}

                                    @if(!isset($post)) 
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Password <span class="login-danger">*</span></label>
                                            <input type="password" class="form-control" value="{{isset($post)?$post->password:''}}" id="password" name="password" type="text" aria-describedby="" placeholder="Enter password">
                                        
                                        </div>
                                    </div>
                                    
                                    @endif

                                    <div class="col-12 col-sm-5">
                                        <div class="form-group local-forms">
                                        <label>Image <span class="login-danger">*</span></label>
                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="file" class="form-control" accept="image/png, image/jpeg" name="image" id="image" />
                                                </div>

                                                <div class="col-2">
                                                    @if(isset($post))
                                                    <input type="hidden" name="logo" id="logo" value="{{isset($post)?$post->image:''}}" />
                                                    <img
                                                        src="@if(isset($post)) @if($post->image){{url('public/'.$post->image)}}@else{{'https://pipdigz.co.uk/p3/img/placeholder-square.png'}}@endif @else{{'https://pipdigz.co.uk/p3/img/placeholder-square.png'}} @endif"
                                                        style="height: 50px;"
                                                    />
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
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
                                   
                                  
                                    <div class="form-group">
                                        <div class="row row-sm">
                                            <div class="col-md-9">
                                            <button type="submit" id="submitButton" class="btn btn-primary float-right"
                                                data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..."
                                                data-rest-text="{{ $newdata['btn'] }}">{{ $newdata['btn'] }}</button>
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
    @endsection

    @section('scriptjs')
    <script type="text/javascript">
              formHandler.initializeSimpleForm('submitForm', "{{ route('admin.customer') }}");

    </script>
@stop
