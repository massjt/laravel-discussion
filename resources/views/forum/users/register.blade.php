@extends('app')
@section('content')
    <div class="container">
        <div class="row div col-md-6 col-md-offset-3">
            <form action="/user/register" method="post">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="请输入用户名" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="请输入邮箱" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="请输入密码" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="请重复密码" required>
                </div>
                <button type="submit" class="btn btn-success btn-block">点击注册</button>
            </form>
        </div>

    </div>
@endsection