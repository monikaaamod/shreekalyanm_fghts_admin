<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Vendor;
use App\Models\Business;
use App\Models\BannerImage;
use App\Models\VendorService;
use App\Models\VideoCategory;
use App\Models\Category;
use App\Models\Wallet;
use App\Models\Tax;
use App\Models\States;
use App\Models\Subcategory;
use App\Models\Service;
use App\Models\ServiceableCities;
use App\Models\ServicesOffered;
use App\Models\PastWork;
use App\Models\PaymentPolicy;
use App\Models\Terms;
use App\Models\ServiceOffered;
use App\Models\VendorRegistration;
use App\Models\VendorStatus;
use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Mail;
use App\Mail\Emails;


use Intervention\Image\Facades\Image;
use App\Http\Traits\ActionButtonsTrait;
use App\Http\Traits\StatusColumnTrait;
use App\Http\Traits\AccountStatusColumnTrait;


class VendorController extends BaseController
{
    use ActionButtonsTrait;
    use StatusColumnTrait;
    use AccountStatusColumnTrait;
   


    // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
    {
        parent::__construct(new Vendor());
    }


      public function index(Request $request, $status='', $account_status='')
    {
        // print_r($status);exit;
        if ($request->ajax()) {
             $data = Vendor::with('category')->where('status','Completed')->latest()->get();

            // print_r($data);exit;
            return Datatables::of($data)
             ->addIndexColumn()
             ->addColumn('action', function ($row) {
                // $btn = '<a title="Vendor Images" href="' .route("admin.vendor.image", base64_encode($row->id)).'" class="show btn btn-primary btn-sm"><i class="fas fa-image fa-sm"></i></a>';
                 return $this->actionButtons($row, '', '', 'admin.vendor.show', '', '');
             })
            
             ->addColumn('created_at', function ($row) {
                 $date = "";
                 return  $data =  Carbon::parse($row->created_at)->format('d M Y');
             })

  
             ->rawColumns(['action', 'created_at'])
             ->make(true);
        }


        $data = array();
        $data['page_title'] = "Vendor List";
        $data['page_name'] = "Vendor";
        $data['status'] = $status;
        $data['account_status'] = $account_status;

       


        return view('admin.vendor.vendor', $data);
    }

    public function create()
    {
        // echo "hello";exit;
        $data['page_title'] = "Vendor Registration";
        $data['page_name'] = "Registration";
        $data['page_url'] = route('admin.vendor.store');
        $data['method'] = 'POST';
        $data['vendor'] = Vendor::where('status', 'Active', 'InActive')->get();
        // print_r($data['vendor']);die;

        if(Vendor::count() > 0)
        {
            $new_id = Vendor::latest()->first()->id;
        }
        else{
            $new_id = 1;
        }
        $data['new_id'] = $new_id;
        return view('admin.vendor_register.create',$data);
    }

