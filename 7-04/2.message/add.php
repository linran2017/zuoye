<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>昵称</td>
			<td>内容</td>
		</tr>
		<?php foreach($data as $k => $d){ ?>
			<tr>
				<td><?php echo $k; ?></td>
				<td><?php echo $d['nickname'] ?></td>
				<td><?php echo $d['title'] ?></td>
			</tr>
		<?php } ?>
	</table>
	<hr>
	<form action="" method="post">
		昵称：<input type="text" name="nickname" id="">
		<br>
		内容：<input type="text" name="title" id="">
		<br>
		<input type="submit" value="添加留言">
	</form>
</body>
</html>