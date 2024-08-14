<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        
        strong {
            font-weight: 600;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 20px;
        }
        .header, .footer {
            padding: 20px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }
        .footer {
            border-top: none;
            margin-top: 20px;
        }
        .section-title {
            font-weight: 600;
            font-size: 16px;
            margin-top: 20px;
        }
        .info-table th, .info-table td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        .rules {
            margin-top: 20px;
            font-size: 12px;
        }
        .rules ul {
            padding-left: 20px;
        }
        .info-table th {
            background: #FFF1E1;
        }
        .reciepthead{
            background: #FFF1E1;
            padding: 10px;
            display:flex;
            justify-content:space-between;
        }
        
        .check-erecipt {
            display: flex;
        }

    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <div class="row">
            <div class="col-md-12">
                <strong>KALPVRIKSHA ONLINE SOLUTION PVT LTD 981</strong><br>
                Moklam House, Pano Ka Dariba, Jaipur 302001<br>
                Mobile: 8769243784<br>
                Email: skrt.partners@gmail.com
            </div>
        </div>
    </div>

    <!--<div class="section-title">Your e-receipt</div>-->
    <!--<div class="row">-->
    <!--    <div class="col-md-6">-->
    <!--        <strong>Issued By:</strong><br>-->
    <!--        <img src="https://shreekalyanam.in/shree/public/airline_imagesssss/6E.png" alt="Indigo" class="img-fluid" style="height: 50px;">-->
    <!--    </div>-->
    <!--    <div class="col-md-6 text-end">-->
    <!--        <strong>PAYMENT REFERENCE:</strong> DH876FEI<br>-->
    <!--        <strong>Airline PNR:</strong> G29F8H<br>-->
    <!--        <strong>TICKET STATUS:</strong> Confirm<br>-->
    <!--        <strong>CLASS OF TRAVEL:</strong> Economy<br>-->
    <!--        <strong>CLASS CODE:</strong> Saver-->
    <!--    </div>-->
    <!--</div>-->
    
    <div class="section-title reciepthead">Your e-receipt <div><strong>Booked On:</strong> 2023-12-01 12:46:310</div></div>
    <div class="receipt-details">
        <div class="row">
            <div class="col-md-4">
                    <div class="check-erecipt">
                        <strong>Issued By : </strong><br>
                        <img src="https://shreekalyanam.in/shree/public/airline_imagesssss/6E.png" alt="Indigo" class="img-fluid" style="height: 50px;border-radius: 10px;margin-left: 20px;">
                    </div>
                    <div class="check-erecipt">
                        <p><strong>Airline Contact :</strong></p> <p> customersupport@indigo.com<br>0124-6173838 / 0124-4973838</p>
                    </div>
            </div>
            <div class="col-md-5 text-center">
                <p><strong>Airline PNR:</strong> G29F8H</p>
                
            </div>
            <div class="col-md-3 text-end">
                <p><strong>PAYMENT REFERENCE:</strong> DH876FEI</p>
                <p><strong>TICKET STATUS:</strong> Confirm</p>
                <p><strong>CLASS OF TRAVEL:</strong> Economy</p>
                <p><strong>CLASS CODE:</strong> Saver</p>
            </div>
        </div>
    </div>

    <div class="section-title">Flight Details</div>
    <table class="table info-table">
        <thead>
            <tr>
                <th>Flight No</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Dep. Date</th>
                <th>Arrival Date</th>
                <th>Operated By</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>6E-5027</td>
                <td>JAIPUR-T3-2</td>
                <td>MUMBAI-T2-1</td>
                <td>21:40 hrs, 02-Jan-2024</td>
                <td>23:55 hrs, 02-Jan-2024</td>
                <td>6E</td>
            </tr>
        </tbody>
    </table>

    <div class="section-title">Pax Details</div>
    <table class="table info-table">
        <thead>
            <tr>
                <th>Passenger Name</th>
                <th>Segment</th>
                <th>Flight No</th>
                <th>Ticket No</th>
                <th>Baggage Hand</th>
                <th>Baggage Free</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Rahul</td>
                <td>JAI-BOM</td>
                <td>6E-5027</td>
                <td>DH876FEI</td>
                <td>7 Kgs</td>
                <td>15 Kgs</td>
                <td>Confirm</td>
            </tr>
            <tr>
                <td>Rahul</td>
                <td>BOM-NAA</td>
                <td>6E-136</td>
                <td>DH876FEI</td>
                <td>7 Kgs</td>
                <td>15 Kgs</td>
                <td>Confirm</td>
            </tr>
        </tbody>
    </table>

    <div class="section-title">Fare Details</div>
    <table class="table info-table">
        <thead>
            <tr>
                <th>Basic Fare</th>
                <th>INR 679.00</th>
                <th>Reschedule Charge</th>
                <th>-</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tax & Others</td>
                <td>INR 501.00</td>
                <td>Cancellation Charge</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Baggage Charge</td>
                <td></td>
                <td>Gateway Charge</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Meals Charge</td>
                <td></td>
                <td>Other Charge</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Seat Charge</td>
                <td></td>
                <td>Other SSR</td>
                <td>-</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>Total Amount INR</td>
                <td>1200.00</td>
            </tr>
        </tbody>
    </table>

    <div class="rules">
        <strong>Rules and Regulations</strong>
        <ul>
            <li>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem</li>
            <li>Ipsum has been the industry's standard dummy text ever since the 1500s,</li>
            <li>When an unknown printer took a galley of type and scrambled it to make a</li>
            <li>Type specimen book. It has survived not only five centuries, but also the leap</li>
            <li>Into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the</li>
        </ul>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
