<?php

namespace App\Http\Controllers\User;

use App\Model\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function add(){
        $data = [
            'user' => str_random( 6 ),
            'age'  => rand( 10 , 60),
            'sex'  => '男'
        ];


        $res = UserModel::insert($data);
        var_dump($res);
    }

    public function update($id){
        $data = [
            'sex' => '女'
        ];
        $where = [
            'id' => $id
        ];
        $res = UserModel::where($where)->update($data);
        var_dump($res);
    }

    public function delete($id){
        $where = [
            'id' => $id
        ];

        $res = UserModel::where($where)->delete();
        var_dump($res);
    }

    public function userList(){

        $list = UserModel::all();
        $data = [
            'a' =>$list
        ];
       // print_r($list);
        return view( 'userlist' , $data);
    }
}
