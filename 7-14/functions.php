<?php
//设置文本类型为text/html,编码为utf-8防止汉字在页面中乱码
header('content-type:text/html;charset=utf-8');
date_default_timezone_set('PRC');
//定义格式化输出变量的函数
function p($val){
    //格式化输出
    echo '<pre>';
    //打印变量
    print_r($val);
    echo '</pre>';
}

//定义一个常量，如果用户提交方式是post方式，变量值就为true,否则为false
define('IS_POST',$_SERVER['REQUEST_METHOD']=='POST'?true:false);
?>