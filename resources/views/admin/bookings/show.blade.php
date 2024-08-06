@extends('admin.layouts.app')
@section('title')
Fare Type Show
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
                                        <th>Title</th>
                                        <td colspan="12"><b>{{$fare_type->title}}</b></td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td colspan="12"><b>{{$fare_type->description}}</b></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Status</th>
                                        <td>@if($fare_type->status == 'Active')<span
                                                class="badge badge-success text-capitalize"><b>Active</b></span>
                                            @else
                                            <span class="badge badge-success text-capitalize"><b>Inactive</b></span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{\Carbon\Carbon::parse($fare_type->created_at)->format('d M Y')}}</td>
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