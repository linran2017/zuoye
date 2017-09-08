<?php
//创建一个注册，登录，退出的类，并且继承Controller类
class MemberController extends Controller {
    //创建一个存储数据数组的私有属性，只有在类里面可以调用
    private $user=[];
    //创建一个__construct的公共方法，只有一实例化对象，此方法就会触发
    public function __construct(){
        //有人数据库文件并且把返回的数据数组返回给当前对象user属性
        $this->user=include './data.php';
    }

    //创建一个注册的公共方法，在类里面和外面都可以调用
    public function reg(){
        //调用父级类里面的载入模板方法，载入会员文件夹里面的注册模板
        $this->display();
        //如果IS_POST为true,证明用户点击了注册
        if(IS_POST){
            //验证码不区分大小写，把用户的输入的验证码都转为小写
            //如果输入的验证码不等于session存储的验证码
            if(strtolower($_POST['captcha'])!=$_SESSION['captcha']){
                //就提示验证码输入错误，跳转到本页，终止后面的代码
                $this->message('验证码错误');
            }
            //遍历存储用户名和数组
            foreach ($this->user as $v){
                //如果用户输入的用户名等于数据库存储的用户名
                if($v['username']==$_POST['username']){
                    //就提示用户名已存在
                    $this->message('该用户名已存在');
                }
            }
            //把用户输入的密码加密
            $_POST['password']=md5($_POST['password']);
            //删除用户提交的验证码
            unset($_POST['captcha']);
            //把用户提交用户名和密码追加到数据数组的末尾
            $this->user[]=$_POST;
            //把用户名和密码的数组存放到数据库文件里
            $this->dataToFile('./data.php',$this->user);
            //点击注册后就会提示注册成功，跳转到登录页面
            $this->message('注册成功','?a=login&c=member');
        }
    }

    //创建一个登录的公共方法
    public function login(){
        //调用父级类里面的载入模板方法，载入会员文件夹里面的登录模板
        $this->display();
        //如果IS_POST为true,证明用户点击了登录
        if(IS_POST){
            //遍历储存用户名和密码的数组
            foreach ($this->user as $v){
                //如果用户提交的用户名和加密后密码与数据库里的用户名和密码都相等
                if($v['username']==$_POST['username'] && $v['password']==md5($_POST['password'])){
                    //就证明登录成功，把用户的用户名保存到session数据里，可以在任何的地方调用，
                    //作为用户的登录凭证
                    $_SESSION['username']=$_POST['username'];
                    //如果$_POST['autologin']存在，证明用户勾选了7天免登陆
                    if(isset($_POST['autologin'])){
                        //就延长钥匙的有效期（7天）
                        //设置cookie setcookie(session名,session值,延长时间,作用域)
                        setcookie(session_name(),session_id(),time()+3600*24*7,'/');
                    }else{
                        //否则就是不勾选七天免登陆，浏览器关闭会话就消失
                        setcookie(session_name(),session_id(),0,'/');
                    }
                    //提示登录成功，跳转到首页
                    $this->message('登录成功','index.php');
                }
            }
            //遍历完所有的用户名和密码，如果都不等于用户输入的用户名和密码，
            //就提示登录失败，跳转到当前页，终止后面代码运行
            $this->message('登录失败');
        }
    }

    //创建一个进入会员中心的公共方法
    public function index(){
        //调用父级类里面的载入模板方法，载入会员文件夹里面的会员中心模板
        $this->display();
    }

    //创建一个退出登录的公共方法
    public function logout(){
        //如果用户点击退出，就删除当前用户所有的session变量，
        //不删除session文件，不释放sessionid
        session_unset();
        //删除当前用户的session文件,以及释放sessionid
        session_destroy();
        //提示退出成功，跳转到登录页
        $this->message('退出成功','?a=login&c=member');
    }

    //创建一个载入画布的公共方法
    public function captcha(){
        //实例化一个对象，在页面中输出验证码
        $captcha=new Captcha();
        //设置画布颜色
        $captcha->bgColor='#000000';
        //设置画布宽度
        $captcha->width=160;
        //设置画布高度
        $captcha->height=50;
        //设置干扰圆的数量
        $captcha->num=40;
        //设置验证码的字符长度
        $captcha->length=4;
        //设置验证码字体大小
        $captcha->fontsize=30;
        //调用画板里面的shou方法，把验证码显示在页面中
        $captcha->show();
    }
}
?>