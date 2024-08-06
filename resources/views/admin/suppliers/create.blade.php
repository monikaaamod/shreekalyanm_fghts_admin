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
                                                <label>Name <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{isset($post)?$post->name:''}}" id="name" name="name"  aria-describedby="" placeholder="Enter Name">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>GST No <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{isset($post)?$post->gst_no:''}}" onkeypress="return isNumberKey(event)" id="gst_no" name="gst_no" aria-describedby="" placeholder="Enter GST No">
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Support No <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{isset($post)?$post->support_no:''}}" onkeypress="return isNumberKey(event)" maxlength="10" id="support_no" name="support_no" aria-describedby="" placeholder="Enter Support No">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Address <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{isset($post)?$post->address:''}}" id="address" name="address" aria-describedby="" placeholder="Enter Address">
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
              formHandler.initializeSimpleForm('submitForm', "{{ route('admin.suppliers') }}");

    </script>
@stop
