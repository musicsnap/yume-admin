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

//用户管理
$router->get('user/role/{id}','UserController@role');
$router->post('user/saverole/{id}','UserController@saverole');
$router->resource('user','UserController');

//角色管理
$router->get('role/permission/{id}','RoleController@permission');
$router->post('role/saverolepermission/{id}','RoleController@saverolepermission');
$router->resource('role','RoleController');

//权限管理
$router->resource('permission','PermissionController');

$router->get('log/total','LogController@index');


