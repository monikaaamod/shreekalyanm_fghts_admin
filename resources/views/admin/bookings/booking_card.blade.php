@extends('admin.layouts.app')
@section('title')
Booking Card
@stop
@section('stylecss')
<style>
.card {
    border-radius: inherit;
}

.nav-tabs .nav-link {
    padding: 3px;
}

.nav-link {
    font-size: 11px;
}

.title {
    font-size: 10px;
}

.title-content {
    font-size: 10px;
    font-weight: 700;
    justify-content: center;
    display: flex;
}

.card-body .icon {
    font-size: 25px;
    color: #3aafe7;
}

.client {
    font-size: 12px;
    font-weight: 500;
}

.client-name {
    font-weight: 700;
}

.address {
    font-size:14px;
}

.ticket-detail {
    --bs-table-color-type: #fff !important;
    --bs-table-bg-type: #44a4e0 !important;
}
</style>
@stop

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h4 class="card-title card-title-dash">{{$data['page_title']}}</h4>
                        </div>
                        <ul class="nav  nav-tabs-solid
                                    nav-tabs-rounded nav-justified">
                            <li class="nav-item">
                                <div class="title">Booking Creater</div>
                                <div class="title-content font-size-normal">WEBSITE</div>
                            </li>
                            <li class="nav-item ">
                                <div class="title">Agency Branch</div>
                                <div class="title-content font-size-normal">Test Branch</div>
                            </li>
                            <li class="nav-item ">
                                <div class="title">Booked On</div>
                                <div class="title-content font-size-normal">29 Nov 2023</div>
                            </li>
                            <li class="nav-item">
                                <div class="title">Authorized By</div>
                                <div class="title-content font-size-normal">WEBSITE</div>
                            </li>
                            <li class="nav-item">
                                <div class="title">Authorized On</div>
                                <div class="title-content font-size-normal">29 Nov 2023</div>
                            </li>
                            <li class="nav-item">
                                <div class="title">Sales Channel</div>
                                <div class="title-content font-size-normal">Media</div>
                            </li>
                            <li class="nav-item">
                                <div class="title">Client Status</div>
                                <div class="btn btn-sm bg-success text-light">Active</div>
                            </li>
                        </ul>
                    </div>
                </div><br>
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#customer">Customer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#traveller">Traveller</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#products">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#fare">Fare Breakdown</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#customer-payment">Customer Payment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#documents">Documents</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#dispatch">Dispatch</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#messages">Messages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#supplier-payment">Supplier Payment</a>
                            </li>
                        </ul>

                        <div class="row">
                            <div class="col-md-9">
                                <!-- Tab Content -->
                                <div class="tab-content border-0">
                                    <div id="customer" class="tab-pane fade active show">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="menu-icon icon mdi mdi-history d-flex justify-content-center"></i></div>
                                                        <div class="title-content"> Add Client Details</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="d-flex justify-content-center menu-icon icon mdi mdi-account-switch"></i></div>
                                                        <div class="title-content"> Client Switch</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-3">
                                            <div class="card rounded">
                                                <div class="card-body p-3">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="client">Client</div>
                                                            <div class="client-name pb-3">Clients Name</div>
                                                        </div>
                                                        <hr>
                                                        <div class="col-md-4">
                                                            <div class="font-size-normal client-name">Address</div>
                                                            <div class="font-size-normal">Jaipur</div>
                                                            <div class="font-size-normal">India</div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="font-size-normal client-name">Contact Details
                                                            </div>
                                                            <div class="font-size-normal">+91-1234567890 (Mobile)</div>
                                                            <div class="font-size-normal">client@gmail.com (Email)</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="traveller" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="d-flex justify-content-center menu-icon icon mdi mdi-account-plus"></i></div>
                                                        <div class="title-content"> Add Traveller</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="d-flex justify-content-center menu-icon icon mdi mdi-handshake"></i></div>
                                                        <div class="title-content"> Associate Traveller</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row p-3">
                                            <div class="card">
                                                <div class="card-body p-3">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Date of Birth</th>
                                                                <th>Nationality</th>
                                                                <th>Status</th>
                                                                <th>Edit</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Herman Beck</td>
                                                                <td>7 Aug 1996</td>
                                                                <td>Indian</td>
                                                                <td><div class="btn btn-sm bg-success text-light">Active</div></td>
                                                                <td><i class="menu-icon icon mdi mdi-account-edit"></i></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="products" class="tab-pane fade">
                                        <div class="row p-3">
                                            <div class="card">
                                                <div class="card-body p-3">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <h4 class="card-title card-title-dash"><i class="menu-icon icon mdi mdi-airplane text-danger me-2"></i>Flight</h4>
                                                        <div class="add-items d-flex mb-2">
                                                            <span class="text-warning font-size-normal">GDS PNR: PNR-005554654 </span> <span class="text-primary font-size-normal ps-2"> Retrieve</span>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Itinerary Details</th>
                                                                <th>Destination</th>
                                                                <th>Region</th>
                                                                <th>Start Date</th>
                                                                <th>End Date</th>
                                                                <th>Airline PNR</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>SYD-AVV JQ 613</td>
                                                                <td>India</td>
                                                                <td>Australia & New Zealand</td>
                                                                <td>7 Aug 2023</td>
                                                                <td>10 Aug 2023</td>
                                                                <td>PNR66514654</td>
                                                                <td><div class="btn btn-sm bg-success text-light">Active</div></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="fare" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="menu-icon icon mdi mdi-calendar d-flex justify-content-center"></i></div>
                                                        <div class="title-content">Change Payment Due Date</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="d-flex justify-content-center menu-icon icon mdi mdi-hand-coin"></i></div>
                                                        <div class="title-content"> View Supplier Remittance</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="menu-icon icon mdi mdi-ticket-percent d-flex justify-content-center"></i></div>
                                                        <div class="title-content"> Add Discount Coupon</div>
                                                    </div>
                                                </div>
                                            </div>
                                       
                                            <div class="col-md-12">
                                                <div class="table-responsive mt-3">
                                                    <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Description</th>
                                                            <th>Start Date</th>
                                                            <th>Nett(AUD)</th>
                                                            <th>Gross(AUD)</th>
                                                            <th>Nett Tax(AUD)</th>
                                                            <th>Gross Tax(AUD)</th>
                                                            <th>TDS(AUD)</th>
                                                            <th>ROE Against(AUD)</th>
                                                            <th>Amount(AUD)</th>
                                                            <th>Edit</th>
                                                            <th>View</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><i class="menu-icon icon mdi mdi-airplane"></i> SYD-AVV (F)</td>
                                                            <td>07 Dec 2023</td>
                                                            <td>Published</td>
                                                            <td>1 seat booked</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><i class="menu-icon icon mdi mdi-account-edit"></i></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>1 ADT X </td>
                                                            <td>57.16</td>
                                                            <td>213.51</td>
                                                            <td>32.23</td>
                                                            <td>32.23</td>
                                                            <td>0.00</td>
                                                            <td>1.00</td>
                                                            <td>245.74</td>
                                                            <td></td>
                                                            <td><i class="menu-icon icon mdi mdi-account-eye"></i></td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-md-2 mt-4">
                                                <div class="card rounded">
                                                    <div class="card-body ps-3 pt-2 pe-3">
                                                        <div class="row">
                                                            <div class="col-md-12 title client-name">Balance Due Date</div>
                                                            <div class="col-md-12 mt-2 title">10 Dec 2023</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 mt-4">
                                                <div class="card rounded">
                                                    <div class="card-body ps-1 pt-2 pe-0">
                                                        <div class="row">
                                                            <div class="col-md-12 title client-name">Input Tax Amount</div>
                                                            <div class="col-md-12 mt-2 title">0.00 AUD</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 mt-4">
                                                <div class="card rounded">
                                                    <div class="card-body ps-3 pt-2 pe-3">
                                                        <div class="row">
                                                            <div class="col-md-12 title client-name">Output Tax Amount</div>
                                                            <div class="col-md-12 mt-2 title">0.00 AUD</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-4">
                                                <div class="card rounded">
                                                    <div class="card-body pt-2 ps-2">
                                                        <div class="row">
                                                            <div class="col-md-8 pe-5 title client-name">Total Sales Amount(Including VAT Charges)</div>
                                                            <div class="col-md-4 ps-2 title client-name">Total Nett Amount</div>
                                                            <div class="col-md-8 mt-2 title">245.74 AUD</div>
                                                            <div class="col-md-4 mt-2 title">89.39 AUD</div>
                                                            <div class="col-md-12 ps-3 mt-3 title client-name">Total Profit</div>
                                                            <div class="col-md-12 mt-2 title">156.35 AUD</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="customer-payment" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="menu-icon icon mdi mdi-currency-rupee d-flex justify-content-center"></i></div>
                                                        <div class="title-content">Receive Payment</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="d-flex justify-content-center menu-icon icon mdi mdi-account-switch"></i></div>
                                                        <div class="title-content"> Refund Payment</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="menu-icon icon mdi mdi-history d-flex justify-content-center"></i></div>
                                                        <div class="title-content"> Edit Billing Address</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="d-flex justify-content-center menu-icon icon mdi mdi-account-switch"></i></div>
                                                        <div class="title-content"> Send Payment Request Link</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="table-responsive mt-3">
                                                    <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Transaction Date</th>
                                                            <th>Transaction Amount</th>
                                                            <th>Mode Of Payment</th>
                                                            <th>Recipt No./Trans Id</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>07 Dec 2023</td>
                                                            <td>5000</td>
                                                            <td>Credit Card</td>
                                                            <td>509 / 14578455</td>
                                                            <td>Received(07 Dec 2023)</td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                                </div>

                                                <div class="card rounded mt-4">
                                                    <div class="card-body p-3">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="client-name pb-3">Allocation & Received</div>
                                                            </div>
                                                            <hr>
                                                            <div class="col-md-4 p-0 ps-1">
                                                                <div class="font-size-normal client-name">Total Amount To Allocate</div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="font-size-normal">5000</div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="font-size-normal client-name">Total Amount Payable</div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="font-size-normal">5000</div>
                                                            </div>
                                                            <div class="col-md-4 mt-2 p-0 ps-1">
                                                                <div class="font-size-normal client-name">Amount Allocated</div>
                                                            </div>
                                                            <div class="col-md-2 mt-2">
                                                                <div class="font-size-normal">5000</div>
                                                            </div>
                                                            <div class="col-md-4 mt-2">
                                                                <div class="font-size-normal client-name">Amount Recieved</div>
                                                            </div>
                                                            <div class="col-md-2 mt-2">
                                                                <div class="font-size-normal">5000</div>
                                                            </div>
                                                            <div class="col-md-4 mt-2 p-0 ps-1">
                                                                <div class="font-size-normal client-name">Amount Due For Allocation</div>
                                                            </div>
                                                            <div class="col-md-2 mt-2">
                                                                <div class="font-size-normal">0</div>
                                                            </div>
                                                            <div class="col-md-4 mt-2">
                                                                <div class="font-size-normal client-name">Amount Due</div>
                                                            </div>
                                                            <div class="col-md-2 mt-2">
                                                                <div class="font-size-normal">0</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mt-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="client-name address">Billing Address</div>
                                                                <hr>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="font-size-normal client-name">Address</div>
                                                                <p>hjgjbj</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="font-size-normal client-name">City</div>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <div class="font-size-normal">Jaipur</div>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <div class="font-size-normal client-name">State</div>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <div class="font-size-normal">RJ</div>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <div class="font-size-normal client-name">Post Code</div>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <div class="font-size-normal">302012</div>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <div class="font-size-normal client-name">Country</div>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <div class="font-size-normal">India</div>
                                                            </div>
                                                            <div class="col-md-12 mt-2">
                                                                <div class="font-size-normal client-name">Email</div>
                                                            </div>
                                                            <div class="col-md-12 mt-2">
                                                                <div class="font-size-normal">client@gmail.com</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="documents" class="tab-pane fade">
                                       <div class="row mt-3">
                                            <div class="card">
                                                <div class="card-body p-3">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <h4 class="card-title card-title-dash">Ticket Details</h4>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                        <thead>
                                                            <tr class="ticket-detail">
                                                                <th>S.No.</th>
                                                                <th>PNR</th>
                                                                <th>Routing</th>
                                                                <th>Airline</th>
                                                                <th>Fare Type</th>
                                                                <th>Ticket Status</th>
                                                                <th>Ticket No.</th>
                                                                <th>Exchange No.</th>
                                                                <th>PAX</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>4545555515</td>
                                                                <td>SYD-AVV</td>
                                                                <td>JQ</td>
                                                                <td>PUB</td>    
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>Rahul (ADT)</td>
                                                                <td><i class="menu-icon icon mdi mdi-account-edit"></i></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mt-3">
                                                <div class="card-body p-3">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <h4 class="card-title card-title-dash">EMDA / EMDS</h4>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                        <thead>
                                                            <tr class="ticket-detail">
                                                                <th>Description</th>
                                                                <th>EMD Doc. No.</th>
                                                                <th>Start Date</th>
                                                                <th>EMD Voucher No.</th>
                                                                <th>Issued On</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="6" class="client-name text-center">No Data Found</td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="mt-3 card-title-dash">Client Documents</h4>
                                            <div class="card mt-2">
                                                <div class="card-body p-3">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <h4 class="card-title card-title-dash">Issued Vouchers</h4>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                        <thead>
                                                            <tr class="ticket-detail">
                                                                <th>Description</th>
                                                                <th>Start Date</th>
                                                                <th>Issued On</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4" class="client-name text-center">No Data Found</td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mt-3">
                                                <div class="card-body p-3">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <h4 class="card-title card-title-dash">Financial Documents</h4>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                        <thead>
                                                            <tr class="ticket-detail">
                                                                <th>Description</th>
                                                                <th>Document No.</th>
                                                                <th>Parent Doc No.</th>
                                                                <th>Amount</th>
                                                                <th>Converted Amount</th>
                                                                <th>Issued On</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Invoice [AIR] [SYD-AVV]</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td><i class="menu-icon icon mdi mdi-account-edit"></i></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Customer Recipt (credit)</td>
                                                                <td>REC465465</td>
                                                                <td>-</td>
                                                                <td>5000</td>
                                                                <td>5000</td>
                                                                <td>07 Dec 2023</td>
                                                                <td>Ok</td>
                                                                <td><i class="menu-icon icon mdi mdi-account-edit"></i></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mt-3">
                                                <div class="card-body p-3">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <h4 class="card-title card-title-dash">Credit Card Authorisation Doc</h4>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                        <thead>
                                                            <tr class="ticket-detail">
                                                                <th>Description</th>
                                                                <th>Document No.</th>
                                                                <th>Issued On</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4" class="client-name text-center">No Data Found</td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mt-2">
                                                <div class="card-body p-3">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <h4 class="card-title card-title-dash">Uploaded Document</h4>
                                                        <div class="add-items d-flex mb-2">
                                                            <span class="font-size-normal" style="color:#44a4e0;"><i class="menu-icon icon mdi mdi-file-upload"></i> Upload Document</span>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                        <thead>
                                                            <tr class="ticket-detail">
                                                                <th>Document Title</th>
                                                                <th>Document Type</th>
                                                                <th>PAX Name</th>
                                                                <th>LPO No.</th>
                                                                <th>Created Date</th>
                                                                <th>View</th>
                                                                <th>Delete</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4" class="client-name text-center">No Data Found</td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                       </div>
                                    </div>
                                    <div id="dispatch" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="menu-icon icon mdi mdi-file-document d-flex justify-content-center"></i></div>
                                                        <div class="title-content"> Add Dispacth Details</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="d-flex justify-content-center menu-icon icon mdi mdi-file-document"></i></div>
                                                        <div class="title-content"> Add / Edit Personal Details</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8 mt-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-3">
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <div class="client-name pb-3">Dispacth1</div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="client-name pb-3"><i class="menu-icon icon mdi mdi-content-save-edit d-flex justify-content-center"></i></div>
                                                            </div>
                                                            <hr>
                                                            <div class="col-md-6">
                                                                <div class="font-size-normal client-name">Name</div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="font-size-normal">Client Name</div>
                                                            </div>
                                                            <div class="col-md-6 mt-3">
                                                                <div class="font-size-normal client-name">Mode Of Delivery</div>
                                                            </div>
                                                            <div class="col-md-6 mt-3">
                                                                <div class="font-size-normal">ETX-Delivery</div>
                                                            </div>
                                                            <div class="col-md-6 mt-3">
                                                                <div class="font-size-normal client-name">Created On</div>
                                                            </div>
                                                            <div class="col-md-6 mt-3">
                                                                <div class="font-size-normal">07 Dec 2023</div>
                                                            </div>
                                                            <div class="col-md-12 mt-5">
                                                                <button type="button" class="btn btn-outline-info btn-fw">Dispacth</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="messages" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="menu-icon icon mdi mdi-message d-flex justify-content-center"></i></div>
                                                        <div class="title-content"> Send A Message</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <div class="alert alert-danger" role="alert">
                                                    There is no message history against this booking. 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="supplier-payment" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-body p-2">
                                                        <div><i class="menu-icon icon mdi mdi-currency-rupee d-flex justify-content-center"></i></div>
                                                        <div class="title-content"> Make Supplier Payment</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <div class="alert alert-danger" role="alert">
                                                    No Payment have been paid to supplier against this booking.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="mt-3"><button class="btn btn-danger btn-lg pt-3 pb-3 ps-1 pe-4 w-100 font-size-normal"><i class="menu-icon mdi mdi-thumb-up me-4"></i>Authorize</button></div>
                                        <div class="mt-3"><button class="btn btn-danger btn-lg pt-3 pb-3 ps-1 pe-4 w-100 font-size-normal"><i class="menu-icon mdi mdi-history ms-3 me-2"></i>Booking History</button></div>
                                        <div class="mt-3"><button class="btn btn-danger btn-lg pt-3 pb-3 ps-1 pe-4 w-100 font-size-normal"><i class="menu-icon mdi mdi-cancel ms-3 me-2"></i>Reject Booking</button></div>
                                        <div class="mt-3"><button class="btn btn-danger btn-lg pt-3 pb-3 ps-1 pe-4 w-100 font-size-normal"><i class="menu-icon mdi mdi-lock ms-1 me-2"></i>Lock Booking</button></div>
                                        <div class="mt-3"><button class="btn btn-secondary btn-lg pt-3 pb-3 ps-0 pe-4 w-100 font-size-normal"><i class="menu-icon mdi mdi-location-exit me-5"></i>Close</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptjs')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@stop