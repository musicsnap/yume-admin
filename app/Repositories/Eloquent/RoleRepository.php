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

    /**
     * 获取角色列表
     */
    public function getRoleList(){
        $role = $this->model->get();
        return $role;
    }
}