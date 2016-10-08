<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use App\Repositories\Eloquent\PermissionRepository;
use App\Repositories\Eloquent\RoleRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    //
    protected $fields = [
        'name' => '',
        'display_name' => '',
        'description' => '',
        'perms' => [],
    ];

    private $role;

    private $permission;

    public function __construct(RoleRepository $role,PermissionRepository $permission)
    {
        $this->role=$role;
        $this->permission=$permission;
    }

    /**
     * 角色列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('admin.role.index');
    }

    /**
     * 添加角色的页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){

        return view('admin.role.create');
    }

    /**
     * 添加角色
     * @param Requests\RoleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Requests\RoleRequest $request){
        $result = $this->role->create($request->all());
        if ($result) {
            flash('添加角色成功', 'success');
        }else{
            flash('添加角色失败', 'error');
        }

        return redirect('admin/role');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(){
        $draw = $_GET['draw'];//这个值作者会直接返回给前台
        $order_column = $_GET['order']['0']['column'];//那一列排序，从0开始
        $order_dir = $_GET['order']['0']['dir'];//ase desc 升序或者降序
        $orderSql = "";
        if(isset($order_column)){
            $i = intval($order_column);
            switch($i){
                case 0:$orderSql = "id";break;
                case 1:$orderSql = "name";break;
                case 2:$orderSql = "display_name";break;
                case 3;$orderSql = "description";break;
                case 4:$orderSql = "created_at";break;
                default:$orderSql = '';
            }
        }
        $where = array(
            'id'=>'0'
        );
        //搜索
        $search = htmlspecialchars(trim($_GET['search']['value']),ENT_QUOTES,"UTF-8");//获取前台传过来的过滤条件
        if(!empty($_GET['extra_search'])){
            $extra_search = htmlspecialchars(trim($_GET['extra_search']),ENT_QUOTES,"UTF-8");//获取前台传过来的过滤条件
        }
        $search_columns = $_GET['columns'];
        //这边先留着做搜索

        $start = $_GET['start'];//从多少开始
        $length = $_GET['length'];//数据长度

        if(!empty($start)&&$length!=-1){

        }else{
            $start=0;
            $length=10;
        }

        //条件过滤后记录数 必要
        $recordsFiltered = 0;
        //表的总记录数 必要
        $recordsTotal = 0;
        $recordsTotal = $this->role->getCount();
        //定义过滤条件查询过滤后的记录数sql
        if(!empty($search)){
            $recordsFiltered  = $this->role->getCount();
        }else{
            $recordsFiltered= $recordsTotal;
        }

        $permissionList = $this->role->getRoleList($orderSql,$order_dir,$start,$length);

        $data = array(
            "draw" => intval($draw),
            "recordsTotal" => intval($recordsTotal),
            "recordsFiltered" => intval($recordsFiltered),
            'data'=>$permissionList
        );
        return response()->json(
            $data
        );
    }

    /**
     * 编辑角色
     * @param $id
     */
    public function edit($id){
        $RoleInfo = $this->role->find($id);
        return view('admin.role.edit')->with(compact('RoleInfo'));
    }

    /**
     * 保存编辑角色的信息
     * @param Requests\RoleRequest $request
     */
    public function update(Requests\RoleRequest $request){
        $this->role->updateRole($request);
        return redirect('admin/role');
    }

    /**
     * 删除角色
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id){
        //todo 先暂时不去考虑，角色删除后，用户管理员的角色的问题，等后面再改
        $this->role->destroyRole($id);
        return redirect('admin/role');
    }

    public function permission($id){
        if(empty($id)){
            return redirect('/admin/role');
        }
        $role = $this->role->find($id);
        if(empty($role)){
            flash('找不到当前角色信息', 'error');
            return redirect('/admin/role');
        }
        //获取当前角色及其权限信息
        $permissions = [];
        if ($role->perms) {
            foreach ($role->perms as $v) {
                $permissions[] = $v->id;
            }
        }
        $role->perms = $permissions;
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $role->$field);
        }
        $arr = $this->permission->all()->toArray();
        foreach ($arr as $v) {
            $data['permissionAll'][$v['pid']][] = $v;
        }
        $data['id'] = (int)$id;

       return view('admin.role.permission')->with(compact('data'));
    }

    /**
     * 保存权限分配
     */
    public function saverolepermission($id,Request $request){
        $permissions = $request->input('permissions');

        $role = $this->role->find($id);
        if(empty($role)){
            flash('找不到当前角色信息', 'error');
            return redirect('/admin/role');
        }
        //todo 这边的是查询当前的权限的父级，然后合并
        if(!empty($permissions)){
            foreach ($permissions as $key=>$val){
                $pid[] = $this->permission->find($val,['pid'])->pid;
            }
        }
        if(!empty($pid)){
            $pid =  array_unique($pid);
            $permissions =  array_merge($pid,$permissions);
        }

        //todo 这个问题待研究
        $rolemodel = new Role();
        $role->givePermissionsTo($permissions);

        return redirect('admin/role');
    }


}
