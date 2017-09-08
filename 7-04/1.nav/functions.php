<?php
//告诉浏览器文本是html类型，编码是utf-8,这样在页面中汉字可以正常解析，不会乱码
header('content-type:text/html;charset=utf-8');
//创建一个可以格式化输出的函数，定义一个用来传入要输出打印变量的形参
function p($var){
    //格式化输出
    echo '<pre>';
    //打印变量
    print_r($var);
    echo '</pre>';
}
?>