<?php
//创建一个父级类，多种子集可以继承
class Controller{
    //创建一个受保护的引入模板的受保护方法，只有类本身和他子类可以调用
    protected function display(){
        //加载将./tpl/CONTROLLER转为小写的文件夹下的ACTIN.php模板
        //比如默认就是./tpl/home/index.php模板
        include './tpl/'.strtolower(CONTROLLER).'/'.ACTION.'.php';
    }
    //创建一个把内容放入文件的受保护的方法，传入文件名，数据数组两个参数
    protected function dataToFile($fileName,$date){
        //将处理后的数据数组名合法化返回，赋值一个变量
        $date=var_export($date,true);
        //定义一个定界符变量，把存储数据的数组组合成字符串
        $str=<<<str
<?php
return {$date};
?>
str;
        //把组合好的字符串放入文件中，保存数据到文件
        file_put_contents($fileName,$str);

    }

    //创建一个受保护的消息提示的文件，传入消息提示内容，跳转链接两个参数
    protected function message($msg,$url=''){
        //如果跳转链接为空，说明就没有传值
        if(empty($url)){
            //就返回当前页
            $script="window.history.back()";
        }else{
            //否则跳转到$url的传入址的页面
            $script="location.href='{$url}'";
        }
        //定义一个定界符变量，定界符里的内容可以在页面中正格式化输出
        //采用js弹出消息提示内容，跳转到要去的页面
        $s=<<<s
<script>
alert('{$msg}');
$script;
</script>
s;
        //输出定界符变量，让里面的js代码在页面中正常执行
        echo $s;
        //终止下面的代码，让后面的代码不再运行
        exit;

    }
}
?>