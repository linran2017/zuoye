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
<a href="?"><h2>返回首页</h2></a>
<form action="" method="get">
    搜索：<input type="hidden" name="a" value="search" />
    <input type="text" name="wd" value="<?php echo $_GET['wd'] ?>" />
    <input type="submit" value="搜索">
</form>
<!--如果搜索内容不在arc表里的标题里，就提示‘搜索结果不存在’,
如果搜索内容在arc表里的标题里，就把搜索的数据显示在页面-->
<?php if(empty($data['data'])): ?>
    <h3>搜索结果不存在</h3>
    <?php else: ?>
    <table border="1">
        <tr>
            <td>编号</td>
            <td>标题</td>
        </tr>
        <?php foreach ($data['data'] as $v): ?>
            <tr>
                <td><?php echo $v['aid'] ?></td>
                <td><?php echo str_replace($_GET['wd'],'<span style="color: red">'.$_GET['wd'].'</span>',$v['title']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
</body>
</html>