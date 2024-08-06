@extends('admin.layouts.app')
@section('title')
Coupon Create
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
                                <h4 class="card-title card-title-dash">{{$page_title}}</h4>
                            </div>
                            <form action="{{$page_url}}" id="submitForm" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row">

                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Coupon Name <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control"  value="{{isset($post)?$post->name:''}}" id="name" name="name" type="text" aria-describedby="" placeholder="Enter Coupon Name">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Coupon Code <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control"  value="{{isset($post)?$post->coupon_code:''}}" id="code" name="code" type="text" aria-describedby="" placeholder="Enter Coupon Code">
                                        </div>
                                    </div>
                                   
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Begin Date<span class="login-danger">*</span></label>
                                            <input type="date" class="form-control"  value="{{isset($post)?$post->begin_date:''}}" id="begin_date" name="begin_date" type="text" aria-describedby="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Last Date<span class="login-danger">*</span></label>
                                            <input type="date" class="form-control"  value="{{isset($post)?$post->last_date:''}}" id="last_date" name="last_date" type="text" aria-describedby="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Coupon Type <span class="login-danger">*</span></label>
                                            <select name="type" id="type" class="form-control custom-select">
                                                <option value="">Select</option>
                                                <option @if(isset($post)) @if($post->type == 'Percentage') selected @endif @endif value="Percentage">Percentage</option>
                                                <option @if(isset($post)) @if($post->type == 'Price') selected @endif @endif value="Price">Price</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Discount <span class="login-danger">*</span></label>
                                            <input type="number" class="form-control"  value="{{isset($post)?$post->discount:''}}" id="discount" name="discount" type="text" aria-describedby="" placeholder="Enter Discount">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>User Coupon Uses Limit <span class="login-danger">*</span></label>
                                            <input type="number" class="form-control"  value="{{isset($post)?$post->uses_limit:''}}" id="limit" name="limit" type="text" aria-describedby="" placeholder="Enter Coupon Uses Limit">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Min Cart Value <span class="login-danger">*</span></label>
                                            <input type="number" class="form-control"  value="{{isset($post)?$post->min_cart_value:''}}" id="min_cart_value" name="min_cart_value" type="text" aria-describedby="" placeholder="Enter Min Cart Value">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Coupon Image </label>
                                            <div class="row">
                                                <div class="col-9">
                                                    <input type="file" class="form-control" name="image" id="image">
                                                </div>
                                                <div class="col-2 p-0" style="margin-left: -10px;">
                                                    <img src="@if(isset($post)) @if($post->image){{asset($post->image)}}@else{{'https://pipdigz.co.uk/p3/img/placeholder-square.png'}}@endif @else{{'https://pipdigz.co.uk/p3/img/placeholder-square.png'}} @endif"
                                                        style="height: 50px;" class="rounded" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Banner Image <span class="login-danger">Size (1920px X 1280px)</span> </label>
                                            <div class="row">
                                                <div class="col-9">
                                                    <input type="file" class="form-control" name="banner_image" id="banner_image">
                                                </div>
                                                <div class="col-2 p-0" style="margin-left: -10px;">
                                                    <img src="@if(isset($post)) @if($post->banner_image){{asset($post->banner_image)}}@else{{'https://pipdigz.co.uk/p3/img/placeholder-square.png'}}@endif @else{{'https://pipdigz.co.uk/p3/img/placeholder-square.png'}} @endif"
                                                        style="height: 50px;" class="rounded" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Status <span class="login-danger">*</span></label>
                                            <select name="status" id="status" class="form-control custom-select">
                                                <option disabled>Select</option>
                                                <option @if(isset($post)) @if($post->status == 'Active') selected @endif @endif value="Active">Active</option>
                                                <option @if(isset($post)) @if($post->status == 'Inactive') selected @endif @endif value="InActive">InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-12 col-sm-12">
                                        <div class="form-group local-forms">
                                            <label>Short Description <span class="login-danger">*</span></label>
                                            <textarea class="form-control" name="short_des" id="short_des">{{isset($post)?$post->short_des:''}}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-sm-12">
                                        <div class="form-group local-forms">
                                            <label>Offer Description <span class="login-danger">*</span></label>
                                            <textarea class="form-control" name="description" id="description">{{isset($post)?$post->description:''}}</textarea>
                                        </div>
                                    </div>
                                    
                                     <div class="col-12 col-sm-12">
                                        <div class="form-group local-forms">
                                            <label>Cancellation <span class="login-danger">*</span></label>
                                            <textarea class="form-control" name="cancellation" id="cancellation">{{isset($post)?$post->cancellation:''}}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-sm-12">
                                        <div class="form-group local-forms">
                                            <label>Terms and Conditions <span class="login-danger">*</span></label>
                                            <textarea class="form-control" name="terms" id="terms">{{isset($post)?$post->terms:''}}</textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-footer"></div>
                                <button type="submit" id="submitButton" class="btn btn-primary float-right"
                                    data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..."
                                    data-rest-text="Submit">Submit</button>                   
                            </form>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptjs')

   <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
    CKEDITOR.replace('description');
            CKEDITOR.replace('terms');
            CKEDITOR.replace('cancellation');
        formHandler.initializeForm('submitForm', "{{ route('admin.coupon') }}",'description');

        jQuery('#begin_date').on('change', function(){
            var date = $(this).val();
            $('#last_date').attr('min', date);
        });
        
    </script>
@stop
