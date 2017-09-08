<?php
//把文档类型改为text/html类型，编码改为utf-8，防止汉字在页面中乱码
header('content-type:text/html;charset=utf-8');
//创建格式化输出的函数
function p($val){
    //让内容在页面中格式化输出
    echo '<pre>';
    //打印变量
    print_r($val);
    echo '</pre>';
}
//创建一个把内容放在数据的函数
function put($shuju){
    //把存储数据库的数据合法化后返回一个变量
    $newData=var_export($shuju,true);
    //创建一个变量，定界符里的内容可以在页面中格式化输出，把数据组合成一个字符串
    $str=<<<str
<?php   
return {$newData};
?>
str;
    //把处理后的数据放在数据库文件里
file_put_contents('data.php',$str);
}
//定义一个常量，如果提交方式是POST，证明用户提交了返回true，否则返回假
define('IS_POST',$_SERVER['REQUEST_METHOD']=='POST'?true:false);
?>