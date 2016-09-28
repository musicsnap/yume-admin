@extends('layouts.admin')
@section('css')
    <link href="{{asset('backend/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="page-content">
        <div class="page-head">
            <div class="page-title">
                <h1>控制台
                    <small>系统管理</small>
                </h1>
            </div>
        </div>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="/admin/user">用户管理</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">用户列表</span>
            </li>
        </ul>
        <div class="m-heading-1 border-green m-bordered">
            <h3>相关搜索</h3>

        </div>
        @include('flash::message')
        <div class="row">
            <div class="col-md-12 ">
                <input type="hidden" name="_token" id="csrf_token" value="{{csrf_token()}}">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">用户列表</span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th> ID </th>
                                <th><i class="fa fa-user">登录名</i></th>
                                <th><i class="fa fa-envelope-o">email</i></th>
                                <th><i class="fa fa-phone"> 联系电话</i> </th>
                                <th> <i class="fa fa-calendar"> 创建时间 </i></th>
                                {{--<th>用户角色</th>--}}
                                <th> 操作 </th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td colspan="6"> 暂时无数据! </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('backend/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/table-datatables-user.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/global/plugins/layer/layer.js')}}"></script>

    <script type="text/javascript">
        $(document).on('click','.destoryUser',function () {
            var _delete = $(this).attr('data-id');
            //询问框
            layer.confirm('确定要删除用户？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $('form[name=delete_item'+_delete+']').submit();
            });
        });
    </script>
@endsection