<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorService extends Model
{
    use HasFactory;

    protected $table = 'vendor_service';

    public function service()
    {
        return $this->hasOne(ServiceOffered::class, 'id', 'service_id');
    }
    

}