    public function store(Request $request)
    {
        // print_r($request->all());exit;
        $validator = Validator::make($request->all(), [
            // 'name' => 'required',
           
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
        
        $vendor_register = new VendorRegistration();
        $vendor_register->name = $request->name;
        $vendor_register->email = $request->email;
        $vendor_register->mobile_number = $request->mobile_number;
        $vendor_register->whatsapp_number = $request->whatsapp_number;
        $vendor_register->gender = $request->gender;
        
        $vendor_register->save();
        // echo "test";die;
        $redirect_url = route("admin.vendor.info",$vendor_register->id);
        // print_r($redirect_url);die;
        return response()->json([
            'status' => true,
            'url'=>$redirect_url,
            'msg' => 'Vendor Registration successfully',
        ]);

    }

    
    public function create_info()
    {
        // echo "hello";exit;
        // print_r($id);die;

        $data['page_title'] = "Vendor Registration";
        $data['page_name'] = "Vendor";
        $data['page_url'] = route('admin.vendor.store_info');
        // $data['register'] = route('aadmin.vendor.register');

        $data['method'] = 'POST';
        $data['business_type'] = Business::where('status', 'Active')->get();
        $data['state'] = States::get();
        $data['category'] = Category::where('status', 'Active')->where('category_name', '!=', 'All Category')->get();
        $data['video_cat'] = VideoCategory::where('category_name', 'Real Videos')->first();
        $data['subcategory'] = Subcategory::where('status', 'Active','InActive')->get();
        $data['service'] = Service::where('status', 'Active','InActive')->get();
        $data['city'] = ServiceableCities::with('city_names')->get();
        $data['service_offered'] = ServiceOffered::where('status', 'Active', 'InActive')->get();
      

        
        return view('admin.vendor.create', compact('data'));
     
    }

     public function store_info(Request $request)
      {
        //print_r($id); exit;
        // echo "hello4";exit;

        // echo "test";die;
        // print_r($request->all());exit;
        $validator = Validator::make($request->all(), [
            
            // 'status' => 'required',
            // 'pincode' => 'required',
            'business_number'=>'required|digits:10',
            'alternative_number'=>'required|digits:10',

            
       
        ]);

        if ($validator->fails()) {
            $message = [];
            foreach($validator->errors()->getMessages() as $keys=>$vals) {
                foreach($vals as $k=>$v) {
                    $message[] =  $v;
                }
            }

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'msg' => $message[0]
                ]);
        }

       

        $vendor = new Vendor();
       
        
        $vendor->register_name = $request->register_name;
        $vendor->register_email = $request->register_email;
        $vendor->register_mobile = $request->register_mobile;
        $vendor->state = $request->state;
        $vendor->register_whatsapp_no = $request->register_whatsapp_no;
        $vendor->register_gender = $request->register_gender;
        $vendor->business_name = $request->business_name;
        $vendor->business_location = $request->business_location;
        $vendor->latitude = $request->latitude;
        $vendor->longitude = $request->longitude;
        $vendor->terms_condi = $request->term_description;
        $vendor->business_type = $request->business_type;
        $vendor->business_email = $request->business_email;
        $vendor->business_website = $request->business_website;
        $vendor->business_number = $request->business_number;
        $vendor->alternative_number = $request->alternative_number;
        $vendor->category_name = $request->category_name;
        // $vendor->subcategory_name = $request->subcategory_name;
        // $vendor->service_name = implode(',',$request->service_name);
        // $vendor->type_business = $request->type_business;
        $vendor->city_name = $request->city_name;
        $vendor->pincode = $request->pincode;

        // $vendor->mode_payment = $request->mode_payment;
        $vendor->about_business = $request->about_business;
        $vendor->business_address = $request->business_address;
        $vendor->radio = $request->radio;

        $vendor->terms_condi = $request->terms_condi;
        $vendor->gst_number = $request->gst_number;
        $vendor->pan_number = $request->pan_number;

        $vendor->account_number = $request->account_number;
        $vendor->confirm_account = $request->confirm_account;
        $vendor->bank_name = $request->bank_name;
        $vendor->ifce_code = $request->ifce_code;

        $vendor->account_number2 = $request->account_number2;
        $vendor->confirm_account2 = $request->confirm_account2;
        $vendor->bank_name2 = $request->bank_name2;
        $vendor->ifce_code2 = $request->ifce_code2;

        $vendor->facebook = $request->facebook;
        $vendor->instagram = $request->instagram;
        $vendor->twitter = $request->twitter;
        $vendor->linkedin = $request->linkedin;
        $vendor->youtube = $request->youtube;
        $vendor->terms_condi = $request->term_des;

        $vendor->status = $request->status;
        $vendor->account_status = $request->account_status;
            // echo "test3";die;
        if(isset($request->checkbox)  && ($request->checkbox != "")){
            // echo "test";die;
        $vendor->checkbox = implode(',',$request->checkbox);
        }

        

                    if($request->image){
                    if($request->hasFile('image')){
                        $image = 'profile_'.time().'.'.$request->image->extension();   
                         $request->image->move(public_path('uploads/vendor/images'), $image);
                        $image = "uploads/vendor/images/".$image;
                        $vendor->image = $image;
                     }
                    }
                    else{
                        $vendor->image = $request->logo;
                    }


                    if($request->hasFile('pan_card')){
                        $pan_card = 'profile_'.time().'.'.$request->pan_card->extension();   
                        $request->pan_card->move(public_path('uploads/vendor/documents/pancardsdoc'), $pan_card);
                        $pan_card = "uploads/vendor/documents/pancardsdoc/".$pan_card;
                        $vendor->pan_card = $pan_card;
                    }
        

                    if($request->hasFile('gst_doc')){
                        $gst_doc = 'profile_'.time().'.'.$request->gst_doc->extension();   
                        $request->gst_doc->move(public_path('uploads/vendor/documents/gstdocument/'), $gst_doc);
                        $gst_doc = "uploads/vendor/documents/gstdocument/".$gst_doc;
                        $vendor->gst_doc = $gst_doc;
                     }
        
                    
        
                if($request->hasFile('cheque')){
                    $cheque = 'profile_'.time().'.'.$request->cheque->extension();   
                     $request->cheque->move(public_path('uploads/vendor/documents/chequedocument/'), $cheque);
                    $cheque = "uploads/vendor/documents/chequedocument/".$cheque;
                    $vendor->cheque = $cheque;
                    
                 }


        
        
         $vendor->save(); 


         if(isset($request->offer_id) && $request->offer_id !=""){
            foreach($request->offer_id as $key=>$val){
                $nameval = 'radio'.$val;
                $service = new VendorService();
                $service->answer = $request->$nameval[0];
                $service->service_id = $val;
                $service->vendor_id = $vendor->id;
                $service->save();
            }
           }
   
           if(isset($request->paragraph) && $request->paragraph !=""){
               foreach($request->paragraph as $key=>$val){
                   $service = new VendorService();
                   $service->service_id = $val;
                   $service->vendor_id = $vendor->id;
                   $service->save();
                }
           }
   
           if(isset($request->check_id) && $request->check_id !=""){
               foreach($request->check_id as $key=>$val){
   
                   $nameval = 'checkbox'.$val;
                   
                   foreach($request->$nameval as $cv=>$row){
                       $service = new VendorService();
                       $service->answer = $row;
                       $service->service_id = $val;
                       $service->vendor_id = $vendor->id;
                       $service->save();
                   }
               }
              }

         if(isset($request->description_payment) && $request->description_payment != "")
         {
            foreach($request->description_payment as $key=>$val){
                $payment = new PaymentPolicy();
                $payment->vendor_id = $vendor->id;
                $payment->is_cancellation = 0;
                $payment->description = $val;
                $payment->save();
            }
         }

         if(isset($request->cancellation_des) && $request->cancellation_des != "")
         {
            foreach($request->cancellation_des as $key=>$val){
                $cancellation = new PaymentPolicy();
                $cancellation->vendor_id = $vendor->id;
                $cancellation->is_cancellation = 1;
                $cancellation->description = $val;
                $cancellation->save();
            }
         }

        //  if(isset($request->term_title) && $request->term_title != "")
        //  {
        //     foreach($request->term_title as $key=>$val){
        //         $term = new Terms();
        //         $term->vendor_id = $vendor->id;
        //         $term->title = $val;
        //         $term->description = $request->term_description[$key];
        //         $term->save();
        //     }
        //  }

         
        if($request->hasFile('banner')){
             // print_r($request->all('banner'));die;
         foreach($request->banner as $key=>$val)
         {
    
            $banner = 'banner_images'.$key.time().'.'.$val->extension();
                $val->move(public_path('uploads/vendor/banner_images'), $banner);
                $banner = "uploads/vendor/banner_images/".$banner;
            // $all_img[] = $banner;
            
            $newimage = new BannerImage();
            $newimage->vendor_id = $vendor->id; 
            $newimage->banner_images = $banner; 
            $newimage->save();

         }
     }
    //  echo "jgsaz";die;

      if($request->hasFile('pastimage')){
        // print_r($request->all('pastimage'));die;
        
         foreach($request->pastimage as $key=>$val)
         {

            // echo "hello";die;

                $pastimage = 'past_work'.$key.time().'.'.$val->extension();
                $val->move(public_path('uploads/vendor/pastwork/images/'),$pastimage);
                $pastimage = "uploads/vendor/pastwork/images/".$pastimage;
                $all_img[] = $pastimage;
               
         }
         // echo "hello5";die;
     }
  
        
        
     if($request->pastimage){
     foreach($all_img as $key=>$val){
        $past_work = new PastWork;
        $past_work->vendor_id = $vendor->id;
        $past_work->pastimage = $val;
        $past_work->is_image = 1;
        $past_work->save();
    
}
}

        if($request->video_title){
            foreach($request->video_title as $key=>$val){
                $past_work = new PastWork;
                $past_work->vendor_id = $vendor->id;
                    $past_work->thumbnail = $request->thumbnail[$key];
                $past_work->pastimage = $request->video_url[$key];
                $past_work->category = $request->video_category;
                $past_work->description = $request->video_description[$key];
                $past_work->title = $request->video_title[$key];
                $past_work->is_image = 0;
                $past_work->save();
            }
        }

  



        // echo "test";die;
        return response()->json([
            'status' => true,
            'msg' => 'Vendor Registration created successfully',
            

        ]);

    }


