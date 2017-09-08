<?php
//作业1：

/*class Captcha{
    public function show(){
        //1.发送头部
        //header()
        //2.创建并且填充画布
        $this->createBg();
        //3.写字
        $this->write();
        //4.干扰
        $this->makeTrouble();
        //5.输出再销毁
        //imagepng()
        //imagedestroy()
    }

    private function makeTrouble(){

    }

    private function write(){

    }

    private function createBg(){

    }

}

$c = new Captcha();
$c->show();

*/
//创建一个制作验证码的类
class Captcha{
    public $width;
    public $height;
    public $bgColor;
    public $fontsize;
    public $seed='1234567890gvsdfkdlkmmshnesdASGJWYKKSXHDCMNLHVClvc';
    public $length;
    public $num;
    //定义一个私有属性img,用来存储图片资源
    private $img='';
    public function __construct($width=200,$height=80,$bgColor='#ffffff',$fontsize=40,$length=4,$num=80){
        $this->width=$width;
        $this->height=$height;
        $this->bgColor=$bgColor;
        $this->fontsize=$fontsize;
        $this->length=$length;
        $this->num=$num;
    }

    //创建一个制作验证码的公共函数，这样可以在内部和外部都可以调用
   public function show(){
     header('Content-type:image/png');
       //调用当前对象的创建画布的方法
      $this->createBg();
       //调用当前对象的写入文字的方法
      $this->wirte();
       //调用当前对象的制作干扰的方法
      $this->makeTrouble();
      //在页面输出图像
      imagepng($this->img);
      //销毁图像资源
      imagedestroy($this->img);
  }
  //创建一个私有的创建画布的方法，只有在类的内部可以访问
  private function createBg(){
       //创建一个画布，并且设置画布宽高，并且把画布资源赋值给当前对象的img属性
      $this->img=imagecreatetruecolor($this->width,$this->height);
      //把16进制的颜色转为10进制，并且赋值一个变量
      $white=hexdec($this->bgColor);
      //填充画布，给画布填充白色
      imagefill($this->img,0,0,$white);
  }
  //创建一个写入文字的私有方法
  private function wirte(){
      //在验证码中随机抽取这些字母和数字
      //$seed='1234567890hbgawssdvlf2qazytrddcewsxszxcoAGFKDJNBANNSKSZDijhknm';
      //采用for循环，每次输出4个字母或数字
      for($i=0;$i<$this->length;$i++){
          //设置文字颜色，随机rgb0-200之间的十进制颜色
          $color=imagecolorallocate($this->img,mt_rand(0,200),mt_rand(0,200),mt_rand(0,200));
          //把文字y轴的位置复制给变量
          $y=($this->height+$this->fontsize)/2;
          //把文字x轴的位置复制给变量
          $x=$this->width/$this->length*$i+10;
          //设置文本为数据抽取字符串里的字符
          $text=$this->seed[mt_rand(0,strlen($this->seed)-1)];
          //把文字写入，设置文字大小，旋转角度，x轴和y轴的位置，颜色，字体文件，文本
          imagettftext($this->img,40,mt_rand(-45,45),$x,$y,$color,'font.ttf',$text);

      }
  }
  //创建一个私有的制作干扰的方法
  private function makeTrouble(){
      //循环for循环，制作80个干扰
      for($i=0;$i<$this->num;$i++){
          //设置干扰的颜色为随机0-200的十进制的颜色
          $color=imagecolorallocate($this->img,mt_rand(0,200),mt_rand(0,200),mt_rand(0,200));
          //把从0-20的随机数赋值给变量，设置园的宽高为0-20之间的大小
          $hw=mt_rand(0,20);
          //在画布画一个圆，设置圆的位置为随机在画布中分布，再设置圆的宽高和颜色
          imageellipse($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),$hw,$hw,$color);
      }
  }
}
//实例化制作验证码的对象
//$captcha=new Captcha();
//$captcha->bgColor='#000000';
//调用实例化对象里的show方法，制作验证码
//$captcha->show();
?>
