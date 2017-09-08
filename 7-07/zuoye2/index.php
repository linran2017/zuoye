<?php
//设置文件类型为text/html，编码为utf_8,以免汉字在页面中乱码
header('content-type:text/html;charset=utf-8');
//创建一个数组，用来储存文件名
$data=[
        '基础.pdf',
        '变量与常量.pdf',
        '基本数据类型.pdf',
        '运算符、流程控制.pdf',
        '函数.pdf',
        '代码重用.pdf',
        '时间处理.pdf',
        '数字函数.pdf',
        '字符串.pdf',
        '数组.pdf',
        '文件操作.pdf',
        '正则表达式.pdf',
        '目录操作.pdf',
        '上传与下载.pdf',
        '面向对象.pdf'
];


//如果用户点击下载，就可以获得get参数
if(isset($_GET['path'])){
    //文件名就是get参数的值
    $file=$_GET['path'];
    //二进制文件
    header("Content-type:application/octet-stream");
    //获得文件名
    $fileName = basename($file);
    //下载窗口中显示的文件名
    header("Content-Disposition:attachment;filename={$fileName}");
    //文件尺寸单位
    header("Accept-ranges:bytes");
    //文件大小
    header("Accept-length:".filesize($file));
    //读出文件内容
    readfile($file);
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
    <style>
        td{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top: 50px; width: 500px; text-align: center" >
    <h2>下载你所需要的文件</h2>
    <table class="table table-striped" style="margin-top: 10px;" width="500">
       <tr>
           <td>文件名</td>
           <td>操作</td>
       </tr>
       <!-- 采用混搭写法，遍历储存文件的数组，数组中有几个单元，就会生成几行tr标签-->
        <?php foreach ($data as $v){ ?>
        <tr>
            <!--在表格里依次填写数组的键值，也就是文件名-->
            <td><?php echo $v ?></td>
           <!-- 给a标签添加GET参数，把GET参数依次设为数组的键值，也就是文件名，
            如果用户点击下载按钮，就可以获取相对应的GET参数，下载所要的文件-->
            <td><a href="?path=<?php echo $v ?>"><button type="button" class="btn btn-success">下载</button></a></td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>