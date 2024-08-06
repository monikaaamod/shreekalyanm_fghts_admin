<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = "booking";

    public function vendor_detail()
    {
        return $this->hasOne('App\Models\Vendor','id','vendor_id');
    }
    public function corporate_detail()
    {
        return $this->hasOne('App\Models\Corporate','user_id','coroprate_id');
    }
    public function wallet_transaction()
    {
        return $this->hasOne('App\Models\WalletTransaction','vendor_id','vendor_id');
    }
    public function booking_root()
    {
        return $this->hasMany('App\Models\BookingRoot','booking_id','booking_id');
    }
    public function booking_travellers()
    {
        return $this->hasMany('App\Models\BookingTraveller','booking_id','booking_id')->with('ticket');
    }

    public function payment_modes()
    {
        return $this->hasOne('App\Models\PaymentMode','id','payment_mode');
    }
}
