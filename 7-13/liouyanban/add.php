<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        td{
            width: 100px;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top: 50px;">
    <h2 style="width: 500px; text-align: center; margin: 0 auto; margin-top: 100px;">留言板</h2>
    <form action="" method="post" style="margin-top: 10px; width: 500px;">
        <div class="form-group">
            <label for="exampleInputEmail1">昵称</label>
            <input type="text" name="ncname" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group" style="width: 500px;">
            <label for="exampleInputPassword1">留言</label>
            <textarea style="width: 500px; display: block" class="form-control" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-success">添加留言</button>
        <a href="index.php?a=shouye" class="btn btn-primary btn-primary active" role="button">返回首页</a>
    </form>
</div>

</body>
</html>