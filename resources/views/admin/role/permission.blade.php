@extends('layouts.admin')
@section('css')
    <link href="{{asset('backend/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
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
                        <div class="form-group">
                            <div class="form-group">
                                @if($data['permissionAll'])
                                    @foreach($data['permissionAll'][0] as $v)
                                        <div class="form-group">
                                            <label class="control-label col-md-1 all-check">
                                                {{$v['display_name']}}：
                                                <input type="checkbox">
                                            </label>
                                            <div class="col-md-6">
                                                @if(!empty($data['permissionAll'][$v['id']]))
                                                    @foreach($data['permissionAll'][$v['id']] as $vv)
                                                        <div class="col-md-2" style="float:left;padding-left:10px;margin-top:8px;">
                                                            <span class="checkbox-custom checkbox-default">
                                                            <i class="fa"></i>
                                                                <input class="form-actions"
                                                                       @if(in_array($vv['id'],$data['perms']))
                                                                       checked
                                                                       @endif
                                                                       id="inputChekbox{{$vv['id']}}" type="Checkbox" value="{{$vv['id']}}"
                                                                       name="permissions[]">
                                                                <label for="inputChekbox{{$vv['id']}}">
                                                                    {{$vv['display_name']}}
                                                                </label>
                                                            </span>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
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