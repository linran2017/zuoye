<?php
    include_once './6281.php';

    $arr = ['a'=>'A','b'=>'B','c'=>['d'=>['e'=>'E','r'=>['f'=>'F']]]];

    function changeCase(&$a)
    {
      //让形参$和数组共享一块地址
      // 遍历数组的键名和键值
      foreach ($a as $k => $v) 
      {
        // 如果键值是一个数组
        if(is_array($v))
        {
          // 1. foreach ($a as $k => $v)   此时 $k 是c， $v 是c后面的内容
          // 现在 键值 $v(是c后面的内容) 是一个数组 所以 
            // 我们执行自调用   changeCase($a[$k]) == changeCase($a['c']);

            // 2. foreach ($a as $k => $v) ==  foreach ($a['c'] as $k => $v) 
              // 我们把它想像成1维数组
            //$k 是啥？  键名键名键名， 重要事情说3遍
            //$v 是啥？  键值键值键值， 重要事情说3遍 
            // 我们在找啥？不是再找  ($a['c'] as $k => $v)
            // $a['c']里面 $k(键名)是d 、$v(键值)是d后面的内容嘛！ 

            //                             此时 $k(键名)是 $a['c']数组里面的d，
            //         $v(键值)是 $a['c']数组里面的d后面内容，也就是还是数组嘛！

  //  3. foreach ($a as $k => $v) == foreach ($a['c']['d'] as $k => $v)
            // 我们在找啥？不是再找  ($a['c']['d'] as $k => $v)
            // $a['c']['d']里面 $k(键名)是e 、$v(键值)是e后面的内容嘛！ 
  
            //                          此时 $k(键名)是 $a['c']['d']数组里面的e，
            //  此时 $v(键值)是  $a['c']['d']数组里面的e后面内容，也就是还是数组嘛！
            // .....有点绕

            //找到最后键值终于不是数组了。所以结束if判断了，但还有事情没做呢，总不能找半天啥事没做吧! 
          changeCase($a[$k]);
        }
      }

        //就 都给变大写？ 奇怪这里是$a, $a明明是传过去的数组，怎么变大写？
        //我们第一次执行自调用 
//  function changeCase(&$a) == changeCase($a[$k]) == changeCase($a['c']); 不就是把changeCase($a['c'])传给$a吗， $a只是一个形参，就是一个名字、、
        // 我们多次 调用会不会把前面的覆盖了？ 把$a覆盖， 为什么
        // 不好解释， 我们假设我们每自调用一次,系统帮我们保存一次值, 
        // a1,a2,a3....   

       $a = array_change_key_case($a,CASE_UPPER);
      return $a;
    }
   $b =  changeCase($arr);
   p($b);
?>