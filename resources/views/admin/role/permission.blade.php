@extends('layouts.admin')
@section('css')
    <link href="{{asset('backend/global/plugins/icheck/skins/all.css')}}" rel="stylesheet" type="text/css" />
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
                <a href="/admin/user">权限分配</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">角色权限</span>
            </li>
        </ul>

    <div class="row">
        <div class="col-md-12 ">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">角色权限</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="POST" action="/admin/role/saverolepermission/{{ $data['id']}}">
                        {!! csrf_field() !!}
                        @if($data['permissionAll'])
                            @foreach($data['permissionAll'][0] as $v)
                                <div class="form-group">
                                    <label class="col-md-2 control-label">
                                        {{$v['display_name']}}：
                                        <input type="checkbox" class="check-all">
                                    </label>
                                    <dic class="col-md-10">
                                        <div class="input-group">
                                            @if(!empty($data['permissionAll'][$v['id']]))
                                                <div class="icheck-inline">
                                                    @foreach($data['permissionAll'][$v['id']] as $vv)
                                                        <label>
                                                            <input
                                                                @if(in_array($vv['id'],$data['perms'])) checked @endif
                                                                id="inputChekbox{{$vv['id']}}"
                                                                class="check-child"
                                                                type="checkbox"
                                                                value="{{$vv['id']}}"
                                                                name="permissions[]"
                                                            >{{$vv['display_name']}}
                                                        </label>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </dic>
                                </div>
                            @endforeach
                                <div class="form-actions fluid">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">提交</button>
                                            <button type="reset" class="btn default">取消</button>
                                        </div>
                                    </div>
                                </div>
                        @endif
                    </form>
                </div>
            </div>

        </div>

    </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('backend/global/plugins/icheck/icheck.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/form-icheck.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('.check-all').on('click',function () {
                if($(this).prop('checked')== true){
                    $(this).closest('.form-group').find(".check-child").prop('checked',true);
                    return ;
                }else{
                    $(this).closest('.form-group').find(".check-child").prop('checked',false);
                    return;
                }
            });










        });
    </script>
@endsection