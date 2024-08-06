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
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="card-title card-title-dash">{{$page_title}}</h4>
                            </div>
                                <form id="submitForm" class="form-horizontal" method="post" action="{{ $page_url }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group local-forms">
                                                <label for="booking_ref">Booking Ref. <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="booking_ref" name="booking_ref" type="text" aria-describedby="">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group local-forms">
                                                <label for="pnr">Air PNR <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="pnr" name="pnr" type="text" aria-describedby="">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group local-forms">
                                                <label for="name">Client <span class="login-danger">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="name" name="name" type="text" aria-describedby="" placeholder="First Name">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="last_name" name="last_name" type="text" aria-describedby="" placeholder="Last Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group local-forms">
                                                <label for="traveler_name">Traveler <span class="login-danger">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="traveler_name" name="traveler_name" type="text" aria-describedby="" placeholder="First Name">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="traveler_last_name" name="traveler_last_name" type="text" aria-describedby="" placeholder="Last Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group local-forms">
                                                <label for="trip_date">Trip Start Date <span class="login-danger">*</span></label>
                                                <div class="input-group datepicker-autoclose date datepicker navbar-date-picker">
                                                    <span class="input-group-addon input-group-prepend border-right">
                                                        <span class="icon-calendar input-group-text calendar-icon"></span>
                                                    </span>
                                                    <input type="text" class="form-control" name="trip_date" id="trip_date">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group local-forms">
                                                <label for="booking_date">Booking Date <span class="login-danger">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group datepicker-autoclose date datepicker navbar-date-picker">
                                                            <span class="input-group-addon input-group-prepend border-right">
                                                                <span class="icon-calendar input-group-text calendar-icon"></span>
                                                            </span>
                                                            <input type="text" class="form-control" name="booking_date" id="booking_date">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group datepicker-autoclose date datepicker navbar-date-picker">
                                                            <span class="input-group-addon input-group-prepend border-right">
                                                                <span class="icon-calendar input-group-text calendar-icon"></span>
                                                            </span>
                                                            <input type="text" class="form-control" name="booking_end_date" id="booking_end_date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group local-forms">
                                                <label for="ticket_no">Ticket No. <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="ticket_no" name="ticket_no" type="text" aria-describedby="">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group local-forms">
                                                <label for="account_code">Account Code <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" id="account_code" name="account_code" type="text" aria-describedby="">
                                            </div>
                                        </div>

                                    </div>
                                   
                                  
                                    <div class="form-group">
                                        <div class="row row-sm">
                                            <div class="col-md-9">
                                            <button type="submit" id="submitButton" class="btn btn-primary float-right"
                                                data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..."
                                                data-rest-text="Search">Search</button>
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

    <script src="{{asset('admin/js/formpickers.js')}}"></script>
    <script type="text/javascript">
              formHandler.initializeSimpleForm('submitForm', "{{ route('admin.fare_type') }}");

    </script>
@stop
