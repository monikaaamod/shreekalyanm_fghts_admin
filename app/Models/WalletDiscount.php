<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletDiscount extends Model
{
    use HasFactory;

    protected $table = 'wallet_discounts';


    public function product()
    {
        return $this->hasOne('App\Models\Product','id','product_id');
    }
    public function supplier()
    {
        return $this->hasOne('App\Models\Supplier','id','supplier_id');
    }

}
