<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- CSS Link -->
    <link rel="stylesheet" href="{{ asset('admin/css/snackbar.css') }}">
    <link rel="stylesheet" href="{{asset('/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/media/media.css')}}">
    <title>Shree Kalyanam</title>

    <style>
    .container, .container-lg, .container-md, .container-sm, .container-xl {
        max-width: 1140px;
    }

    tbody {
    border: none !important;
}

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

  </head>
  <body>


<section class="printableArea py-50 mt-5 mb-5">
        <div class="container"> 
        <table class="table table-bordered mb-4">
            <tbody>
                <tr>
                    <th colspan="2"><h1 class="text-center" style="font-size:40px;">Invoice</h1></th>
                </tr>
                <tr>
                  <td style="width:40%;">
                    <div class="col-lg-12">
                        <img src="{{asset('front/images/logo.png')}}"  style="margin-bottom:20px;width: 70%;">
                    </div>
                  </td>
                  <td style="width:60%;">
                    <div class="col-lg-12 header">
                        <div class="page-header ">
                          <div class="row">
                            <table>
                              <tr>
                                <th style="width:60%;">
                                  <div style="margin-left:20%">
                                  <b>Order Date:</b>
                                  </div>
                                </th>
                                <td style="width:40%;">
                                  <div >
                                  {{ \Carbon\Carbon::parse($wallet->created_at)->format('F d, Y') }}
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <th style="width:60%;">
                                  <div class="col-5 mb-2" style="margin-left:20%">
                                      <b>Invoice No:</b>
                                  </div>
                                </th>
                                <td style="width:40%;">
                                  <div class="col-7">
                                  {{$wallet->invoice_no}}
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <th style="width:60%;">
                                <div class="col-6 mb-2" style="margin-left:20%">
                                    <b>Transaction ID:</b>
                                </div>
                                </th>
                                <td style="width:40%;">
                                <div class="col-6">
                                {{$wallet->payment_id}}
                                </div>
                                </td>
                              </tr>
                            </table>
                            
                              
                            <!--<div class="col-6 mb-2">-->
                            <!--    <b>Invoice:</b>-->
                            <!--</div>-->
                            <!-- <div class="col-6">-->
                          
                            <!--</div>-->
                            
                             
                            
                            {{-- <div class="col-5 mb-2">
                                <b>Order Status:</b>
                            </div>
                              <div class="col-7">
                                Success
                            </div> --}}
                          </div>
                        </div>
                      </div>
                  </td>
                </tr>
            </tbody>
        </table>
    
        <table class="table table-bordered mb-4">
          <tbody>
                <tr>
                    <td>
                      <!-- <div class="row invoice-info"> -->
                        <div class="col-12 invoice-col">
                        <h4>From</h4>
                                <p style="font-size: 18px;"> <b>Kalpvriksha Online Sokution Pvt Ltd</b></p>
                                <p>961, Mookim House, Pano Ka Dariba<br>
                                    Subhash Chowk<br>
                                    Jaipur, 302001. RAJ</p>
                                <p>
                                    <b>GST No</b> : 08AAJCK4502F1ZQ
                                    <!-- <br>
                                Support timing : 10:00AM – 5:00 PM -->
                                    <br />
                                    <b>Support Call/Whatsapp</b> : +918769924784
                                    <br />
                                    <!-- email : welcome@shree.com -->
                                </p>
                                <p><b>website</b> : https://shreekalyanamtravels.com</p>
                        </div>
                      </td>
                   
                      <td>
                        <div class="col-12 invoice-col text-end">
                          <h4>To</h4>
                          <address>
                          <div class="text-blue fs-18">Name: {{$wallet->vendor->business_name}}</div>

                          <div class="text-blue fs-18">Phone: {{$wallet->vendor->business_number}}</div>
                          <div class="text-blue fs-18">Email: {{$wallet->vendor->business_email}}</div>
                          <div class="text-blue fs-18">Address: {{$wallet->vendor->business_location}}</div>
                          </address>
                        </div>
                      </td>
                    </tr>
                </tbody>
              </table>
                    <!-- /.col -->
                    <div class="col-sm-12 invoice-col mb-15">
                        
                    </div>
                  <!-- /.col -->
                  <!-- </div> -->

                  <hr>
            
                  <div class="row">
                    <div class="col-12 table-responsive details">
                      <table class="table table-bordered mb-4">
                      <tbody>
                                        <tr>
                                            <th>Description</th>
                                            <!-- <th>Order Id</th>
                                            <th>Payment Id</th> -->

                                            <th class="text-end">Quantity</th>
                                            <th class="text-end">Price</th>
                                        </tr>
                                        <tr>
                                            <td>{{$wallet->title}}</td>
                                            <!-- <td>{{$wallet->order_id}}</td>
                                            <td>{{$wallet->payment_id}}</td> -->
                                            <td class="text-end">1</td>
                                            <td class="text-end">Rs {{$wallet->amount}}</td>
                                        </tr>
                                        @if($wallet->sgst != "")
                                        <tr>
                                            <td>SGST({{$wallet->sgst}}%)</td>
                                            <!-- <td>{{$wallet->order_id}}</td>
                                            <td>{{$wallet->payment_id}}</td> -->
                                            <td class="text-end"></td>
                                            <td class="text-end">Rs {{$wallet->order_amount * $wallet->sgst / 100}}</td>
                                        </tr>
                                        <tr>
                                            <td>CGST({{$wallet->cgst}}%)</td>
                                            <!-- <td>{{$wallet->order_id}}</td>
                                            <td>{{$wallet->payment_id}}</td> -->
                                            <td class="text-end"></td>
                                            <td class="text-end">Rs {{$wallet->order_amount * $wallet->cgst / 100}}</td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td>IGST({{$wallet->igst}}%)</td>
                                            <!-- <td>{{$wallet->order_id}}</td>
                                            <td>{{$wallet->payment_id}}</td> -->
                                            <td class="text-end"></td>
                                            <td class="text-end">Rs {{$wallet->order_amount * $wallet->igst / 100}}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td colspan="2" class="border">Total Amount</td>
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
  </body>
</html>

<script>
  function printDiv(divName){
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
  }
</script>
