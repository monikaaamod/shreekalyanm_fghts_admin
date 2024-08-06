<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontUser extends Model
{

    // protected $guard = 'front_users';

    use HasFactory;
    protected $table = 'front_users';

    public function wallet()
    {
        return $this->hasMany(Wallet::class,'user_id','user_id')->where('type','Wallet');
    }

    public function promo()
    {
        return $this->hasMany(Wallet::class,'user_id','user_id')->where('type','Promo');
    }
}
