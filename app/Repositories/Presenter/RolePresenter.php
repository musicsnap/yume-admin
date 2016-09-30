<?php
/**
 * Created by PhpStorm.
 * User: Windows
 * Date: 2016/9/19
 * Time: 14:23
 */

namespace App\Repositories\Presenter;

class RolePresenter{

    /**
     * 这个下拉菜单html
     * @param $menus
     * @return string
     */
    public function getMenu($role)
    {
        if ($role) {
            $option = '<option value="0">请选择角色</option>';
            foreach ($role as $v) {
                $option .= '<option value="'.$v->id.'">'.$v->name.'--'.$v->display_name.'</option>';
            }
            return $option;
        }
        return '<option value="0">请选择角色</option>';
    }
}