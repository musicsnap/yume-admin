<?php
/**
 * Created by PhpStorm.
 * User: Windows
 * Date: 2016/9/19
 * Time: 14:16
 */
namespace App\Repositories\Eloquent;
use App\Models\Role;
use App\Repositories\Eloquent\Repository;
class RoleRepository extends Repository {

    public function model()
    {
        return Role::class;
    }


    public function getRole(){
        return $this->model->get();
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
    public function getRoleList($orderSql,$order_dir,$start,$length){
        $role = $this->model->orderBy($orderSql,$order_dir)->skip($start)->take($length)->get();
        return $role;
    }
}