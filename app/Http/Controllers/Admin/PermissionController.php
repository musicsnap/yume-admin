<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Eloquent\PermissionRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    private $permission;

    public function __construct(PermissionRepository $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.permission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        //
        $result = $this->permission->create($request->all());
        if ($result) {
            flash('添加权限成功', 'success');
        }else{
            flash('添加权限失败', 'error');
        }

        return redirect('admin/permission');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $recordsTotal = $this->permission->getCount();
        //定义过滤条件查询过滤后的记录数sql
        if(!empty($search)){
            $recordsFiltered  = $this->permission->getCount();
        }else{
            $recordsFiltered= $recordsTotal;
        }

        $permissionList = $this->permission->getPermissionList($orderSql,$order_dir,$start,$length);

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $PermissionInfo =  $this->permission->find($id);
        return view('admin.permission.edit')->with(compact('PermissionInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request)
    {
        //
        $this->permission->updatePermission($request);

        return redirect('admin/permission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->permission->destoryPermission($id);

        return redirect('admin/permission');
    }
}