     public function edit($id)
    {
        $id = base64_decode($id);
        // print_r($id);exit;
        $data = array();
        $data['page_title'] = "Edit Vendor Registration";
        $data['page_name'] = "Vendor Registration";
        $data['page_url'] = route('admin.vendor.update', $id);
        
        $data['category'] = Category::where('status', 'Active')->where('category_name', '!=', 'All Category')->get();
        $data['subcategory'] = Subcategory::where('status', 'Active')->get();
        $data['service'] = Service::where('status', 'Active')->get();
        $data['state'] = States::get();
        $data['video_cat'] = VideoCategory::where('status', 'Active')->get();
        $data['business_type'] = Business::where('status', 'Active')->get();

       

       
        


        $post = Vendor::with('banner_images', 'past_work','category','service_offered','cancellation','pp')->where('id', $id)->first();
        $service = VendorService::select('service_id')->with('service')->where('vendor_id',$id)->groupBy('service_id')->get();
        $data['service_offered'] = $post->service_offered->groupBy('service_id')->map(function ($items) {
            return $items->pluck('answer')->toArray();
        });
        $radio = ServiceOffered::where('id', $post->radio)->first();
        // print_r($all_service);exit;
        
        // print_r($post->category);exit;

        

       



        $data['city'] = ServiceableCities::with('city_names')->get();
        
        $data['service_id'] = base64_decode($id);
        return view('admin.vendor.edit', compact('data', 'service', 'post', 'radio'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            // 'business_name' => 'required',
            // 'business_email' => 'required',
          
        ]);
        if ($validator->fails()) {
            $message = [];
            foreach($validator->errors()->getMessages() as $keys=>$vals) {
                foreach($vals as $k=>$v) {
                    $message[] =  $v;
                }
            }

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'msg' => $message[0]
                ]);
        }

        $vendor = Vendor::find($id);
        //print_r($vendor);die;
        $vendor->register_name = $request->register_name;
        $vendor->register_email = $request->register_email;
        $vendor->register_mobile = $request->register_mobile;
        $vendor->state = $request->state;
        $vendor->terms_condi = $request->term_description;
        $vendor->register_whatsapp_no = $request->register_whatsapp_no;
        $vendor->register_gender = $request->register_gender;
        $vendor->business_name = $request->business_name;
        $vendor->business_location = $request->business_location;
        $vendor->latitude = $request->latitude;
        $vendor->longitude = $request->longitude;
        $vendor->business_type = $request->business_type;
        $vendor->business_email = $request->business_email;
        $vendor->business_website = $request->business_website;
        $vendor->business_number = $request->business_number;
        $vendor->alternative_number = $request->alternative_number;
        $vendor->category_name = $request->category_name;
        
        $vendor->city_name = $request->city_name;
        $vendor->pincode = $request->pincode;

        // $vendor->mode_payment = $request->mode_payment;
        $vendor->about_business = $request->about_business;
        $vendor->business_address = $request->business_address;
        $vendor->radio = $request->radio;

        $vendor->payment_polcy = $request->payment_polcy;
        $vendor->terms_condi = $request->terms_condi;
        $vendor->gst_number = $request->gst_number;
        $vendor->pan_number = $request->pan_number;

        $vendor->account_number = $request->account_number;
        $vendor->confirm_account = $request->confirm_account;
        $vendor->bank_name = $request->bank_name;
        $vendor->ifce_code = $request->ifce_code;

        $vendor->account_number2 = $request->account_number2;
        $vendor->confirm_account2 = $request->confirm_account2;
        $vendor->bank_name2 = $request->bank_name2;
        $vendor->ifce_code2 = $request->ifce_code2;

        $vendor->facebook = $request->facebook;
        $vendor->instagram = $request->instagram;
        $vendor->twitter = $request->twitter;
        $vendor->linkedin = $request->linkedin;
        $vendor->youtube = $request->youtube;
        $vendor->terms_condi = $request->term_des;

        $vendor->account_status = $request->account_status;
            // echo "test3";die;
        if(isset($request->checkbox)  && ($request->checkbox != "")){
            // echo "test";die;
        $vendor->checkbox = implode(',',$request->checkbox);
        }

        

                    if($request->image){
                    if($request->hasFile('image')){
                        $image = 'profile_'.time().'.'.$request->image->extension();   
                         $request->image->move(public_path('uploads/vendor/images'), $image);
                        $image = "uploads/vendor/images/".$image;
                        $vendor->image = $image;
                     }
                    }
                    


                    if($request->hasFile('pan_card')){
                        $pan_card = 'profile_'.time().'.'.$request->pan_card->extension();   
                        $request->pan_card->move(public_path('uploads/vendor/documents/pancardsdoc'), $pan_card);
                        $pan_card = "uploads/vendor/documents/pancardsdoc/".$pan_card;
                        $vendor->pan_card = $pan_card;
                    }
        

                    if($request->hasFile('gst_doc')){
                        $gst_doc = 'profile_'.time().'.'.$request->gst_doc->extension();   
                        $request->gst_doc->move(public_path('uploads/vendor/documents/gstdocument/'), $gst_doc);
                        $gst_doc = "uploads/vendor/documents/gstdocument/".$gst_doc;
                        $vendor->gst_doc = $gst_doc;
                     }
        
                    
        
                if($request->hasFile('cheque')){
                    $cheque = 'profile_'.time().'.'.$request->cheque->extension();   
                     $request->cheque->move(public_path('uploads/vendor/documents/chequedocument/'), $cheque);
                    $cheque = "uploads/vendor/documents/chequedocument/".$cheque;
                    $vendor->cheque = $cheque;
                    
                 }


        
        
         $vendor->save(); 

         if($request->banner){
         if($request->hasFile('banner')){
            // print_r($request->all(banner));die;
         foreach($request->banners as $key=>$val)
         {
            
            $banner = 'banner_images'.$key.time().'.'.$request->banner[$key]->extension();
            $request->banner[$key]->move(public_path('uploads/vendor/banner_images/'), $banner);
            $banner = "uploads/vendor/banner_images/".$banner;
           
            
            $newimage =  BannerImage::find($val);
            $newimage->vendor_id =$vendor->id; 
            $newimage->banner_images = $banner; 
            $newimage->save();

         }
        }
    }

    if(isset($request->past_image) && $request->past_image != ""){
        foreach($request->past_image as $key=>$val){
            $past_work = PastWork::find($val);
            $past_work->image_status = 1;
            $past_work->save();
        }
    }


