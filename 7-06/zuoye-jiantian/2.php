<?php
//2将html文档中的所有a链接替换为http://www.houdunwang.com
$str = <<<str
<div class="topbar">
			<ul class="site-nav topmenu">
				<li id="menu-item-6360" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6360"><a href="http://www.daqianduan.com/contact">联系大前端</a></li>
<li id="menu-item-6361" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6361"><a href="http://www.daqianduan.com/ads">广告合作</a></li>
<li id="menu-item-6362" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6362"><a href="http://www.houdunwang.com">免费发布招聘</a></li>
<li id="menu-item-6363" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6363"><a href="http://www.daqianduan.com/about">关于大前端</a></li>
<li id="menu-item-6364" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6364"><a href="http://www.daqianduan.com/links">友情链接</a></li>
				<li class="menusns">
					<a href="javascript:;">关注本站 <i class="fa fa-angle-down"></i></a>
					<ul class="sub-menu">
																																				<li><a target="_blank" href="http://www.daqianduan.com/feed"><i class="fa fa-rss"></i> RSS订阅</a></li>					</ul>

str;
//定义一个正则表达式，找到字符串中所有href=“所有字符，为了多匹配，用禁止贪婪模式，
//在重复后面加上问号，”，
$preg='/href="(.+?)"/';
//把上面的正则表达式全部替换为href="http:www.houdunwang.com"
$newStr=preg_replace($preg,'href="http://www.houdunwang.com"',$str);
echo $newStr;



?>