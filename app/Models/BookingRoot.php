<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRoot extends Model
{
    use HasFactory;
    protected $table = "booking_root";
    
    public function root_ticket()
    {
        return $this->hasMany('App\Models\BookingTickets','booking_id','booking_id');
    }

}
