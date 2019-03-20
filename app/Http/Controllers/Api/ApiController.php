<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp;

class ApiController extends Controller
{
    //
    public function test(){

        $url = 'http://whw.api.com/test.php?type=2';
        $client = new GuzzleHttp\Client();
        $r = $client->request('GET',$url);
        echo $r->getbody();

    }

    public function test1(Request $request){
        $name = $request -> input('name');
        if($name){
            $response = [
                'error' => '0',
                'msg'   => '收到的数据是'.$name
            ];
        }else{
            $response = [
                'error' => '4003',
                'msg'   => '失败'
            ];
        }
        return $response;
    }
}
