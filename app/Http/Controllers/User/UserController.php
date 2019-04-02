<?php

namespace App\Http\Controllers\User;

use App\Model\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function add()
    {
        $data = [
            'user' => str_random(6),
            'age' => rand(10, 60),
            'sex' => '男'
        ];


        $res = UserModel::insert($data);
        var_dump($res);
    }

    public function update($id)
    {
        $data = [
            'sex' => '女'
        ];
        $where = [
            'id' => $id
        ];
        $res = UserModel::where($where)->update($data);
        var_dump($res);
    }

    public function delete($id)
    {
        $where = [
            'id' => $id
        ];

        $res = UserModel::where($where)->delete();
        var_dump($res);
    }

//    public function userList(){
//
//        $list = UserModel::all();
//        $data = [
//            'aa' =>$list
//        ];
//       // print_r($list);
//        return view( 'userlist' , $data);
//    }

    /**
     * 用户注册
     */
    public function register(Request $request)
    {
        if (request()->isMethod('post')) {
            $pass = $request->input('u_pwd');
            $pass1 = password_hash($pass, PASSWORD_BCRYPT);

            $data = [
                'name' => $request->input('u_name'),
                'pwd' => $pass1,
                'age' => $request->input('u_age'),
                'email' => $request->input('u_email'),
                'reg_time' => time(),
            ];

            $uid = UserModel::insert($data);

            if ($uid) {

                header("Refresh:3;url=/center");

                echo '注册成功';
            } else {
                echo '注册失败';
            }
        } else {
            return view('users.register');
        }
    }

    /**
     *用户登录
     */
    public function login(Request $request)
    {
        if (request()->isMethod('post')) {
            $pass = $request->input('u_pwd');

            $where = [
                'name' => $request->input('u_name'),
            ];

            $uid = UserModel::where($where)->first();

            if ($uid) {
                if ($pass1 = password_verify($pass, $uid->pwd)) {

                    $token = substr(md5(time() . mt_rand(1, 99999)), 10, 10);

                    setcookie('uid', $uid->id, time() + 86400);

                    setcookie('token', $token, time() + 86400);

                    $request->session()->put('u_token', $token);

                    $request->session()->put('uid', $uid->uid);

                    header('Refresh:2;url=goodslist');
                    echo '登陆成功';
                } else {
                    echo '密码错误';
                }

            } else {
                header("Refresh:3;url=/register");
                echo '用户不存在';
            }
        } else {
            return view('users.login');
        }
    }


    public function center()
    {
        $data = [];
        return view('users.center', $data);
    }

    public function userList()
    {
        $username = $_COOKIE['username'];
        if ($username == 'test1') {
            UserModel::where(['name' => 'test1'])->update(['is_login' => '在线']);
            UserModel::where(['name' => 'test2'])->update(['is_login' => '下线']);
            UserModel::where(['name' => 'test3'])->update(['is_login' => '下线']);
            $res = UserModel::all();
            $data = [
                'aa' => $res
            ];
            // print_r($list);
            return view('userlist', $data);
        }else if ($username == 'test2') {
            UserModel::where(['name' => 'test1'])->update(['is_login' => '下线']);
            UserModel::where(['name' => 'test2'])->update(['is_login' => '在线']);
            UserModel::where(['name' => 'test3'])->update(['is_login' => '下线']);
            $res = UserModel::all();
            $data = [
                'aa' => $res
            ];
            // print_r($list);
            return view('userlist', $data);
        }else if ($username == 'test3') {
            UserModel::where(['name' => 'test1'])->update(['is_login' => '下线']);
            UserModel::where(['name' => 'test2'])->update(['is_login' => '下线']);
            UserModel::where(['name' => 'test3'])->update(['is_login' => '在线']);
            $res = UserModel::all();
            $data = [
                'aa' => $res
            ];
            // print_r($list);
            return view('userlist', $data);
        }else{
            UserModel::where(['name' => 'test1'])->update(['is_login' => '下线']);
            UserModel::where(['name' => 'test2'])->update(['is_login' => '下线']);
            UserModel::where(['name' => 'test3'])->update(['is_login' => '下线']);
            $res = UserModel::all();
            $data = [
                'aa' => $res
            ];
            // print_r($list);
            return view('userlist', $data);
        }


    }
}

