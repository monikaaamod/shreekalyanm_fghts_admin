@extends('admin.layouts.app')
@section('title')
{{$page_name}}
@stop
@section('stylecss')
    <style>
        .nav-tabs .nav-book {
            /* background: #f6f8fa; */
            color: #000;
            border-radius: 0;
            border: none;
            padding: 0.75rem 0.75rem;
            text-decoration: none;
            font-weight: 800;
            font-size: 15px;
            margin-right: 5px;
            cursor:pointer;
        }

        .nav-book:hover{
            border-bottom: 3px solid #f08b3f !important;
            color:#5191fa;
        }

        .bottom-border{
            border-bottom: 3px solid #f08b3f !important;
            color:#5191fa !important;
        }

        .card .card-body {
            padding: 0.5rem 1.5rem;
        }
    </style>
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
                                <a href="{{route('admin.agency.create')}}"><button class="add btn btn-icons btn-rounded btn-primary  text-white me-0 pl-12p p-0"><i class="mdi mdi-plus"></i></button></a>
                            </div>
                        </div>
                        <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified mb-4" style="border:none;">
                            <li class="">
                                <a class="nav-book bottom-border search_booking" data-status="All Bookings">All Bookings</a>
                            </li>
                            <li class="">
                                <a class="nav-book search_booking" data-status="Completed">Completed</a>
                            </li>
                            <li class="">
                                <a class="nav-book search_booking" data-status="Processing">Processing</a>
                            </li>
                            <li class="">
                                <a class="nav-book search_booking" data-status="Cancelled">Cancelled</a>
                            </li>
                        </ul>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered data-table">
                                <thead class="student-thread">
                                    <tr>
                                        <!-- <th><input type="checkbox" name="selectedData" id="selectAll"></th> -->
                                        <th>No.</th>
                                        <th>Flight Name</th>
                                        <th>Customer Name</th>
                                        <th>Order Date</th>
                                        <th>Order Amount</th>
                                        <th>Type</th>
                                        <th>Class</th>
                                        <th>Status</th>
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
        ajax: "{{ route('admin.flight_bookings') }}",
        columns: [

            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },

            {
                data: 'flight_name',
                name: 'flight_name'
            },

            {
                data: 'customer_name',
                name: 'customer_name'
            },

            {
                data: 'order_date',
                name: 'order_date'
            },
            {
                data: 'order_amount',
                name: 'order_amount'
            },
            {
                data: 'flight_type',
                name: 'flight_type'
            },
            {
                data: 'class',
                name: 'class'
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

    $(document).ready(function(){
        $(document).on('click','.search_booking',function(){
            $('.search_booking').removeClass('bottom-border');
            $(this).addClass('bottom-border');
            var status = $(this).data('status');
            if(status != "All Bookings"){
                // alert(status);
                table.column(7).search(status).draw();
            }
            else{
                table.search('').columns().search('').draw();
            }
        });
    });

   
});
</script>
<!-- Initialize action buttons for delete and restore -->
<script>



$('#bulk-delete-button').click(function() {
    var selectedIds = $('input[name="selectedData[]"]:checked').map(function() {
        return $(this).val();
    }).get();

    if (selectedIds.length > 0) {

        var con = confirm("Are You Sure You want to delete permanently ??");
        if (con) {

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                method: 'POST',
                url: '{{ route("agency.bulk.delete") }}',
                data: {
                    _token: csrfToken, // Include the CSRF token
                    ids: selectedIds
                },
                success: function(response) {
                    if (response.status) {
                        successMsg('Delete Item', response.msg);
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                },
                error: function(response) {
                    console.error(response);
                }
            });
        }
    } else {
        alert('Please select at least one record to delete.');
    }
});


</script>
@stop