<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourState extends Model
{
    use HasFactory;
    protected $table = 'tour_states';

    public function country()
    {
        return $this->hasOne(TourCountry::class,'id', 'country_id');
    }
}
