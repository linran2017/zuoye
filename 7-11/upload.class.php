<?php
//创建一个可以单文件上传也可以多文件上传的类
class Upload{
    //创建一个存储错误的公共变量，
    public $error='';
    //创建一个重置数组的私有函数
private function resetArr(){
    //p($_FILES);
    //为了可以随便更改input的name的属性值，获得当前指针指向的键值
    $infor=current($_FILES);
    //如果文件名是数组，证明是多文件上传
    if(is_array($infor['name'])){
        //就循环存储文件名的数组
        foreach ($infor['name'] as $k=>$v){
            //定义一个数组，向数组末尾添加数据
            $arr[]=[
                //文件名就是当前循环的键值
                'name'=>$v,
                //文件类型就是数组type的$k所对应的当前键值
                'type'=>$infor['type'][$k],
                'tmp_name'=>$infor['tmp_name'][$k],
                'error'=>$infor['error'][$k],
                'size'=>$infor['size'][$k]
            ];
        }
        //否则就是单文件上传，在数组末尾添加单元
    }else{
        $arr[]=$infor;
    }
    //最后返回上传的文件数组
    return $arr;
}
//创建一个过滤掉上传不符合要求文件的私有函数
private function filter($v){
    //1,从右边‘.’开始截取一直返回到最后的部分
    //2，再删除字符串左边的‘.’
    //3，这样就获得了文件类型
    $type=ltrim(strrchr($v['name'],'.'),'.');
    //创建一个存储文件类型的数组
    $typeArr=['jpg','png','jpeg'];
    //用switch判断
    switch (true){
        //如果数组的error所对应的键值为4
        case $v['error']==4;
        //存储错误的变量值为‘文件没有被上传’
        $this->error='没有文件上传';
        //返回false，后面的代码不再执行
        return false;
        //如果上传文件不合法
        case !is_uploaded_file($v['tmp_name']);
        $this->error='文件不是通过合法的HTTP上传';
        return false;
        //如果文件类型不在数组中
        case !in_array($type,$typeArr);
        $this->error='文件类型不正确';
        return false;
        //如果上传文件大于2M
        case $v['size']>2000000;
        $this->error='文件大小大于2M';
        return false;
        //如果数组的error所对应的键值为1
        case $v['error']==1;
        $this->error='大小超过了 php.ini 中 upload_max_filesize 限制值';
        return false;
        //如果数组的error所对应的键值为2
        case $v['error']==2;
        $this->error= '大小超过 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
        return false;
        //如果数组的error所对应的键值为3
        case $v['error']==3;
        $this->error='文件只有部分被上传';
        return false;
        //如果以上情况都不是就返回真
        default;
        return true;
    }
}
//创建一个移动文件的私有函数
private function move($v){
    //1,从右边‘.’开始截取一直返回到最后的部分
    //2，再删除字符串左边的‘.’
    //3，这样就获得了文件类型
    $type=ltrim(strrchr($v['name'],'.'),'.');
    //设置文件名为当前时间为了防止出现重复覆盖现象再加上0-99999之间的随机数
    //然后连接‘.’最后加上数据类型
    $filename=time().mt_rand(0,99999).'.'.$type;
    //定义一个目录变量，目录名为‘.upload/’再连接上当天日期，这样便于文件管理
    $dir='./upload/'.date('ymd');
    //如果目录不存在，就创建这个目录
    is_dir($dir) || mkdir($dir,0777,true);
    //把目录名和文件名连接起来就是文件的上传路径
    $path=$dir.'/'.$filename;
    //把临时存放的文件移动到上传目录
    move_uploaded_file($v['tmp_name'],$path);
}
//创建一个上传文件的公共函数
public function up(){
    //把重置后的数组赋值给变量$arr
    $arr=$this->resetArr();

     //循环数组$arr
    foreach ($arr as $v){
        //如果过滤函数返回false
      if(!$this->filter($v)){
          //就返回false
            return false;
        }
    }
    //循环变量$arr数组
    foreach ($arr as $v){
        //每次循环执行移动目录的函数
        $this->move($v);
    }
    //最后返回真
    return true;
}
}
?>