<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Eloquent\Repository;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\MenuRepository;
class MenuController extends Controller
{
    private $menu;

    public function __construct(MenuRepository $menu)
    {
        $this->menu = $menu;
    }

    public function index()
    {
//        $menu = $this->menu->findByField('parent_id',0);
        $menu = $this->menu->all();
        $menuList = $this->menu->getMenuList();
        return view('admin.menu.index')->with(compact('menu','menuList'));
    }

    public function store(MenuRequest $request)
    {
        $result = $this->menu->create($request->all());
        $this->menu->sortMenuSetCache();
        if ($result) {
            flash('添加菜单成功', 'success');
        }else{
            flash('添加菜单失败', 'error');
        }
        return redirect('admin/menu');
    }

    /**
     * 修改菜单
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $menu = $this->menu->editMenu($id);
        return response()->json($menu);
    }

    /**
     * 保存修改菜单
     * @param MenuRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(MenuRequest $request)
    {
        $this->menu->updateMenu($request);
        return redirect('admin/menu');
    }

    /**
     * 删除菜单
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id){
        $this->menu->destroyMenu($id);
        return redirect('admin/menu');
    }
}
