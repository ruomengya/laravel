@extends('layout.bst')
{{--<!doctype html>--}}
{{--<html lang="zh">--}}
{{--<head>--}}
    {{--<meta charset="UTF-8">--}}
    {{--<meta name="viewport"--}}
          {{--content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
    {{--<title>用户注册</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<form action="/register" method="post">--}}
    {{--{{csrf_field()}}--}}
    {{--用户名： <input type="text" name="u_name"><br>--}}
    {{--密码: <input type="text" name="u_pwd"><br>--}}
    {{--Email: <input type="text" name="u_email"><br>--}}
    {{--年龄： <input type="text" name="u_age"><br>--}}
    {{--<input type="submit" value="注册">--}}
{{--</form>--}}
{{--</body>--}}
{{--</html>--}}

@section('content')
    <h1 style="margin-left:500px;">用户注册</h1>

    <form action="/register" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">用户名</label>
            <input type="text" name="u_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">密码</label>
            <input type="password" class="form-control" name="u_pwd">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="u_email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">年龄</label>
            <input type="text" class="form-control" name="u_age">
        </div>
        <button type="submit" class="btn btn-default">注册</button>
    </form>
@endsection