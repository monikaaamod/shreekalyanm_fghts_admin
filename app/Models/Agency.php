<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;
    protected $table = 'agency';

    public function country_name()
    {
        return $this->hasOne(TourCountry::class,'id','country');
    }

    public function state_name()
    {
        return $this->hasOne(TourState::class,'id','state');
    }

    public function city_name()
    {
        return $this->hasOne(TourCity::class,'id','city');
    }

}
