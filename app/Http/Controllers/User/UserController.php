<?php

namespace App\Http\Controllers\User;

use App\Model\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function user(){
        $user = UserModel::where('id' , '=' , 1)->first()->toArray();
        echo '<pre/>';
        print_r($user);
    }
}
