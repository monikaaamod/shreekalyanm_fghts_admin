@extends('admin.layouts.app')
@section('title')
Airports
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
                                                <label>Title <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{isset($post)?$post->title:''}}" id="title" name="title" type="text" aria-describedby="" placeholder="Enter Title">
                                            </div>
                                        </div>

                                        
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Product <span class="login-danger">*</span></label>
                                                <select class="form-control" name="product_id" id="product_id">
                                                    <option value="">Select</option>
                                                    @foreach($newdata['product'] as $key=>$val)
                                                    <option @if(isset($post) && $post->product_id == $val->id) selected @endif value="{{$val->id}}">{{$val->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Supplier</label>
                                                <select class="form-control" name="supplier_id" id="supplier_id">
                                                    <option value="">Select</option>
                                                    @foreach($newdata['supplier'] as $key=>$val)
                                                    <option @if(isset($post) && $post->supplier_id == $val->id) selected @endif value="{{$val->id}}">{{$val->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Sales Channel</label>
                                                <select class="form-control" name="sales_channel_id" id="sales_channel_id">
                                                    <option value="">Select</option>
                                                    @foreach($newdata['sales_channel'] as $key=>$val)
                                                    <option @if(isset($post) && $post->sales_channel_id == $val->id) selected @endif value="{{$val->id}}">{{$val->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Fixed on Percentage</label>
                                                <select class="form-control" name="percentage_type" id="percentage_type">
                                                    <option value="">Select</option>
                                                    <option @if(isset($post) && $post->percentage_type == 'fixed') selected @endif value="fixed">Fixed</option>
                                                    <option @if(isset($post) && $post->percentage_type == 'per_pax') selected @endif value="per_pax">Per Pax</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Sector</label>
                                                <select class="form-control" name="sector" id="sector">
                                                    <option value="">Select</option>
                                                    <option @if(isset($post) && $post->sector == 'O') selected @endif value="O">One Way</option>
                                                    <option @if(isset($post) && $post->sector == 'R') selected @endif value="R">Round Trip</option>
                                                    <option @if(isset($post) && $post->sector == 'M') selected @endif value="M">Multi Trip</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Booking Type</label>
                                                <select class="form-control" name="booking_type" id="booking_type">
                                                    <option value="">Select</option>
                                                    <option @if(isset($post) && $post->booking_type == 'domestic') selected @endif value="domestic">Domestic</option>
                                                    <option @if(isset($post) && $post->booking_type == 'international') selected @endif value="international">International</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Is GST</label>
                                                <select class="form-control" name="is_gst" id="is_gst">
                                                    <option value="">Select</option>
                                                    <option @if(isset($post) && $post->is_gst == 'yes') selected @endif value="yes">Yes</option>
                                                    <option @if(isset($post) && $post->is_gst == 'no') selected @endif value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Fee <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{isset($post)?$post->value:''}}" id="value" name="value" type="text" aria-describedby="" placeholder="Enter Value">
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
              formHandler.initializeSimpleForm('submitForm', "{{ route('admin.service_fee') }}");

    </script>
@stop
