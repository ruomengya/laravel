@extends('layout.bst')
@section('nav')

@endsection

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