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
                                                <label>Flight Name <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{isset($post)?$post->flight_name:''}}" id="flight_name" name="flight_name" type="text" aria-describedby="" placeholder="Enter Flight Name">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Flight Number <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{isset($post)?$post->flight_number:''}}" id="flight_number" name="flight_number" type="text" aria-describedby="" placeholder="Enter Flight Number">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Departure Airport <span class="login-danger">*</span></label>
                                                <select class="form-control departure_airport" name="departure_airport" id="departure_airport">
                                                    @foreach($airport as $key=>$val)
                                                        <option value="{{$val->code}}">{{$val->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Arrival Airport <span class="login-danger">*</span></label>
                                                <select class="form-control arrival_airport" name="arrival_airport" id="arrival_airport">
                                                    @foreach($airport as $key=>$val)
                                                        <option value="{{$val->code}}">{{$val->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Departure Time <span class="login-danger">*</span></label>
                                                <input type="time" class="form-control" value="{{isset($post)?$post->departure_time:''}}" id="departure_time" name="departure_time"  aria-describedby="" placeholder="Enter Departure Time">
                                            </div>
                                        </div>


                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Arrival Time <span class="login-danger">*</span></label>
                                                <input type="time" class="form-control" value="{{isset($post)?$post->arrival_time:''}}" id="arrival_time" name="arrival_time" aria-describedby="" placeholder="Enter Arrival Time">
                                            </div>
                                        </div>


                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Airline <span class="login-danger">*</span></label>
                                                <select class="form-control airline" name="airline" id="airline">
                                                    @foreach($airline as $key=>$val)
                                                        <option value="{{$val->id}}">{{$val->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Aircraft <span class="login-danger">*</span></label>
                                                <select class="form-control aircraft" name="aircraft" id="aircraft">
                                                    @foreach($aircraft as $key=>$val)
                                                        <option value="{{$val->id}}">{{$val->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Duration <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{isset($post)?$post->duration:''}}" id="duration" name="duration" type="text" aria-describedby="" placeholder="Enter duration">
                                            </div>
                                        </div>


                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Price <span class="login-danger">*</span></label>
                                                <input type="number" class="form-control" value="{{isset($post)?$post->price:''}}" id="price" name="price" aria-describedby="" placeholder="Enter Price">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Available Seats <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{isset($post)?$post->available_seats:''}}" id="available_seats" name="available_seats" aria-describedby="" placeholder="Enter Available Seats">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>No of stops <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{isset($post)?$post->no_of_stops:''}}" id="no_of_stops" name="no_of_stops" aria-describedby="" placeholder="Enter No of stops">
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

                formHandler.initializeSimpleForm('submitForm', "{{ route('admin.flights_list') }}");

                $(departure_airport).select2();
                $(arrival_airport).select2();
                $(airline).select2();
                $(aircraft).select2();
    </script>
@stop
