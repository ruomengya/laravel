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