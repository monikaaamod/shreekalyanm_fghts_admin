@extends('front.layouts.packages_header')
@section('title') {{$coupon->name}} @endsection
@section('inlinecss')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>

  .pad20 {
      padding: 20px 0px;
  }
  .pdBtm30 {
      padding-bottom: 30px;
  }
  .pdTp10 {
      padding-top: 10px;
  }
  .fnt14 {
      font-size: 14px !important;
      line-height: 18px !important;
  }
  .pinkTxt {
      color: #fec8c7;
  }

  h2 {
      font-size: 20px;
      line-height: 24px;
      font-weight: 700;
      padding-top: 30px;
  }
  h3 {
      font-size: 16px;
      line-height: 20px;
      font-weight: 400;
      text-transform: uppercase;
      padding-left: 5px;
  }
  h3 a {
      color: #038cff;
      border-bottom: 1px solid;
  }


  .logoContainer {
      padding: 10px 0px;
      background: #ffffff;
  }
  .wrapper {
      width: 100%;
      max-width: 1100px;
      margin: 0 auto;
  }
  .greyArea {
      background: rgba(216, 216, 216, 0.2);
      padding: 10px 0px 30px 0px;
      margin-top: 50px;
  }

  .partnerStrip {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 15px;
  }
  .partnerStrip img {
      width: 150px;
      flex-shrink: 0;
  }
  .partnerStrip span {
      padding: 0px 10px;
  }
  .introTxt {
      padding: 20px 0px 10px 0px;
      font-size: 18px;
      line-height: 22px;
  }

  .offerRow {
      display: flex;
      margin: 15px 0px 20px 0px;
  }
  .offerCol {
      display: flex;
      flex: 1;
      flex-direction: column;
      padding: 15px;
      border-radius: 4px;
      background: linear-gradient(98deg, #fffcce 4%, #ffcb6b 99%);
  }
  .offerCol p.head {
      font-size: 24px;
      line-height: 28px;
      font-weight: 700;
      color:#000;
  }
  .subHead {
      font-size: 18px;
      line-height: 22px;
      margin-top: 5px;
  }
  .codeRow {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 14px;
      line-height: 18px;
      margin-top: 20px;
  }
  .codeRow span {
      font-size: 18px;
      line-height: 22px;
  }
  .smlTxt {
      font-size: 14px;
      font-weight: 400;
      margin-top: 20px;
  }
  .smlTxt span {
      font-size: 20px;
      font-weight: 700;
  }
  .smlTxt div a:last-child {
      margin-left: 10px;
  }

  .offerDetailsCont {
      padding-bottom: 50px;
  }
  .offerDetailsCont h3 {
      padding-top: 20px;
      font-size: 16px;
      line-height: 20px;
      font-weight: 700;
  }
  .offerDetailsCont h3:first-of-type {
      padding-top: 0px;
  }
  .offerDetailsCont ul {
      padding: 15px 15px 0px 15px;
  }
  .offerDetailsCont ul li {
      font-size: 14px;
      line-height: 18px;
      color: #2f2f2f;
      font-weight: 400;
      margin: 0 0 5px 0;
      padding-left: 15px;
      position: relative;
  }
  .offerDetailsCont ul li::before {
      width: 5px;
      height: 5px;
      content: "";
      position: absolute;
      left: 0;
      top: 6px;
      background: #2f2f2f;
      border-radius: 100px;
      -moz-border-radius: 100px;
      -webkit-border-radius: 100px;
  }
  .offerDetailsCont ul li ul {
      padding-top: 5px;
  }

  .tblContainer {
      border: 1px solid #d0dae3;
      margin-bottom: 30px;
  }
  .tblRow {
      display: flex;
  }
  .tblRow:nth-of-type(even) {
      background: #eff8ff;
  }
  .tblRow:nth-of-type(odd) {
      background: #d8e9f9;
  }
  .tblRow:nth-child(1) {
      background: #ffffff;
      font-size: 18px;
      line-height: 22px;
      text-transform: uppercase;
      font-weight: 700;
  }
  .tblRow .tblCol {
      padding: 15px;
  }
  .tblRow:nth-child(1) .tblCol {
      padding: 20px 15px;
  }
  .tblRow .tblCol:nth-child(1) {
      flex: 1;
  }
  .tblRow .tblCol:nth-child(2) {
      border-left: 1px solid #d0dae3;
      width: 30%;
      font-weight: 700;
  }
  .tblRow .tblCol a {
      display: inline-block;
      padding-top: 5px;
      color: #1c73f6;
  }

  .btnContainer {
      text-align: center;
      margin-top: 30px;
      text-align: center;
  }
  .btnContainer a {
      background: -moz-linear-gradient(left, #47a4fc 0%, #1c73f6 100%);
      background: -webkit-linear-gradient(left, #47a4fc 0%, #1c73f6 100%);
      background: linear-gradient(to right, #47a4fc 0%, #1c73f6 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#47a4fc', endColorstr='#1c73f6',GradientType=1 );
      border-radius: 30px;
      padding: 15px 30px;
      color: #ffffff;
      display: inline-block;
      font-size: 16px;
      line-height: 20px;
      text-transform: uppercase;
      margin: 0px 5px;
  }
  .primaryBtn {
      background: -moz-linear-gradient(left, #47a4fc 0%, #1c73f6 100%);
      background: -webkit-linear-gradient(left, #47a4fc 0%, #1c73f6 100%);
      background: linear-gradient(to right, #47a4fc 0%, #1c73f6 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#47a4fc', endColorstr='#1c73f6',GradientType=1 );
      border-radius: 30px;
      padding: 10px 30px;
      color: #ffffff;
      text-decoration: none;
      text-transform: uppercase;
      display: inline-block;
      white-space: nowrap;
      font-size: 16px;
      font-weight: 700;
      line-height: 20px;
  }


  .mb {
      display: none;
  }

  @media screen and (max-width: 767px) {
      body {
          font-size: 14px;
          line-height: 18px;
      }
      .wrapper {
          padding: 0px 10px;
      }

      h2 {
          font-size: 16px;
          line-height: 20px;
          padding-top: 20px;
      }
      h3 {
          font-size: 14px;
          line-height: 18px;
      }
      h4 {
          font-size: 16px;
      }
      .pad20 {
          padding: 10px 0px;
      }

      .partnerStrip {
          margin-top: 10px;
      }
      .partnerStrip img {
          width: 100px;
      }
      .partnerStrip span {
          padding: 0px 5px;
      }
      .introTxt {
          padding: 15px 0px 5px 0px;
          font-size: 14px;
          line-height: 18px;
      }

      .offerRow {
          flex-direction: column;
          margin: 10px 0px;
      }
      .offerCol {
          margin: 0px;
          padding: 10px;
      }
      .offerCol p.head {
          font-size: 16px;
          line-height: 20px;
          color:#000;
      }
      .subHead {
          font-size: 14px;
          line-height: 18px;
          margin-top: 3px;
      }
      .codeRow {
          font-size: 14px;
          line-height: 18px;
      }
      .codeRow span {
          font-size: 14px;
          line-height: 18px;
      }
      .primaryBtn {
          padding: 7px 15px;
          font-size: 12px;
          line-height: 16px;
      }

      .offerDetailsCont h3 {
          padding-top: 20px;
          font-size: 14px;
          line-height: 18px;
      }
      .btnContainer a {
          padding: 10px 20px;
          font-size: 14px;
          line-height: 18px;
      }
      .offerDetailsCont ul li {
          font-size: 12px;
          line-height: 16px;
      }
      .tblContainer {
      }
      .tblRow {
          font-size: 12px;
          line-height: 16px;
      }
      .tblRow:nth-child(1) {
          font-size: 13px;
          line-height: 26px;
      }
      .tblRow:nth-child(1) .tblCol {
          padding: 8px;
      }

      .tblRow .tblCol {
          padding: 8px;
      }

      
  }
  
    .offerContainer {
        padding: 30px;
        border-radius: 6px;
        border: solid 1px #cbdced;
        background: linear-gradient(98deg, #ffcb6b 4%, #fffcce 99%);
        text-align: center;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .offerContainer h2 {
        color: #134782;
        font-size: 24px;
        line-height: 28px;
    }
    
    .offerContainer h3 {
        color: #000;
        font-size: 18px;
        line-height: 22px;
        margin-top: 5px;
    }
    
    .dealInfoBox {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 7px;
    }
    
    .dealCodetxt {
        background-color: #ed9323;
        font-size: 12px;
        color: #fff;
        line-height: 20px;
        padding: 8px 15px;
    }
    
    .dealCode {
        background: #fff;
        padding: 6px 15px;
        font-size: 14px;
        line-height: 22px;
        color: #000;
        font-weight: 600;
        border: 1px dashed #10355f;
    }
</style>
@endsection
@section('container')

<!-- Header Area Starts -->
<header><img src="@if($coupon->banner_image){{asset($coupon->banner_image)}}@else{{asset('front/assets/images/flights.png')}}@endif" style="height:400px;width:100%;" class="dt" alt="" /></header>
<!-- Header Area Ends -->
<div class="wrapper">

  <div class="offerRow">
      
      <div class="offerContainer appendTop15">
        <h2>{{$coupon->name}}</h2>
        <!--<h3>on Domestic Flights.</h3>-->
        <div class="dealInfoBox">
           <span class="dealCodetxt">Use Code: </span>
           <span class="dealCode">{{$coupon->coupon_code}}</span>
        </div>
        <p>Offer Validity: {{ \Carbon\Carbon::parse($coupon->last_date)->format('d M Y') }}</p>
     </div>
  </div>
  <div class="offerDetailsCont">
     
      <h3>Offer Detail</h3>
        <div>
            {!!$coupon->description!!}
        </div>

      <h3>Cancellation</h3>
        <div>
            {!!$coupon->cancellation!!}
        </div>

      <h3>Terms & Conditions</h3>
        <div>
            {!!$coupon->terms!!}
        </div>
  </div>
</div>

@endsection

@section('scriptjs')

  
@stop
  