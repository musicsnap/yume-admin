<?php
/**
 * Created by PhpStorm.
 * User: Windows
 * Date: 2016/9/20
 * Time: 8:45
 */

namespace App\Repositories\Eloquent;
use App\Repositories\Eloquent\Repository;
use App\Models\UserRole;
class RoleUserRepository extends Repository {

    public function model()
    {
        // TODO: Implement model() method.

        return UserRole::class;
    }

}