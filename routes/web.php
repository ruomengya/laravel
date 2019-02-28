<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['log.click'])->group(function(){
Route::any('/test/guzzle','Test\TestController@guzzleTest');
Route::get('/test/cookie1','Test\TestController@cookieTest1');
Route::get('/test/cookie2','Test\TestController@cookieTest2');
Route::get('/test/session','Test\TestController@sessionTest');
Route::get('/test/mid1','Test\TestController@mid1')->middleware('check.uid');        //中间件测试
Route::get('/test/check_cookie','Test\TestController@checkCookie')->middleware('check.cookie');
});

Route::any('/user','User\UserController@user');

Route::any('/user/add','User\UserController@add');

Route::any('/user/update/{id}','User\UserController@update');

Route::any('/user/delete/{id}','User\UserController@delete');

Route::any('/user/list','User\UserController@userList');

//Route::any('/register','User\UserController@register');

//Route::any('/login','User\UserController@login');

Route::any('/center','User\UserController@center');

Route::get('/mvc/bst','Mvc\MvcController@bst');


Route::get('/test/check_cookie','Test\TestController@checkCookie');

Route::get('/cart','Cart\IndexController@index');  //中间件测试

Route::any('/cartdel/{goods_id}','Cart\IndexController@cartDel');

Route::any('/cartshow','Cart\IndexController@index');

Route::any('/goodslist','Goods\GoodsController@goodsList');

Route::any('/cartlist/{goods_id}','Goods\GoodsController@index');

Route::any('/cartAdd','Cart\IndexController@cartAdd');

Route::any('/orderadd','Order\IndexController@orderAdd');

Route::any('/orderlist','Order\IndexController@orderList');

Route::any('/ordershow','Order\IndexController@orderShow');



Route::any('/pay/{order_id}','Pay\AlipayController@pay');

Route::get('/pay/alipay/test','Pay\AlipayController@test');

Route::any('/crontab/orderdel','Crontab\IndexController@orderDelete');

//同步异步
Route::post('pay/alipay/notify','Pay\AlipayController@aliNotify');//异步

Route::get('pay/alipay/return','Pay\AlipayController@aliReturn');//同步
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//微信
Route::get('/weixin/refresh_token','Weixin\WeixinController@refreshToken');     //刷新token
Route::get('/weixin/test/token','Weixin\WeixinController@test');
Route::get('/weixin/valid','Weixin\WeixinController@validToken');
Route::get('/weixin/valid1','Weixin\WeixinController@validToken1');
Route::post('/weixin/valid1','Weixin\WeixinController@wxEvent');        //接收微信服务器事件推送
Route::post('/weixin/valid','Weixin\WeixinController@validToken');
Route::get('/weixin/create_menu','Weixin\WeixinController@createMenu');     //创建菜单.


Route::get('/form/show','Weixin\WeixinController@formShow');     //表单测试
Route::post('/form/test','Weixin\WeixinController@formTest');     //表单测试




Route::get('/weixin/material/list','Weixin\WeixinController@materialList');     //获取永久素材列表
Route::get('/weixin/material/upload','Weixin\WeixinController@upMaterial');     //上传永久素材
Route::post('/weixin/material','Weixin\WeixinController@materialTest');     //创建菜单
//Route::post('/weixin/material','Weixin\WeixinController@materialTest');     //创建菜单

Route::get('/kefu/show/{id}','Weixin\WeixinController@kefu');     //客服测试
Route::get('/kefu/chat','Weixin\WeixinController@chat');     //聊天测试
Route::post('/chat/msg','Weixin\WeixinController@chatmsg');  //客服发送消息


//微信支付
Route::get('/weixin/pay/test/{id}','Weixin\PayController@test');     //微信支付测试
Route::post('/weixin/pay/notice','Weixin\PayController@notice');     //微信支付通知回调
Route::get('/weixin/pay/wxsuccess','Weixin\PayController@WxSuccess');   //微信支付测试


Route::get('/weixin/pay/wxsuccess','Weixin\PayController@WxSuccess');   //微信支付测试

Route::any('/wxlogin','Weixin\WxuserController@Login');   //微信扫码登录

Route::any('/wxlogin2','Weixin\WxuserController@Login2');   //微信扫码登录