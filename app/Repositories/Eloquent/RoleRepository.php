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


    public function updateRole($request){
        $role = $this->model->find($request->id);
        if ($role) {
            $isUpdate = $role->update($request->all());
            if ($isUpdate) {
                flash('修改角色成功', 'success');
                return true;
            }
            flash('修改角色失败', 'error');
            return false;
        }
        abort(404,'角色数据找不到');
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroyRole($id)
    {
        $isDelete = $this->model->destroy($id);
        if ($isDelete) {
            flash('删除角色成功', 'success');
            return true;
        }
        flash('删除角色失败', 'error');
        return false;
    }
}