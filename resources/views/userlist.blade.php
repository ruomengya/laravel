@extends('layout.bst')


@section('content')
    <table  class="table table-bordered">
        <thead>
        <td>用户ID</td><td>用户名</td><td>年龄</td><td>邮箱</td><td>状态</td>
        </thead>
        <tbody>
        @foreach($aa as $v)
        <tr>
            <td>{{$v -> uid}}</td>
            <td>{{$v -> name}}</td>
            <td>{{$v -> age}}</td>
            <td>{{$v -> email}}</td>
            <td>{{$v -> is_login}}</td>

        </tr>
        @endforeach

        </tbody>
    </table>
@endsection

