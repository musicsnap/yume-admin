<?php
/**
 * Created by PhpStorm.
 * User: Windows
 * Date: 2016/9/12
 * Time: 13:20
 */

namespace App\Repositories\Eloquent;
use App\Repositories\Eloquent\Repository;
use App\Models\Menu;
use Cache;
class MenuRepository extends Repository
{

    public function model()
    {
        return Menu::class;
    }

    /**
     * 递归回去菜单
     * @param $menus
     * @param int $pid
     * @return array|string
     */
    public function sortMenu($menus,$pid=0)
    {
        $arr = [];
        if (empty($menus)) {
            return '';
        }
        foreach ($menus as $key => $v) {
            if ($v['parent_id'] == $pid) {
                $arr[$key] = $v;
                $arr[$key]['child'] = self::sortMenu($menus,$v['id']);
            }
        }
        return $arr;
    }

    /**
     * 菜单排序并设置缓存
     * @return array|string
     */
    public function sortMenuSetCache()
    {
        $menus = $this->model->orderBy('sort','desc')->get()->toArray();
        if ($menus) {
            $menuList = $this->sortMenu($menus);
            foreach ($menuList as $key => &$v) {
                if ($v['child']) {
                    $sort = array_column($v['child'], 'sort');
                    array_multisort($sort,SORT_DESC,$v['child']);
                }
            }
            Cache::forever('menulist',$menuList);
            return $menuList;
        }
        return '';
    }

    /**
     * 获取菜单列表
     * @return array|string
     */
    public function getMenuList()
    {
//        if (Cache::has('menulist')) {
//            return Cache::get('menulist');
//        }
        return $this->sortMenuSetCache();
    }

    public function editMenu($id)
    {
        $menu = $this->model->find($id)->toArray();
        if ($menu) {
            $menu['update'] = url('admin/menu/'.$id);
            $menu['msg'] = '加载成功';
            $menu['status'] = true;
            return $menu;
        }
        return ['status' => false,'msg' => '加载失败'];
    }

    public function updateMenu($request)
    {
        $menu = $this->model->find($request->id);
        if ($menu) {

            $isUpdate = $menu->update($request->all());
            if ($isUpdate) {
                $this->sortMenuSetCache();
                flash('修改菜单成功', 'success');
                return true;
            }
            flash('修改菜单失败', 'error');
            return false;
        }
        abort(404,'菜单数据找不到');
    }

    public function destroyMenu($id){
        $isDelete = $this->model->destroy($id);
        if ($isDelete) {
            // 更新缓存数据
            $this->sortMenuSetCache();
            flash('删除菜单成功', 'success');
            return true;
        }
        flash('删除菜单失败', 'error');
        return false;
    }
}