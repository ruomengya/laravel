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

Route::any('/user','User\UserController@user');

Route::any('/user/add','User\UserController@add');

Route::any('/user/update/{id}','User\UserController@update');

Route::any('/user/delete/{id}','User\UserController@delete');

Route::any('/user/list','User\UserController@userList');

Route::any('/register','User\UserController@register');

Route::any('/login','User\UserController@login');

Route::any('/center','User\UserController@center');

Route::get('/mvc/bst','Mvc\MvcController@bst');


Route::get('/test/check_cookie','Test\TestController@checkCookie')->middleware('check.cookie');

Route::get('/cart','Cart\IndexController@index')->middleware('check.login');  //中间件测试

Route::any('/cartdel/{goods_id}','Cart\IndexController@cartDel')->middleware('check.login');

Route::any('/cartshow','Cart\IndexController@index')->middleware('check.login');

Route::any('/goodslist','Goods\GoodsController@goodsList')->middleware('check.login');

Route::any('/cartlist/{goods_id}','Goods\GoodsController@index')->middleware('check.login');

Route::any('/cartAdd','Cart\IndexController@cartAdd')->middleware('check.login');

Route::any('/orderadd','Order\IndexController@orderAdd')->middleware('check.login');

Route::any('/orderlist','Order\IndexController@orderList')->middleware('check.login');

Route::any('/ordershow','Order\IndexController@orderShow')->middleware('check.login');

Route::any('/pay/{order_id}','Pay\AlipayController@pay')->middleware('check.login');

Route::get('/pay/alipay/test','Pay\AlipayController@test')->middleware('check.login');

//同步异步
Route::post('pay/alipay/notify','Pay\AlipayController@aliNotify')->middleware('check.login');//异步

Route::get('pay/alipay/return','Pay\AlipayController@aliReturn')->middleware('check.login'); //同步