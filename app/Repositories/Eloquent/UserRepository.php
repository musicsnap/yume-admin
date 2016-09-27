<?php
/**
 * Created by PhpStorm.
 * User: Windows
 * Date: 2016/9/19
 * Time: 14:38
 */
namespace App\Repositories\Eloquent;
use App\Repositories\Eloquent\Repository;
use App\User;

class UserRepository extends Repository {

    public function model()
    {
        // TODO: Implement model() method.

        return User::class;
    }

    public function getCount(){
        return $this->model->count();
    }

    public function getUserList($orderSql,$order_dir,$start,$length){
        $userlist =  $this->model->orderBy($orderSql,$order_dir)->skip($start)->take($length)->get();
        if(!empty($userlist)){
            foreach ($userlist as $key=>$item){
                if($item->roles->toArray()){
                    foreach ($item->roles as $role) {
                        $userlist[$key]['role'] = $role->display_name;
                    }
                }else{
                    $userlist[$key]['role'] = '';
                }
            }
        }
        return $userlist;
    }

    public function updateUser($request){
        $user = $this->model->find($request->id);
        if ($user) {

            $isUpdate = $user->update($request->all());
            if ($isUpdate) {
                flash('修改用户成功', 'success');
                return true;
            }
            flash('修改用户失败', 'error');
            return false;
        }
        abort(404,'用户数据找不到');
    }


}