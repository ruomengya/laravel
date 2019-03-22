<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function test(){
        $data = [
            'name' => '张三',
            'sex'  => '男',
            'age'  => '12',
        ];

        $str_data = json_encode($data);
        $key = 'pass';
        $t = time();
        $iv = substr(md5($t),6,16);
        $en = openssl_encrypt($str_data , 'AES-128-CBC' , $key , OPENSSL_RAW_DATA  , $iv );
        $en = base64_encode($en);

        $prikey = file_get_contents('./key/priv1.key');
        $res = openssl_get_privatekey($prikey);
        ($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');
        openssl_sign($en , $sign , $res ,OPENSSL_ALGO_SHA256);

        $sign = base64_encode($sign);

        $info = [
            'sign' => $sign,
            'data' => $en,
            't' => $t
        ];
        $url = 'http://lumen.com/rsa/test';
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$info);
        $rs = curl_exec($ch);
        var_dump($rs);die;
        curl_close($ch);
    }

    public function index(Request $request){
        $is_login = $request->get('is_login');
        $url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        $data =[
            'url' => urlencode($url),
            'is_login' => $is_login
        ];

        return view('welcome' , $data);
    }
}
