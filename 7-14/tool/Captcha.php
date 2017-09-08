<?php
//创建一个制作验证码的类
class Captcha{
    //定义画板属性，让属性都为公共属性，这样在类的里面和外面都可以调用
    //画布宽度属性
    public $width;
    //画布高度属性
    public $height;
    //画布颜色属性
    public $bgColor;
    //验证码字体大小属性
    public $fontsize;
    //验证码文本内容属性
    public $seed='1234567890gvsdfkdlkmmshnesdASGJWYKKSXHDCMNLHVClvc';
    //验证码字符长度属性
    public $length;
    //干扰圆的数量属性
    public $num;
    //定义一个私有属性img,用来存储图片资源
    private $img;
    //这样一实例化对象就会触发此函数，设置里面形参的值，如果调用画板方法，
    //不传参就默认是这些属性值，如果传参就属性值就为传参的值
    public function __construct($width=200,$height=80,$bgColor='#ffffff',$fontsize=40,$length=4,$num=80){
        //把形参里面设置的值相对于地赋值给类里面的当前属性
        $this->width=$width;
        $this->height=$height;
        $this->bgColor=$bgColor;
        $this->fontsize=$fontsize;
        $this->length=$length;
        $this->num=$num;
    }

    //创建一个制作验证码的公共函数，这样可以在内部和外部都可以调用
   public function show(){
      //发送头部，定义文本类型为image/png类型
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
      //定义一个变量，用于存储验证码的文本，先给一个初始值
       $captach = '';
      //采用for循环，每次输出length个字母或数字
      for($i=0;$i<$this->length;$i++){
          //设置文字颜色，随机rgb0-200之间的十进制颜色
          $color=imagecolorallocate($this->img,mt_rand(0,200),mt_rand(0,200),mt_rand(0,200));
          //把文字y轴的位置复制给变量
          $y=($this->height+$this->fontsize)/2;
          //把文字x轴的位置复制给变量
          $x=$this->width/$this->length*$i+10;
          //设置文本为数据抽取字符串里的字符
          $text=$this->seed[mt_rand(0,strlen($this->seed)-1)];
          //把文本内容赋值给一个变量
          $captach .= $text;
          //把文字写入，设置文字大小，旋转角度，x轴和y轴的位置，颜色，字体文件，文本
          imagettftext($this->img,40,mt_rand(-45,45),$x,$y,$color,'./tool/font.ttf',$text);
      }
      //把赋值的文本变量都转为小写，再储存在session数据里，
      //这样在任何地方可以调用，用于和用户输入的验证码核对
      $_SESSION['captcha'] = strtolower($captach);
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
