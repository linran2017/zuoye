<?php
header('content-type:text/html;charset=utf-8');
//1验证邮箱与网址是否正确
/*$email = '410004417@qq.com';
$email = '410004417@163.com';
$email = '410004417@sina.com.cn';
$email = 'mazhenyu@houdunwang.com';
$email = 'mazhenyu2017@189.com';
$email = 'mazhenyu-2017@126.com';
$email = 'mazhenyu_2017@gmail.com';*/

/*$url = 'http://www.baidu.com';
$url = 'https://www.baidu.com';
$url = 'www.baidu.com';
$url = 'mp3.baidu.com';
$url = 'baidu.com';
$url = 'baidu.cn';
$url = 'baidu.com.cn';
$url = 'baidu.net';
$url = 'www.12306.com';
$url = 'www.baidu-wang.com';
$url = 'www.baiduwang.com';*/
//如果用户点击提交了
if($_POST){
    //定义邮箱的格式，@前面必须以字母或数字开头，中间可以是数字，字母，下划线，横线再连接
    //数字，字母，下划线，@后面必须是qq,163,sina,houdunwang,189,126,gmail这几种字符类型，后面再连接.最后是com或者cn结尾
    $preg1='/^([0-9a-zA-Z]+)(\w|-)([0-9a-zA-Z]+)@(qq|163|sina|houdunwang|189|126|gmail)\.(com|cn)$/';
    //定义网址格式，必须是www,http://www,baidu,mp3,https://www这几种字符开头，然后连接除空格符的任意字符
    //再连接.最后以com,cn,net,com.cn结尾，网址不区分大小写
    $preg2='/^(www|http:\/\/www|baidu|mp3|https:\/\/www)(\S*)\.(com|cn|net|com.cn)$/i';
    //如果用户输入邮箱格式匹配
    if(preg_match($preg1,$_POST['email'])){
        //显示输入正确
        $email='输入正确';
    }else{
        //如果不匹配，就显示请输入邮箱格式
        $email='请输入邮箱格式';
    }
    //如果用户输入的网址格式正确
    if(preg_match($preg2,$_POST['url'])){
        //就显示输入正确
        $url='输入正确';
    }else{
        //如果不匹配，就显示请输入网址格式
        $url='请输入网址格式';
    }
    //如果用户没有提交
}else{
    //就为空字符，在页面中没有显示
    $email='';
    //就为空字符，在页面中不显示
    $url='';
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
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<div class="container" style="margin: 200px auto;">
    <form class="form-inline" style="margin: 0 auto" action="1.php" method="post" >
        <div class="form-group">
            <label for="exampleInputName2">邮箱</label>
            <!--在span标签里输出变量$email-->
            <input type="text" name="email" class="form-control" id="exampleInputName2" ><span style="color:red;"><?php echo $email ?></span>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail2">网址</label>
            <!--在span标签里输出变量$url-->
            <input type="text" name="url" class="form-control" id="exampleInputEmail2" ><span style="color: red;"><?php echo $url ?></span>
        </div>
        <button type="submit" class="btn btn-default">提交</button>
    </form>
</div>
<body>

</body>
</html>
