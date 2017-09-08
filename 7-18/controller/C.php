<?php
//创建一个父级类，便于多子类继承
class Controller{
    //final为了子类的方法不和此方法名重复，
    //定义一个受保护的方法，加载模板
    final protected function display(){
        //加载tpl文件夹里的CONTROLLER文件夹下的ACTION.php模板
        include './tpl/'.CONTROLLER.'/'.ACTION.'.php';
    }
    //final为了子类的方法不和此方法名重复，
    //定义一个受保护的方法，消息提示和跳转页面
    final protected function massage($msg,$url=''){
        //如果跳转页面的形参没有传值
        if(empty($url)){
            //就默认跳转当前页
            $script='window.history.back()';
        }else{
            //如果传值就跳转到$url页面
            $script="location.href='{$url}'";
        }
        //定义一个定界符字符串,用js弹出消息提示的内容，跳转页面
        $str=<<<str
<script>
alert('{$msg}');
$script;
</script>
str;
        //输出定界符变量，让里面的js正常执行
        echo $str;
        //终止程序，让后面的代码不要执行
        exit;
    }
}
?>