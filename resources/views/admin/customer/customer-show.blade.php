@extends('admin.layouts.app')
@section('title')
Customer Show
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
                                        <td colspan="12"><b>{{$front_user->name}}</b></td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td colspan="12"><b>{{$front_user->last_name}}</b></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td colspan="12"><b>{{$front_user->email}}</b></td>
                                    </tr>
                                    <tr>
                                        <th>Mobile No</th>
                                        <td colspan="12"><b>{{$front_user->mobile}}</b></td>
                                    </tr>

                                    <tr>
                                        <th>Image</th>
                                        <td colspan="12">
                                            @if($front_user->image)
                                                <a href="{{ url('public/'.$front_user->image)}}" target="_blank">
                                                <img src="{{ url('public/'.$front_user->image)}}" style="height: auto; width: 50px;">
                                                </a>
                                            @else
                                                <img src="{{ url('public/notfound.png')}}" width="150px" height="150px">
                                            @endif
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Status</th>
                                        <td>@if($front_user->status == 'Active')<span
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