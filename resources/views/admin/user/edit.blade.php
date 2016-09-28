@extends('layouts.admin')
@section('css')
    <link href="{{asset('backend/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@inject('roles','App\Repositories\Presenter\RolePresenter')
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
                <a href="/admin/user/create">用户管理</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">编辑用户</span>
            </li>
        </ul>
        <div class="row">
            @include('flash::message')
            <div class="col-md-12">
                <div class="portlet box red">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>编辑用户</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>

                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{url('admin/user/update')}}" id="roleForm" class="form-horizontal" method="post">
                            {!!csrf_field()!!}
                            <input type="hidden" id="method" name="_method" value="PATCH">
                            <input type="hidden" name="id" value="{{$UserInfo->id}}">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">登录名</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" value="{{$UserInfo->username}}" name="username" placeholder="登录名">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">邮箱地址</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="email" class="form-control" value="{{$UserInfo->email}}" name="email" placeholder="Email Address">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">提交</button>
                                        <button type="reset" class="btn default">取消</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('backend/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            // Select2
            $(".select2_single").select2({
                placeholder: "Select a state",
                allowClear: true
            });
        });
    </script>
@endsection