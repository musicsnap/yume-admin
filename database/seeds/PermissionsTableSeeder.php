<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Permission::create([

            'name' => 'admin.system.login',

            'display_name' => '登录后台',

            'description' => '登录后台',

        ]);

        Permission::create([

            'name' => 'admin.system.manage',

            'display_name' => '系统管理',

            'description' => '系统管理',

        ]);

        Permission::create([

            'name' => 'admin.users.manage',

            'display_name' => '用户管理',

            'description' => '用户管理',

        ]);

        Permission::create([

            'name' => 'admin.menus.manage',

            'display_name' => '菜单管理',

            'description' => '菜单管理',

        ]);

        Permission::create([

            'name' => 'admin.menus.add',

            'display_name' => '添加菜单',

            'description' => '添加菜单',

        ]);

        Permission::create([

            'name' => 'admin.menus.edit',

            'display_name' => '编辑菜单',

            'description' => '编辑菜单',

        ]);

        Permission::create([

            'name' => 'admin.menus.delete',

            'display_name' => '删除菜单',

            'description' => '删除菜单',

        ]);

        Permission::create([

            'name' => 'admin.permissions.manage',

            'display_name' => '权限管理',

            'description' => '权限管理',

        ]);

        Permission::create([

            'name' => 'admin.roles.manage',

            'display_name' => '角色管理',

            'description' => '角色管理',

        ]);

        /**

         * 用户管理权限

         */

        Permission::create([

            'name' => 'admin.users.list',

            'display_name' => '用户列表',

            'description' => '用户列表',

        ]);

        Permission::create([

            'name' => 'admin.users.add',

            'display_name' => '添加用户',

            'description' => '添加用户',

        ]);

    }
}
