<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/admin.min.css') }}">
</head>
<body class="hold-transition skin-purple login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('admin') }}">{{ config('app.name') }}</a>
    </div>
    <!-- /.login-logo -->
    @include('layouts.errors-and-messages')
    <div class="login-box-body">

        <form action="{{ route('admin.login') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                <span class="fa fa-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="password" type="password" class="form-control" placeholder="Password">
                <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-md-4 pull-right vcenter  ">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng Nhập</button>
                </div>
                <div class="col-md-5 pull-right vcenter ">
                    <a  href="#">Quên mật khẩu</a><br>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!-- /.social-auth-links -->

        {{--//todo need to go to email page to send and confirm password again--}}

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script src="{{ asset('js/admin.min.js') }}"></script>
</body>
</html>
