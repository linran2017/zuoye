
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        td {
            width: 100px;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top: 50px;">
    <h2 style="width: 500px; text-align: center; margin: 0 auto">网友留言</h2>
    <table class="table table-hover" width="400" border="1"
           style="text-align: center; margin-top: 10px; border:1px solid black; border-collapse:separate;">
        <tr>
            <td>编号</td>
            <td>昵称</td>
            <td>内容</td>
            <td><a href="index.php?a=add" class="btn btn-danger btn-primary">添加</a></td>
        </tr>
        <!--循环$this->data数组，数组中有几条内容就会在页面中生成几条留言-->
        <?php foreach ($this->data as $k => $v): ?><!--
            <tr>
                <!-- 输出这条留言的编号-->
        <td><?php echo $k  ?></td>
        <!--输出这条留言的昵称-->
        <td><?php echo $v['ncname']  ?></td>
        <!--输出这条留言的内容-->
        <td><?php echo $v['content']  ?></td>
        <td>
            <!--把这条留言的编号赋值给get参数，用户点击编辑，就可以获得这条留言的编号-->
            <a href="?a=edit&i=<?php echo $k ?>" class="btn btn-primary active" role="button">编辑</a>
            <!--把这条留言的编号赋值给get参数，用户点击删除，就可以获得这条留言的编号-->
            <a href="?a=del&j=<?php echo $k ?>" class="btn btn-danger btn-primary">删除</a>
        </td>
        </tr>
       <!-- 结束循环，用: endforeach这种写法容易区分-->
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
