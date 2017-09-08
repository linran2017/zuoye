<?php
//载入函数文件
include 'functions.php';
//调用未定义的类，会调用此方法，并且返回类名
function __autoload($cn){
    //如果传入的类名倒数第十个字符是Controll,就走controller目录，如果不是就走tool目录
    $dir=(substr($cn,-10)=='Controller')?'controller':'tool';
    //加载$dir目录下的$cn页面
    include './'.$dir.'/'.$cn.'.php';
}
//如果get参数a存在，$a就为get参数a,否则默认为index
$a=isset($_GET['a'])?$_GET['a']:'index';
//定义一个常量，$a转为小写赋值给变量
define('ACTION',strtolower($a));
//如果get参数c存在，$c就为get参数c,否则默认为Entry
$c=isset($_GET['c'])?$_GET['c']:'Entry';
//定义一个常量，$c转为小写赋值给变量
define('CONTROLLER',strtolower($c));
//把$c的首字母转为大写再连接Controller,就为类名
$className=ucfirst($c).'Controller';
//实例化对象
$obj=new $className;
//自动调用需要执行的对象里的方法
call_user_func_array([$obj,$a],[]);
?>