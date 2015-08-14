<?php
	session_start();
	$username=$_SESSION['name'];
	unset($_SESSION['name']);
	define("ROOT",dirname(__FILE__));    
	set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."./core".PATH_SEPARATOR.ROOT."./configs".PATH_SEPARATOR.get_include_path());
	require_once("config.php");
	require_once("connect.php");
	$sql="UPDATE user SET loginFlag='0' WHERE userName='$username'";
	$res=mysql_query($sql);
	/*将登录标识设置为0*/
	if($res){
		echo "<script> alert('注销成功');window.location.href='index.php';</script>";
	}
	else{
		echo "<script> alert('注销失败');window.location.href='index.php';</script>";
	}
	
?>