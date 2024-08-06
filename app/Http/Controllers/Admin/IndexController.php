<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller
{
    public function index()
    {
        // print_r('dsfdsf');exit;

        $user = User::find(1);
        if ($user->hasRole('Admin')) {
        }
        else{
            $role = Role::where('name', 'Admin')->first();
            $user->roles()->attach($role);
        }
        
        return view('admin.index');
    }
}
