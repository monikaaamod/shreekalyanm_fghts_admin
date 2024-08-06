@extends('admin.layouts.app')
@section('title')
{{$page_name}}
@stop
@section('stylecss')

<style>
    .nav-item .nav-link,
    .nav-tabs .nav-link {
        -webkit-transition: all 300ms ease 0s;
        -moz-transition: all 300ms ease 0s;
        -o-transition: all 300ms ease 0s;
        -ms-transition: all 300ms ease 0s;
        transition: all 300ms ease 0s;
    }

    .search a {
        -webkit-transition: all 150ms ease 0s;
        -moz-transition: all 150ms ease 0s;
        -o-transition: all 150ms ease 0s;
        -ms-transition: all 150ms ease 0s;
        transition: all 150ms ease 0s;
    }

    [data-toggle="collapse"][data-parent="#accordion"] i {
        -webkit-transition: transform 150ms ease 0s;
        -moz-transition: transform 150ms ease 0s;
        -o-transition: transform 150ms ease 0s;
        -ms-transition: all 150ms ease 0s;
        transition: transform 150ms ease 0s;
    }

    [data-toggle="collapse"][data-parent="#accordion"][aria-expanded="true"] i {
        filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2);
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
    }


    .nav-tabs {
        border: 0;
        padding: 5px 0;
        background-color: #cbd5e1;
        border-radius: 10px;
        /* width: 84%; */
    }

    .nav-tabs:not(.nav-tabs-neutral)>.nav-item>.nav-link.active {
        box-shadow: 0px 5px 35px 0px rgba(0, 0, 0, 0.3);
    }

    .search .nav-tabs {
        border-top-right-radius: 0.1875rem;
        border-top-left-radius: 0.1875rem;
    }

    .nav-tabs>.nav-item>.nav-link {
        color: #fff;
        margin: 0;
        margin-right: 0;
        background-color: transparent;
        border: 1px solid transparent;
        border-radius: 30px;
        font-size: 13px;
        padding: 11px 23px;
        line-height: 1.5;
    }

    .nav-tabs>.nav-item>.nav-link:hover {
        background-color: transparent;
    }

    .nav-tabs>.nav-item>.nav-link.active {
        background-color: #fff;
        border-radius: 10px;
        color: #95979b;
    }


    .search {
        border: 0;
        border-radius: 0.1875rem;
        display: inline-block;
        position: relative;
        width: 100%;
        margin-bottom: 30px;
        box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);
    }

    .search .search-header {
        background-color: #cbd5e1;
        border-bottom: 0;
        border-radius: 0;
        padding: 0;
        margin-bottom:10px;
    }

    .search[data-background-color="orange"] {
        background-color: #f96332;
    }

    .search[data-background-color="red"] {
        background-color: #FF3636;
    }

    .search[data-background-color="yellow"] {
        background-color: #FFB236;
    }

    .search[data-background-color="blue"] {
        background-color: #2CA8FF;
    }

    .search[data-background-color="green"] {
        background-color: #15b60d;
    }

    [data-background-color="orange"] {
        background-color: #e95e38;
    }

    [data-background-color="black"] {
        background-color: #2c2c2c;
    }

    [data-background-color]:not([data-background-color="gray"]) {
        color: #FFFFFF;
    }

    [data-background-color]:not([data-background-color="gray"]) p {
        color: #FFFFFF;
    }

    [data-background-color]:not([data-background-color="gray"]) a:not(.btn):not(.dropdown-item) {
        color: #FFFFFF;
    }

    [data-background-color]:not([data-background-color="gray"]) .nav-tabs>.nav-item>.nav-link i.now-ui-icons {
        color: #FFFFFF;
    }



    .page-body-wrapper{
        background-color:#f4f5f7;
    }

    .search-body{
        background-color:#fff;
        border-radius: 10px;
        display: inline-block;
        position: relative;
        width: 100%;
        margin-bottom: 30px;
        box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);
    }

    label {
        color: #1F3BB3;
        font-size: 15px !important;
        font-weight: 700;
    }

    .form-control{
        height: 3rem;
    }

    .closeCity{
        background-color: red;
        padding: 2px 6px;
        color: #fff;
        border-radius: 50%;
    }




