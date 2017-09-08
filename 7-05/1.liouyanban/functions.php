<?php
//把文本类型改为text/html,编码类型为utf-8，防止汉字在页面中乱码
header('content-type:text/html;charset=utf-8');
//创建p函数，让变量可以在页面中正常输出
function p($val){
    //格式化输出
    echo '<pre>';
    //打印变量
    print_r($val);
    echo '</pre>';
}

//创建把添加，修改，删除后的数据放在data.php文件里
function put($shuju){
    //把处理过的数据合法化，再返回一个变量
    $newData=var_export($shuju,true);
    //创建一个变量,定界符可以解析变量，把合法化的代码组合成字符串
    $str=<<<str
<?php
return
{$newData};
?>
str;
    //把组合好的字符串放在data.php文件里
file_put_contents('data.php',$str);
}
//定义一个变量，如果添加方式是post,证明用户提交了，就返回true,否则返回假
define('IS_POST',$_SERVER['REQUEST_METHOD']=='POST'?true:false);
?>