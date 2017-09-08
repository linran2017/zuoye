<div>
    <!--如果用户已经登录，头部就显示欢迎‘用户’归来和退出链接-->
    <?php if(isset($_SESSION['username'])): ?>
    欢迎<a href="?c=member" style="color: darkred"><?php echo $_SESSION['username'] ?></a>归来
        <a href="?a=logout&c=member">退出</a>
        <?php else: ?>
        <!--否则用户就没有登录，头部显示注册和登录的链接-->
        <a href="?a=reg&c=member">注册</a>
        <a href="?a=login&c=member">登录</a>
    <?php endif; ?>
</div>
<hr/>