<?php
/**
 * Created by PhpStorm.
 * User: Windows
 * Date: 2016/9/12
 * Time: 13:51
 */

 namespace App\Repositories\Presenter;

 class MenuPresenter
  {

     /**
      * 这个下拉菜单html
      * @param $menus
      * @return string
      */
     public function getMenu($menus)
      {
         if ($menus) {
             $option = '<option value="0">顶级菜单</option>';
             foreach ($menus as $v) {
                     $option .= '<option value="'.$v->id.'">'.$v->name.'</option>';
             }
             return $option;
          }
          return '<option value="0">顶级菜单</option>';
      }

     /**
      * 返回菜单信息html
      * @param $menus
      * @return string
      */
     public function getMenuList($menus)
     {
         if ($menus) {
             $item = '';
             foreach ($menus as $v) {
                 $item.= $this->getNestableItem($v);
             }
             return $item;
         }
         return '暂无菜单';
     }

     /**
      * 这是获取菜单列表展示信息
      * @param $menu
      * @return string
      */
     protected function getNestableItem($menu)
     {
         if ($menu['child']) {
             return $this->getHandleList($menu['id'],$menu['name'],$menu['child']);
         }
         if ($menu['parent_id'] == 0) {
             return '<li class="dd-item dd3-item" data-id="'.$menu['id'].'"><div class="dd-handle dd3-handle"> </div><div class="dd3-content"> '.$menu['name'].$this->getActionButtons($menu['id']).' </div></li>';
         }
         return '<li class="dd-item dd3-item" data-id="'.$menu['id'].'"><div class="dd-handle dd3-handle"> </div><div class="dd3-content"> '.$menu['name'].$this->getActionButtons($menu['id'],false).' </div></li>';
     }

     /**
      * 遍历子菜单
      * @param $id
      * @param $name
      * @param $child
      * @return string
      */
     protected function getHandleList($id,$name,$child)
     {
         $handle = '<li class="dd-item dd3-item" data-id="'.$id.'"><div class="dd-handle dd3-handle"> </div><div class="dd3-content"> '.$name.$this->getActionButtons($id).' </div><ol class="dd-list">';
         if ($child) {
             foreach ($child as $v) {
                 $handle .= $this->getNestableItem($v);
             }
         }
         $handle .= '</ol></li>';
         return $handle;
     }



     /**
      * 菜单按钮,处理增删改
      * @param $id
      * @param bool $bool
      * @return string
      */
     protected function getActionButtons($id,$bool = true)
     {
         $action = '<div class="pull-right action-buttons">';
         if (auth()->user()->can('admin.menus.add') && $bool) {
             $action .= '<a href="javascript:;" data-pid="'.$id.'" class="btn-xs createMenu" data-toggle="tooltip"data-original-title="添加"  data-placement="top"><i class="fa fa-plus"></i></a>';
         }

         if (auth()->user()->can('admin.menus.edit')) {
             $action .= '<a href="javascript:;" data-href="'.url('admin/menu/'.$id.'/edit').'" class="btn-xs editMenu" data-toggle="tooltip"data-original-title="修改"  data-placement="top"><i class="fa fa-pencil"></i></a>';
         }

         if (auth()->user()->can('admin.menus.delete')) {
             $action .= '<a href="javascript:;" class="btn-xs destoryMenu" data-id="'.$id.'" data-original-title="删除"data-toggle="tooltip"  data-placement="top"><i class="fa fa-trash"></i><form action="'.url('admin/menu',[$id]).'" method="POST" name="delete_item'.$id.'" style="display:none"><input type="hidden"name="_method" value="delete"><input type="hidden" name="_token" value="'.csrf_token().'"></form></a>';         }
         $action .= '</div>';
         return $action;
     }

     public function sidebarMenus($menus)
     {
         $html = '';
         if ($menus) {
             $html = '';
             foreach ($menus as $v) {
                 if (empty($v['slug']) || auth()->user()->can($v['slug'])) {
                     if ($v['child']) {
                         $html .= ' <li class="nav-item '.active_class(if_uri_pattern(explode(',',$v['heightlight_url'])),' active open').'"><a href="javascript:;" class="nav-link nav-toggle"><i class="'.$v['icon'].'"></i><span class="title">'.$v['name'].'</span><span class="'.active_class(if_uri([$v['heightlight_url']]), 'selected').'"></span><span class="arrow '.active_class(if_uri([$v['heightlight_url']]), 'open').'"></span></a>'.$this->getSidebarChildMenu($v['child']).'</li>';
                     }else{
                         $html .= '<li class="nav-item '.active_class(if_uri([$v['heightlight_url']]),' active open').'"><a href="'.$v['url'].'" class="nav-link"><i class="'.$v['icon'].'"></i><span class="title">'.$v['name'].'</span><span class="'.active_class(if_uri([$v['heightlight_url']]), 'selected').'"></span></a></li>';
                     }
                 }
             }
             $html .= '';
         }
         return $html;
     }


     public function getSidebarChildMenu($childMenu='')
     {
         $html = '';
         if ($childMenu) {
             $html = '<ul  class="sub-menu" style="display:'.active_class(if_uri_pattern(['admin/menu*','admin/user*','admin/role*','admin/permission*']),'block','none').'">';
             foreach ($childMenu as $v) {
                 if (empty($v['slug']) ||  auth()->user()->can($v['slug'])) {
                     if ($v['child']) {
                         $html .= ' <li class="nav-item '.active_class(if_uri_pattern(explode(',',$v['heightlight_url'])),' active open').' "><a href="javascript:;" class="nav-link nav-toggle"><i class="'.$v['icon'].'"></i><span class="title">'.$v['name'].'</span> <span class="'.active_class(if_uri([$v['heightlight_url']]), 'selected').'"></span> <span class="arrow '.active_class(if_uri([$v['heightlight_url']]), 'open').'"></span></a>'.$this->getSidebarChildMenu($v['child']).'</li>';
                     }else{
                         $html .= '<li class="nav-item '.active_class(if_uri([$v['heightlight_url']]),' active open').'"><a href="'.$v['url'].'" class="nav-link"><i class="'.$v['icon'].'"></i> <span class="title">'.$v['name'].'</span><span class="'.active_class(if_uri([$v['heightlight_url']]), 'selected').'"></span></a></li>';
                     }
                 }
             }
             $html .= '</ul>';
         }
         return $html;
     }
  }
