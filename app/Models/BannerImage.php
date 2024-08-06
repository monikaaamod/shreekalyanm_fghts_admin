<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerImage extends Model
{
    use HasFactory;

    protected $table = 'banner_images';
    protected $fillable = [
        'vendor_id',
        'banner_images'
    ];

    protected $casts = [
        'banner_images' => 'array'
    ];
}
