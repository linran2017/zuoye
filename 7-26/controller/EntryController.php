<?php
//创建一个类，并且继承父级类
class EntryController extends Controller {
    //创建一个公共方法，加载模板
    public function index(){
        //调用Model中为定义的静态变量，触发Model对象里的方法，再调用base里的获取数据库message表里的数据的get方法
        $msgData=Model::get('message');
        //加载模板，让message表里的数据显示在页面
        $this->display(['msg'=>$msgData]);
        //如果用户点击提交留言
        if(IS_POST){
            //就把用户提交的内容添加到数据库message表里面的数据中
            $sql="INSERT INTO message SET nikename='{$_POST['nikename']}',content='{$_POST['content']}'";
            //执行没有结果集的操作
            Model::e($sql);
            //输出定界符变量里的内容，弹出‘添加成功’的消息，并且跳转到首页，也就是刷新此页面
            echo <<<s
<script>
alert('添加成功');
location.href='./index.php';
</script>
s;
            //终止后面的代码运行
            exit;
        }
    }

    //创建一个公共方法，删除留言
    public function del(){
        //删除用户点击的那一条的留言数据
        $sql='DELETE FROM message WHERE mid='.$_GET['mid'];
        //执行没有结果集的操作
        Model::e($sql);
        //输出定界符变量里的内容，弹出‘删除成功’的消息，并且跳转到首页，也就是刷新此页面
        echo <<<s
<script>
alert('删除成功');
location.href='./index.php';
</script>
s;
        //终止后面的代码
        exit;

    }
}
?>