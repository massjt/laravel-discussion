@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="/discussions" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="请输入用户名">
                    </div>
                    <div class="form-group">
                        <textarea name="body" id="" cols="30" class="form-control" rows="10" placeholder="请输入文章"></textarea>
                    </div>
                    <button class="btn btn-success pull-right">发表文章</button>
                </form>
            </div>
        </div>
    </div>
@endsection