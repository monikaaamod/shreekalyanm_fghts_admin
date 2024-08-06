<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourCity extends Model
{
    use HasFactory;
    protected $table = 'tour_cities';

    public function country()
    {
        return $this->hasOne(TourCountry::class,'id', 'country_id');
    }
}
