<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Eloquent\RoleRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\RoleUserRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Repositories\Exceptions\RepositoryException;

class UserController extends Controller
{
    private $role;

    private $user;

    private $userrole;
    protected $fields = [
        'username' => '',
        'email' => '',
        'roles' => [],
    ];

    public function __construct(UserRepository $user,RoleRepository $role,RoleUserRepository $userrole)
    {
        $this->user = $user;
        $this->role = $role;
        $this->userrole = $userrole;
    }

    /**
     * 显示用户的列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * databases 获取的数据
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
                case 1:$orderSql = "username";break;
                case 2:$orderSql = "email";break;
                case 3;$orderSql = "mobile";break;
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
        $recordsTotal = $this->user->getCount();
        //定义过滤条件查询过滤后的记录数sql
        if(!empty($search)){
            $recordsFiltered  = $this->user->getCount();
        }else{
            $recordsFiltered= $recordsTotal;
        }

        $userList = $this->user->getUserList($orderSql,$order_dir,$start,$length);

        $data = array(
            "draw" => intval($draw),
            "recordsTotal" => intval($recordsTotal),
            "recordsFiltered" => intval($recordsFiltered),
            'data'=>$userList
        );
        return response()->json(
            $data
        );
    }

    /**
     * 添加用户的页面
     * @return $this
     */
    public function create(){
        $RoleList = $this->role->getRole();

        return view('admin.user.create')->with(compact('RoleList'));
    }

    /**
     * 添加保存用户
     * @param UserRequest $request
     */
    public function store(UserRequest $request){
        $this->user->createUser($request);
        return redirect('admin/user');
    }

    /**
     * 编辑用户的界面
     * @param $id
     */
    public function edit($id){
        $UserInfo = $this->user->find($id);
        return view('admin.user.edit')->with(compact('UserInfo'));
    }

    /**
     * Update the specified resource in storage.
     * 保存编辑
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        $this->user->updateUser($request);
        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     * 删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $this->user->destroyUser($id);
        return redirect('admin/user');
    }


    //用户分配角色
    public function role($id){
        $user = $this->user->find($id);
        if (!$user) {
            flash('找不到当前用户信息', 'error');
            return redirect('/admin/user');
        }
        $roles = [];
        if ($user->roles) {
            foreach ($user->roles as $v) {
                $roles[] = $v->id;
            }
        }
        $user->roles = $roles;
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $user->$field);
        }
        $data['rolesAll'] = $this->role->all()->toArray();
        $data['id'] = (int)$id;
        return view('admin.user.role')->with(compact('data'));
    }



}
