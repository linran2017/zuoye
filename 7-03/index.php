<?php
//创建一个p函数，定义一个形参,用于传入函数
function p($val){
    //按格式输出
    echo '<pre style="background: #ccc; padding: 10px; font-size: 18px;">';
    //打印函数
    print_r($val);
    echo '</pre>';
}

//创建一个函数，按址传参，让形参和数组共享一个数组
function changeCase($arr){
    //把数组的每一层的键名都转为大写，再赋值给原数组
    $arr=array_change_key_case($arr,CASE_UPPER);
    //循环数组的键名和键值
    foreach($arr as $k=>$v){

        //如果数组的键值是数组类型
        if(is_array($v)){
            //就需要递归，函数调用自己，再次循环是数组类型的键值，
            //如果键值是数组，再用递归函数，就这样依次，循环，判断，递归
            //直到$arr数组的最后一层为止
            $arr[$k]=changeCase($arr[$k]);
        }
    }

    //返回每一层键名都转为大写的数组
    return $arr;
}
//创建一个多维数组
$a=[
    'a'=>'A',
    'd'=>[
        'm'=>'M',
    ],
];
//把多维数组传入将数组的键名改为大写的函数里
$b=changeCase($a);
//调用p函数，按格式打印函数
p($b);
?>

