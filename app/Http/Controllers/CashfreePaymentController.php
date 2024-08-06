<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Subscription;
use App\Models\Vendor;
use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Mail;
use App\Mail\Emails;
use App\Models\User;
use App\Models\Tax;
use App\Models\Charges;
use App\Models\Wallet;

use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Storage;


class CashfreePaymentController extends Controller
{

     public function store(Request $request, $id)
     {
          // print_r($request->all());exit;
          if($id)
          {
               $registration_fee = Charges::where('title','Registration Fees')->where('status','Active')->where('deleted_at',0)->first();

               $id = base64_decode($id);
               $vendor = Vendor::where('id', $id)->first();

               
                    
               $url = "https://sandbox.cashfree.com/pg/orders";
               // print_r($url);exit;

               $headers = array(
                    "Content-Type: application/json",
                    "x-api-version: 2022-01-01",
                    "x-client-id: TEST4031844e36ce757a997a402575481304",
                    "x-client-secret: TEST36b0058ed770f6acdb61d5be574c62d8b168b733"
               );


               $data = json_encode([
                    'order_id' =>  'order_'.rand(1111111111,9999999999),
                    'order_amount' => $registration_fee->amount,
                    // 'order_type' => "Registration Fees",
                    'vendor_id' => $vendor->id,
                    "order_currency" => "INR",
                    "customer_details" => [
                    "customer_id" => 'customer_'.rand(111111111,999999999),
                    "customer_name" => $vendor->register_name,
                    "customer_email" => $vendor->register_email,
                    "customer_phone" => $vendor->register_mobile,
                    ],
                    "order_meta" => [
                         "return_url" => 'http://localhost/shree_latest/cashfree/payments/success/?order_id={order_id}&order_token={order_token}&order_amount=2000&vendor_id='.$vendor->id
                    ]
               ]);

               $curl = curl_init($url);

               curl_setopt($curl, CURLOPT_URL, $url);
               curl_setopt($curl, CURLOPT_POST, true);
               curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
               curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
               curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

               $resp = curl_exec($curl);

               curl_close($curl);

               // print_r($resp);exit;
               return redirect()->to(json_decode($resp)->payment_link);

          }
          else{
               return response()->json([
                    'status' => false,
                    'msg' => 'Please Register First.'
               ]);
          }
          
     }

