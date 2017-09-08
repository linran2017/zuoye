<?php
//加载函数文件
include 'functions.php';
//加载数据库文件，并且返回给变量
$data=include 'data.php';
//如果用户点击提交留言了
if(IS_POST){
    //把用户提交的内容追加给数据库
    array_push($data,$_POST);
    //把处理后的数据放在数据库里
    put($data);
   //用户点击提交留言后弹出添加成功
    $zhixing=<<<s
<script>
alert('添加成功');
</script>
s;
    //输出变量，执行里面的代码
    echo $zhixing;

}
//载入添加文件
include 'add.php';
?>