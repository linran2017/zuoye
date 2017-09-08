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
}
//调用添加文件，载入模板
include 'add.php';
?>