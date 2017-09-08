<?php
//加载函数文件
include 'functions.php';
//加载数据库文件，并且把数据内容返回一个变量
$data=include 'data.php';
//好的要删除这条内容的编号
$id=$_GET['i'];
//删除这条内容
unset($data[$id]);
//把处理后的文件放在文件里
put($data);
//创建变量，js代码，弹出删除成功，跳转页面
$s=<<<s
<script>
alert('删除成功');
location.href='index.php';
</script>
s;
//输出变量，执行里面的代码
echo $s;

?>