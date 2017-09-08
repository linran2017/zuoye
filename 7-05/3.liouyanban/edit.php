<?php
//加载函数文件
include 'functions.php';
//加载数据库文件，把数据返回的数组赋值给变量
$data=include 'data.php';
//如果用户点击编辑，就会有get参数，就可以获得要编辑留言的编号
$id=$_GET['j'];
//如果用户点击编辑成功
if(IS_POST){
    //就把这一条的昵称和留言内容改为用户提交的昵称和内容
    $data[$id]=$_POST;
    //调用把内容放在文件里的函数，把处理过的数据放置在数据库文件中
    put($data);
    //创建一个变量，定界符可以解析变量，里面的内容可以在页面中格式化输出
    //用js代码，弹出修改成功，然后页面跳转到首页
    $s=<<<s
<script>
alert('修改成功');
location.href='index.php'
</script>
s;
    //在页面中输出定界符变量，执行里面的代码
echo $s;
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2 style="width: 500px; text-align: center; margin: 0 auto; margin-top: 50px;">修改留言</h2>
    <form action="" method="post" style="margin-top: 10px; width: 500px;">
        <div class="form-group">
            <label for="exampleInputEmail1">昵称</label>
            <!--在修改之前把文本框的内容默认为昵称-->
            <input type="text" name="ncname" class="form-control" id="exampleInputEmail1" value="<?php echo $data[$id]['ncname'] ?>">
        </div>
        <div class="form-group" style="width: 500px;">
            <label for="exampleInputPassword1">留言</label>
            <!--在修改之前把输入框的内容默认为留言内容-->
            <textarea style="width: 500px; display: block" class="form-control" name="content"><?php echo $data[$id]['content']?></textarea>
        </div>
        <button type="submit" class="btn btn-success">修改成功</button>
    </form>
</div>
</body>
</html>