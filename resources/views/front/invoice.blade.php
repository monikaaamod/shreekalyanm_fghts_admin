<html>

  <head>
      <meta charset="utf-8">
      <title>Invoice</title>
  </head>
  <style>
  table {
      font-size: 75%;
      table-layout: fixed;
      width: 100%;
      border: 1px solid;
  }

  table,
  th,
  td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 10px;
  }

  .jill td {
      /* line-height: 24px;
      font-weight: 600;
      font-size: 14px; */
  }

  .voice th {
      font-size: 14px;
  }

  .andone {
      border: none !important;
  }

  .text p {
      padding: 3px 0px 0px 0px;
      margin-top: -15px;
  }

  hr {
      width: 355px;
      margin-left: -10px;
  }



  .hand {
      width: 218px;
  }

  .total th {
      font-weight: 600;
      font-size: 14px;
  }

  .number td {
      font-weight: 600;
      font-size: 12px;
  }

  .total td {
      font-weight: 600;
      font-size: 14px;
  }

  .text td {
      font-weight: 600;
      font-size: 14px;
  }

  .rupees th {
      text-align: start;
      border: none;
      font-size: 14px;
  }

  .bank {
      padding-left: 30px;
  }

  .only {
      padding-left: 125px;
  }

  .value {
      padding-left: 55px;
  }

  .thor {
      margin-top: -160px !important;
  }

  .sklassy {
      text-align: center;
  }

  .hand p {
      /* margin-top: -150px; */
      margin-bottom: 10px;
  }

  .head{
    background-color:#f9921c;
    font-size:14px;
    color:#FFF;
  }

  </style>

  <body style="margin: 0;">
    <div class="Invoice">
      <table cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse;padding: 0; margin: 0;">
          <tr>
              <th>Invoice</th>
          </tr>
      </table>
      <table class="jill" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse;padding: 0; margin: 0;">
          <tr>
              <td style="border:0;width:55%;"><img src="{{asset('front/images/logo.png')}}"  style="margin-bottom:20px;width: 55%;"></td>
              <td style="border:0;width:45%;" class="andone">
              <p style="font-size: 18px; margin-top:0;padding-top:0;"> <b>Kalpvriksha Online Sokution Pvt Ltd</b></p>
              <p style="margin-left:25%;margin-top:0;padding-top:0; font-size:13px">961, Mookim House, Pano Ka Dariba<br>
                  Subhash Chowk<br>
                  Jaipur, 302001. RAJ</p>
              <p style="margin-left:25%;">
                <b>Support Call/Whatsapp</b> : +918769924784
                <br />
                  <b>GST No</b> : 08AAJCK4502F1ZQ
              </p>
              </td>
          </tr>
      </table>
      <table class="jill" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse;padding: 0; margin: 0;">

        <tr>
          <td colspan="2">
            <strong>Bill To:</strong> <br> {{$wallet->vendor->business_name}} <br>
            {{$wallet->vendor->city_name}} <br>
            {{$wallet->vendor->business_number}}
          </td>
          <td style="text-align-last: end;" colspan="2">
            
              <strong>Place of Supply : </strong>{{$wallet->vendor->state_name->state_name}} <br>
              <strong>Invovce No : </strong> {{$wallet->invoice_no}}<br>
              <strong>Order Date : </strong> {{ \Carbon\Carbon::parse($wallet->created_at)->format('d M Y') }}<br>

          </td>
        </tr>
        <tr>
          <th class="head">Name/Description</th>
          <th class="head">Qty.</th>
          <th class="head">Price</th>
          <th class="head">Amount</th>
        </tr>
        <tr>
          <td>{{$wallet->title}}</td>
          <td>1</td>
          <td>{{round($wallet->amount)}}</td>
          <td>{{round($wallet->amount)}}</td>
        </tr>
        <tr>
          <th class="head" colspan="3">Subtotal:</th>
          <td>{{round($wallet->amount)}}</td>
        </tr>
        @if($wallet->sgst != "")
        <tr>
        @php 
          $amount = $wallet->order_amount - $wallet->amount;
          $sgst = $amount / 2;
          $cs = $amount / 2;
        @endphp
          <th colspan="2">SGST</th>
          <td>{{$wallet->sgst}}%</td>
          <td>{{round($sgst,2)}}</td>
        </tr>
        <tr>
          <th colspan="2">CGST</th>
          <td>{{$wallet->cgst}}%</td>
          <td>{{round($cs,2)}}</td>
        </tr>
        @else

        <tr>
          <th colspan="2">IGST</th>
          <td>{{$wallet->igst}}%</td>
          <td>{{round($wallet->order_amount - $wallet->amount)}}</td>
        </tr>
        @endif
        <tr>
          <th colspan="3">Grand Total:</th>
          <td>Rs {{$wallet->order_amount}}</td>
        </tr>
      </table>

      <table class="jill" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse;padding: 0; margin: 0;">
          <tr style="padding-right:0px;">
              <td style="padding-right:0px;">
                <table class="jill" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse;padding: 0; margin: 0;">
                  <tr>
                    <th class="head">Invoice Amount In Words</th>
                  </tr>
                  <tr>
                    <th style="font-size:12px;text-transform: uppercase;">{{$amount_in_words}}</th>
                  </tr>
                  <tr>
                    <th class="head">Terms and Conditions</th>
                  </tr>
                  <tr>
                    <th style="font-size:12px">Thank you for doing business with us.</th>
                  </tr>
                </table>
              </td>
              <td style="padding-right:0px">
                  <table class="jill" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse;padding: 0; margin: 0;border:0;">
                  <tr>
                    <th style="font-size:13px;font-weight:0;border:0;">For, KALPVRIKSHA ONLINE SOLUTION PVT LTD</th>
                  </tr>
                  <tr>
                    <th style="border:0;"><img src="{{asset('front/images/logo.png')}}"  style="margin-bottom:20px;width: 55%;"></th>
                  </tr>
                  <tr>
                    <th style="font-size:13px;font-weight:0;border:0;">Authorized Signatory</th>
                  </tr>
                  </table>
              </td>
          </tr>
      </table>
    </div>
  </body>

</html>