// print_r($request->video_id);exit;
    if($request->video_id){
        foreach($request->video_id as $key=>$val){
            $past_work = PastWork::find($val);
            $past_work->vendor_id = $vendor->id;
            $past_work->thumbnail = $request->thumbnail[$key];
            $past_work->pastimage = $request->video_url[$key];
            $past_work->category = $request->video_category;
            $past_work->description = $request->video_description[$key];
            $past_work->title = $request->video_title[$key];
            $past_work->is_image = 0;
            $past_work->image_status = $request->video_status[$key];
            $past_work->save();
        }
    }


    if(isset($request->payment_id) && $request->payment_id != "")
         {
            foreach($request->payment_id as $key=>$val){
                $payment = PaymentPolicy::find($val);
                $payment->vendor_id = $vendor->id;
                $payment->is_cancellation = 0;
                $payment->description = $request->description_payment[$key];
                $payment->save();
            }
         }

         if(isset($request->cancellation_id) && $request->cancellation_id != "")
         {
            foreach($request->cancellation_id as $key=>$val){
                $cancellation = PaymentPolicy::find($val);
                $cancellation->vendor_id = $vendor->id;
                $cancellation->is_cancellation = 1;
                $cancellation->description = $request->cancellation_des[$key];
                $cancellation->save();
            }
         }

       




    
        return response()->json(['status' => true, 'msg' => 'Vendor updated Successfully']);
    }

    public function show(Request $request, $id)
    {
        $data = array();
        $data['vendor_id'] = base64_decode($id);
        // print_r($data['vendor_id']);die;
        $data['vendor'] = Vendor::with('banner_images', 'past_work','city', 'pp', 'terms')->find($data['vendor_id']);
        $data['wallet'] = Wallet::with('vendor')->where('vendor_id', $data['vendor_id'])->get();

        foreach($data['wallet'] as $key=>$val)
        {
            $amount[] = $val->order_amount;
        }
        $data['total'] = array_sum($amount);




        $data['page_name']= ' Vendor Registration';
        $data['post'] = Vendor::with('banner_images', 'past_work','city')->where('id', $id)->first();
        $data['service'] = VendorService::select('service_id')->with('service')->where('vendor_id',$data['vendor']->id)->groupBy('service_id')->get();
        $data['value'] = $data['vendor']->service_offered->groupBy('service_id')->map(function ($items) {
            return $items->pluck('answer')->toArray();
        });
        $data['page_title'] = "Vendor Registration Details";
        $data['page_name'] = "Vendor";
        $data['service_offered'] = ServiceOffered::where('status', 'Active')->get();
        $data['status'] = VendorStatus::where('vendor_id', $data['vendor_id'])->latest()->get();
        return view('admin.vendor.show',$data);
    }

    public function get_sub_cat(Request $request)
    {
        // print_r($request->all());exit;
        $result = Subcategory::where('category_name', $request->sub_cat)->get();
        $html="<option value=''>Select</option>";
        foreach($result as $row){
            $html .= "<option value=".$row->subcategory_name.">".$row->subcategory_name."</option>";
        }
        return $html;
    }

    public function vendor_status(Request $request, $id){
       
        $vendor = Vendor::find($id);
        // print_r($vendor);exit;
        $vendor->status = $request->status;
        $vendor->comment = $request->comment;
        $vendor->save();

        if($vendor->status == 'Completed'){
            $template = EmailTemplate::where('type','Vendor Varification')->first();
            // print_r($template);exit;

            $editedContent = $template->description; // Retrieve user-edited content from the database
               $serverVariable = $vendor->register_name; // Your server-side variable

               // Replace the placeholder with the server variable value
               $message = str_replace('[VAR_NAME]', $serverVariable, $editedContent);

            $email = $vendor->register_email;
            $subject = $template->title;

            Mail::to($email)->send(new Emails($message,$subject));
        }
        return redirect()->back()->with('msg', 'Vendor Status Updated');

    }
    

    public function permanentdelete($id){
        $id= base64_decode($id);
        // print_r($id);die;
        $delete= Vendor::where('id', $id)->delete();
        BannerImage::where('vendor_id', $id)->delete();
        PastWork::where('vendor_id', $id)->delete();
        // PastWork::where('vendor_id', $id)->delete();
        Wallet::where('vendor_id', $id)->delete();
        PaymentPolicy::where('vendor_id', $id)->delete();
  
         return response()->json(['status' => true, 'msg' => 'Vendor Delete successfully']);
                    
    }

    public function vendor_images($id)
    {
        $data = array();
        $id = base64_decode($id);
        $data['vendor'] = Vendor::with('banner_images','past_work')->find($id);
        $data['page_name']= 'Vendor Images';
        $data['page_title'] = "Vendor Images";
        return view('admin.vendor.vendor_images', $data);
    }

    public function image_approval(Request $request, $id)
    {
        // print_r($request->all());exit();
       if(isset($request->image) && $request->image != "")
       {
            $vendor = Vendor::find($request->image);
            if($vendor->image_status == 0){
                $vendor->image_status = 1;
            }
            else{
                $vendor->image_status = 0;
            }
            $vendor->save();

            return response()->json([
                'status' => true,
                'msg' => "Profile Image Status Chenge Successfully."
            ]);
       }
       if(isset($request->banner_images) && $request->banner_images != "")
       {

            foreach($request->banner_images as $key=>$val){
                $banner = BannerImage::find($val);
                if($banner->image_status == 0){
                    $banner->image_status = 1;
                }
                // else{
                //     $banner->image_status = 0;
                // }
                $banner->save();
            }
            return response()->json([
                'status' => true,
                'msg' => "Banner Image Status Chenge Successfully."
            ]);
       }
       if(isset($request->past_image) && $request->past_image != "")
       {
            foreach($request->past_image as $key=>$val){
                $past_image = PastWork::find($val);
                if($past_image->image_status == 0){
                    $past_image->image_status = 1;
                }
                // else{
                //     $past_image->image_status = 0;
                // }
                $past_image->save();
            }
            return response()->json([
                'status' => true,
                'msg' => "Past Work Image Status Chenge Successfully."
            ]);
       }
       if(isset($request->past_video) && $request->past_video != "")
       {    
            foreach($request->past_video as $key=>$val){
                $past_video = PastWork::find($val);
                if($past_video->image_status == 0){
                    $past_video->image_status = 1;
                }
                // else{
                //     $past_video->image_status = 0;
                // }
                $past_video->save();
            }
            return response()->json([
                'status' => true,
                'msg' => "Past Work Image Status Chenge Successfully."
            ]);
       }
       else{
        return response()->json([   
            'status' => false,
            'msg' => "Please Select An Image."
        ]);
       }
    }

    public function delete($id)
    {

        $id= base64_decode($id);
        $delete= PastWork::where('id', $id)->delete();
        return response()->json(['status' => true, 'msg' => 'Video Deleted successfully']);
    }


    public function payment_delete($id)
    {
        $id= base64_decode($id);
        $delete= PaymentPolicy::where('id', $id)->delete();

        return response()->json(['status' => true, 'msg' => 'Field Deleted successfully']);
    }

    public function get_service(Request $request)
    {
        // print_r($request->all());exit;
        if(isset($request->category_id) && $request->category_id != ""){
            $result = ServiceOffered::where('category_name', $request->category_id)->latest()->get();
        }

        $category = Category::where('category_name','All Category')->first();
        if(isset($category) && $category != ""){
            $all_cat = ServiceOffered::where('category_name', $category->id)->get();
        }

        $html ="";
        if(isset($result)){
            if(isset($all_cat)){
                $html = view('admin.service_offered.render', compact('result', 'all_cat'))->render();
            }
            else{
            $html = view('admin.service_offered.render', compact('result'))->render();
            }
        }

        
        
        return $html;
    }

    public function getCity(Request $request)
    {
        // print_r($request->all());exit;
        $html = "";
        if(isset($request->state) && $request->state != ""){
        $result = ServiceableCities::with('city_names')->where('state_name', $request->state)->get();
        $html="<option value=''>Select</option>";
        foreach($result as $row){
            $html .= "<option value=".$row->city_names->city_name.">".$row->city_names->city_name."</option>";
        }
        }
        if(isset($request->district) && $request->district != ""){
            
            $result = PinCode::where('district_id', $request->district)->get();
            $html="<option value=''>Select Pin Code</option>";
            foreach($result as $row){
                $html .= "<option value=".$row->pincode.">".$row->pincode."</option>";
            }
        }
        if(isset($request->pincode) && $request->pincode != ""){
            $result = PinCode::where('pincode', $request->pincode)->get();

            $html="<option value=''>Select Village</option>";
            foreach($result as $row){
                $html .= "<option value=".$row->VillageorCity.">".$row->VillageorCity."</option>";
            }

            // $html= $result->VillageorCity;
        }
        return $html;
    }



}






