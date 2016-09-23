<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Eloquent\RoleRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    //

    private $role;

    public function __construct(RoleRepository $role)
    {
        $this->role=$role;
    }

    public function index(){
        return view('admin.role.index');
    }

    public function create(){

        return view('admin.role.create');
    }

    public function store(Requests\RoleRequest $request){
        $result = $this->role->create($request->all());
        if ($result) {
            flash('添加角色成功', 'success');
        }else{
            flash('添加角色失败', 'error');
        }

        return redirect('admin/role');
    }
}
