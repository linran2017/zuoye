<?php
//定义文本类型为type/hml，编码为utf-8，汉字防止出现乱码
header('content:type/html;charset=utf-8');
//创建格式化输出变量的文件
function p($val){
    echo '<pre>';
    print_r($val);
    echo '</pre>';
}
//定义变量，如果提交方式是post，就是真，否则为假
define('IS_POST',$_SERVER['REQUEST_METHOD']=='POST'?true:false);
//定义默认时区为东八区
date_default_timezone_set('PRC');
?>