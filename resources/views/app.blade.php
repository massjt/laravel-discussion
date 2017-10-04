<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel discussion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css')  }}">
    <link rel="stylesheet" href="{{ asset('/css/discussion/style.css')  }}">
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Laravel App</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/">首页</a>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li><a href="#">{{ Auth::user()->name  }}</a></li>
                    <li><a href="/user/logout/">退出</a></li>
                @else
                <li><a href="/user/login/">登录</a></li>
                <li><a href="/user/register">注册</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
    @yield('content')
</body>
</html>