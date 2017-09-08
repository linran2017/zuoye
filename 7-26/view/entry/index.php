<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        .box{
            margin: 50px auto;
            width: 750px;
        }
        h2{
            width: 750px;
            text-align: center;
        }
        li{
            list-style: none;
            width: 750px;
            height: 100px;
            border-top: 1px #cccccc solid;
            text-align: center;
            position: relative;
        }
        span{
            color: #666666;
            font-size: 14px;
            position: absolute;
            bottom: 5px;
            left: 5px;
        }
        b{
            color: #666666;
            font-size: 12px;
            position: absolute;
            bottom: 5px;
            right: 5px;
        }
        .del{
            text-decoration: none;
            position: absolute;
            top: 2px;
            right: 2px;
            font-size: 14px;
            display: block;
            width: 36px;
            height: 28px;
            text-align: center;
            line-height: 28px;
            background: darkred;
            color: white;
            cursor: pointer;
        }
        .content{
            width: 500px;
            margin-left: 125px;
            margin-top: 30px;
            font-size: 14px;
            line-height: 16px;

        }
        add{
            width: 750px;

        }
        .tj{
            margin-top: 5px;
            width: 750px;
            position: relative;
        }
        .name,.liouyan{
            font-size: 14px;
            position: absolute;
            left: 0;
            top: 0;
        }
        input{
            width: 750px;
            height: 30px;
            line-height: 30px;
        }
        textarea{
            width: 750px;

        }
        .fabu{
            display: block;
            width: 100px;
            height: 28px;
            line-height: 28px;
            text-align: center;
            background: green;
            font-size: 16px;
            color: white;
            border: none;
            float: right;
            cursor: pointer;
        }

    </style>
</head>
<body>
<div class="box">
    <h2>添加留言</h2>
   <form class="form" action="" method="post">
       <div class="add">
           <p class="tj"><input type="text" name="nikename"  placeholder="昵称" /></p>
           <p class="tj"><textarea rows="10" cols="5" name="content" placeholder="填写留言内容"></textarea>
           </p>
           <p class="tj"><input type="submit" value="发布留言" class="fabu" /></p>
       </div>
   </form>
<h2 style="margin-top: 20px">留言板</h2>
    <ul style="margin-top: 5px;">
        <?php foreach($data['msg'] as $v): ?>
        <li>
            <a class="del" href="?a=del&mid=<?php echo $v['mid']?>">删除</a>
            <span class="nikename">昵称:<?php echo $v['nikename'] ?></span>
            <p class="content"><?php echo $v['content'] ?></p>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>