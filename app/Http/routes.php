<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


//后台路由
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>['auth']],function ($router){
//    $router->get('/','IndexController@index');
    //首页路由
    require __DIR__.'/Routes/AdminRoute.php';
    //菜单路由
    require __DIR__.'/Routes/MenuRoute.php';
});
