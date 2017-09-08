<?php
//加载函数文件，把常量IS_POST引入
include 'functions.php';
//开启session，因为把数据保存到session里，可以在任何地方中使用，
//但是只适用于像存储验证码和登录凭证这样少量数据
session_start();
//当使用未定义的类时会触发类函数，并且返回类名
function __autoload($cn){
    //如果类名的最后10个字符是controller,就加载colltooller文件夹里的页面
if(substr($cn,-10)=='Controller'){
    include './controller/'.$cn.'.php';
}else{
    //否则就加载tool文件夹里$cn页面
    include './tool/'.$cn.'.php';
}
}
//$a的值是什么，就调用哪个方法，index页面就加载哪个模板
//如果GET参数a存在，变量$a的值就是GET参数a的值，不存在$a的值默认为index
$a=isset($_GET['a'])?$_GET['a']:'index';
//$c的值是什么，就调用哪个类
//如果GET参数c存在，变量$c的值就是GET参数c转为大写的值，不存在$c的值默认为Home
$c=isset($_GET['c'])?ucfirst($_GET['c']):'Home';
//把$a赋给一个常量，因为常量可以在任何地方可以调用而变量不可以
define('ACTION',$a);
//把$c赋值一个常量
define('CONTROLLER',$c);
//$c连接上controller就是类名
$className=$c.'Controller';
//实例化一个对象
$obj=new $className;
//调用回调函数([对象,方法],方法里的参数)
call_user_func_array([$obj,$a],[]);
?>