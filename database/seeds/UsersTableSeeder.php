<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminRole = Role::where('name','admin')->first();

        $admin= factory('App\User')->create([
            'username'=>'admin',
            'email'=>'admin@163.com',
            'password'=>bcrypt('123456')
        ]);
//        $admin->attachRole($adminRole); // 参数可以是Role对象，数组或id
        $admin->roles()->attach($adminRole->id); //只需传递id即可
    }
}