</style>
@stop
@section('content')
<div class="container mt-5" style="">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4 ml-auto mr-auto">
            <!-- Nav tabs -->
            <div class="search-header mb-2">
                <ul class="nav nav-tabs justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">One Way Trip </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Round Trip </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#messages" role="tab">Multicity </a>
                    </li>
                </ul>
            </div>
            <div class="search-body">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="row">

                            <div class="col-12 col-sm-12">
                                <div class="form-group local-forms">
                                    <label for="from">From *</label>
                                    <input type="text" class="form-control" id="from" name="from" type="text" aria-describedby="" placeholder="Eg. Jaipur">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12">
                                <div class="form-group local-forms">
                                    <label for="to">To *</label>
                                    <input type="text" class="form-control" id="to" name="to" type="text" aria-describedby="" placeholder="Eg. Delhi">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12">
                                <div class="form-group local-forms">
                                    <label for="passengers">Number of Passengers *</label>
                                    <input type="text" class="form-control" id="passengers" name="passengers" type="text" aria-describedby="" placeholder="Eg. 2">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12">
                                <div class="form-group local-forms">
                                    <label for="trip_date">Departure Date *</label>
                                    <div class="input-group datepicker-autoclose date datepicker navbar-date-picker">
                                        <span class="input-group-addon input-group-prepend border-right">
                                            <span class="icon-calendar input-group-text calendar-icon"></span>
                                        </span>
                                        <input type="text" class="form-control" style="height:2rem;" name="departure_date" id="departure_date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 d-flex justify-content-center">
                                <button class="btn btn-primary btn-lg w-100">Search Flights &nbsp &nbsp<i class="fa-solid fa-chevron-right"></i></button>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group local-forms">
                                    <label for="from">From *</label>
                                    <input type="text" class="form-control" id="from" name="from" type="text" aria-describedby="" placeholder="Eg. Jaipur">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12">
                                <div class="form-group local-forms">
                                    <label for="to">To *</label>
                                    <input type="text" class="form-control" id="to" name="to" type="text" aria-describedby="" placeholder="Eg. Delhi">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12">
                                <div class="form-group local-forms">
                                    <label for="passengers">Number of Passengers *</label>
                                    <input type="text" class="form-control" id="passengers" name="passengers" type="text" aria-describedby="" placeholder="Eg. 2">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12">
                                <div class="form-group local-forms">
                                    <label for="trip_date">Departure Date *</label>
                                    <div class="input-group datepicker-autoclose date datepicker navbar-date-picker">
                                        <span class="input-group-addon input-group-prepend border-right">
                                            <span class="icon-calendar input-group-text calendar-icon"></span>
                                        </span>
                                        <input type="text" class="form-control" style="height:2rem;" name="departure_date" id="departure_date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12">
                                <div class="form-group local-forms">
                                    <label for="trip_date">Return Date *</label>
                                    <div class="input-group datepicker-autoclose date datepicker navbar-date-picker">
                                        <span class="input-group-addon input-group-prepend border-right">
                                            <span class="icon-calendar input-group-text calendar-icon"></span>
                                        </span>
                                        <input type="text" class="form-control" style="height:2rem;" name="return_date" id="return_date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 d-flex justify-content-center">
                                <button class="btn btn-primary btn-lg w-100">Search Flights &nbsp &nbsp<i class="fa-solid fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="messages" role="tabpanel">
                        <div class="row">
                            <div class="col-6 col-sm-6">
                                <div class="form-group local-forms mb-0">
                                    <label for="from">From *</label>
                                    <input type="text" class="form-control" id="from" name="from" type="text" aria-describedby="" placeholder="Eg. Jaipur">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6">
                                <div class="form-group local-forms mb-0">
                                    <label for="to">To *</label>
                                    <input type="text" class="form-control" id="to" name="to" type="text" aria-describedby="" placeholder="Eg. Delhi">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 mt-2">
                                <div class="form-group local-forms mb-0">
                                    <label for="trip_date">Departure Date *</label>
                                    <div class="input-group datepicker-autoclose date datepicker navbar-date-picker">
                                        <span class="input-group-addon input-group-prepend border-right">
                                            <span class="icon-calendar input-group-text calendar-icon"></span>
                                        </span>
                                        <input type="text" class="form-control" style="height:2rem;" name="departure_date" id="departure_date">
                                    </div>
                                </div>
                            </div>

                            <div id="addCity"></div>

                            <div class="col-12 col-sm-12 mb-2 mt-2 d-flex justify-content-end">
                                <button class="btn btn-primary btn-sm" onclick="addCity();">Add City</button>
                            </div>

                            <div class="col-12 col-sm-12">
                                <div class="form-group local-forms">
                                    <label for="passengers">Number of Passengers *</label>
                                    <input type="text" class="form-control" id="passengers" name="passengers" type="text" aria-describedby="" placeholder="Eg. 2">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 d-flex justify-content-center">
                                <button class="btn btn-primary btn-lg w-100">Search Flights &nbsp &nbsp<i class="fa-solid fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection

    @section('scriptjs')
    <script src="{{asset('admin/js/formpickers.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <!-- <script src="{{asset('admin/js/formpickers.js')}}"></script> -->
    <script type="text/javascript">
              formHandler.initializeSimpleForm('submitForm', "{{ route('admin.fare_type') }}");


              var counter = 1;
                function addCity()
                {
                    $("#addCity").append(`
                        <div class="row" id="appendCity-${counter}">
                            <div class="col-6 col-sm-6 mt-2">
                                <div class="form-group local-forms mb-0">
                                    <label for="from">From *</label>
                                    <input type="text" class="form-control" id="from" name="from" type="text" aria-describedby="" placeholder="Eg. Jaipur">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 mt-2">
                                <div class="form-group local-forms mb-0">
                                    <label for="to">To * <span class="text-danger" style="margin-left: 88px;" onclick="removeCity(${counter})"><span class="closeCity"><i class="fa-solid fa-xmark"></i></span></span></label>
                                    <input type="text" class="form-control" id="to" name="to" type="text" aria-describedby="" placeholder="Eg. Delhi">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 mt-2">
                                <div class="form-group local-forms mb-0">
                                    <label for="trip_date">Departure Date *</label>
                                    <div class="input-group datepicker-autoclose date datepicker navbar-date-picker">
                                        <span class="input-group-addon input-group-prepend border-right">
                                            <span class="icon-calendar input-group-text calendar-icon"></span>
                                        </span>
                                        <input type="text" class="form-control" style="height:2rem;" name="departure_date" id="departure_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                    counter++;
                }

                function removeCity(id)
                {
                    $("#appendCity-"+id).remove();
                }

    </script>
@stop
