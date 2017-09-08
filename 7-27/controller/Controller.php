<?php
//定义一个父级类
class Controller{
    //定义一个受保护的方法，加载模板，并且传递参数，参数是什么内容，模板中就是什么内容
    protected function display($data){
        //加载view文件夹下的CONTROLLER目录下的ACTION.php页面
        include './view/'.CONTROLLER.'/'.ACTION.'.php';
    }
}
?>