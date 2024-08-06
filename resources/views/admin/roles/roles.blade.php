@extends('admin.layouts.app')
@section('title')
    Roles
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
                                  <a href="{{route('roles.create')}}"><button class="add btn btn-icons btn-rounded btn-primary  text-white me-0 pl-12p p-0"><i class="mdi mdi-plus"></i></button></a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered data-table">
                                    <thead class="student-thread">
                                        <tr>
                                            <!-- <th><input type="checkbox" name="selectedData" id="selectAll"></th> -->
                                            <th>No</th>
                                            <th>Name</th>
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
                    ajax: "{{ route('roles-list') }}",
                    columns: [
                        
                        {
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });

                $(document).on('click', '.viewDetail', function() {
                    $('#viewDetail').modal('show');
                    url = $(this).attr('data-url');
                    $('#viewDetail').find('.modal-body').html(
                        '<p class="ploading"><i class="fa fa-spinner fa-spin"></i></p>')
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(data) {
                            $('#viewDetail').find('.modal-body').html(data);
                        }
                    });
                });

            });
        </script>

        <script>
            $(document).on('click', '.deleteButton', function() {
                var con = confirm("Are You Sure You want to delete??");
                if (con) {
                    row = $(this).closest('tr');
                    url = $(this).attr('data-url');
                    var $this = $(this);
                    buttonLoading('loading', $this);
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(data) {
                            var btn =
                                '<a href="{{ route('roles-list') }}" class="btn btn-info btn-sm">GoTo List</a>';
                            successMsg('Delete User', data.msg, btn);
                            row.remove();
                        }
                    });
                }
            });

            // Bulk delete

        // $('#bulk-delete-button').click(function() {
        //         var selectedIds = $('input[name="selectedData[]"]:checked').map(function() {
        //         return $(this).val();
        //     }).get();

        //     if (selectedIds.length > 0) {

        //         var con = confirm("Are You Sure You want to delete permanently ??");
        //         if (con) 
        //         {
                
        //             var csrfToken = $('meta[name="csrf-token"]').attr('content');

        //             $.ajax({
        //                 method: 'POST',
        //                 url: '{{ route("roles-list") }}',
        //                 data: {
        //                     _token: csrfToken, // Include the CSRF token
        //                     ids: selectedIds
        //                 },
        //                 success: function(response) {
        //                     if (response.status) {
        //                         successMsg('Delete Item', response.msg);
        //                             setTimeout(function() {
        //                                 location.reload();
        //                             }, 1000);
        //                     } 
        //                 },
        //                 error: function(response) {
        //                     console.error(response);
        //                 }
        //             });
        //         }
        //     } else {
        //         alert('Please select at least one record to delete.');
        //     }
        // });
        </script>
    @stop
