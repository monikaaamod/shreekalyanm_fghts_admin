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
                                        <th>Name</th>
                                        <td colspan="12"><b>{{$airports->name}}</b></td>
                                    </tr>
                                    <tr>
                                        <th>Airport Code</th>
                                        <td colspan="12"><b>{{$airports->code}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>Country Name</th>
                                        <td colspan="12"><b>{{$airports->country_name}}</b></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Country Code</th>
                                        <td colspan="12"><b>{{$airports->country_code}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>City Name</th>
                                        <td colspan="12"><b>{{$airports->city_name}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>City Code</th>
                                        <td colspan="12"><b>{{$airports->city_code}}</b></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Status</th>
                                        <td>@if($airports->status == 'Active')<span
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