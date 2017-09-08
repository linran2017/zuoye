<?php
//创建一个类，并且继承父级类
class EntryController extends Controller {
    //创建一个公共方法，加载模板
    public function index(){
        //调用Model中为定义的静态变量，触发Model对象里的方法，再调用base里的获取数据库message表里的数据的get方法
        $arcData=Model::get('arc');
        //加载模板，让message表里的数据显示在页面
        $this->display(['arc'=>$arcData]);
        //如果用户点击提交留言
        if(IS_POST){
            //就把用户提交的内容添加到数据库message表里面的数据中
            $sql="INSERT INTO arc SET title='{$_POST['title']}'";
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
        $sql='DELETE FROM arc WHERE aid='.$_GET['aid'];
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

    //定义一个公共的方法，不计较标题
    public function edit(){
        //获得要编辑标题所对应的aid
        $aid=$_GET['aid'];
        //如果用户点击修改
        if(IS_POST){
            //就更新这条数据，把标题改为用户提交的标题内容
            $sql="UPDATE arc SET title='{$_POST['title']}' WHERE aid={$aid}";
            //调用Model里面的静态方法，执行无结果集的操作
            Model::e($sql);
            //输出定界符变量里的内容，弹出‘修改成功’的消息，并且跳转到首页，也就是刷新此页面
            echo <<<s
<script>
alert('编辑成功');
location.href='./index.php';
</script>
s;
            //终止后面的代码
            exit;
        }
        //查询arc里面用户编辑标题所对应的这一条数据
        $sql='SELECT * FROM arc WHERE aid='.$aid;
        //调用Model对象里的静态方法，执行有结果集的操作
        $data=Model::q($sql);
        //获得当前指针指向的键值，把二维数组转变为一维数组
        $oldData=current($data);
        //compact(oldData)就相当于['oldData'=>$oldData]，加载编辑模板，把编辑的数据显示在页面
        $this->display(compact('oldData'));
    }

    //定义一个公共方法，搜索标题
    public function search(){
        //获得用户搜索的关键字
        $wd=$_GET['wd'];
        //将用户搜索的关键字转义
        $wd=addslashes($wd);
        //查询arc表中所有标题中含有搜索的关键字的标题所对应的数据
        $sql="SELECT * FROM arc WHERE title like '%{$wd}%'";
        //调用Model里的静态方法，执行有结果集的操作
        $data=Model::q($sql);
        //compact(oldData)就相当于['oldData'=>$oldData]，加载编辑模板，把编辑的数据显示在页面
        $this->display(compact('data'));
    }
}
?>