<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flights extends Model
{
    use HasFactory;
    protected $table = "flights";

    public function airlines_detail()
    {
        return $this->hasOne('App\Models\Airlines','id','airline');
    }

    public function aircraft_detail()
    {
        return $this->hasOne('App\Models\Aircraft','id','aircraft');
    }

    public function departure_airport_detail()
    {
        return $this->hasOne('App\Models\Airport','code','departure_airport');
    }

    public function arrival_airport_detail()
    {
        return $this->hasOne('App\Models\Airport','code','arrival_airport');
    }
}
