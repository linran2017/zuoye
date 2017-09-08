<?php
//创建一个注册系统的来，并且继承父级类
class MemberController extends Controller {
    //创建一个私有属性，来存储用户名和密码
    private $user=[];
    //这样一实例化对象，该方法就会触发
    public function __construct(){
        //如果./data.php是一个文件
        if(is_file('./data.php')){
            //就引入这个文件，并且赋值给变量
            $this->user=include './data.php';
        }else{
            //如果不是一个文件，变量user就是一个空数组
            $this->user=[];
        }
    }
    //创建一个注册的公共方法
    public function reg(){
        //调用父级的方法，加载模板
        $this->display();
        //如果用户点击注册
        if(IS_POST){
            //为了双层保护，以防js出现错误，不能正常拦截用户输入不正确的信息，就在后台也也写一层防护，用户输入错误可以拦截
            //如果输入的验证码与session里保存的验证码不相等
            if($_POST['captcha']!=$_SESSION['captcha']){
                //就提示验证码错误，跳转到当前页
                $this->massage('验证码错误');
            }
            //将用户输入的密码加密
            $_POST['password']=md5($_POST['password']);
            //循环数据数组
            foreach ($this->user as $v){
                //如果输入的用户名与数据库里的验证码相等
                if($_POST['username']==$v['username']){
                    //就提示用户名已存在，返回当前页
                    $this->massage('用户名已存在');
                }
            }
            //删除用户输入的验证码
            unset($_POST['captcha']);
            //把用户输入的用户名和密码追加到数组末尾
            $this->user[]=$_POST;
            //把数据数组合法化返回，并且赋值给数据数组
            $this->user=var_export($this->user,true);
            //定义定界符变量，组合字符串
            $s=<<<s
<?php
return {$this->user};
?>
s;
            //把组合好的字符串存储到数据库文件里
            file_put_contents('./data.php',$s);
            //提示注册成功，跳转到首页
            $this->massage('注册成功','index.php');
        }
    }
    //创建一个异步检测用户名的公共方法
    public function checkuser(){
        //把输入的用户名赋值给变量
        $user=$_POST['u'];
        //循环数据数组
        foreach ($this->user as $v){
            //如果用户输入的用户名等于数据库里的用户名
            if($user==$v['username']){
                //就输出1,
                echo 1;
                //终止后面的代码
                exit;
            }
        }
        //循环玩以后都不相等就输出0
        echo 0;
    }

    //创建一个异步检测 验证码的公共方法
    public function checkcaptcha(){
        //如果输入的验证码转为小写后不等于session里保存的验证码
        if(strtolower($_POST['c'])!=$_SESSION['captcha']){
            //就输出1
            echo 1;
        }else{
            //否则就输出0
            echo 0;
        }
    }
    //创建一个输入显示验证码的公共方法
    public function captcha(){
        //实例化画布对象
        $captcha=new Captcha();
        //调用画板里面的验证码显示方法
        $captcha->show();
    }
}
?>