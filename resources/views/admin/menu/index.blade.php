@extends('layouts.admin')
@section('css')
    <link href="{{asset('backend/global/plugins/jquery-nestable/jquery.nestable.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@inject('menus','App\Repositories\Presenter\MenuPresenter')
@section('content')
    <div class="page-content">
        <div class="page-head">
            <div class="page-title">
                <h1>菜单列表
                    <small>菜单数据</small>
                </h1>
            </div>
        </div>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="/admin/menu">首页</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">菜单管理</span>
            </li>
        </ul>
        <div class="portlet light bordered">
            <div class="portlet-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="margin-bottom-10" id="nestable_list_menu">
                            <button type="button" class="btn green btn-outline sbold uppercase" data-action="expand-all">展开全部</button>
                            <button type="button" class="btn red btn-outline sbold uppercase" data-action="collapse-all">折叠全部</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('flash::message')
        <div class="row">
            <div class="col-md-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bubble font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">菜单列表</span>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="" class="reload"> </a>
                            <a href="" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="dd" id="nestable_list_3">
                            <ol class="dd-list">
                                {!! $menus->getMenuList($menuList) !!}
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bubble font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">菜单数据</span>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="" class="reload"> </a>
                            <a href="" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <br />
                        <form class="form-horizontal form-label-left" id="menuForm" action="{{url('admin/menu')}}" method="post">
                            {!!csrf_field()!!}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单名称</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单图标</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="icon" value="{{old('icon')}}" placeholder="菜单图标">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">父级菜单</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select class="select2_single form-control" tabindex="-1" name="parent_id">
                                        {!! $menus->getMenu($menu) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单权限</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="slug" value="{{old('slug')}}" placeholder="菜单权限">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单链接</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="url" value="{{old('url')}}" placeholder="菜单链接">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单高亮</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="heightlight_url" value="{{old('heightlight_url')}}" placeholder="菜单高亮">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">排序</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="sort" value="{{old('sort')}}" placeholder="排序">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="reset" class="btn btn-default default">Cancel</button>
                                    <button type="submit" class="btn btn-success green">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('backend/global/plugins/jquery-nestable/jquery.nestable.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/pages/scripts/ui-nestable.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/global/plugins/layer/layer.js')}}"></script>
    <script src="{{asset('backend/pages/scripts/menu-list.js')}}"></script>
    <script>
        $(document).ready(function() {
            // Select2
            $(".select2_single").select2({
                placeholder: "Select a state",
                allowClear: true
            });
        });
        $(document).ready(function() {
            MenuList.init();
        });
    </script>
@endsection