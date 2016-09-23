@extends('layouts.login')

@section('content')
    <form class="login-form" action="{{url('/login')}}" method="post">
        {{csrf_field()}}
        <h3 class="form-title font-green">后台登录</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> 请输入用户名和密码 </span>
        </div>
        @if ($errors->has('username'))
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>
                <span>{{ $errors->first('username') }} </span>
            </div>
        @endif
        @if ($errors->has('password'))
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>
                <span>{{ $errors->first('password') }} </span>
            </div>
        @endif
        @if ($errors->has('captcha'))
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>
                <span>{{ $errors->first('captcha') }} </span>
            </div>
        @endif
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" />
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-8">
                    <label class="control-label visible-ie8 visible-ie9">Captcha</label>
                    <input type="text" class="form-control form-control-solid placeholder-no-fix"  autocomplete="off" placeholder="captcha" name="captcha"  />
                </div>
                <div class="col-md-4">
                    <img style="cursor: pointer;" src="{{captcha_src()}}" onclick="this.src='{{captcha_src()}}' + Math.random()">
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn green uppercase">登录</button>

            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" value="1" />Remember
                <span></span>
            </label>

        </div>
        <div class="create-account">
            <p>

            </p>
        </div>
    </form>
@endsection
