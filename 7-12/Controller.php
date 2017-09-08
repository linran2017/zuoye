<?php
//创建一个父级类，便于多种类可以继承
class Controller{
    //创建一个受保护的函数，左右它本身和子集可以调用，并且传入两个参数
    protected function success($msg,$url){
        //定义一个定界符变量，定界符的代码可以在页面中原样输出
        //用js代码弹出第一个参数$msg的值，任何跳转到第二个参数$url值的页面
        $str=<<<str
<script>
alert('{$msg}');
location.href="{$url}";
</script>
str;
        //在页面中输出变量$str,让代码正常执行
        echo $str;
    }
}
?>