<?php
//定义一个可以添加，删除，修改留言板的类，并且继承Controller类
class Home extends Controller {
    //创建一个私有的存储数据的属性
    public $data='';
    //创建一个construct函数，这样一实例化对象就会触发此函数
    public function __construct(){
        //只要一实例化对象就会加载数据库文件，并且把数据库返回的数组赋值给数据属性
      $this->data=include './data.php';
    }
    //创建一个公共函数，引入首页的面板
    public function shouye(){

       include 'shouye.php';
    }
    //创建一个公共函数，引入添加留言的页面
    public function add(){
        include 'add.php';
        //调用当前对象的添加方法
        $this->tianjia();

    }
    //创建一个公共函数
    public function del(){
        //调用当前对象的删除方法
        $this->shanchu();

    }
    //创建一个公共函数，引入编辑留言的页面
    public function edit(){
        include 'edit.php';
        //调用当前对象的编辑方法
        $this->bianji();
    }
    //创建一个可以把内容存放在文件的私有函数
    private function put(){
        //把处理后的据合法化返回，然后赋值给一个新变量
        $newData=var_export($this->data,true);
        //定义一个定界符变量，定界符里的内容可以在页面中格式化输出，把数组组合成一个字符串
        $str=<<<str
<?php
return {$newData};
?>
str;
        //把组合成的字符串存放在数据库文件里
        file_put_contents('data.php',$str);
    }
    //创建一个添加数据的私有函数
    private function tianjia(){
        //如果用户点击添加留言
       if($_POST){
           //就把填写的数据添加到数组末尾
           array_push($this->data,$_POST);
           //调用把数据存放到数据库文件里的函数
           $this->put();
           //调用父级的函数，只要点击添加留言就会弹出添加成功，并且返回首页
           $this->success('添加成功','index.php');
       }
    }
    //创建一个删除数据的私有函数
    private function shanchu(){
        //获得get参数就可以得到要删除的编号
            $id=$_GET['j'];
            //这样就可以删除编号所对应的留言，就删除了这条数据
            unset($this->data[$id]);
            //调用类里面的存放数据到数据库文件的函数
            $this->put();
        //调用父级的函数，只要点击添加留言就会弹出删除成功，并且返回首页
           $this->success('删除成功','index.php');
        }
        //创建一个私有的编辑留言板的方法
    private function bianji(){
        //如果用户点击编辑，就会有get参数，就可以获得要编辑留言的编号
        $id=$_GET['i'];
//如果用户点击编辑成功
        if($_POST){
            //就把这一条的昵称和留言内容改为用户提交的昵称和内容
            $this->data[$id]=$_POST;
            //调用类里面的存放数据到数据库文件的函数
            $this->put();
            //调用父级的函数，只要点击添加留言就会弹出修改成功，并且返回首页
            $this->success('修改成功','index.php');
        }
    }
}
?>