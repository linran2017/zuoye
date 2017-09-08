<?php
header('content-type:text/html;charset=utf-8');
//如果使用没有找到的类，会自动调用此函数，并且返回类名
//现在要使用Home类，但是没有找到，所以要调用此函数
function __autoload($classNnme){
    include "./{$classNnme}.php";
}
//实例化一个Home对象
$home=new Home();
//如果没有GET参数，就默认加载首页面板，如果有参数就加载GET参数的面板
$a=isset($_GET['a'])?$_GET['a']:'shouye';
//调用加载面板的方法
$home->$a();
?>
