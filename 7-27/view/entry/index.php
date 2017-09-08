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
<form action="" method="post">
    <input type="text" name="title" />
    <input type="submit" value="添加" />
</form>
<table border="1">
    <tr>
        <td>编号</td>
        <td>标题</td>
        <td>操作</td>
    </tr>
    <?php foreach ($data['arc'] as $v): ?>
    <tr>
        <td><?php echo $v['aid']?></td>
        <td><?php echo $v['title']?></td>
        <td>
            <a href="?a=edit&aid=<?php echo $v['aid'] ?>">编辑</a>
            <a href="?a=del&aid=<?php echo $v['aid'] ?>">删除</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<form action="" method="get">
    搜索：<input type="hidden" name="a" value="search" />
    <input type="text" name="wd" />
    <input type="submit" value="搜索">
</form>
</body>
</html>