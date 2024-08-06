<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use PDF;
use App\Models\BlogCategory;
use App\Models\SimilarCategory;
use App\Models\ServiceableCities;
use App\Models\VideoCategory;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Cms;
use App\Models\Banner;
use App\Models\Aboutus;
use App\Models\Social;
use App\Models\User;
use App\Models\PaymentPolicy;
use App\Models\Service;
use App\Models\ServiceOffered;
use App\Models\Video;
use App\Models\Airport;
use App\Models\Coupon;
use App\Models\TravelClass;
use App\Models\FareType;
use App\Models\Aircraft;
use App\Models\Airlines;
use Validator;
use Auth;
use Session;
use Redirect;
use Str;



class IndexController extends Controller
{

    
    public function index()
    {
        $data['airports']= Airport::where('status','Active')->get();
        $data['class']= TravelClass::where('status','Active')->get();
        $data['airline']= Airlines::where('status','Active')->get();
        $data['aircraft']= Aircraft::where('status','Active')->get();
        $data['fare_type']= FareType::where('status','Active')->get();
        $data['offers'] = Coupon::where('status','Active')->get();
        
        // return $data['offers'];

        return view('front.flights.search',$data);
    }


    public function flights()
    {
        $data['airports']= Airport::where('status','Active')->get();
        $data['class']= TravelClass::where('status','Active')->get();
        $data['airline']= Airlines::where('status','Active')->get();
        $data['aircraft']= Aircraft::where('status','Active')->get();
        $data['fare_type']= FareType::where('status','Active')->get();

        return view('front.flights.flights',$data);
    }

    public function flight_booking()
    {
        $data['coupon'] = Coupon::where('status','Active')->latest()->limit(6)->get();

        // return $data['coupon'];

        return view('front.flights.flight-booking',$data);
    }

    public function airplane()
    {
        $data['coupon'] = Coupon::where('status','Active')->get();
        return view('front.flights.airplane',$data);
    }
    
    public function offer_detail($id)
    {
        $id = base64_decode($id);
        $data['coupon'] = Coupon::where('id',$id)->first();
        // return $data['coupon'];
        return view('front.flights.offer_detail',$data);
    }

    public function video()
    {
        $videolatest = Video::latest()->limit(3)->get();
        $category = VideoCategory::where('category_name', 'Important Video')->first();
        $important_video = Video::where('status', 'Active')->where('important', 1)->latest()->get();
        $video = Video::latest()->where('status', 'Active')->get();
        $vendor_video = PastWork::where('is_image', 0)->where('image_status', 1)->get();
        // print_r($video); exit;
        return view('front.video', compact('video','videolatest','vendor_video','important_video'));
    }

    public function videodetail($id)
    {
        $id = base64_decode($id);
        $data = Video::where('id',$id)->first();
        $video = Video::latest()->where('status', 'Active')->where('id','!=',$id)->get();
        return view('front.videodetail',compact('data','video'));
    }

