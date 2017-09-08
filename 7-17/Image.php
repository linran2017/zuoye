<?php
//引入函数文件
include 'functions.php';
//创建一个给图片加水印的类
class Image{
    //创建一个公共的给图片加水印的方法，定义目标图和源图两个形参
    public function water($img,$water){
        //获取目标图的资源
        $dstimginfo=getimagesize($img);
        //p($dstimginfo);
        //1.获取目标图像信息数组里mime键名说对应的键值
        //2，将键值从右边'/'开始截取一直返回到最后
        //3，任何在截取左边的'/'
        //4，这样就得到了目标图片的类型
        $dstType=ltrim(strrchr($dstimginfo['mime'],'/'),'/');
        //echo $dstType;
        //组合变量函数，如果是jpg图片，就是 imagecreatefrom，如果是png,就是imagecreatepng
        $dstFn='imagecreatefrom'.$dstType;
        //创建一个新的目标图像
        $dstImg=$dstFn($img);
        //获取源图的资源
        $srcimginfo=getimagesize($water);
        //1.获取源图像信息数组里mime键名说对应的键值
        //2，将键值从右边'/'开始截取一直返回到最后
        //3，任何在截取左边的'/'
        //4，这样就得到了源图片的类型
        $srcType=ltrim(strrchr($srcimginfo['mime'],'/'),'/');
        //p($srcimginfo);
        //echo $srcType;
        //组合变量函数，如果是jpg图片，就是 imagecreatefrom，如果是png,就是imagecreatepng
        $srcFn='imagecreatefrom'.$srcType;
        //创建一个新的目标图像
        $srcImg=$srcFn($water);
        //把水印盖在大图上，设置水印在大图的位置，大小，透明度
        imagecopymerge($dstImg,$srcImg,$dstimginfo[0]-$srcimginfo[0]-10,$dstimginfo[1]-$srcimginfo[1]-10,0,0,$srcimginfo[0],$srcimginfo[1],50);
        //组合变量函数，另存水印图
        $fn='image'.$dstType;
        //组合另存文件名，设置加盖水印后的文件名为原来目标图的路径的前部分加上'/water_'再连接上目标图路径的最后一部分
        $fileName=dirname($img).'/water_'.basename($img);
        //输出加盖水印后的图像
        $fn($dstImg,$fileName);
    }
}
//实例化加盖水印图像的对象
$shuiying=new Image();
//调用加盖水印的方法，传递目标图片和源图片两个参数
$shuiying->water('./shanghai.jpg','./1.png');

?>