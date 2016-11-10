<?php
/**
 * Created by PhpStorm.
 * User: Windows
 * Date: 2016/11/9
 * Time: 16:51
 */
namespace App\Factory;
use Illuminate\Support\Facades\Facade;

class Payment extends Facade{
    /**
     * 这个是重写,测试实现Facade门面
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'payment';
    }

}