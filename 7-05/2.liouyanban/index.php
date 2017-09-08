<?php
//加载函数文件
include 'functions.php';
//加载数据库文件，把数据库文件返回数组赋值给一个变量
$data=include 'data.php';
//如果用户提交了
if(IS_POST){
    //就把用户提交的数据增加到数据库的数据末尾
    array_push($data,$_POST);
    //调用put函数，把数据放在数据库文件里
    put($data);

    //创建一个变量，用jd代码弹出'添加成功'
    $a=<<<a
<script>
alert('添加成功');
</script>
a;
    //输出变量，在页面中执行里面的代码
    echo $a;

}
//调用添加文件，载入添加文件的模板
include 'add.php';
?>