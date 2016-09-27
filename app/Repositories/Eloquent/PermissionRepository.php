<?php
/**
 * Created by PhpStorm.
 * User: Windows
 * Date: 2016/9/19
 * Time: 14:16
 */
namespace App\Repositories\Eloquent;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\Eloquent\Repository;
class PermissionRepository extends Repository {

    public function model()
    {
        return Permission::class;
    }

    /**
     * @return mixed
     */
    public function getCount(){
        return $this->model->count();
    }

    /**
     * 获取角色列表
     */
    public function getPermissionList($orderSql,$order_dir,$start,$length){
        $Permission = $this->model->orderBy($orderSql,$order_dir)->skip($start)->take($length)->get();
        return $Permission;
    }
}