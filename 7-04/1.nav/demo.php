 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
 <head>
 	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
 	<script type="text/javascript" src="./jquery-1.7.2.min.js"></script>
 	<script type="text/javascript">
 		$(function(){
 			$('li').hover(function() {
 				$(this).find('.hidden').stop().show(500);
 			}, function() {
 				$(this).find('.hidden').stop().hide(500);
 			});
 		})
 	</script>
 	<title>Document</title>
 	<style type="text/css">
		*{
			margin: 0px;
			padding: 0px;
		}
		li{
			list-style: none;
		}
		a{
			text-decoration: none;
		}
		.menu{
			width: 980px;
			height: 40px;
			background: #000;
			margin: 10px auto;
			border-radius: 4px;
		}
		ul li{
			float: left;
			line-height: 40px;
			width: 90px;
			height: 40px;
			border-left: 1px solid #fff;
			border-right: 1px solid #fff;
			text-align: center;
			position: relative;
		}
		ul li .hidden{
			position: absolute;
			left: 0px;
			top: 40px;
			background: #f00;
			width: 90px;
			display: none;
		}
		ul li .hidden a{
			display: block;
			width: 90px;
			height: 40px;
			border: 1px solid #fff;
		}
		ul li .hidden a:hover{
			background: #000;
		}
		ul li a{
			color: #fff;
			font-family: '微软雅黑';

		}
		ul li a.menu_a:hover{
			color: red;
		}
 	</style>
 </head>
 <body>
 	<div class="menu">
		<ul>
			<li><a href="">首页</a></li>
<!--            采用混搭写法，循环$data数组，$data中有几个单元就会生成几个li标签，
                 $v作为$data数组的键值 -->
            <?php foreach($data as $v){ ?>
                <li>
                    <!-- //顶级 -->
                    <!--在每一个li标签里的a标签里，都相对应地输出$data的键值
                    这个数组里的'top'键名所对应的键值-->
                    <a href="" class="menu_a"><?php echo $v['top'] ?></a>

                    <!-- 二级 -->
                    <div class="hidden">
                        <!--同理，进行二级循环，循环每一个$data里的键值这个数组里的键名为
                        'son'的这个数组，'son'这个数组里有几个单元，就会生成几个a标
                        签的二级菜单，$sv作为该数组的键值-->
                        <?php foreach($v['son'] as $sv){ ?>
                        <!--在每一个二级菜单a标签里相对应地输出循环该数组的键值-->
                        <a href=""><?php echo $sv ?></a>
                            <!--结束二级循环-->
                        <?php } ?>
                    </div>
                </li>
              <!--结束一级循环-->
            <?php } ?>


		</ul>
	 		
 	</div>
 </body>
 </html>