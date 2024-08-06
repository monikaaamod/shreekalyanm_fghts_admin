@extends('admin.layouts.app')
@section('title')
Airport Show
@stop
@section('stylecss')
@stop
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="card-title card-title-dash">{{$page_title}}</h4>
                            </div>
                            <div class="table-responsive">
                            <table class="table table-bordered" id="data">
                                <tbody>
                                    <tr>
                                        <th>Flights Name</th>
                                        <td colspan="12"><b>{{$flights->flight_name}}</b></td>
                                    </tr>
                                    <tr>
                                        <th>Flight Number</th>
                                        <td colspan="12"><b>{{$flights->flight_number}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>Departure Airport</th>
                                        <td colspan="12"><b>{{$flights->departure_airport_detail->name}}</b></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Arrival Airport</th>
                                        <td colspan="12"><b>{{$flights->arrival_airport_detail->name}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>Departure Time</th>
                                        <td colspan="12"><b>{{$flights->departure_time}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>Arrival Time</th>
                                        <td colspan="12"><b>{{$flights->arrival_time}}</b></td>
                                    </tr>


                                    <tr>
                                        <th>Airlines</th>
                                        <td colspan="12"><b>{{$flights->airlines_detail->title}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>Aircraft</th>
                                        <td colspan="12"><b>{{$flights->aircraft_detail->title}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>Price</th>
                                        <td colspan="12"><b>{{$flights->price}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>Available Seats</th>
                                        <td colspan="12"><b>{{$flights->available_seats}}</b></td>
                                    </tr>

                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scriptjs')


@stop