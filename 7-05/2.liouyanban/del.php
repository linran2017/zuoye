<?php
//加载函数文件
include 'functions.php';
//加载数据库文件，把数据库文件里的数组返回给变量
$data=include 'data.php';
//如果用户点击删除，就会获得get的参数，也就获得了要删除这条留言的序号
$id=$_GET['i'];
//删除$data数据库里下标为$id的这条留言
unset($data[$id]);
//调用put函数，把删除后的数据放在数据库文件里
put($data);
//创建一个变量，定界符里的内容可以在页面中直接输出，在变量里创建js代码，
//弹出修改成功的代码，跳转到首页
$s=<<<s
<script>
alert('删除成功');
location.href='index.php';
</script>
s;
//在页面中输出变量，让变量里的代码正常执行
echo $s;

?>