<?php
//载入函数文件
include 'functions.php';
//如果用户点击上传，证明提交方式是post，IS_TRUE的值是true
if(IS_POST){
    //如果用户上传了文件，就载入上传类文件
    include 'upload.class.php';
    //实例化关键字，把上传类赋值给$upload变量
    $upload=new Upload();
    //如果上传类里的up函数返回true
    if($upload->up()){
        //就输出上传成功
        //echo '上传成功';
    }else{//否则就弹出出现对应错误
        $str=<<<str
<script>
alert('{$upload->error}');
</script>
str;
        //输出字符串，让代码在页面中执行
        echo $str;
    }
}
//载入模板
include 'tpl.php';
?>