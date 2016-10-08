<?php
/**
 * Created by PhpStorm.
 * User: Windows
 * Date: 2016/10/8
 * Time: 16:04
 */
namespace App\Repositories\Presenter;

class PermissionPresenter
{

    public function getParentPermission($permissions,$id=0)
    {
        if ($permissions) {
            $option = '<option value="0">父级权限</option>';
            foreach ($permissions as $v) {
                if($v->id==$id){
                    $option .= '<option selected  value="'.$v->id.'">'.$v->display_name.'</option>';
                }else{
                    $option .= '<option  value="'.$v->id.'">'.$v->display_name.'</option>';
                }
            }
            return $option;
        }
        return '<option value="0">父级权限</option>';
    }
}
