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

    /**
     * 修改权限信息
     * @param $request
     */
    public function updatePermission($request){
        $permisssion = $this->model->find($request->id);
        if ($permisssion) {
            $isUpdate = $permisssion->update($request->all());
            if ($isUpdate) {
                flash('修改权限成功', 'success');
                return true;
            }
            flash('修改权限失败', 'error');
            return false;
        }
        abort(404,'权限数据找不到');
    }
}