@extends('layouts.admin')
@section('content')
<div class="page-content">
    <div class="page-head">
        <div class="page-title">
            <h1>控制台
                <small>首页</small>
            </h1>
        </div>
    </div>
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="/admin">首页</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">系统</span>
        </li>
    </ul>
    <div class="row">
        <iframe src="/admin/log-viewer" frameborder="0" style="width: 100%;min-height: 650px;"></iframe>
    </div>
</div>
@endsection