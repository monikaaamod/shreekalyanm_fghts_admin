<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use HasFactory;
    protected $table = 'vendors';

    public function getAuthIdentifierName()
    {
        return 'register_mobile';
    }
    
    function banner_images(){
        return $this->hasMany('App\Models\BannerImage','vendor_id', 'id');
        
    }

    function past_work(){
        return $this->hasMany('App\Models\PastWork','vendor_id', 'id');
        
    }

    function past_video_approved(){
        return $this->hasMany('App\Models\PastWork','vendor_id', 'id')->where('is_image',0)->where('image_status',1);
        
    }
    function past_image_approved(){
        return $this->hasMany('App\Models\PastWork','vendor_id', 'id')->where('is_image',1)->where('image_status',1);
        
    }

    function past_work_video(){
        return $this->hasMany('App\Models\PastWork','vendor_id', 'id')->where('is_image',0)->limit(2);
        
    }

    function category(){
        return $this->hasOne(Category::class,'id', 'category_name');
        
    }
    function past_work_one(){
        return $this->hasOne('App\Models\PastWork','vendor_id', 'id')->where('is_image',1);
        
    }

    function document(){
        return $this->hasOne ('App\Models\Document','vendor_id', 'id');
        
    }

    function city(){
        return $this->hasOne ('App\Models\ServiceableCities','id', 'city_name');
        
    }

    function state_name(){
        return $this->hasOne (States::class,'id', 'state');
        
    }

    function service_offered(){
        return $this->hasMany(VendorService::class,'vendor_id', 'id')->with('service');
        
    }
   
    public function status()
    {
        return $this->belongsTo(VendorStatus::class);
    }

    function pp()
    {
        return $this->hasMany(PaymentPolicy::class, 'vendor_id', 'id')->where('is_cancellation',0);
    }

    function cancellation()
    {
        return $this->hasMany(PaymentPolicy::class, 'vendor_id', 'id')->where('is_cancellation',1);
    }

    function terms(){
        return $this->hasMany(Terms::class, 'vendor_id', 'id');
        
    }

    function wallet(){
        return $this->hasMany(Wallet::class, 'vendor_id', 'id')->where('payment_status','Success');
        
    }

    function review(){
        return $this->hasMany(Reviews::class, 'vendor_id', 'id');
        
    }

    function subs(){
        return $this->hasOne(Wallet::class, 'vendor_id', 'id');
        
    }

    function tax(){
        return $this->hasOne(Tax::class, 'category', 'category_name');
        
    }
}
