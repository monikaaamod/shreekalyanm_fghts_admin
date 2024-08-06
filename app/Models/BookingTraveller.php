<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingTraveller extends Model
{
    use HasFactory;
    protected $table = "booking_travellers";
    
    public function ticket()
    {
        return $this->hasMany('App\Models\BookingTickets','booking_traveller_id','id');
    }
    public function root()
    {
        return $this->hasOne('App\Models\BookingRoot','bookingroot','id');
    }
}
