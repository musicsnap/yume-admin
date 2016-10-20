<?php
/**
 * Created by PhpStorm.
 * User: Windows
 * Date: 2016/10/20
 * Time: 11:05
 */
//Laravel 用程序更新 .env 配置文件
function modifyEnv(array $data)
{
    $envPath = base_path() . DIRECTORY_SEPARATOR . '.env';
    $contentArray = collect(file($envPath, FILE_IGNORE_NEW_LINES));
    $contentArray->transform(function ($item) use ($data){
        foreach ($data as $key => $value){
            if(str_contains($item, $key)){
                return $key . '=' . $value;
            }
        }
        return $item;
    });
    $content = implode($contentArray->toArray(), "\n");
    \File::put($envPath, $content);
}
/**
$data = [
    'DB_HOST' => '127.0.0.1',
];
modifyEnv($data);
*/
//将项目自定义 env 友好输出为数组,这边的是在config目录中
function gEnv ( $key = '' , $name = 'env文件名' )
{
    $configPath = config_path () . DIRECTORY_SEPARATOR . $name . '.env';

    if ( ! \File::exists ( $configPath ) ) {
        return FALSE;
    }
    $data = collect ( file ( $configPath , FILE_IGNORE_NEW_LINES ) );
    $data->transform ( function ( $item ) {
        list( $key , $value ) = explode ( '=' , $item );
        $list[ $key ] = $value;

        return $list;
    } );
    $list = $data->toArray ();
    foreach ( $list as $value ) {
        foreach ( $value as $k => $v ) {
            $arr[ $k ] = $v;
        }
    }
    if(!empty($key)){
        return $arr[$key];
    }
    return $arr;
}
/**
$data = gEnv ();
$v = gEnv('key');
 */