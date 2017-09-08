<?php
//创建一个类，操作数据库
class Base{
    //定义一个私有的静态属性，存储数据库的数据，先赋值null
    private static $pdo=NULL;
    //只要一实例化对象就会触发此方法
    public function __construct(){
        //调用对象里面的链接数据库的方法
        $this->connect();
    }
    //创建一个私有的方法，链接数据库
    private function connect(){
        //第一次调用静态属性$pdo,$pdo为null，就链接数据库，因为$pdo是静态属性，在一次刷新以内可以存储值
        //,所以第二次，三次……调用此方法时，$pdo已经有了值，就不需要再连接数据库了
        if(is_null(self::$pdo)){
            //尝试连接数据库
            try{
                //创建一个变量，存储数据库的主机名;数据库名
                $dsn='mysql:host=127.0.0.1;dbname=c83';
                //使用PDO链接数据库，如果有异常错误，就会被catch捕捉到
                $pdo=new PDO($dsn,'root','root');
                //设置错误属性为异常错误，因为要被catch捕捉到
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                //设置数据库的编码为utf8
                $pdo->exec('SET NAMES UTF8');
                //把POD对象放入到静态属性$pdo中
                self::$pdo=$pdo;
                //捕捉异常错误
            }catch (PDOException $e){
                //如果有异常错误就会终止后面的代码，提示异常错误
                exit($e->getMessage());
            }
        }
    }

    //创建一个公共的方法，获得数据库里的数据
    public function get($table){
        //查询数据库中表里的所有数据
        $sql='SELECT * FROM '.$table;
        //执行$sql操作
        //query执行有结果集的操作
        //调用PDO对象里的query的方法并且赋值给变量$result
        $result=self::$pdo->query($sql);
        //获得数据库中的数据，并且是关联数组。赋值给$data变量
        $data=$result->fetchAll(PDO::FETCH_ASSOC);
        //返回数据库里的数据
        return $data;
    }
    //创建公共方法，执行有结果集的操作
    public function q($sql){
        //如果有异常错误就会被捕捉
        try{
            //调用静态属性中执行有结果集的方法，并且赋值给变量
            $result=self::$pdo->query($sql);
            //获得数据，而且是关联数组，赋值给变量
            $data=$result->fetchAll(PDO::FETCH_ASSOC);
            //返回数据库中的数据
            return $data;
        }catch (PDOException $e){
            //如果有异常错误就会终止后面的代码，提示异常错误
            exit($e->getMessage());
        }
    }

    //创建公共方法，执行没有结果集的操作
    public function e($sql){
        //如果有异常错误就会被捕捉
        try{
            //调用静态属性中执行无结果集的方法，并且赋值给变量
            $afRows=self::$pdo->exec($sql);
            //返回结果
            return $afRows;
        }catch (PDOException $e){
            //如果有异常错误就会终止后面的代码，提示异常错误
            exit($e->getMessage());
        }
    }
}
?>