     public function success(Request $request)
     {
          // print_r($request->all());exit;

          $request->input('orderStatus');

          $url = 'https://sandbox.cashfree.com/pg/orders/'.$request->order_id.'/payments';

          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
              "x-api-version: 2022-01-01",
              "x-client-id: TEST4031844e36ce757a997a402575481304",
              "x-client-secret: TEST36b0058ed770f6acdb61d5be574c62d8b168b733"
            ),
          ));
          
          $resp = curl_exec($curl);
          
          curl_close($curl);
         
          $response = json_decode($resp);
          print_r($response);exit;

          
          // dd($request->all()); // PAYMENT STATUS RESPONSE

          if($response[0]->payment_status == 'SUCCESS')
          {
               $vendor = Vendor::with('state_name')->find($request->vendor_id);

               $charges = Charges::where('title','Registration Fees')->where('status','Active')->where('deleted_at',0)->first();
               $charges_tax = Tax::where('id',1)->first();

               $tax1 = $request->order_amount * 100;
               $tax2 = $charges_tax->tax_percentage + 100;
       
               $tax = round($tax1/$tax2);
               $totaltax = $request->order_amount - $tax;
               $amount = $request->order_amount - $totaltax;

               if($vendor->state_name->state_name == "RAJASTHAN")
               {
                    $sgst = $charges_tax->tax_percentage/2;
               }
               else{
                    $igst = $charges_tax->tax_percentage;
               }


               

               if(Wallet::where('vendor_id', $request->vendor_id)->where('title','Registration Fees')->exists())
               {
                    $wallet = Wallet::where('vendor_id', $request->vendor_id)->where('title','Registration Fees')->first();
                    $wallet->payment_status = "Success";
                    $wallet->save();

                    $vendor = Vendor::find($request->vendor_id);
                    $vendor->payment_status = 1;
                    $vendor->save();

               }
               else{

                    $wallet = new Wallet();
                    $wallet->title = "Registration Fees";
                    $wallet->vendor_id = $request->vendor_id;
                    $wallet->order_id = $request->order_id;
                    $wallet->invoice_no = 'Invoice'.rand(111111,999999);
                    $wallet->payment_status = "Success";
                    $wallet->order_amount = $request->order_amount;
                    $wallet->amount = $amount;
                    $wallet->tax_id = $charges_tax->id;
                    if(isset($sgst) && $sgst !=""){
                         $wallet->cgst = $sgst;
                         $wallet->sgst = $sgst;
                    }
                    if(isset($igst) && $igst != ""){
                         $wallet->igst = $igst;
                    }
                    $wallet->order_token = $request->order_token;
                    $wallet->payment_id = $response[0]->cf_payment_id;
                    $wallet->save();

                    $vendor = Vendor::find($request->vendor_id);
                    $vendor->payment_status = 1;
                    $vendor->save();

               }

               $template = EmailTemplate::where('type','Vendor Registration')->first();
               // print_r($template);exit;

               $editedContent = $template->description; // Retrieve user-edited content from the database
               $serverVariable = $vendor->register_name; // Your server-side variable

               // Replace the placeholder with the server variable value
               $message = str_replace('[VAR_NAME]', $serverVariable, $editedContent);

               $email = $vendor->register_email;
               $subject = $template->title;

               Mail::to($email)->send(new Emails($message,$subject));

               

               // $data['subscription'] = $post;
               // $data['plan'] = $plan;
               // $data['user'] = $user;
               // $data['tax_perc'] = $tax_perc;

               // return view('admin.invoice.invoice',compact('data'));
               // $pdf = PDF::loadView('admin.invoice.invoice', $data);

               // $filename = time() .$post->invoice_no.".pdf";

               // Storage::put('pdf/' . $filename, $pdf->output());

               return view('payment.success',compact('wallet'));
          }
          else{

               $vendor = Vendor::with('state_name')->find($request->vendor_id);

               $charges = Charges::where('title','Registration Fees')->where('status','Active')->where('deleted_at',0)->first();
               $charges_tax = Tax::where('id',1)->first();

               $tax1 = $request->order_amount * 100;
               $tax2 = $charges_tax->tax_percentage + 100;
       
               $tax = $tax1/$tax2;
               $totaltax = $request->order_amount - $tax;
               $amount = $request->order_amount - $totaltax;

               if($vendor->state_name->state_name == "RAJASTHAN")
               {
                    $sgst = $charges_tax->tax_percentage/2;
               }
               else{
                    $igst = $charges_tax->tax_percentage;
               }

               if(Wallet::where('vendor_id', $request->vendor_id)->where('title','Registration Fees')->exists())
               {
                    $wallet = Wallet::where('vendor_id', $request->vendor_id)->where('title','Registration Fees')->first();
                    $wallet->payment_status = "Faild";
                    $wallet->save();

                    $vendor = Vendor::find($request->vendor_id);
                    $vendor->payment_status = 0;
                    $vendor->save();
               }
               else{
                    
                    $vendor = Vendor::find($request->vendor_id);
                    $wallet = new Wallet();
                    $wallet->title = "Registration Fees";
                    $wallet->vendor_id = $request->vendor_id;
                    $wallet->order_id = $request->order_id;
                    $wallet->invoice_no = 'Invoice'.rand(111111,999999);
                    $wallet->order_amount = $request->order_amount;
                    $wallet->amount = $amount;
                    $wallet->tax_id = $charges_tax->id;
                    if(isset($sgst) && $sgst !=""){
                         $wallet->cgst = $sgst;
                         $wallet->sgst = $sgst;
                    }
                    if(isset($igst) && $igst != ""){
                         $wallet->igst = $igst;
                    }
                    $wallet->order_token = $request->order_token;
                    $wallet->payment_id = $response[0]->cf_payment_id;
                    $wallet->save();
               }

               return view('payment.fail');
          }
     }
          
}
