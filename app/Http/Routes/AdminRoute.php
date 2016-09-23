<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/12
 * Time: 6:24
 */
//后台路由单独文件
$router->get('/','IndexController@index');
$router->resource('index','IndexController');
$router->resource('user','UserController');
$router->resource('role','RoleController');
$router->resource('permission','PermissionController');