<!DOCTYPE php>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>测试插入删除</title>
</head>
<body>
	<h1>测试插入删除</h1>
	</br>

	<h2>数据插入</h2>

	<form action="test_handle.php" name="form1" method="post">
		昵称:<input type="text" name="nickname" value=""/>
		用户名:<input type="text" name="username" value=""/>
		密码:<input type="password" name="password" value=""/>
		邮箱:<input type="text" name="mailbox" value=""/>
		<input type="submit" value="提交"/>
		<input type="reset" value="重置"/>
	</form>

	<h2>数据删除</h2>
	<table border="1" background="yellow">
		<th>用户ID</th>
		<th>用户昵称</th>
		<th>用户名</th>
		<th>密码</th>
		<th>邮箱</th>
		<th>注册时间</th>
		<th>操作</th>
		<?php
		define("ROOT",dirname(__FILE__));    
		set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."./core".PATH_SEPARATOR.ROOT."./configs".PATH_SEPARATOR.get_include_path());
		require_once("config.php");
		require_once("connect.php");
		$result=mysql_query("select * from user order by userId");
		while($myrow=mysql_fetch_array($result)){
		?>

		<tr bgcolor="#99CC00">
			<td><?php echo $myrow['userId'];?></td>
			<td><?php echo $myrow['userNickname'];?></td>
			<td><?php echo $myrow['userName'];?></td>
			<td><?php echo $myrow['userPwd'];?></td>
			<td><?php echo $myrow['userMailBox'];?></td>
			<td><?php echo $myrow['userRegTime'];?></td>
			<td><input onClick="javascript:window.location.href='test_delete.php?userId=<?php echo $myrow['userId'];?>'" type="button" name="myborrow" value="删除"></td>
		</tr>
		<?php
			}
		?>
	</table>
	<h2>数据查找</h2>

	<h2>数据更新</h2>
	<table border="1" background="yellow">
		<th>用户ID</th>
		<th>用户昵称</th>
		<th>用户名</th>
		<th>密码</th>
		<th>邮箱</th>
		<th>注册时间</th>
		<th>操作</th>
		<?php  
		set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."./core".PATH_SEPARATOR.ROOT."./configs".PATH_SEPARATOR.get_include_path());
		require_once("config.php");
		require_once("connect.php");
		$result=mysql_query("select * from user order by userId");
		while($myrow=mysql_fetch_array($result)){
		?>

		<tr bgcolor="#99CC00">
			<td><?php echo $myrow['userId'];?></td>
			<td><?php echo $myrow['userNickname'];?></td>
			<td><?php echo $myrow['userName'];?></td>
			<td><?php echo $myrow['userPwd'];?></td>
			<td><?php echo $myrow['userMailBox'];?></td>
			<td><?php echo $myrow['userRegTime'];?></td>
			<td><input onClick="javascript:window.location.href='test_update.php?userId=<?php echo $myrow['userId'];?>'" type="button" name="myborrow" value="修改"></td>
		</tr>
		<?php
			}
		?>
	</table>
</body>
</html>