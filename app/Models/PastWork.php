<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastWork extends Model
{
    use HasFactory;

    protected $table = 'past_work';
    protected $fillable = [
        'vendor_id',
        'pastimage',
        'is_image'
    ];

    public function vendor()
    {
        return $this->hasOne(Vendor::class,'id','vendor_id');
    }

}
