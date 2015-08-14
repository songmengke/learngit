<?php
	define("ROOT",dirname(__FILE__));    
	set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."./core".PATH_SEPARATOR.ROOT."./configs".PATH_SEPARATOR.get_include_path());
	require_once("connect.php");
	$userid=$_GET['userId'];
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>测试更新</title>
</head>
<body>
	<form action="update_handle.php?userId=<?php echo $userid;?>" method="post">
		<table>
			<th>用户ID</th>
			<th>用户昵称</th>
			<th>用户名</th>
			<th>密码</th>
			<th>邮箱</th>
			<th>注册时间</th>
			<th>操作</th>
			<?php   
			
			$result=mysql_query("select * from user where userId='$userid'");
			$myrow=mysql_fetch_assoc($result);//不能用mysql_fetch_array，因为它返回的是关联数组或数字数组
			//$myrow为关联数组的数组名，
			?>

			<tr bgcolor="#99CC00">
				<td><?php echo $myrow['userId'];?></td>
				<td><input type="text" name="userNickname" value="<?php echo $myrow['userNickname'];?>"></td>
				<td><input type="text" name="userName" value="<?php echo $myrow['userName'];?>"></td>
				<td><input type="text" name="userPwd" value="<?php echo $myrow['userPwd'];?>"></td>
				<td><input type="text" name="userMailBox" value="<?php echo $myrow['userMailBox'];?>"></td>
				<td><input type="text" name="userRegTime" value="<?php echo $myrow['userRegTime'];?>"></td>
				<td><input type="submit" name="myborrow" value="更新"></td>
			</tr>
		</table>
	</form>
</body>
</html>