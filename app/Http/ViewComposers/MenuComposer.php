<?php
/**
 * Created by PhpStorm.
 * User: Windows
 * Date: 2016/9/18
 * Time: 13:14
 */
namespace App\Http\ViewComposers;
use Illuminate\Contracts\View\View;
use App\Repositories\Eloquent\MenuRepository;
class MenuComposer
{
    /**
     * 用户仓库实现.
     *
     * @var UserRepository
     */
    protected $menu;
    /**
     * 创建一个新的属性composer.
     *
     * @param UserRepository $menu
     * @return void
     */
    public function __construct(MenuRepository $menu)
    {
        // Dependencies automatically resolved by service container...
        $this->menu = $menu;
    }
    /**
     * 绑定数据到视图.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('slidebarMenus', $this->menu->getMenuList());
    }
}