<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>评论回复</title>
</head>
<body>
	<?php
		session_start();
		$com_id=$_GET['com_id'];

		define("ROOT",dirname(__FILE__));    
		set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."./core".PATH_SEPARATOR.ROOT."./configs".PATH_SEPARATOR.get_include_path());
		require_once("config.php");
		require_once("connect.php");
		if(!$_SESSION['name']){
			echo "<script> alert('登录之后才能发表回复');window.location.href='login.html'</script>";
		}
		$username=$_SESSION['name'];
		$sql2="SELECT * FROM com_list WHERE comId = '$com_id'";
		$result2=mysql_query($sql2);
		$myrow2=mysql_fetch_array($result2);
		$b_userid=$myrow2['user_ID'];

		$sql1="SELECT * FROM user WHERE userName = '$username'";
		$result1=mysql_query($sql1);
		if($result1){
			$myrow1=mysql_fetch_array($result1);
			$user_id=$myrow1['userId'];
		}
		else{
			echo "<script> alert('请先登录');window.location.href='login.html'</script>";	
		}
		
	?>
	<form action="reply_handle.php" method="post">
		被回复用户ID:<input type="text" name="b_user_Id" value="<?php echo $b_userid;?>"/><br/>
		回复用户ID:<input type="text" name="userid" value="<?php echo $user_id;?>"/><br/>
		评论ID:<input type="text" name="com_id" value="<?php echo $com_id;?>"/><br/>
		回复内容:<input type="text" name="reply_cont"/>
		<input type="submit" value="回复"/>
		<input type="reset" value="重置">
	</form>
	
</body>
</html>