<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function vendor()
    {
        return $this->hasMany(Vendor::class, 'category_name','id')->limit(4);
    }

    public function single_vendor()
    {
        return $this->hasOne(Vendor::class, 'category_name','id')->limit(4);
    }
}
