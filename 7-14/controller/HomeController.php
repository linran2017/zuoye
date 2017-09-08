<?php
//创建一个载入模板的类，并且继承Controller类
class HomeController extends Controller {
    //创建一个加载模板的公共方法，这样类里面和外面都可以调用
    public function index(){
        //调用父级类里面的载入页面的方法，加载home文件夹里面的index模板
        $this->display();
    }
}

?>