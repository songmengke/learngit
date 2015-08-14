<?php
	define("ROOT",dirname(__FILE__));    
	set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."./core".PATH_SEPARATOR.ROOT."./configs".PATH_SEPARATOR.get_include_path());
	require_once("config.php");
	require_once("connect.php");
	$nickname=$_POST['nickname'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$mailbox=$_POST['mailbox'];
	$dat1=date('Y-m-j');
	$dat2=date('G:i:s');
	$dat=$dat1.' '.$dat2;
	$query=mysql_query("select * from user");
	while($row=mysql_fetch_array($query))
	{
		if($row['userName']==$username)
		{
			echo "<script> alert('该用户名已存在，请重新输入用户名！');window.location.href='test.php'</script>";
			exit;
		}
	}
	$sql="INSERT INTO user(userNickname,userName,userPwd,userMailBox,userRegTime)VALUES('$nickname','$username','$password','$mailbox','$dat')";
	$result=mysql_query($sql)or die("query fail".mysql_error());
	if($result){
		echo "<script> alert('插入成功');window.location.href='test.php'</script>";
	}
	else{
		echo "<script> alert('插入失败');window.location.href='test.php'</script>";	
	}
?>