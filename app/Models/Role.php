<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;
class Role extends EntrustRole
{
    //
    protected $fillable = ['name','display_name','description'];

    /**
     * 角色用户
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
