@extends('admin.layouts.app')
@section('title')
{{$page_name}} Show
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
                                        <th> Firm Name</th>
                                        <td colspan="12"><b>{{$agency->firm_name}}</b></td>
                                    </tr>

                                    <tr>
                                        <th> Name</th>
                                        <td colspan="12"><b>{{$agency->name}} {{$agency->last_name}}</b></td>
                                    </tr>

                                    <tr>
                                        <th> Email</th>
                                        <td colspan="12"><b>{{$agency->email}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>Mobile No.</th>
                                        <td colspan="12"><b>{{$agency->mobile}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>PAN</th>
                                        <td colspan="12"><b>{{$agency->pan}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>GST</th>
                                        <td colspan="12"><b>{{$agency->gst}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>Logo</th>
                                        <td>@if($agency->image)
                                            <img src="{{ url('public/'.$agency->image)}}" width="150px" height="150px">
                                            @else
                                            <img src="{{ url('public/notfound.png')}}" width="150px" height="150px">
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Country</th>
                                        <td colspan="12"><b>{{$agency->country_name->name}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>State</th>
                                        <td colspan="12"><b>{{$agency->state_name->name}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>City</th>
                                        <td colspan="12"><b>{{$agency->city_name->name}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>Pincode</th>
                                        <td colspan="12"><b>{{$agency->pincode}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>Address</th>
                                        <td colspan="12"><b>{{$agency->address}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>Status</th>
                                        <td>@if($agency->status == 'Active')<span
                                                class="badge badge-success text-capitalize"><b>Active</b></span>
                                            @else
                                            <span class="badge badge-success text-capitalize"><b>Inactive</b></span>
                                            @endif
                                        </td>
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