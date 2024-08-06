<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvenienceFee extends Model
{
    use HasFactory;

    protected $table = 'convenience_fee';
    

    public function product()
    {
        return $this->hasOne('App\Models\Product','id','product_id');
    }
    
}
