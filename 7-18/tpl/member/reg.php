<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- 引入js文件-->
    <script src="./resource/js/jquery-1.11.3.min.js"></script>
    <script>
        //当body中元素加载完毕 后再执行js
        $(function () {
            //给用户名文本框加失去焦点事件
            $('input[name=username]').blur(function () {
                //把用户名的value值赋值给变量
                var username=$(this).val();
                //如果value的值为空
                if(username==''){
                    //就返回，后面的代码不执行
                    return;
                }
                //ajax异步请求
                $.ajax({
                    //请求的服务器地址，跳转到MemberController里的checkuser的方法，调用此方法
                    url:'?a=checkUser&c=member',
                    //发送的内容，把用户输入的用户名发给服务器
                    data:{u:username},
                    //发送发送为post
                    type:'post',
                    //发送成功后，创建函数，phpData是服务器返回的数据
                    success:function (phpData) {
                        //如果返回的数据是1
                        if(phpData==1){
                            //给class为usermsg的p标签内容里加一个span标签，提示用户名已存在
                            $('.usermsg').html('<span style="color: red;">该用户名已存在</span>');
                            //给用户名文本框添加一个为error的class
                            $('input[name=username]').addClass('error');
                        }else {
                            //否则就给class为usermsg的p标签内容里加一个span标签，提示用户名正确
                            $('.usermsg').html('<span style="color: green;">用户名正确</span>');
                            //给用户名文本框移除一个为error的class
                            $('input[name=username]').removeClass('error');
                        }
                    }
                })
            })
            $('input[name=repassword]').blur(function () {
                var repassword=$(this).val();
                if(repassword==''){
                    return;
                }
                $.ajax({
                    url:""
                })
            })
            //给验证码文本框加失去焦点事件
            $('input[name=captcha]').blur(function () {
                //把验证码的value值赋值给变量
                var captcha=$(this).val();
                //如果value的值为空
                if(captcha == ''){
                    //就返回，后面的代码不执行
                    return;
                }
                //ajax异步请求
                $.ajax({
                    //请求服务器地址，跳转到MemberController里的checkchaptcha的方法，调用此方法
                    url:'?a=checkcaptcha&c=member',
                    //发送的内容，把用户输入的验证码发给服务器
                    data:{c:captcha},
                    //发送发送post
                    type:'post',
                    //发送成功后，创建函数，phpShuju是服务器返回的数据
                    success:function (phpShuju) {
                        //如果返回的数据是1
                        if(phpShuju==1){
                            //给class为captchamsg的p标签内容里加一个span标签，提示验证码错误
                            $('.captchamsg').html('<span style="color: red;">验证码错误</span>');
                            //给验证码文本框添加一个为error的class
                            $('input[name=captcha]').addClass('error');
                        }else{
                            //给class为captchamsg的p标签内容里加一个span标签，提示用户名正确
                            $('.captchamsg').html('<span style="color: green">验证码正确</span>');
                            //给验证码文本框移除一个为error的class
                            $('input[name=captcha]').removeClass('error');
                        }
                    }
                })
            })
            //给表单添加提交事件
            $('form').submit(function () {
                //如果class为error的元素个数大于0,就说明输入错误
                if($('.error').length>0){
                    //就返回false,表单不能提交
                    return false;
                }
            })
        })
    </script>
</head>
<body>
<a href="?">去首页</a><br/>
<form action="" method="post">
    用户名：<input type="text" name="username" />
    <p class="usermsg" style="display: inline-block"></p><br/>
    密码：<input type="password" name="password" /><br/>
    确认密码：<input type="password" name="repassword" />
    <p class="repasswordmsg" style="display:inline-block;"></p><br/>
    验证码：<input type="text" name="captcha" />
    <p class="captchamsg" style="display: inline-block"></p>
    <img src="?a=captcha&c=member&=<?php echo microtime(true)?>" onclick="this.src=this.src+'&='+Math.random()" /><br/>
    <input type="submit" value="注册" />
</form>
</body>
</html>