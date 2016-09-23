<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;
class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $backend = Menu::create([

            'name' => '控制台',

            'parent_id' => '0',

            'url' => '/admin',

            'heightlight_url' => 'admin',

            'icon'=>'icon-home'

        ]);

        $system = Menu::create([

            'name' => '系统管理',

            'parent_id' => '0',

            'slug' => 'admin.system.manage',

            'url' => '/admin',

            'heightlight_url' => 'admin/menu*,admin/user*,admin/role*,admin/permission*',

            'icon'=>'icon-settings'

        ]);

       $menus =  Menu::create([

            'name' => '菜单管理',

            'parent_id' => $system->id,

            'slug' => 'admin.menus.manage',

            'url' => '/admin/menu',

           'heightlight_url' => 'admin/menu',

        ]);

      $users =   Menu::create([

            'name' => '用户管理',

            'parent_id' => $system->id,

            'slug' => 'admin.users.manage',

            'url' => '/admin/user',

           'heightlight_url' => 'admin/user',

          'icon'=>'icon-user'

        ]);

        Menu::create([

            'name' => '用户列表',

            'parent_id' => $users->id,

            'slug' => 'admin.users.list',

            'url' => '/admin/user',

            'heightlight_url' => 'admin/user',

            'icon'=>'fa fa-user'

        ]);

        Menu::create([

            'name' => '用户添加',

            'parent_id' => $users->id,

            'slug' => 'admin.users.add',

            'url' => '/admin/user/create',

            'heightlight_url' => 'admin/user/create',

            'icon'=>'fa fa-user-plus'

        ]);

        Menu::create([

            'name' => '权限管理',

            'parent_id' => $system->id,

            'slug' => 'admin.permissions.manage',

            'url' => '/admin/permission',

            'heightlight_url' => 'admin/permission',

        ]);


        Menu::create([

            'name' => '角色管理',

            'parent_id' => $system->id,

            'slug' => 'admin.roles.manage',

            'url' => '/admin/role',

            'heightlight_url' => 'admin/role',

        ]);

        $html = Menu::create([

            'name' => 'web前端',

            'parent_id' => '0',

            'url' => 'yume.com',

        ]);

        Menu::create([

            'name' => 'ReactJs',

            'parent_id' => $html->id,

            'url' => 'yume.com',

        ]);

        Menu::create([

            'name' => 'JavaScript',

            'parent_id' => $html->id,

            'url' => 'yume.com',

        ]);

        Menu::create([

            'name' => 'AngularJs',

            'parent_id' => $html->id,

            'url' => 'yume.com',

        ]);

        Menu::create([

            'name' => 'NodeJs',

            'parent_id' => $html->id,

            'url' => 'yume.com',

        ]);
    }
}
