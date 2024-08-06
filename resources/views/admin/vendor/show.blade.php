@extends('admin.layouts.app')
    @section('title')
    Vendor
    @stop
    @section('stylecss')
    @stop
    @section('content')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="card-title card-title-dash">Personal Details</h4>
                            </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="data">
                                            <tbody>
                                                <tr>
                                                    <th>Name</th>
                                                    <td colspan="7">{{$vendor->register_name}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Email</th>
                                                    <td colspan="7">{{$vendor->register_email}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Mobile No.</th>
                                                    <td colspan="7">{{$vendor->register_mobile }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Whatsapp No.</th>
                                                    <td colspan="7">{{$vendor->register_whatsapp_no }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Gender</th>
                                                    <td colspan="7">{{$vendor->register_gender }}</td>
                                                </tr>
                                            

                                                <tr>
                                                    <th colspan="8"><h5 class="form-title"><span>Business Details</span></h5></th>
                                                </tr>
                                            <tr>
                                                <th>Business Name</th>
                                                <td colspan="7">{{$vendor->business_name}}</td>
                                            </tr>

                                            <tr>
                                                <th>Business Location</th>
                                                <td colspan="7">{{$vendor->business_location}}</td>
                                            </tr>

                                            <tr>
                                                <th>Business Email</th>
                                                <td colspan="7">{{$vendor->business_email }}</td>
                                            </tr>

                                            <tr>
                                                <th>Business Website</th>
                                                <td colspan="7">{{$vendor->business_website }}</td>
                                            </tr>

                                            <tr>
                                                <th>Business Contact Number</th>
                                                <td colspan="7">{{$vendor->business_number }}</td>
                                            </tr>

                                            {{--
                                            <tr>
                                                <th>Alternative Contact Number</th>
                                                <td colspan="7">{{$vendor->alternative_number }}</td>
                                            </tr>
                                            --}}

                                            <tr>
                                                <th>Category Name</th>
                                                <td colspan="7">{{$vendor->category_name}}</td>
                                            </tr>

                                            <!-- <tr>
                                                                <th>Subcategory Name</th>
                                                                <td colspan="7">{{$vendor->subcategory_name}}</td>
                                                            </tr> -->

                                            {{--
                                            <tr>
                                                <th>Service Name</th>
                                                <td colspan="7">{{$vendor->service_name }}</td>
                                            </tr>
                                            --}}

                                            <tr>
                                                <th>City</th>
                                                <td colspan="7">{{$vendor->city_name}}</td>
                                            </tr>

                                            <tr>
                                                <th>About the Business</th>
                                                <td colspan="7"><p>{{$vendor->about_business }}</p></td>
                                            </tr>

                                            {{--
                                            <tr>
                                                <th>Business Address</th>
                                                <td colspan="7">{{$vendor->business_address }}</td>
                                            </tr>
                                            --}}

                                            <tr>
                                                <th>Profile Image</th>
                                                <td colspan="7">
                                                    @if($vendor->image)
                                                    <a href="{{ url('public/'.$vendor->image)}}" target="_blank">
                                                        <img src="{{ url('public/'.$vendor->image)}}" style="height: auto; width: 50px;" />
                                                    </a>
                                                    @else
                                                    <img src="{{ url('public/notfound.png')}}" width="150px" height="150px" />
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Banner Image</th>

                                                <td colspan="7">
                                                    @if($vendor->banner_images) @foreach($vendor->banner_images as $banner_image)
                                                    <a href="{{url('public/'.$banner_image->banner_images)}}" target="_blank">
                                                        <img src="@if(isset($vendor)) @if($banner_image->banner_images){{url('public/'.$banner_image->banner_images)}}@endif @endif" style="height: 50px;" />
                                                    </a>
                                                    @endforeach @endif
                                                </td>
                                            </tr>
                                        
                        
                                            <tr>
                                                <th colspan="8"><h5 class="form-title"><span>Document Uplodes</span></h5></th>
                                            </tr>
                                            <tr>
                                                <th>Pan Card Number</th>
                                                <td colspan="7">{{$vendor->pan_number}}</td>
                                            </tr>

                                            <tr>
                                                <th>Pan Card Document</th>
                                                <td colspan="7">
                                                    <a href="{{ url('public/'.$vendor->pan_card)}}" class="btn btn-primary btn-sm" target="_blank">
                                                        PAN Card Document<!-- <img src="{{ url('public/'.$vendor->pan_card)}}" width="150px" height="150px" /> -->
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>GST Number</th>
                                                <td colspan="7">{{$vendor->gst_number }}</td>
                                            </tr>

                                            <tr>
                                                <th>GST Document</th>
                                                <td colspan="7">
                                                    @if($vendor->gst_doc)
                                                    <a href="{{ url('public/'.$vendor->gst_doc)}}" class="btn btn-primary btn-sm" target="_blank">
                                                        GST Document<!-- <img src="{{ url('public/'.$vendor->gst_doc)}}" width="150px" height="150px" /> -->
                                                    </a>
                                                    @else
                                                    <img src="{{ url('public/notfound.png')}}" width="150px" height="150px" />
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Cheque Image</th>
                                                <td colspan="7">
                                                    @if($vendor->cheque)
                                                    <a href="{{ url('public/'.$vendor->cheque)}}" target="_blank">
                                                        <img src="{{ url('public/'.$vendor->cheque)}}" width="150px" height="150px" />
                                                    </a>
                                                    @else
                                                    <img src="{{ url('public/notfound.png')}}" width="150px" height="150px" />
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="8"><h5 class="form-title"><span>Bank Details</span></h5></th>
                                            </tr>
                                                <tr>
                                                    <th>Account Number</th>
                                                    <td colspan="7">{{$vendor->account_number}}</td>
                                                </tr>

                                                {{--
                                                <tr>
                                                    <th>Confirm Account Number</th>
                                                    <td colspan="7">{{$vendor->confirm_account}}</td>
                                                </tr>
                                                --}}

                                                <tr>
                                                    <th>Name Of Bank</th>
                                                    <td colspan="7">{{$vendor->bank_name}}</td>
                                                </tr>

                                                <tr>
                                                    <th>IFSC Code</th>
                                                    <td colspan="7">{{$vendor->ifce_code}}</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="8"><h5 class="form-title"><span>Past Work</span></h5></th>
                                                </tr>
                                            <tr>
                                                <th>Past Image</th>
                                                <td colspan="7">
                                                    @if($vendor->past_work) @foreach($vendor->past_work as $pastimages) @if($pastimages->is_image == 1)
                                                    <a href="{{url('public/'.$pastimages->pastimage)}}" style="padding: 10px;" target="_blank">
                                                        <img src="@if(isset($vendor)){{url('public/'.$pastimages->pastimage)}}@endif " style="height: 150px; width: 150px;" />
                                                    </a>
                                                    @endif @endforeach @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Past Video</th>
                                                <td colspan="7">
                                                    @if($vendor->past_work) @foreach($vendor->past_work as $video) @if($video->is_image == 0)
                                                    <a href="{{$video->pastimage}}" target="_blank">
                                                        <img src="{{asset($video->thumbnail)}}" width="100px" height="100px" />
                                                    </a>
                                                    @endif @endforeach @endif
                                                </td>
                                            </tr>
                                        
                        <style>
                            .video {
                                height: 204px;
                                width: 222 px;
                            }
                        </style>

                                                <tr>
                                                    <th colspan="8"><h5 class="form-title"><span>Payment Policy</span></h5></th>
                                                </tr>
                                
                                            @foreach($vendor->pp as $key=>$data)
                                            <tr>
                                                <th>Description</th>
                                                <td colspan="7">{!!$data->description!!}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <th colspan="8"><h5 class="form-title"><span>Terms and Conditions</span></h5></th>
                                            </tr>
                                           
                                            <tr>
                                                <th>Description</th>
                                                <td colspan="7">{{$vendor->terms_condi}}</td>
                                            </tr>
                                            <tr>
                                                <th colspan="8"><h5 class="form-title"><span>Payment Details</span></h5></th>
                                            </tr>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Order Amount</th>
                                                    <th>Order Id</th>
                                                    <th>Payment Id</th>
                                                    <th>Invoice No.</th>
                                                    <th>Order Date</th>
                                                    <th>Payment Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                @foreach($wallet as $key=>$val)
                                                <tr>
                                                    <td>{{$val->title}}</td>
                                                    <td>{{$val->order_amount}}</td>
                                                    <td>{{$val->order_id}}</td>
                                                    <td>{{$val->payment_id}}</td>
                                                    <td>{{$val->invoice_no}}</td>
                                                    <td>
                                                        @if($val->payment_status == "Success")
                                                        <span class="bg-success p-1 text-light">{{$val->payment_status}}</span>
                                                        @else
                                                        <span class="bg-danger p-1 text-light">{{$val->payment_status}}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{\Carbon\Carbon::parse($val->created_at)->format('d M Y')}}</td>
                                                    @if($val->payment_status == "Faild")
                                                    <td>
                                                        <a class="show btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Genrate Url</a>
                                                    </td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @csrf
                            <div class="col-12">
                                <h5 class="form-title"><span>Services Offered</span></h5>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="data">
                                        <tbody>
                                            @foreach($service as $key=>$val) @foreach($value as $sd=>$cv) @if($sd == $val->service_id) @if($val->service->types == "radio")
                                            <div>
                                                <h5>{{$val->service->title}}</h5>
                                            </div>
                                            <div class="p-3">
                                                <div><input type="radio" name="radio{{$sd}}" @if(in_array($val->service->option1, $cv)) checked @endif class="radio me-2">{{$val->service->option1}}</div>
                                                <div><input type="radio" name="radio{{$sd}}" @if(in_array($val->service->option2, $cv)) checked @endif class="radio me-2">{{$val->service->option2}}</div>
                                                @if(isset($val->service->option3) && $val->service->option3 !="")
                                                <div><input type="radio" name="radio{{$sd}}" @if(in_array($val->service->option3, $cv)) checked @endif class="radio me-2">{{$val->service->option3}}</div>
                                                @endif @if(isset($val->service->option4) && $val->service->option4 !="")
                                                <div><input type="radio" name="radio{{$sd}}" @if(in_array($val->service->option4, $cv)) checked @endif class="radio me-2">{{$val->service->option4}}</div>
                                                @endif
                                            </div>

                                            @endif @if($val->service->types == "checkbox")
                                            <div>
                                                <h5>{{$val->service->title}}</h5>
                                            </div>
                                            <div class="p-3">
                                                <div><input type="checkbox" @if(in_array($val->service->option1, $cv)) checked @endif class="radio me-2">{{$val->service->option1}}</div>
                                                <div><input type="checkbox" @if(in_array($val->service->option2, $cv)) checked @endif class="radio me-2">{{$val->service->option2}}</div>
                                                @if(isset($val->service->option3) && $val->service->option3 !="")
                                                <div><input type="checkbox" @if(in_array($val->service->option3, $cv)) checked @endif class="radio me-2">{{$val->service->option3}}</div>
                                                @endif @if(isset($val->service->option4) && $val->service->option4 !="")
                                                <div><input type="checkbox" @if(in_array($val->service->option4, $cv)) checked @endif class="radio me-2">{{$val->service->option4}}</div>
                                                @endif
                                            </div>

                                            @endif @if($val->service->types == "paragraph")
                                            <div>
                                                <h5>{{$val->service->title}}</h5>
                                            </div>
                                            <p>{{$val->service->description}}</p>
                                            @endif @endif @endforeach @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <style>
                            .next2 {
                                margin-left: 501%;
                                position: relative;
                                bottom: 70px;
                            }
                        </style>
                        <div>
                            
                        </div>

                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <input type="text" class="form-control" value="{{route('vendor.cashfree',base64_encode($vendor->id))}}" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

        
@endsection

