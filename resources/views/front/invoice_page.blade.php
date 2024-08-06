@extends('front.layouts.app')
@section('inlinecss')
<style>
.box {
    position: relative;
    margin-bottom: 30px;
    width: 100%;
    background-color: #ffffff;
    border-radius: 5px;
    padding: 0px;
    -webkit-transition: .5s;
    transition: .5s;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-shadow: 0 0 30px 0 rgb(82 63 105 / 5%);
    box-shadow: 0 0 30px 0 rgb(82 63 105 / 5%);
}
.box-body {
    padding: 0.5rem 1.5rem;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    border-radius: 5px;
}
.fs-18 {
    font-size: 18px;
}
.bb-1 {
    border-bottom: 1px solid #f3f6f9 !important;
}
.invoice-title {
  margin-top: 0; 
}
.invoice-details {
    background-color: #45b649;
    margin-bottom: 15px;
    color: #ffffff;
    padding-top: 15px;
    padding-bottom: 15px; }
   
    address p{
        margin-bottom: 5px;
    }
    address .fs-18{
        margin-bottom: 7px;
    }
    table{
        margin-bottom:10px;
    }
    
    .details th{background-color:#ee902c;
        color:white;
    }
    
@media only screen and (max-width: 767px) {
  .col-6.invoice-col {
   flex: 0 0 100%;
    max-width: 100%;
  }
}
@media only screen and (max-width: 400px) {
  .invoice-header .header {
   display: block;
  
  }
.col-lg-2.col-2{ flex: 0 0 100%;
    max-width: 100%;
text-align: center;}
  b{font-size: 13px;}
  .col-lg-2.col-2 img{width:40%!important}
  body {
    font-size: 13px;
}
.col-lg-3.col-1{display:none}
}
@media only screen and (max-width: 500px) {
 body {
    font-size: 13px!important;
}
.col-lg-2.col-2{ flex: 0 0 100%;
    max-width: 100%;
text-align: center;}
  b{font-size: 13px;}
  .col-lg-2.col-2 img{width:30%!important}
  body {
    font-size: 13px;
}
.col-lg-3.col-1{display:none}
address p{margin-bottom: 0px;}
}
     </style>

@endsection
@section('container')
  <div style="justify-content: end; display: flex;" class="mt-3 container"s>
      <a href="{{route('genrate_invoice',base64_encode($wallet->id))}}" target="_blank"><button class="btn btn-lg" style="background-color: #ee902c; color: white;">Download PDF</button></a>
  </div>
  <section class="printableArea py-50 mt-3 mb-5">
    <div class="container">
      <div class="box border shadow">
          <div class="box-body" id="printMe">
              <h1 class="text-center" style="font-size: 40px;">Invoice</h1>
              <div class="row align-items-center invoice-header">
                  <div class="col-lg-7 col-10">
                      <img src="{{asset('front/images/logo.png')}}" style="margin-bottom: 20px; width: 37%;" />
                  </div>

                  <div class="col-lg-5 col-2">
                      <div class="page-header">
                          <div class="row">
                              <div class="col-5 mb-2">
                                  <b>Order Date</b>
                              </div>
                              <div class="col-7">
                                  {{ \Carbon\Carbon::parse($wallet->created_at)->format('F d, Y') }}
                              </div>
                              <!--<div class="col-6 mb-2">-->
                              <!--    <b>Invoice:</b>-->
                              <!--</div>-->
                              <!-- <div class="col-6">-->

                              <!--</div>-->
                              <div class="col-5 mb-2">
                                  <b>Order ID:</b>
                              </div>
                              <div class="col-7">
                                  {{$wallet->order_id}}
                              </div>

                              {{--
                              <div class="col-5 mb-2">
                                  <b>Order Status:</b>
                              </div>
                              <div class="col-7">
                                  Success
                              </div>
                              --}}

                              <div class="col-5 mb-2">
                                  <b>Transaction ID:</b>
                              </div>
                              <div class="col-7">
                                  {{$wallet->payment_id}}
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="pull-right text-end">
                      <div class="invoice-date"></div>
                  </div>
              </div>
              <hr />
              <div class="row invoice-info">
                  <div class="col-6 invoice-col">
                      <h4>From</h4>
                      <strong style="font-size: 18px;"> Shree Kalyanam</strong>
                      <p>Shree address</p>
                      <p>
                          GSTN : 08AAFCE0563Q1Z8
                          <!-- <br>
                      Support timing : 10:00AM – 5:00 PM -->
                          <br />
                          Support Call/Whatsapp : +917374888111
                          <br />
                          email : welcome@shree.com
                      </p>
                      <p>website : https://shreekalyanamtravels.com</p>
                  </div>
                  <!-- /.col -->
                  <div class="col-6 invoice-col text-end">
                      <h4>To</h4>
                      <address>
                          <div class="text-blue fs-18">Name: {{$wallet->vendor->business_name}}</div>

                          <div class="text-blue fs-18">Phone: {{$wallet->vendor->business_number}}</div>
                          <div class="text-blue fs-18">Email: {{$wallet->vendor->business_email}}</div>
                          <div class="text-blue fs-18">Address: {{$wallet->vendor->business_location}}</div>
                      </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-12 invoice-col mb-15"></div>
                  <!-- /.col -->
              </div>
              <hr />

              <div class="row">
                  <div class="col-12 table-responsive details">
                      <table class="table table-bordered mb-4">
                          <tbody>
                              <tr>
                                  <th>Order Id</th>
                                  <th>Payment Id</th>

                                  <th class="text-end">Quantity</th>
                                  <th>Title</th>
                                  <th class="text-end">Price</th>
                              </tr>

                              <tr>
                                  <td>{{$wallet->order_id}}</td>
                                  <td>{{$wallet->payment_id}}</td>
                                  <td class="text-end">1</td>
                                  <td class="text-end">{{$wallet->title}}</td>
                                  <td class="text-end">Rs {{$wallet->order_amount}}</td>
                              </tr>
                              <tr>
                                  <td colspan="4" class="border">Total Amount</td>
                                  <td class="text-end border">Rs {{$wallet->order_amount}}</td>
                              </tr>
                              
                          </tbody>
                      </table>
                  </div>
                  <!-- /.col -->
              </div>
              <div class="row">
                  <div class="col-12 text-right">
                      {{-- <div>
                          <p>Total Amount : Rs 651</p>
                          <p>Discount Amount : - Rs 54</p>
                      </div> --}}
                      <div class="total-payment">
                          <h3><b>Payable Amount :</b> Rs {{$wallet->order_amount}}</h3>
                      </div>
                  </div>
                  <!-- /.col -->
              </div>
          </div>
      </div>
    </div>
  </section>
@endsection
@section('inlinejs')
<script>
        function printDiv(divName){
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@stop