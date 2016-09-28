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

    public function createUser($request)
    {
        $username = $request->input('username', '');
        $email = $request->input('email', '');
        $password = $request->input('password', '');
        $result = $this->model->create(
            [
                'username'=>$username,
                'email'=>$email,
                'password'=>bcrypt($password),
            ]
        );
        if ($result) {
            flash('添加用户成功', 'success');
            return true;
        }else{
            flash('添加用户失败', 'error');
            return false;
        }
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

    public function destroyUser($id){
        $isDelete = $this->model->destroy($id);
        if ($isDelete) {
            flash('删除用户成功', 'success');
            return true;
            //这边是否要同时删除此用户的对于的角色信息

        }
        flash('删除用户失败', 'error');
        return false;
    }


}