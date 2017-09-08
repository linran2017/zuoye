<?php
//创建一个类
class Model{
    //创建一个公共的静态方法，调用未定义的静态方法，传入方法名，方法参数
    public static function __callStatic($name, $arguments){
        //返回自动调用Base对象里的方法，传入对象，方法名，方法参数
        return call_user_func_array([new Base,$name],$arguments);
    }
}
?>