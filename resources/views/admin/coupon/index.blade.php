@extends('admin.layouts.app')
@section('title')
Coupon
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
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title card-title-dash">{{$page_title}}</h4>
                                <div class="add-items d-flex mb-2">
                                  <a href="{{route('admin.coupon.create')}}"><button class="add btn btn-icons btn-rounded btn-primary  text-white me-0 pl-12p p-0"><i class="mdi mdi-plus"></i></button></a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered data-table">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>No</th>
                                            <th>Coupon Name</th>
                                            <th>Coupon Code</th>
                                            <th>Image</th>
                                            <th>Status</th>

                                            <!-- <th>Email</th> -->
                                            <th width="150px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
    @section('scriptjs')
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

        <script type="text/javascript">
            $(function() {

                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.coupon') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'coupon_code',
                            name: 'coupon_code'
                        },
                        {
                            data: 'image',
                            name: 'image'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });

                //The modal to be displayed has an ID of 'viewDetail'
                showDetailModal('.viewDetail', '#viewDetail', 'data-url');
            });
        </script>
        <!-- Initialize action buttons for delete and restore -->
        <script>
            initializeActionButtons("{{ route('admin.coupon') }}", "{{ route('admin.coupon') }}");
        </script>
    @stop
