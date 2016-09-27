@extends('layouts.admin');
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
                <a href="/admin/permission">权限管理</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">权限列表</span>
            </li>
        </ul>
        <div class="m-heading-1 border-green m-bordered">
            <h3>相关搜索</h3>

        </div>
        <div class="row">
            <div class="col-md-12 ">

                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">权限列表</span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th> ID </th>
                                <th>权限名称</th>
                                <th>显示名称</th>
                                <th>描述 </th>
                                <th> 创建时间 </th>
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
    <script src="{{asset('backend/js/table-datatables-permission.js')}}" type="text/javascript"></script>

    <script type="text/javascript">



    </script>
@endsection