<?php
//定义一个加载模板的类，并且继承父级类
class HomeController extends Controller{
    //创建一个公共方法，外部也可以调用
    public function index(){
        //调用父级类里面模板的方法
        $this->display();
    }
}
?>