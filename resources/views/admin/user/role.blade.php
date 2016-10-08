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
                <a href="/admin/user">分配角色</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">分配角色</span>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-12 ">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">分配角色</span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <form class="form-horizontal" role="form" method="POST" action="/admin/user/saverole/{{ $data['id']}}">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="tag" class="col-md-2 control-label">角色列表:</label>
                                @if(isset($data['id'])&&$data['id']==11)
                                    <div class="col-md-10"><h4>超级管理员</h4></div>
                                @else
                                    <div class="col-md-10">
                                        @foreach($data['rolesAll'] as $v)
                                            <div class="input-group ">
                                                <div class="icheck-inline">
                                                        <input class="form-actions"
                                                               @if(in_array($v['id'],$data['roles']))
                                                               checked
                                                               @endif
                                                               id="inputChekbox{{$v['id']}}" type="Checkbox" value="{{$v['id']}}"
                                                               name="roles[]"> <label for="inputChekbox{{$v['id']}}">
                                                        {{$v['display_name']}}
                                                    </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="form-actions fluid">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn green">提交</button>
                                                <button type="reset" class="btn default">取消</button>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
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