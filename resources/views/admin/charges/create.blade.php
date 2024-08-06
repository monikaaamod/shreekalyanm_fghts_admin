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
                                            <label>Description <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{isset($post)?$post->description:''}}" id="description" name="description" type="text" aria-describedby="" placeholder="Enter Description">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Amount <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{isset($post)?$post->amount:''}}" id="amount" name="amount" type="text" aria-describedby="" placeholder="Enter Amount">
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
              formHandler.initializeSimpleForm('submitForm', "{{ route('admin.charges') }}");

    </script>
@stop
