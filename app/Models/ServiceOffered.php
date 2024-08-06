<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOffered extends Model
{
    use HasFactory;

    protected $table = 'service_offered';

    public function category()
    {
        return $this->hasOne(Category::class, 'id','category_name');
    }

}
