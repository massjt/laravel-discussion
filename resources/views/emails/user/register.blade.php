<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel App 注册</title>
</head>
<body>
👌  <h2>hello check email</h2>
    <a href="{{ url('verify/'.$user->confirm_code) }}">click to confirm</a>
</body>
</html>