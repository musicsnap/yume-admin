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
                    <form class="form-horizontal" role="form" method="POST" action="/admin/role/{{ $data['id']}}">
                        {!! csrf_field() !!}
                        @if($data['permissionAll'])
                            @foreach($data['permissionAll'][0] as $v)
                                <div class="form-group">
                                    <label class="col-md-2 control-label check-all">
                                        {{$v['display_name']}}：
                                        <input type="checkbox" class="icheck">
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
                                                                class="icheck"
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
                alert($(this).prop('checked'));
                if($(this).prop('checked')){
                    $(this).siblings().find("input[name='permissions']").prop('checked',$(this).prop('checked'));
                }else{
                    $(this).siblings().find("input[name='permissions']").prop('checked',$(this).prop('checked'));
                }
            });
        });
    </script>
@endsection