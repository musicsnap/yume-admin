<?php
/**
 * Created by PhpStorm.
 * User: Windows
 * Date: 2016/11/17
 * Time: 14:34
 */

namespace App\Repositories\Eloquent;
use App\Repositories\Eloquent\Repository;
use App\Models\Menu;
class PaymentRepository extends Repository {
    public function model()
    {
        return Menu::class;
    }

}