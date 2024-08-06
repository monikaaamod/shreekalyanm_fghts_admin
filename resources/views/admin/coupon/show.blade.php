@extends('admin.layouts.app')
@section('title')
Coupon Details
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
                                            <th>Coupon Name</th>
                                            <td colspan="12"><b>{{$coupon->name}}</b></td>
                                        </tr>

                                        <tr>
                                            <th>Coupon Code</th>
                                            <td colspan="12"><b>{{$coupon->coupon_code}}</b></td>
                                        </tr>

                                        <tr>
                                            <th>Begin Date</th>
                                            <td colspan="12"><b>{{$coupon->begin_date}}</b></td>
                                        </tr>

                                        <tr>
                                            <th>Last Date</th>
                                            <td colspan="12"><b>{{$coupon->last_date}}</b></td>
                                        </tr>

                                        <tr>
                                            <th>Type</th>
                                            <td colspan="12"><b>{{$coupon->type}}</b></td>
                                        </tr>

                                        <tr>
                                            <th>Discount</th>
                                            <td colspan="12"><b>{{$coupon->discount}}</b></td>
                                        </tr>

                                        <tr>
                                            <th>Min Cart Value </th>
                                            <td colspan="12"><b>{{$coupon->min_cart_value}}</b></td>
                                        </tr>

                                        <tr>
                                            <th>Uses Limit </th>
                                            <td colspan="12"><b>{{$coupon->uses_limit}} Times</b></td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Status</th>
                                            <td>@if($coupon->status == 'Active')<span
                                                    class="badge badge-success text-capitalize"><b>Active</b></span>
                                                @else
                                                <span class="badge badge-success text-capitalize"><b>Inactive</b></span>
                                                @endif
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Image</th>
                                            <td>@if($coupon->image)
                                            <img src="{{asset($coupon->image)}}" class="img-thumbnail" style="height:80px;width:auto;border-radius: inherit;" alt="">
                                                @else
                                                <img src="{{ asset('notfound.png')}}" width="150px" height="150px">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Full Description</th>
                                            <td colspan="12">{!! $coupon->description !!}</td>
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