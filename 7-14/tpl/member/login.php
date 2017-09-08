<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="?">去首页</a>
<form method="post" action="">
   用户名： <input type="text" name="username" required  oninvalid="setCustomValidity('用户名不能为空')" oninput="setCustomValidity('')" /><br/>
    密码：<input type="password" name="password" required  oninvalid="setCustomValidity('密码不能为空')" oninput="setCustomValidity('')" /><br/>
    <input type="checkbox" name="autologin" />七天免登陆<br/>
    <input type="submit" value="登录" />
</form>
<a href="?a=reg&c=member">没账号去注册</a>
</body>
</html>