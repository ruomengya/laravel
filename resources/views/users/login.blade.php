@extends('layout.bst')

@section('nav')

@endsection
@section('content')
    <h1 style="margin-left:500px;">用户登录</h1>

    <form action="/login" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">用户名</label>
            <input type="text" name="u_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">密码</label>
            <input type="password" class="form-control" name="u_pwd">
        </div>
        <button type="submit" class="btn btn-default">登录</button>
    </form>
@endsection