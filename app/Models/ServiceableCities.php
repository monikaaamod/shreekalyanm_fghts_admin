<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceableCities extends Model
{
    use HasFactory;

    

    function state_names(){
        return $this->hasOne('App\Models\States','id', 'state_name');
        
    }

    function city_names(){
        return $this->hasOne('App\Models\City', 'id', 'city_name');
        
    }


    protected $table = 'serviceablecities';

}
