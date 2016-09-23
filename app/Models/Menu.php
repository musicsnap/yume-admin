<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = [
        'name',
        'icon',
        'parent_id',
        'url',
        'slug',
        'heightlight_url',
        'sort'
    ];
}
