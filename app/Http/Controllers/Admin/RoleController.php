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

}
