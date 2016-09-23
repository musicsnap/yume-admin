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
        <div class="col-md-12 page-404">
            <div class="number font-green"> 404 </div>
        </div>
    </div>
</div>
@endsection