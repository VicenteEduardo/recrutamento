<?php

namespace App\Classes;

use App\Models\UserPermisson;
use Illuminate\Support\Facades\Auth;



class UserPermission
{

    public function permission()
    {
       return UserPermisson::where('fk_user',Auth::user()->id)->get();


    }
}
