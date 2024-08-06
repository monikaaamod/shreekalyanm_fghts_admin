<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorRegistration extends Model
{
    use HasFactory;

    function vendor(){
        return $this->hasOne ('App\Models\Vendor','id');
        
    }

    protected $table = 'vendor_registration';
}
