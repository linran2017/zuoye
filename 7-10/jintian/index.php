<?php
//定义文本类型是text/html,编码是utf-8,防止汉字在页面中乱码
header('content-type:text/html;charset=utf-8');
//创建一个可以单文件上传也可以多文件上传的类
class Upload{
    //在类里创建上传文件的函数
    public function up(){
        //定义一个变量，如果提交方式是post,就是true，否则就是false
        define('IS_POST',$_SERVER['REQUEST_METHOD']=='POST'?true:false);
        //设置默认时区为东八区
        date_default_timezone_set('PRC');
        //如果用户点击上传，证明是post方式提交
        if(IS_POST){
            //echo '<pre/>';
            //print_r($_FILES);
            //如果临时文件是数组，就是多文件上传
            if(is_array($_FILES['up']['tmp_name'])){
                //遍历存放临时文件的数组
                foreach ($_FILES['up']['tmp_name'] as $k=>$v){
                    //1，找到上传文件名数组里键名为$k所对应的键值，也就是上传的文件名
                    //2,然后从右边第一个‘.’开始截取，一直返回到字符串末尾
                     //3，这样就得到了上次的文件类型
                   $type=strrchr($_FILES['up']['name'][$k],'.');
                    //创建一个用力了存储文件类型的数组
                    $arr=['.jpg','.png'];
                    //如果上传的文件类型不在数组里，说明上传的文件类型不正确
                    if(!in_array($type,$arr)){
                        echo '文件类型不正确';
                        //就终止程序，让后面的代码不执行
                        exit;
                    }
                }
                //再次办理存放临时文件的数组
                foreach ($_FILES['up']['tmp_name'] as $k=>$v){
                    //1，找到上传文件名数组里键名为$k所对应的键值，也就是上传的文件名
                    //2,然后从右边第一个‘.’开始截取，一直返回到字符串末尾
                    //3，这样就得到了上次的文件类型
                    $type=strrchr($_FILES['up']['name'][$k],'.');
                    //设置文件名为当前时间以免文件太多，出现重复覆盖现象，
                    //再连接上0-9999的随机数，最后再连接文件类型
                    $filename=time().mt_rand(0,99999).$type;
                    //创建一个按上传目录的变量，按当天日期分类
                    $dir='./upload/'.date('ymd');
                    //如果这个目录不存在就创建这个目录
                    is_dir($dir) || mkdir($dir,0777,true);
                    //把目录名和文件名连接起来，就是上传文件的文件路径
                    $path=$dir.'/'.$filename;
                    //把临时存放的文件移动都上传目录里
                    move_uploaded_file($v,$path);
                }
                //不是数组就是单文件上传
            }else{
                 if(is_uploaded_file($_FILES['up']['tmp_name'])) {
                     //1，找到上传文件的文件名
                     //2,然后从右边第一个‘.’开始截取，一直返回到字符串末尾
                     //3，这样就得到了上次的文件类型
                     $type = strrchr($_FILES['up']['name'], '.');
                     //设置文件名为当前时间以免文件太多，出现重复覆盖现象，
                     //再连接上0-9999的随机数，最后再连接文件类型
                     $filename = time() . mt_rand(0, 99999) . $type;
                     //创建一个按上传目录的变量，按当天日期分类
                     $dir = './upload/' . date('ymd');
                     //如果这个目录不存在就创建这个目录
                     is_dir($dir) || mkdir($dir, 0777, true);
                     //把目录名和文件名连接起来，就是上传文件的文件路径
                     $path = $dir . '/' . $filename;
                     //把临时存放的文件移动都上传目录里
                     move_uploaded_file($_FILES['up']['tmp_name'], $path);
                 }
            }
        }
    }
}
//new实例化关键字
$obj=new Upload();
//实例化一个对象，调用上传文件的函数
$obj->up();
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
        tr{
            text-align: center;
        }
    </style>
    <script src="jquery-1.11.3.min.js"></script>
   <script>
        $(function () {
            $('.add').click(function (){
                if($('tr').length>5){
                    alert('最多上传5个图片');
                }else {
                    var obj='<tr><td><div class="form-group"><input type="file" class="form-control" id="exampleInputEmail2" name="up[]"></div></td><td class="new"><button type="button" class="btn btn-primary del">删除这一项</button></td></tr>';
                    $('table').append(obj);
                }
                $('.new').on('click','.del',function () {
                    $(this).parents('tr').remove();
                })
            })
        })
    </script>
</head>
<body>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
 <h2 style="width: 500px; text-align: center; margin: 0 auto; margin-top: 50px">上传你的文件</h2>
        <table class="table" width="500" style="margin-top: 10px">
            <tr>
                <td>上传文件</td>
                <td>操作</td>
            </tr>
            <tr>
            <td>
                <div class="form-group">
                    <input type="file" class="form-control" id="exampleInputEmail2" name="up[]">
                </div>
            </td>
            <td><button type="button" class="btn btn-primary add">增加一项</button></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-success">上传</button>
    </form>
    <!--<form action="" method="post" enctype="multipart/form-data">
        <h2 style="width: 500px; text-align: center; margin: 0 auto; margin-top: 50px">上传你的文件</h2>
        <table class="table" width="500" style="margin: 0 auto margin-top: 10px;">
            <tr>
                <td>上传文件</td>
                <td>操作</td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <input type="file" class="form-control" id="exampleInputEmail2" name="up">
                    </div>
                </td>
                <td><button type="submit" class="btn btn-primary add">上传文件</button></td>
            </tr>
        </table>
    </form>-->
</div>
</body>
</html>
