<?php
//引入函数文件
include 'functions.php';
//开启session
session_start();
//使用为定义的类就会触发该函数，并且传入类名
function __autoload($cn){
    //如果类名倒数第10位的字符是Controller,就是走colltroller文件夹，否则就是tool文件夹
    $path=substr($cn,-10)=='Controller'?'controller':'tool';
    //组合完整 路径的字符串
    $fullPath='./'.$path.'/'.$cn.'.php';
    //如果组合的字符串是一个文件
    if(is_file($fullPath)){
        //就载入这个文件
        include $fullPath;
    }else{
        //如果不是文件就终止代码，提示文件不存在
        exit("{$fullPath}不存在");
    }
}
//定义一个变量，如果有GET参数a就赋值GET参数a，如果没有就默认为index
$a=isset($_GET['a'])?$_GET['a']:'index';
//定义一个变量，如果有GET参数c就赋值GET参数c，如果没有就默认为Home
$c=isset($_GET['c'])?$_GET['c']:'Home';
//把GET参数a转为小写，赋值给一个常量
define('ACTION',strtolower($a));
//把GET参数c转为小写，赋值给一个常量
define('CONTROLLER',strtolower($c));
//将$c转为大写再连接Controller,组合成新的字符串，作为类名
$className=ucfirst($c).'Controller';
//实例化一个对象
$obj=new $className;
//调用对象里的函数
call_user_func_array([$obj,$a],[]);
?>