    public function vendor_videodetail($id)
    {
        $id = base64_decode($id);
        $data = PastWork::where('id',$id)->first();
        $video = PastWork::where('is_image', 0)->where('id','!=',$id)->get();
        return view('front.vendor_videodetail',compact('data','video'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function comingsoon()
    {
        return view('front.comingsoon');
    }

    public function weddingvendors()
    {
        $category = Category::where('status', 'Active')->where('category_name', '!=', 'All Category')->where('deleted_at', 0)->latest()->get();
        return view('front.weddingvendors', compact('category'));
    }

    public function aboutus()
    {
        $category = Category::with('single_vendor')->where('category_name', '!=', 'All Category')->where('status','Active')->latest()->get();
        $about = Aboutus::with('banner')->latest()->first();
        $team = Team::where('status','Active')->limit(4)->latest()->get();
        return view('front.aboutus',compact('about', 'team', 'category'));
    }

    public function contactus()
    {
        $data = Cms::where('type','Contact Us')->first();
        return view('front.contactus',compact('data'));
    }

    public function faqs()
    {
        $faq = Faq::where('status','Active')->latest()->get();
        return view('front.faqs',compact('faq'));
    }

    public function privacy_policy()
    {
        $privacy_policy = Cms::where('type','Privacy Policy')->first();
        return view('front.privacy_policy',compact('privacy_policy'));
    }

    public function choosecity($id)
    {
        $id = base64_decode($id);
        $category = Category::where('id',$id)->first();
        $city = ServiceableCities::with('city_names')->where('status', 'Active')->latest()->get();
       
        return view('front.choosecity', compact('city','category'));
    }

    public function portfolio()
    {
        return view('front.portfolio');
    }

    public function portfolio_details()
    {
        return view('front.portfolio_details');
    }

    public function blog()
    {
        $category = BlogCategory::where('category_name', 'Important Blog')->first();
        $important_blog = Blog::where('status', 'Active')->where('important', 1)->latest()->get();
        $blog = Blog::with('blog_category')->where('status', 'Active')->latest()->get();
        return view('front.blog', compact('blog','important_blog'));
    }
    public function blog_page()
    {
        $category = BlogCategory::where('status', 'Active')->where('deleted_at', 0)->latest()->get();
        $tag = Tag::where('status', 'Active')->where('deleted_at', 0)->latest()->get();
        $blog = Blog::where('status', 'Active')->where('deleted_at', 0)->latest()->paginate(10);

        return view('front.blog_page', compact('blog', 'category', 'tag'));
    }
    
    public function blog_details($slug)
    {
        // $id = base64_decode($id);
        // print_r($id);exit;
        $category = BlogCategory::where('status', 'Active')->where('deleted_at', 0)->latest()->paginate(1);
        // print_r($category);die;
        $banner = Banner::where('status', 'Active')->where('type','Blog')->where('deleted_at', 0)->latest()->get();
        // $cate = BlogCategory::where('id', $id)->get();
        // print_r($cate);die; 

        $data = Blog::where('slug', $slug)->first();
        // print_r($data);die;
        $arj = Blog::where('category_id', $data->category_id)->where('id', '!=', $data->id)->where('status', 'Active')->get();
        // print_r($arj);die;
        $latestblog = Blog::where('status', 'Active')->where('type', 'image')->where('id', '!=', $data->id)->where('deleted_at', 0)->limit(9)->latest()->get();
        // $latestvideo = Blog::where('status', 'Active')->where('deleted_at', 0)->limit(5)->latest()->get();

        // $blogs= Blog::where('status', 'Active')->where('blog_id' == 'category_name' )->limit(3)->get();
        // print_r($blogs);die;
        
        return view('front.BlogDetailPage', compact('data', 'category', 'latestblog' ,'banner','arj'));
    }

    public function services()
    {
        return view('front.services');
    }

    
    public function faq()
    {
        return view('front.faq');
    }

  
    public function blog_filter(Request $request)
    {
        if($request->id){
        // print_r($request->job_type);exit;
        $category = $request->id;
            $results = Blog::where('category', $category)->where('status', 'Active')->get();
        }
        elseif($request->tag){
            $tag = $request->tag;
            $results = Blog::where('tag', 'like', '%' . $tag . '%')->where('status', 'Active')->get();
        }

        $html ="";
        if(!empty($results)){
            foreach($results as $val){
                $html .= '
                    <div class="col-12 col-sm-10 col-md-12 col-lg-6">
                        <div class="card blog-card border-0">
                            <div class="image-wrap"><a class="d-block" href='.route("blog_details",$val->slug).'><img
                                        src='.asset($val->medium_image).' alt=""></a></div>
                            <div class="card-body p-4 pb-2">
                                <div class="post-meta d-flex align-items-center justify-content-between mb-3"><span
                                        class="fz-14"><i class="me-1 bi bi-calendar"></i>'.$val->created_at->format('d M y').'</span><span
                                        class="fz-14"><i class="me-1 bi bi-eye"></i>'.$val->view_count.' Views </span></div>

                                <a class="post-title d-block mb-2" href='.route("blog_details",$val->slug).'>'.$val->title.'</a>
                                <p>'. Str::limit(strip_tags($val->description), 100) .'</p><a
                                    class="btn btn-primary btn-minimal" href='.route("blog_details",$val->slug).'>Continue reading...</a>
                                <div class="post-meta d-flex align-items-center justify-content-between mb-3"><span
                                        class="fz-14"><i class="me-1 bi bi-clock"></i>'.$val->min_read.' min read</span>
                                </div>
                            </div>
                        </div>                            
                    </div>';
            }
        }
        else{
            $html = "<p>No Data Found</p>";
        }
            
            return $html;
        // print_r($request->all());exit;
    }


}
